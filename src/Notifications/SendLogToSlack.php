<?php

namespace Maras0830\LogSlack\Notifications;

use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class SendLogToSlack extends Notification
{
    use Notifiable;
    private $event;

    /**
     * Create a new notification instance.
     *
     * @param $event
     */
    public function __construct($event)
    {
        $this->event = $event;
    }

    public function via()
    {
        $levels = $this->getLevels();

        $explode_levels = explode(',', strtolower(env('SLACK_LOG_LEVEL', 'success')));

        if (isset($levels[$this->event->level]) && in_array($levels[$this->event->level], $explode_levels)) {
            return ['slack'];
        }
    }

    /**
     * Get the Slack representation of the notification.
     *
     * @return SlackMessage
     */
    public function toSlack()
    {
        $levels = $this->getLevels();

        $message_bag = [
            'Environment' => env('APP_ENV'),
            'Title' => $this->event->message,
            'Time' => date('Y-m-d H:i:s', time()),
            'Level' => $this->event->level
        ];

        foreach ($this->event->context as $key => $message) {
            $message_bag['message_' . $key] = $message;
        }

        return (new SlackMessage)
            ->{$levels[$this->event->level]}()
            ->content($this->event->message)
            ->attachment(function ($attachment) use ($message_bag) {
                $attachment->title(env('APP_NAME'), env('APP_URL'))
                    ->fields($message_bag);
            });
    }

    private function getLevels()
    {

        return [
            'error' => 'error',
            'alert' => 'error',
            'critical' => 'error',
            'info' => 'success',
            'warning' => 'warning',
            'debug' => 'warning',
            'notice' => 'warning'
        ];
    }
}
