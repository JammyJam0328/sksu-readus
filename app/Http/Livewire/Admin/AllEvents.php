<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Event;
// use livewire pagination
use Livewire\WithPagination;
use Carbon\Carbon;

class AllEvents extends Component
{
    use WithPagination;
    public $searchTerm;
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
    
}