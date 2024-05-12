<?php

namespace App\Providers;

use App\Listeners\LockoutListener;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    protected $listen = [
        Lockout::class => [
            LockoutListener::class,
        ],
    ];
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
        //
    }
}
