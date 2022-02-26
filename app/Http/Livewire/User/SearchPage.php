<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use App\Models\Post;
class SearchPage extends Component
{
    public $searchTerm='';
    public $userResults=[];
    public $postResults=[];
    public function render()
    {
        return view('livewire.user.search-page');
    }
    
    public function updatedSearchTerm()
    {
       
    }
}