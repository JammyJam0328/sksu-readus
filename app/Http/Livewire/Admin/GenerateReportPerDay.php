<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
// use carbon\carbon;
use Carbon\Carbon;
class GenerateReportPerDay extends Component
{
    public $day;
    public $month;
    public $action='';
  
    public function render()
    {
        return view('livewire.admin.generate-report-per-day',[ 
            'day_total_post' => Post::where('created_at','like','%'.$this->day.'%')->count(),
            'month_total_post' => $this->month ? $this->getTotalPostPerMonth():'',
        ])
            ->layout('layouts.report');
    }

    public function updatedDay()
    {
        $this->month = null;
        $this->action = 'day';
      
    }

    public function updatedMonth()
    {
        $this->day = null;
        $this->action = 'month';
      
    }

    public function getTotalPostPerDay()
    {
    //   get the total post where created_at
       
    }

    public function getTotalPostPerMonth()
    {
        $month = Carbon::parse($this->month)->format('m');
        $year = Carbon::parse($this->month)->format('Y');
        
        return Post::whereYear('created_at',$year)->whereMonth('created_at',$month)->count();
       
    }
}