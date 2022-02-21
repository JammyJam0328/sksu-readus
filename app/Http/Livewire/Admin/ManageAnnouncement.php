<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Announcement;
     use Livewire\WithPagination;
use Carbon\Carbon;
class ManageAnnouncement extends Component
{
    use WithPagination;
    public $searchTerm;
    public function render()
    {
        return view('livewire.admin.manage-announcement',[
            'announcements'=>Announcement::where('title','like','%'.$this->searchTerm.'%')->with('user')->paginate(10),
        ]);
    }
}