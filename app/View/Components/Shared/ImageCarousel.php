<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class ImageCarousel extends Component
{
    public $medias;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($medias)
    {
        $this->medias = $medias;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.image-carousel');
    }
}