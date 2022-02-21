<?php

namespace App\Http\Livewire\User\Stateful;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;
use App\Models\Campus;
use App\Models\Department;
use App\Models\Program;

class UserProfile extends Component
{
    public $userid;
    public $user_information;
    public $courses = [];
    public $departments = [];
    public $campuses = [];

    public function render()
    {
        return view('livewire.user.stateful.user-profile',[
            'user'=> User::where('id', $this->userid)->with('information')->first()
        ]);
    }

    public $firstname;
    public $middlename;
    public $lastname;
    public $sex;
    public $address;
    public $date_of_birth;
    public $course;
    public $department;
    public $campus;

    public function mount()
    {
        $this->campuses = Campus::all();
        $this->renderEditInfo();
    }


    protected function renderEditInfo()
    {
        $this->edit_user = User::where('id', $this->userid)->with('information')->first();
        $this->campus = $this->edit_user->information->program_id ? $this->edit_user->information->program->department->campus_id : '';
        $this->department = $this->edit_user->information->program_id ? $this->edit_user->information->program->department_id : '';
        $this->firstname = $this->edit_user->information->firstname;
        $this->middlename = $this->edit_user->information->middlename;
        $this->lastname = $this->edit_user->information->lastname;
        $this->sex = $this->edit_user->information->sex;
        $this->address = $this->edit_user->information->address;
        $this->date_of_birth = $this->edit_user->information->birthdate;
        $this->course = Program::find($this->edit_user->information->program_id) ? Program::find($this->edit_user->information->program_id)->id : "";
    }

    public function updatedCampus()
    {
        $this->departments = Department::where('campus_id', $this->campus)->get();
    }
    public function updatedDepartment()
    {
        $this->courses = Program::where('department_id', $this->department)->get();
    }

    public function update()
    {
        $this->validate([
            'firstname' => 'required',
            'middlename' => 'nullable',
            'lastname' => 'required',
            'sex'=>'required|in:Male,Female',
            'date_of_birth'=>'required',
            'address'=>'required',
            'course'=>'nullable'            
        ]);

        auth()->user()->information->update([
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'sex'=>$this->sex,
            'address'=>$this->address,
            'birthdate'=>$this->date_of_birth,
            'program_id'=>$this->course,
        ]);

        $this->renderEditInfo();

        $this->dispatchBrowserEvent('notify',[
            'type'=>'success',
            'message'=>'Profile updated successfully',
            'nextAction'=>'none',
        ]);

       
    }

    public function toggleEventNotification()
    {
        auth()->user()->update([
            'event_notification'=>!auth()->user()->event_notification
        ]);
    }

    public function toggleAnnouncementNotification()
    {
        auth()->user()->update([
            'announcement_notification'=>!auth()->user()->announcement_notification
        ]);
    }

   
}

  