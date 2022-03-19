<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Post;
use App\Models\Campus;

class GenerateReport extends Component
{

    
  
    public function getAllUsersPostsCount($campus)
    {
        return Post::whereHas('user', function ($query) use ($campus) {
            $query->where('campus_id', $campus);
        })->count();
    }
    
    public function render()
    {
        
        return view('livewire.admin.generate-report',[
            'campuses' => Campus::all(),
        ])
        ->layout('layouts.report');
    }
}