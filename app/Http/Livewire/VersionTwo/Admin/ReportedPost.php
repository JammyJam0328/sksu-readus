<?php

namespace App\Http\Livewire\VersionTwo\Admin;

use Livewire\Component;

class ReportedPost extends Component
{
    public function render()
    {
        return view('livewire.version-two.admin.reported-post')
        ->layout('layouts.version-two-admin');
    }
}