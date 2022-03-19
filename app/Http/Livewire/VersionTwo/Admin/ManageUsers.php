<?php

namespace App\Http\Livewire\VersionTwo\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use \App\Models\User;
class ManageUsers extends Component
{
    use WithPagination;
    public $deleting=false;

    public $action='list';
    public $set_id;
    public $name;
    public $email;
    public $password;

    public $type='';
    public $campus='';
    public $campuses=[];
    public function mount()
    {
        $this->campuses=\App\Models\Campus::all();
    }
    public function getUserProperty()
    {
        return User::where('id',$this->set_id)->first();
    }

    public function render()
    {
        return view('livewire.version-two.admin.manage-users',[
            'users'=>User::paginate(10)
        ])
        ->layout('layouts.version-two-admin');
    }

    public function showList()
    {
        $this->action='list';
        $this->set_id=null;
    }

    public function createUser()
    {
        $this->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'type'=>'required|in:student,teacher,office-admin',
            'campus'=>'required|in:'.implode(',',$this->campuses->pluck('id')->toArray())
        ]);
        User::create([
            'role_type'=>$this->type,
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>bcrypt($this->password),
            'campus_id'=>$this->campus
        ]);

        $this->reset([
            'name',
            'email',
            'type',
            'campus'
        ]);

        $this->showList();
        session()->flash('success','User Created Successfully');
    }
    public $new_name;
    public $new_email;
    public $new_type='';
    public $new_campus='';
    protected $validationAttributes=[
        'new_name'=>'name',
        'new_email'=>'email',
        'new_type'=>'role',
        'new_campus'=>'campus',
    ];
    
       
   
    public function editUser($id)
    {
        $this->action='edit';
        $this->set_id=$id;
        $this->new_name=$this->user->name;
        $this->new_email=$this->user->email;
        $this->new_type=$this->user->role_type;
        $this->new_campus=$this->user->campus_id;
    }
    
    public function updateUser()
    {
        $this->validate([
            'new_name'=>'required',
            'new_email'=>'required|email',
            'new_type'=>'required|in:student,teacher,office-admin',
            'new_campus'=>'required|in:'.implode(',',$this->campuses->pluck('id')->toArray())
        ]);
        $this->user->update([
            'role'=>$this->new_type,
            'name'=>$this->new_name,
            'email'=>$this->new_email,
            'campus_id'=>$this->new_campus
        ]);
        $this->reset([
            'new_name',
            'new_email',
            'new_type',
            'new_campus'
        ]);
        $this->showList();
        session()->flash('success','User Updated Successfully');
    }

    public function deletePromt($id)
    {
        $this->deleting=true;
        $this->set_id=$id;
    }

    public function deleteUser()
    {
        $this->user->delete();
        $this->deleting=false;
        session()->flash('success','User Deleted Successfully');
    }

    public function resetPassword($id)
    {
        $this->set_id=$id;
        $this->user->update([
            'password'=>bcrypt('password12345')
        ]);
        session()->flash('success','Password Reset Successfully');
    }
}