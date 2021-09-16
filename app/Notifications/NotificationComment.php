<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificationComment extends Notification
{
    use Queueable;
    public $channel;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($channel)
    {
        $this->channel = $channel;
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
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'id' => $this->channel['id'],
            'title' => $this->channel['title'],
            'user' => $this->channel['user'],
            'course_name' => $this->channel['course_name'],
            'images' => $this->channel['images'],
            'course_id' => $this->channel['course_id'],
        ];
    }
}
