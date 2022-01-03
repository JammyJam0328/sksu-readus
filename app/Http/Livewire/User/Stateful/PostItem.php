<?php

namespace App\Http\Livewire\User\Stateful;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Str;
class PostItem extends Component
{
    public $post;

    protected $cookieValues=[];

    public $post_body;
    public $trancated_post_body=false;
    public $see_more = false;
    public function render()
    {
        return view('livewire.user.stateful.post-item');
    }
    public function mount()
    {
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