<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class Card extends Component
{

    public $title;
    public $count;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $count)
    {
        $this->title = $title;
        $this->count = $count;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.card');
    }
}