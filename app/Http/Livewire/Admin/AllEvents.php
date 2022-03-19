<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Event;
use App\Models\Campus;

// use livewire pagination
use Livewire\WithPagination;
use Carbon\Carbon;

class AllEvents extends Component
{
    use WithPagination;
    public $searchTerm;
    public $action="showList";
    public $title;
    public $start_date;
    public $end_date;
    public $description;
    public $publicity='All';

    public $new_title;
    public $new_start_date;
    public $new_end_date;
    public $new_description;
    public $new_publicity;

    public $publicities =[];

    public function mount()
    {
         $this->publicities = Campus::all();
    }
    public function render()
    {
        return view('livewire.admin.all-events',[
            'events'=>Event::where('title','like','%'.$this->searchTerm.'%')->with(['user'])->paginate(10),
        ]);
    }
    public $delete_id;
    public function deleting($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('start-deleting');
    }

    public function deleteEvent()
    {
        $event = Event::find($this->delete_id);
        $event->delete();
        $this->dispatchBrowserEvent('notify',[
            'type'=>'success',
            'message'=>'Event Deleted Successfully',
            'nextAction'=>''
        ]);
    }

    public function createEvent()
    {
        $this->validate([
            'title'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'description'=>'required',
            'publicity'=>'required',
        ]);
        $event = new Event();
        $event->user_id = auth()->user()->id;
        $event->title = $this->title;
        $event->start_date = $this->start_date;
        $event->end_date = $this->end_date;
        $event->description = $this->description;
        $event->visibility = $this->publicity;
        $event->save();
        $this->reset([
            'title',
            'start_date',
            'end_date',
            'description',
            'publicity',
        ]);
        $this->dispatchBrowserEvent('notify',[
            'type'=>'success',
            'message'=>'Event Created Successfully',
            'nextAction'=>''
        ]);
    }
    public $set_id;
    public function getEventProperty()
    {
        return Event::where('id',$this->set_id)->first();
    }
    public function edit($id)
    {
        $this->set_id=$id;
        $this->new_title = $this->event->title;
        $this->new_start_date = $this->event->start_date;
        $this->new_end_date = $this->event->end_date;
        $this->new_description = $this->event->description;
        $this->new_publicity = $this->event->visibility;
        $this->dispatchBrowserEvent('start-editing');
    }

    public function update()
    {
        $this->validate([
            'new_title'=>'required',
            'new_start_date'=>'required',
            'new_end_date'=>'required',
            'new_description'=>'required',
            'new_publicity'=>'required',
        ]);
        $this->event->update([
            'title'=>$this->new_title,
            'start_date'=>$this->new_start_date,
            'end_date'=>$this->new_end_date,
            'description'=>$this->new_description,
            'visibility'=>$this->new_publicity,
        ]);
        $this->dispatchBrowserEvent('notify',[
            'type'=>'success',
            'message'=>'Event Updated Successfully',
            'nextAction'=>''
        ]);
    }
    
}