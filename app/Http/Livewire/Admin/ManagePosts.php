<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
// use livewire pagination
use Livewire\WithPagination;
class ManagePosts extends Component
{
    use WithPagination;
    public function render()
    {    
        return view('livewire.admin.manage-posts',[
            'posts'=>Post::with(['user','medias'])->paginate(10),
        ]);
    }
}