<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Artisan\Semaphore\SemaphoreChannel;
use Artisan\Semaphore\SemaphoreMessage;

class TextSchedule extends Notification
{
    public function via($notifiable)
    {
        return [SemaphoreChannel::class];
    }

    public function toSemaphore($notifiable)
    {
        return (new SemaphoreMessage)
                    ->content("Hey {$notifiable->name}, don't forget to brush your teeth!")
                    ->from('artisan');
    }
}
