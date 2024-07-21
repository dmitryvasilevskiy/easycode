<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class SmsChannel
{
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSms($notifiable)['message'];
        Http::post('smsp.by/api/sendsms', ['message' => $message]);
    }
}
