<?php

namespace App\View\Components\User;

use Illuminate\View\Component;

class EventItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $event;
    public $expire_date;
    public $happening_now=false;
    public $for;
    public function __construct($event,$for)
    {
        $this->for = $for;
        $this->event = $event;
        // if start date is not yet over then set expire date to start date else set it to end date
        if(strtotime($this->event->start_date) > time()){
            $this->expire_date = $this->event->start_date;
        }else{
            $this->expire_date = $this->event->end_date;
            $this->happening_now = true;
        }
       
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user.event-item');
    }
}