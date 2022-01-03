<?php

namespace App\Http\Livewire\User\Process;

use Livewire\Component;
use App\Models\Post;
use App\Models\Privacy;
use Livewire\WithFileUploads;
use App\Helpers\Gdrive;
class CreatePost extends Component
{
     use WithFileUploads;

    // inputs
    public $post_title;
    public $post_body;
    public $privacies;

    public $images =[];
    public $documents =[];
    public $videos =[];

    // reactive data
    public $selectedPrivacy=0;
    public $selectedPrivacyName='';

    public function render()
    {
        return view('livewire.user.process.create-post');
    }
    public function mount()
    {
        $this->privacies = Privacy::get();
        $this->selectedPrivacyName = $this->privacies[$this->selectedPrivacy]['name'];
    }

    public function selectPrivacy($key)
    {
        $this->selectedPrivacy = $key;
        $this->selectedPrivacyName = $this->privacies[$this->selectedPrivacy]['name'];
        $this->dispatchBrowserEvent('done-selecting');
    }

    public function create()
    {
        // saving into temporary array to define each file type
        $imageSetup=[];
        $videoSetup=[];
        $documentSetup=[];
        // 

        // if no file is attached- mark as false
        $hasMedia = false;
        //

      if($this->images){
        $files = Gdrive::saveImages($this->images);
            foreach ($files as $file) {
                $imageSetup[] = [
                    'type' => 'image',
                    'file_id' => $file,
                ];
            }
        }
      if($this->documents){
        $files = Gdrive::saveDocuments($this->documents);
            foreach ($files as $file) {
                $documentSetup[] = [
                    'type' => 'document',
                    'file_id' => $file,
                ];
            }
        }
        if($this->videos){
        $files = Gdrive::saveVideos($this->videos);
            foreach ($files as $file) {
                $videoSetup[] = [
                    'type' => 'video',
                    'file_id' => $file,
                ];
            }
        }

        $media = array_merge($imageSetup,$videoSetup,$documentSetup);
        $media ? $hasMedia = true : $hasMedia = false;

        $this->validate([
            'post_title' => 'nullable|min:3|max:255',
            'post_body' => 'required',
            'privacies' => 'required',
        ]);

           $post = Post::create([
            'user_id' => auth()->user()->id,
            'title' => $this->post_title,
            'body' => $this->post_body,
            'privacy_id' => $this->privacies[$this->selectedPrivacy]['id'],
            'visibility' => $this->privacies[$this->selectedPrivacy]['name'] =='School'? 'all' : auth()->user()->campus_id,
            'hasMedia' => $hasMedia,
            ]);
     
        if($hasMedia){
           foreach ($media as $file) {
                $post->medias()->create([
                    'type' => $file['type'],
                    'file_id' => $file['file_id'],
                ]);
           }
        }
        $this->resetInput();
        $this->dispatchBrowserEvent('notify',['type'=>'success','message'=>'Post created successfully']);
        $this->emit('postCreated');
    }

    public function resetInput()
    {
        $this->post_title = '';
        $this->post_body = '';
        $this->selectedPrivacy = 0;
        $this->selectedPrivacyName = $this->privacies[$this->selectedPrivacy]['name'];
        $this->images =[];
        $this->documents =[];
        $this->videos =[];
    }

    public function removeImages()
    {
        $this->images = [];
    }
    public function removeVideos()
    {
        $this->videos = [];
    }
    public function removeDocuments()
    {
        $this->documents = [];
    }
}