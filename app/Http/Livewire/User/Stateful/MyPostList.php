<?php

namespace App\Http\Livewire\User\Stateful;

use Livewire\Component;
use App\Models\Post;

class MyPostList extends Component
{
    public $limit = 10;
    protected $ready=false;
    public $userid;
    public function render()
    {
        return view('livewire.user.stateful.my-post-list',[
            'posts' => $this->ready ? Post::where('user_id',$this->userid)->with(['user'=>function($query){
                return $query->select('id','name','profile_photo_path');
            },'medias'=>function($query){
                return $query->select('id','post_id','type','file_id');
            }])->withCount('comments')->latest()->take($this->limit)->get() : [],
        ]);
        
    }

    public function initiate()
    {
        $this->ready=true;
    }
    public function loadMore()
    {
        $this->ready=true;
        $this->limit = $this->limit + 10;
    }
}