<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
// use livewire pagination
use Livewire\WithPagination;
class ManagePosts extends Component
{
    use WithPagination;
    public $set_id;

    public function getPostProperty()
    {
        return Post::where('id',$this->set_id)->first();
    }
    public function render()
    {    
        return view('livewire.admin.manage-posts',[
            'posts'=>Post::with(['user','medias'])->orderBy('id','desc')->paginate(10),
        ]);
    }

    public function deleteConfirmation($id)
    {
        $this->set_id = $id;
        $this->dispatchBrowserEvent('start-deleting');
    }

    public function deletePost()
    {
        $this->post->delete();
        $this->dispatchBrowserEvent('notify',[
            'type'=>'success',
            'message'=>'Post Deleted Successfully',
            'nextAction'=>'none'
        ]);
    }
}