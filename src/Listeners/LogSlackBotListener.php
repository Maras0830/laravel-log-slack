<?php

namespace Maras0830\LogSlack\Listeners;

use App\Notifications\SendLogToSlack;
use App\SlackBot;
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
        Notification::send(new SlackBot(), new SendLogToSlack($event));
    }
}
