<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use App\Models\Post;
use App\Search\Fullsearch;
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
        if($this->searchTerm!='')
        {
            $result = Fullsearch::search($this->searchTerm)->get();
                // store all result that get_class($result) == 'App\Models\User' to $userResults
                $this->userResults = $result->filter(function($result){
                    return get_class($result) == 'App\Models\User';
                });

                // store all result that get_class($result) == 'App\Models\Post' to $postResults
                $this->postResults = $result->filter(function($result){
                    return get_class($result) == 'App\Models\Post';
                });
        }else{
            $this->userResults=[];
            $this->postResults=[];
        }
    }
}