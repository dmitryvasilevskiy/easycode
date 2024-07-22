<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class CodeNotification extends Notification
{
    use Queueable;

    public function __construct(private string $code)
    {
        //
    }

    public function via(object $notifiable): array
    {
        return [$notifiable->channel->slug];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)->line($this->code);
    }

    public function toSms(object $notifiable)
    {
        return [
            'message' => $this->code,
        ];
    }

    public function toTelegram(object $notifiable): TelegramMessage
    {
        return TelegramMessage::create()->to($notifiable->telegram_user_id)->content($this->code);
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
