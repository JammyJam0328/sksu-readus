<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Events\NotificationEvent;
use App\Models\Post;
use App\Models\User;
use App\Notifications\UserNotification;
use App\Models\Comment;
class AuthorCommentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $post_id;
    public $user_id;
    public $author_id;
    public $author_name;
    public function __construct($post_id,$user_id,$author_id,$author_name,)
    {
 
        $this->post_id = $post_id;
        $this->user_id = $user_id;
        $this->author_id = $author_id;
        $this->author_name = $author_name;
    }
   

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      
        $type = 'author_comment';
        $message = 'The author of the post you followed has commented back';
        $user = User::find($this->user_id);
        $user->notify(new UserNotification($type,$message,$this->post_id,$this->author_id,$this->author_name));
        event(new NotificationEvent($this->user_id));
    }
} 