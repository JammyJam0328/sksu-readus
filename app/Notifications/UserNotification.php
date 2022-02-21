<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserNotification extends Notification
{
    use Queueable;
    public $message;
    public $post_id;
    public $type;
    public $commentator_id;
    public $commentator_name;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($type,$message,$post_id,$commentator_id,$commentator_name)
    {
        $this->type=$type;
        $this->message = $message;
        $this->post_id = $post_id;
        $this->commentator_id = $commentator_id;
        $this->commentator_name = $commentator_name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */



    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'type'=>$this->type,
            'message'=>$this->message,
            'post_id'=>$this->post_id,
            'commentator_id'=>$this->commentator_id,
            'commentator_name'=>$this->commentator_name,
        ];
    }
}