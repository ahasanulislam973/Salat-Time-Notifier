<?php

namespace LaravelSalatNotifier\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;

class SalatNotification extends Notification
{
    protected $salat;

    public function __construct($salat)
    {
        $this->salat = $salat;
    }

    public function via($notifiable)
    {
        return ['slack'];
    }

    public function toSlack($notifiable)
    {
        $webhookUrl = config('salatnotifier.slack_webhook_url');

        return (new SlackMessage)
            ->from('SalatNotifier')
            ->content("It's almost time for {$this->salat} Salat.")
            ->to('#salat-times')
            ->from('SalatNotifier', ':mosque:')
            ->attachment(function ($attachment) {
                $attachment->title('Reminder')
                           ->content("Salat {$this->salat} is in 10 minutes.");
            });
    }
}