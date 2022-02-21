<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Campus;
use App\Models\Department;
use App\Models\Program;
// use hash

// livewire pagination
use Livewire\WithPagination;
class ManageUsers extends Component
{
    use WithPagination;
    public $campuses=[];
    public $searchTerm='';
    public function mount()
    {
        $this->campuses=Campus::all();
    }
    public function render()
    {
        return view('livewire.admin.manage-users',[
            'users'=>User::where('name','like','%'.$this->searchTerm.'%')->where('role','!=','admin')->with('campus')->paginate(10),
        ]);
    }



    public $name;
    public $email;
    public $password;
    public $user_type='student';
    public $campus;
   

    public function createUser()
    {
        $this->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required',
            'user_type'=>'required',
            'campus'=>'required',
        ]);

        $user=new User();
        $user->name=$this->name;
        $user->email=$this->email;
        $user->password=bcrypt($this->password);
        $user->role_type=$this->user_type;
        $user->campus_id=$this->campus;
        $user->save();
        $this->reset([
            'name',
            'email',
            'password',
            'user_type',
            'campus',
         ]);

        $this->dispatchBrowserEvent('notify',[
            'type'=>'success',
            'message'=>'User Created Successfully',
            'nextAction'=>'none'
        ]);
    }
    public $tempUser;
    public $new_name;
    public $new_email;
    public $new_user_type;
    public $new_campus;
    public function editUser($user_id)
    {
        $this->tempUser=User::find($user_id);
        $this->new_name=$this->tempUser->name;
        $this->new_email=$this->tempUser->email;
        $this->new_user_type=$this->tempUser->role_type;
        $this->new_campus=$this->tempUser->campus_id;

        $this->dispatchBrowserEvent('start-editing');
    }

    public function updateUser()
    {
        $this->tempUser->update([
            'name'=>$this->new_name,
            'email'=>$this->new_email,
            'role_type'=>$this->new_user_type,
            'campus_id'=>$this->new_campus,
            
        ]);
        $this->dispatchBrowserEvent('notify',[
            'type'=>'success',
            'message'=>'User Updated Successfully',
            'nextAction'=>'none'
        ]);
    }
    public $delete_id;
    public function deleting($user_id)
    {
        $this->delete_id = $user_id;
        // dd($this->delete_id);
        $this->dispatchBrowserEvent('start-deleting');
    }

    public function deleteUser()
    {
    //    delete the user
        $user = User::find($this->delete_id);
        
        $user->delete();
        $this->dispatchBrowserEvent('end-deleting');
        $this->dispatchBrowserEvent('notify',[
            'type'=>'success',
            'message'=>'User Deleted Successfully',
            'nextAction'=>'none'
        ]);
    }

    
    


}