<?php

namespace App\Http\Livewire\User\Announcement;

use Livewire\Component;
use App\Models\Announcement;
use App\Models\User;
use App\Jobs\SendAnnouncementEmailJob;
class Main extends Component
{
    public $visibilities = [];

    public function mount()
    {
        
       $this->visibilities = [
         [
            'key'=>'All',
            'value'=>'All',
         ],
         [
            'key'=>auth()->user()->campus_id,
            'value'=>auth()->user()->campus->name,
         ]
       ];
    }
    public function render()
    {
        return view('livewire.user.announcement.main',[
            'announcements'=>Announcement::where('visibility','All')
            ->orWhere('visibility',auth()->user()->campus_id)
            ->orderBy('created_at','desc')
            ->with('user')
            ->get()
        ]);
    }

    public $title;
    public $body;
    public $visibility='All';
    public function create()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required',
            'visibility'=>'required|in:All,'.auth()->user()->campus_id,
        ]);

        $announcement = Announcement::create([
            'title' => $this->title,
            'body' => $this->body,
            'visibility' => $this->visibility,
            'user_id' => auth()->user()->id,
        ]);

        $this->sendEmail($this->visibility,$announcement);

        $this->title = '';
        $this->body = '';
        $this->visibility = 'All';
        $this->dispatchBrowserEvent('notify',[
            'message'=>'Announcement created successfully',
            'type'=>'success',
            'nextAction'=>'none',
        ]);
    }

    public $set_id;
    public $owner_id;
    public function clickAnnouncement($id,$owner_id)
    {
        $this->set_id = $id;
        $this->owner_id = $owner_id;
        $this->dispatchBrowserEvent('open-option');
    }

    public function deleteConfirmation()
    {
        $this->dispatchBrowserEvent('close-option');
        $this->dispatchBrowserEvent('start-deleting');
    }
    public function deleteAnnouncement()
    {
        $announcement = Announcement::find($this->set_id);
    //    check if the owner of the announcement is the same as the user
        if($announcement->user_id == auth()->user()->id)
        {
            $announcement->delete();
            $this->dispatchBrowserEvent('notify',[
                'message'=>'Announcement deleted successfully',
                'type'=>'success',
                'nextAction'=>'none',
            ]);
            $this->dispatchBrowserEvent('end-deleting');
        }
        else
        {
            $this->dispatchBrowserEvent('notify',[
                'message'=>'You are not the owner of this announcement',
                'type'=>'error',
                'nextAction'=>'none',
            ]);
        }
    }

    // custom functions for sending email


    protected function sendEmail($user,$announcement)
    {
        $receivers = $this->receivers($user);
        foreach($receivers as $receiver){
            $details = [
                'receiver'=>$receiver->name,
                'title'=>$announcement->title,
                'body'=>$announcement->body,
                'additional_message'=>'Sign in to view the Announcement',
            ];
            dispatch(new SendAnnouncementEmailJob($receiver->email,$details));
        }
      
    }

    protected function receivers($visibility)
    {
        if($visibility=='All'){
            return User::where('campus_id','!=','')->where('announcement_notification',1)->get();
        }else{
            return User::where('campus_id',$visibility)->where('announcement_notification',1)->get();
        }
    }
    // end of custom functions for sending email
    

    
}