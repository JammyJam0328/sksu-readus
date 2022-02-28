<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use App\Models\Post;
class SearchPage extends Component
{
    public $searchTerm='';
    public $posts = [];
    public $users = [];
    public function render()
    {
        return view('livewire.user.search-page');
    }

    public function search()
    {
        if ($this->searchTerm!='') {
            $this->users = User::search($this->searchTerm)->get();
            $this->posts = Post::search($this->searchTerm)->get();
        }else{
            $this->users=[];
            $this->posts=[];
        }
    }
}