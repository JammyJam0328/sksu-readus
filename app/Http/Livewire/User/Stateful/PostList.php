<?php

namespace App\Http\Livewire\User\Stateful;

use Livewire\Component;
use App\Models\Post;
class PostList extends Component
{
    public $limit = 10;
    protected $listeners = ['postCreated'=>'postCreated'];
    protected $ready=false;
    public $filter='School';

    protected function getAllPosts()
    {
        return  Post::where('blocked',0)->where('visibility','all')->orWhere('visibility',auth()->user()->campus_id)->with(['user','medias'=>function($query){
                return $query->select('id','post_id','type','file_id');
            }])->withCount('comments')->latest()->take($this->limit)->get();
    }

    protected function getCampusPosts()
    {
        return Post::where('blocked',0)->where('visibility',auth()->user()->campus_id)->with(['user','medias'=>function($query){
                return $query->select('id','post_id','type','file_id');
            }])->withCount('comments')->latest()->take($this->limit)->get();
    }
    protected function showPostByFilter()
    {
        if($this->filter=='School'){
            return $this->getAllPosts();
        }elseif($this->filter=='Campus'){
            return $this->getCampusPosts();
        }else{
            abort(404);
        }
    }
    public function render()
    {
        return view('livewire.user.stateful.post-list',[
            'posts' =>$this->showPostByFilter(),
        ]);
    }
    public function initiate()
    {
        $this->ready=true;
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