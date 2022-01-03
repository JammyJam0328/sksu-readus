<?php

namespace App\Http\Livewire\User\Stateful;

use Livewire\Component;
use App\Models\Post;
class PostList extends Component
{
    public $limit = 10;
    protected $listeners = ['postCreated'=>'postCreated'];
    protected $ready=false;
    public function render()
    {
        return view('livewire.user.stateful.post-list',[
            'posts' => $this->ready ? Post::where('visibility','all')->orWhere('visibility',auth()->user()->campus_id)->with(['user'=>function($query){
                return $query->select('id','name','profile_photo_path');
            },'medias'=>function($query){
                return $query->select('id','post_id','type','file_id');
            }])->withCount('comments')->latest()->paginate($this->limit) : [],
        ]);
    }
    public function initiate()
    {
        $this->ready=true;
    }
    public function loadMore()
    {
        $this->limit += 10;
    }

    public function postCreated()
    {
        $this->ready=true;
    }

   
}