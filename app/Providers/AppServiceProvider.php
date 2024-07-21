<?php

namespace App\Providers;

use App\Models\UserCode;
use App\Observers\UserCodeObserver;
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
    }
}
