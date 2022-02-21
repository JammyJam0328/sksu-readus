<?php

namespace App\Http\Livewire\User\Stateful;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;

use Illuminate\Support\Str;
// import crypt class
use Illuminate\Support\Facades\Crypt;
class MyPostItem extends Component
{
    public $post;
    protected $cookieValues=[];
    public $post_body;
    public $trancated_post_body=false;
    public $see_more = false;
    public $commentCount;
    public function render()
    {
        return view('livewire.user.stateful.my-post-item');
    }

    public function mount()
    {
        $this->commentCount = $this->post->comments_count;
        $this->post_body = str::limit($this->post->body, 500);
        if (str::length($this->post->body) > 500) {
            $this->trancated_post_body = true;
        }
    }
    public function more()
    {
        $this->post_body = $this->post->body;
        $this->see_more=true;
    }
    public function less()
    {
        $this->post_body = str::limit($this->post->body, 500);
        $this->see_more=false;
    }
}