# Laravel Log to Slack Channel 

By incoming callback - https://api.slack.com/incoming-webhooks

## Installation

```bash
$ composer require maras0830/laravel-LogSlack
```

.env
```
SLACK_LOG_LEVEL=success,warning,error
SLACK_LOG_CALLBACK_URL=<slack_incoming_callback_url>
```