<?php

namespace Maras0830\LogSlack\Providers;

use Maras0830\LogSlack\Listeners\LogSlackBotListener;
use Illuminate\Log\Events\MessageLogged;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class LogSlackBotServiceProvider
 * @package App\Providers
 */
class LogSlackBotServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [

        MessageLogged::class => [
            LogSlackBotListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
