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
            'posts'=>Post::where('visibility','all')->orWhere('visibility',auth()->user()->campus_id)->with(['user','medias'=>function($query){
                return $query->select('id','post_id','type','file_id');
            }])->withCount('comments')->latest()->take($this->limit)->get(),
        ]);
    }
   
    public function loadMore()
    {
        $this->limit = $this->limit + 10;
        $this->ready=true;
    }
    public function postCreated()
    {
        $this->ready=true;
    }

   
}