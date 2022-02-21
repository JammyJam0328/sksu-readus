<?php

namespace App\Http\Livewire\User\Stateful;

use Livewire\Component;
use App\Models\Comment;
use App\Models\User;

// use Crypt;
use Illuminate\Support\Facades\Crypt;
use App\Notifications\UserNotification;
use App\Events\NotificationEvent;
use App\Jobs\AuthorCommentJob;
class Comments extends Component
{
    public $postid;
    public $ready=false;
    public $comment;
    public $postuser;
    public $new_comment;
    public $editCommentId;
    public $deleteCommentId;
    public $take=10;
    public function render()
    {
        return view('livewire.user.stateful.comments',[
            'comments'=>$this->ready ? Comment::where('post_id',$this->postid)->with(['user'=>function($query){
                return $query->select('id','name','google_id','google_profile_photo','profile_photo_path');
            }])->take($this->take)->latest()->get() : []
        ]);
    }
    public function loadMoreComments()
    {
        $this->ready=true;
        $this->take = $this->take + 10;
    }
     public function ready()
    {
        $this->ready=true;
    }

    public function addComment()
    {
        $this->validate([
            'comment'=>'required'
        ]);
        Comment::create([
            'user_id'=>auth()->id(),
            'post_id'=>$this->postid,
            'message'=>$this->comment
        ]);
        $this->notifyUser();
        $this->comment='';
    }

    public function editComment($comment_id)
    {
        try {
            $this->editCommentId = Crypt::decrypt($comment_id);
        } catch (DecryptException $e) {
            return;
        }

        $comment = Comment::find($this->editCommentId);
        $this->new_comment = $comment->message;
        $this->dispatchBrowserEvent('start-editing');
        
    }

    public function updateComment()
    {
        $this->validate([
            'new_comment'=>'required',
        ]);
        $comment = Comment::find($this->editCommentId);
        $comment->message = $this->new_comment;
        $comment->save();
        $this->new_comment = '';
        $this->editCommentId = null;
        $this->dispatchBrowserEvent('end-editing');
    }

    public function deleting($comment_id)
    {
        try {
            $this->deleteCommentId = Crypt::decrypt($comment_id);
        } catch (DecryptException $e) {
            return;
        }
        $this->dispatchBrowserEvent('comment-deleting');
    }

    public function deleteComment()
    {
        $comment = Comment::find($this->deleteCommentId);
        $comment->delete();
        $this->deleteCommentId = null;
        $this->dispatchBrowserEvent('notify',['message'=>'Comment Deleted','type'=>'success','action'=>'donedeleting']);
    }

    protected function notifyUser()
    {
        if (auth()->user()->id != $this->postuser) {
            // notifying the author of the post that someone commented on his post
            $type = 'comment';
            $message = auth()->user()->name.' commented on your post';
            $postUser = User::find($this->postuser);
            $postUser->notify(new UserNotification($type,$message,$this->postid,auth()->user()->id,auth()->user()->name));
            event(new NotificationEvent($this->postuser));  
        }else{
            // notifying the users who commented on the post that that the author commented on his post
            $users  = Comment::where('post_id',$this->postid)->where('user_id','!=',auth()->user()->id)->distinct('user_id')->pluck('user_id');
            $author_id = auth()->user()->id;
            $author_name = auth()->user()->name;
            foreach ($users as $user) {
                    dispatch(new AuthorCommentJob($this->postid,$user,$author_id,$author_name));          
            }
        }
    }
    

}