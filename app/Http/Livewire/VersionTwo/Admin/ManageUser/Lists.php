<?php

namespace App\Http\Livewire\VersionTwo\Admin\ManageUser;

use Livewire\Component;
use Livewire\WithPagination;
class Lists extends Component
{
    use WithPagination;
    
    public function render()
    {
        return view('livewire.version-two.admin.manage-user.lists',[
            'users' => \App\Models\User::paginate(10)
        ]);
    }
}