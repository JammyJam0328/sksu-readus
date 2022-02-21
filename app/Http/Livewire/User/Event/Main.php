<?php

namespace App\Http\Livewire\User\Event;

use Livewire\Component;
use App\Models\Event;
use App\Models\Campus;
use App\Models\User;

use App\Models\Privacy;
// use carbon\carbon;
use Carbon\Carbon;

use App\Jobs\SendEventEmailJob;
class Main extends Component
{

    public $publicities =[];
    public $campuses=[];

    public function render()
    {   
       
        $datetime_local = Carbon::now()->format('Y-m-d\TH:i'); 
        $upcomingEvents = Event::with(['user'])->where('start_date','>',$datetime_local)->orderBy('start_date','asc')->get();

        $happeningNowEvents = Event::with(['user'])->where('start_date','<',$datetime_local)->where('end_date','>',$datetime_local)->orderBy('end_date','asc')->get();

        return view('livewire.user.event.main',[
            'upcomingEvents'=>$upcomingEvents,
            'happeningNowEvents'=>$happeningNowEvents
        ]);
    }

    public function mount()
    {
        $this->campuses = Campus::all();
        $this->publicities = [
            [
                'key'=>'School',
                'value'=>'All Campus'
            ],
            [
                'key'=>auth()->user()->campus->id,
                'value'=>auth()->user()->campus->name
            ]
        ];
    }

    public $title;
    public $description;
    public $start_date;
    public $end_date;
    public $publicity='School';

    public function create()
    {
        
        
        $this->validate([
            'title' => 'required',
            'description' => 'nullable|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
            'publicity' => 'required|in:School,'.auth()->user()->campus->id,
        ]);

        $event = Event::create([
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'visibility' => $this->publicity,
            'user_id' => auth()->user()->id,
        ]);

        $this->sendEmail($this->publicity,$event);
        $this->reset([
            'title',
            'description',
            'start_date',
            'end_date',
            'publicity'
        ]);
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Event Created Successfully',
            'nextAction'=>'none'
        ]);
    }

  


    // costumize function to send email
    protected function sendEmail($user,$event)
    {
        $receivers = $this->receivers($user);
        
        foreach($receivers as $receiver){
            $details = [
                'receiver'=>$receiver->name,
                'title'=>$event->title,
                'description'=>$event->description,
                // format date to be more readable
                'start_date'=>Carbon::parse($event->start_date)->format('M d, Y h:i A'),
                'additional_message'=>'Sign in to view the event',
            ];
            dispatch(new SendEventEmailJob($receiver->email,$details));
        }
      
    }

    protected function receivers($scope)
    {
        if($scope == 'School'){
            return User::where('campus_id','!=','')->where('event_notification',1)->get();
        }else{
            return User::where('campus_id',$scope)->where('event_notification',1)->get();
        }
    }

    // edit
    public $event_edit_id;
    public $new_title;
    public $new_description;
    public $new_start_date;
    public $new_end_date;
    public $new_publicity;

    public function editEvent($id)
    {
        $event = Event::find($id);
        if($event->user_id == auth()->user()->id){
            $this->new_title = $event->title;
            $this->new_description = $event->description;
            $this->new_start_date = $event->start_date;
            $this->new_end_date = $event->end_date;
            $this->new_publicity = $event->visibility;
            $this->event_edit_id = $id;
            $this->dispatchBrowserEvent('action',[
                'nextAction'=>'edit-event'
            ]);
        }else{
            // if not the owner of the event then throw error 403 forbidden action
            return abort(403,'Forbidden Action');
        }
    }

    public function updateEvent()
    {
        $this->validate([
            'new_title' => 'required',
            'new_description' => 'nullable|max:255',
            'new_start_date' => 'required',
            'new_end_date' => 'required',
            'new_publicity' => 'required|in:School,'.auth()->user()->campus->id,
        ]);

        $event = Event::find($this->event_edit_id);
        $event->title = $this->new_title;
        $event->description = $this->new_description;
        $event->start_date = $this->new_start_date;
        $event->end_date = $this->new_end_date;
        $event->visibility = $this->new_publicity;
        $event->save();
        $this->reset([
            'event_edit_id',
            'new_title',
            'new_description',
            'new_start_date',
            'new_end_date',
            'new_publicity',
        ]);
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Event Updated Successfully',
            'nextAction'=>'none'
        ]);
    }
    public $event_delete_id;
    public function deleting($id)
    {
        $event = Event::find($id);
        if($event->user_id == auth()->user()->id){
            $this->event_delete_id = $id;
            $this->dispatchBrowserEvent('start-deleting');
        }else{
            // if not the owner of the event then throw error 403 forbidden action
            return abort(403,'Forbidden Action');
        }
    }

    public function deleteEvent()
    {
        $event = Event::find($this->event_delete_id);
        $event->delete();
        $this->reset([
            'event_delete_id',
        ]);
        // dispatch two browser events
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Event Deleted Successfully',
            'nextAction'=>'none'
        ]);
        $this->dispatchBrowserEvent('end-deleting');
    }


}