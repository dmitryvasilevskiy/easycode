<?php

namespace App\Providers;

use App\Channels\SmsChannel;
use App\Models\UserCode;
use App\Observers\UserCodeObserver;
use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        UserCode::observe(UserCodeObserver::class);

        Notification::resolved(static function (ChannelManager $service) {
            $service->extend('sms', static fn($app) => $app->make(SmsChannel::class));
        });
    }
}
