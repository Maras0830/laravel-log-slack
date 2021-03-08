# Laravel Log to Slack Channel 

via incoming callback - https://api.slack.com/incoming-webhooks

![2018-09-03 5 22 26](https://user-images.githubusercontent.com/7960232/44979003-8e2ff000-af9e-11e8-8e79-dea34d930cb7.png)

## Installation


```bash
$ composer require maras0830/laravel-LogSlack
```

in config/app.php
```php
    'providers' => [
    	...
        Maras0830\LogSlack\Providers\LogSlackBotServiceProvider::class,
    ];		
```

.env
```
SLACK_LOG_LEVEL=success,warning,error
SLACK_LOG_CALLBACK_URL=<slack_incoming_callback_url>
```

if your laravel version >= 5.8, install laravel/slack-notification-channel

```bash
$ composer require laravel/slack-notification-channel
```


## Example

in route/web.php
```php

Route::get('slack', function() {

    Log::debug('Slack Log ', ['Slack' => 'Hello']);
});

```

call ```http://localhost/slack```

<img width="558" alt="2018-09-03 5 23 16" src="https://user-images.githubusercontent.com/7960232/44978860-427d4680-af9e-11e8-8bfb-42fb0c5f12b7.png">

