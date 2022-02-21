<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use App\Models\Post;


class Search extends Component
{
    public $searchTerm;

    public $users=[];
    public $posts=[];
    public function render()
    {
        return view('livewire.user.search');
    }

    public function updatedSearchTerm()
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