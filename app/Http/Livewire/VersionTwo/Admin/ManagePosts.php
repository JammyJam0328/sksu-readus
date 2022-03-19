<?php

namespace App\Http\Livewire\VersionTwo\Admin;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
class ManagePosts extends Component
{
    use WithPagination;
    public $action='list';
    public $set_id;

    public function getPostProperty()
    {
        return Post::where('id',$this->set_id)->with(['user'])->first();
    }

    public function render()
    {
        return view('livewire.version-two.admin.manage-posts',[
            'posts'=>Post::with('user')->paginate(10)
        ])
        ->layout('layouts.version-two-admin');
    }

    public function viewDetails($id)
    {
        $this->set_id=$id;
        $this->action='view-details';
    }
}