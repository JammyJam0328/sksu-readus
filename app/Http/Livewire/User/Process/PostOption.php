<?php

namespace App\Http\Livewire\User\Process;

use Livewire\Component;

class PostOption extends Component
{
    public $post;
    public function render()
    {
        return view('livewire.user.process.post-option');
    }
}