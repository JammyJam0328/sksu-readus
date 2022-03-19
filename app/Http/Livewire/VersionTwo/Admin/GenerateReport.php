<?php

namespace App\Http\Livewire\VersionTwo\Admin;

use Livewire\Component;

class GenerateReport extends Component
{
    public function render()
    {
        return view('livewire.version-two.admin.generate-report')
        ->layout('layouts.version-two-admin');
    }
}