<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Announcement;
use App\Models\Campus;

use Livewire\WithPagination;
use Carbon\Carbon;
class ManageAnnouncement extends Component
{
    use WithPagination;
    public $searchTerm;

    public $title;
    public $body;
    public $publicity='All';
    public $publicities=[];

    public $new_title;
    public $new_body;
    public $new_publicity;
    public function mount()
    {
        $this->publicities = Campus::all();
    }

    public function render()
    {
        return view('livewire.admin.manage-announcement',[
            'announcements'=>Announcement::where('title','like','%'.$this->searchTerm.'%')->with('user')->paginate(10),
        ]);
    }

    public function createAnnouncement()
    {
        $this->validate([
            'title'=>'required',
            'body'=>'required',
            'publicity'=>'required|in:All,'.implode(',',$this->publicities->pluck('id')->toArray()),
        ]);

        $announcement = new Announcement();
        $announcement->title = $this->title;
        $announcement->body = $this->body;
        $announcement->visibility = $this->publicity;
        $announcement->user_id = auth()->user()->id;
        $announcement->save();

        $this->reset([
            'title',
            'body',
            'publicity',
        ]);

        $this->dispatchBrowserEvent('notify',[
            'message'=>'Announcement Created Successfully',
            'type'=>'success',
            'nextAction'=>'',
        ]);
    }
    public $set_id;

    public function getAnnouncementProperty()
    {
        return Announcement::where('id',$this->set_id)->first();
    }

    public function edit($id)
    {
        $this->set_id=$id;
        $this->new_title = $this->announcement->title;
        $this->new_body = $this->announcement->body;
        $this->new_publicity = $this->announcement->visibility;
        $this->dispatchBrowserEvent('start-editing');
    }

    public function updateAnnouncement()
    {
        $this->validate([
            'new_title'=>'required',
            'new_body'=>'required',
            'new_publicity'=>'required|in:All,'.implode(',',$this->publicities->pluck('id')->toArray()),
        ]);

        $this->announcement->title = $this->new_title;
        $this->announcement->body = $this->new_body;  
        $this->announcement->visibility = $this->new_publicity;
        $this->announcement->save();


        $this->reset([
            'new_title',
            'new_body',
            'new_publicity',
        ]);

        $this->dispatchBrowserEvent('notify',[
            'message'=>'Announcement Updated Successfully',
            'type'=>'success',
            'nextAction'=>'',
        ]);
    }

    public function delete($id)
    {
        $this->set_id=$id;
        $this->dispatchBrowserEvent('start-deleting');
    }
    
    public function deleteAnnouncement()
    {
        $this->announcement->delete();
        $this->dispatchBrowserEvent('notify',[
            'message'=>'Announcement Deleted Successfully',
            'type'=>'success',
            'nextAction'=>'',
        ]);
    }
}