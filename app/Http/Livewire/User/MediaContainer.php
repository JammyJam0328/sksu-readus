<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class MediaContainer extends Component
{
    public $images=[];
    public $videos=[];
    public $documents=[];

    public $imageLimit=0;

    public $imageResponsiveSize=[];
    public $lastImageToDisplay;

    

    public function render()
    {
         
        return view('livewire.user.media-container');
    }

    public function mount($medias)
    {
        foreach($medias as $media)
        {
            if($media->type=='image')
            {
                $this->images[]=$media;
              
            }
            elseif($media->type=='video')
            {
                $this->videos[]=$media;
            }
            elseif($media->type=='document')
            {
                $this->documents[]=$media;
            }
        }
    }
    public function seemore()
    {

       if ($this->lastImageToDisplay == 4) {
           $this->lastImageToDisplay=count($this->images);   
       }else{
              $this->lastImageToDisplay=count($this->images);
       }
    }

}