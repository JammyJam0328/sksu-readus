<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class MediaContainer extends Component
{
    public $images=[];
    public $videos=[];
    public $documents=[];
    public $imageLimit=0;

    public $imageResponsiveSize;
    public $lastImageTodisplay = 4;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($medias)
    {
        foreach($medias as $media){
            if($media->type=='image'){
                $this->images[]=$media;
                if (count($this->images)<5) {
                    $this->imageResponsiveSize=count($this->images);
                }else{
                    $this->imageResponsiveSize=4;
                }
            }elseif($media->type=='video'){
                $this->videos[]=$media;
            }elseif($media->type=='document'){
                $this->documents[]=$media;
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.media-container');
    }
}