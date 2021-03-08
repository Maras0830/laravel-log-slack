<?php

namespace Maras0830\LogSlack\Listeners;

use Maras0830\LogSlack\Notifications\SendLogToSlack;
use Maras0830\LogSlack\SlackBot;
use Illuminate\Support\Facades\Notification;

class LogSlackBotListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle($event)
    {
        if (in_array(env('APP_ENV'), ['testing', 'local']))
            return;
        
        Notification::send(new SlackBot(), new SendLogToSlack($event));
    }
}
