<?php

namespace App\Http\Livewire\User\Process;

use Livewire\Component;
use App\Models\Campus;
use App\Models\Program;
use App\Models\Department;
class StartInfo extends Component
{
    public $first_name;
    public $middle_name;
    public $last_name;
    public $course;
    public $campus='';
    public $department;

    public $user_type;
    public $roles = [
        'student' => 'Student',
        'teacher' => 'Teacher',
        'office-admin' => 'Office Admin',
    ];  


    public $_campuses;
    public $_courses;
    public $_departments;


    public function render()
    {
        return view('livewire.user.process.start-info');
    }
    public function mount()
    {
        $this->_campuses=Campus::all();
        $this->_courses=[];
        $this->_departments=[];

    }
    public function updatedCampus()
    {
        $this->_departments = Department::where('campus_id', $this->campus)->get();
    } 
    public function updatedDepartment()
    {
        $this->_courses = Program::where('department_id', $this->department)->get();
    }

    public function create()
    {
        $course_array[] = $this->course;
        
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'nullable',
           
            'user_type' => 'required|in:student,teacher,office-admin',

             'course' => $this->user_type=='student' ? 'required|in:'. implode(',', $course_array) : 'nullable|in:'. implode(',', $course_array) ,

            'campus' => 'required',
            'department' => $this->user_type=='student' ? 'required' : 'nullable',
        ]);
        
       auth()->user()->information()->create([
              'firstname' => $this->first_name,
              'middlename' => $this->middle_name,
              'lastname' => $this->last_name,
              'program_id' => $this->course,
       ]);
    
        auth()->user()->update([
            'name'=>$this->first_name.' '.$this->last_name,
           'hasInfo' => true,
           'role_type' => $this->user_type,
           'campus_id' => $this->campus,
       ]);

       return redirect()->route('home');
    }
}