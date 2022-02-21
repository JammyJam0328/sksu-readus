<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Campus;
// use livewire pagination
use Livewire\WithPagination;
class ManageSchool extends Component
{
    use WithPagination;

    public $searchTerm='';
    protected function getCampuses()
    {
        $campuses = Campus::where('name','like','%'.$this->searchTerm.'%')->withCount('departments');
        return $campuses;
    }
    public function render()
    {
        return view('livewire.admin.manage-school',[
            'campuses'=>$this->getCampuses()->paginate(10),
        ]);
    }
    
}