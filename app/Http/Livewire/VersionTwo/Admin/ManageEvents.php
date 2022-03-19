<?php

namespace App\Http\Livewire\VersionTwo\Admin;

use Livewire\Component;

class ManageEvents extends Component
{
    public function render()
    {
        return view('livewire.version-two.admin.manage-events')
        ->layout('layouts.version-two-admin');
    }
}