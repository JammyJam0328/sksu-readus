<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;
use App\Models\Campus;
use App\Models\Department;
use App\Models\Program;
use App\Models\Information;
use App\Models\Event;
use App\Models\Announcement;
class DashboardDetails extends Component
{
    public $users_count;
    public $posts_count;
    public $events_count;
    public $announcements_count;
    public $departments_count;
    public $campuses_count;
    public $programs_count;
    public function render()
    {
        return view('livewire.admin.dashboard-details');
    }

    public function mount()
    {
        $this->users_count = User::count();
        $this->posts_count = Post::count();
        $this->events_count = Event::count();
        $this->announcements_count = Announcement::count();
        $this->departments_count = Department::count();
        $this->campuses_count = Campus::count();
        $this->programs_count = Program::count();
    }
}