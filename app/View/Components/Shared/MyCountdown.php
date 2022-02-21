<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class MyCountdown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $expire_date;
    public function __construct($expires)
    {
        // sample expire date
        $this->expire_date = $expires;
        
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.my-countdown');
    }
}