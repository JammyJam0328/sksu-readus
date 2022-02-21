<?php

namespace App\Http\Livewire\User\Process;

use Livewire\Component;
use App\Models\Post;
use App\Models\Media;
class ViewPostProcess extends Component
{
    public $postid;
    public $post;
    public $title;
    public $body;

    public $deleteId;
    public function render()
    {
        $this->post = Post::where('id',$this->postid)->with(['user','medias'])->first();
        return view('livewire.user.process.view-post-process');
    }
    public function dehydrate()
    {
        
        $this->title = $this->post->title;
        $this->body = $this->post->body;
    }

    public function updatePost()
    {
        $this->validate([
            'title' => 'required|min:5|max:255',
            'body' => 'required',
        ]);
        $this->post->update([
            'title' => $this->title,
            'body' => $this->body,
        ]);
         $this->dispatchBrowserEvent('notify',['type'=>'success','message'=>'Post has been updated successfully']);
         $this->dispatchBrowserEvent('end-post-edit');
    }

    public function deleteMedia($media_id,$media_type,$file_id)
    {   
        $imageFolder = "1FnE2tTm88ocCpb1kRZaH_8smm2DANFij";
        $videoFolder = "1tMcKhl_hMrQYBYqcUvnu8HjZMnk4wyeB";
        $documentFolder = "1aISQqNNki298HbahAHQep9jHF4852_Jt";


        try {
            $id = \Crypt::decrypt($media_id);
            $file = \Crypt::decrypt($file_id);
        } catch (DecryptException $e) {
            return false;
        }
        Media::where('id',$id)->delete();
        if($media_type=='image'){
             \Illuminate\Support\Facades\Storage::disk('google')->delete($imageFolder.'/'.$file);
        }
        if($media_type=='video'){
             \Illuminate\Support\Facades\Storage::disk('google')->delete($videoFolder.'/'.$file);
        }
        if($media_type=='document'){
             \Illuminate\Support\Facades\Storage::disk('google')->delete($documentFolder.'/'.$file);
        }

         $this->dispatchBrowserEvent('notify',['type'=>'success','message'=>'File has been deleted successfully']);
            

       
    }

    public function confirmDelete()
    {
        $this->post->delete();
        return redirect()->route("home");
    }
   
    
}