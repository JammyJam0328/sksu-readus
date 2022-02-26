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
    public $filter='user';
    public function render()
    {
        return view('livewire.user.search-page');
    }
    
    public function updatedSearchTerm()
    {
        if($this->searchTerm!=""){
            switch ($this->filter) {
                case 'user':
                    $this->userResults=User::search($this->searchTerm)->get();
                    break;
                case 'post':
                    $this->postResults=Post::search($this->searchTerm)->get();
                    break;
                default:
                        $this->userResults=[];
                        $this->postResults=[];
                    break;
            }
        }else{
            $this->userResults=[];
            $this->postResults=[];
        }
    }

    public function updatedFilter()
    {
       if($this->searchTerm!=""){
            switch ($this->filter) {
                case 'user':
                    $this->userResults=User::search($this->searchTerm)->get();
                    break;
                case 'post':
                    $this->postResults=Post::search($this->searchTerm)->get();
                    break;
                default:
                        $this->userResults=[];
                        $this->postResults=[];
                    break;
            }
        }else{
            $this->userResults=[];
            $this->postResults=[];
        }
    }
}