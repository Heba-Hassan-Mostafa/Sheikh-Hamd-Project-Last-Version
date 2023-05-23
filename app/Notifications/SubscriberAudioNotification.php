<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubscriberAudioNotification extends Notification
{
    use Queueable;

    protected $audio;
    protected $subscriber;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($audio,$subscriber)
    {
        $this->audio = $audio;
        $this->subscriber = $subscriber;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Hello,'.$this->subscriber->email)
                    ->line('There is a new audio that has been published. We hope you will like it.')
                    ->line('Audio Title : '.$this->audio->name)
                    ->action('Click Here', route('frontend.library.audio.content', $this->audio->slug))
                    ->line('Thank you for using our website!');
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
            //
        ];
    }
}