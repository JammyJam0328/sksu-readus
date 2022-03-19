<?php

namespace App\Http\Livewire\VersionTwo\Admin;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.version-two.admin.dashboard')
        ->layout('layouts.version-two-admin');
    }
}