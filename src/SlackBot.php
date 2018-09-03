<?php
/**
 * Created by PhpStorm.
 * User: Maras
 * Date: 2018/9/3
 * Time: 下午1:02
 */

namespace App;


use Illuminate\Notifications\Notifiable;

class SlackBot
{
    use Notifiable;

    public function routeNotificationForSlack()
    {
        return env('SLACK_LOG_CALLBACK_URL');
    }
}