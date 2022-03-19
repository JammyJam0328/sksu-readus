<?php

namespace App\Http\Livewire\VersionTwo\Admin;

use Livewire\Component;
use App\Models\Announcement;
use App\Models\Campus;

class ManageAnnouncements extends Component
{
    public $action='list';
    public $campuses=[];
    public function mount()
    {
        $this->campuses=Campus::all();
    }
    public function render()
    {
        return view('livewire.version-two.admin.manage-announcements')
        ->layout('layouts.version-two-admin');
    }
}