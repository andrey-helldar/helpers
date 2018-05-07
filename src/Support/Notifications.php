<?php

namespace Helldar\Helpers\Support;

use Helldar\Helpers\Notifications\SlackNotify;
use Illuminate\Notifications\Notifiable;

class Notifications
{
    use Notifiable;

    /**
     * @var string
     */
    protected $class_name;

    /**
     * @var \Exception
     */
    protected $exception;

    /**
     * Notifications constructor.
     *
     * @param        $exception
     * @param string $class_name
     */
    public function __construct($exception, string $class_name)
    {
        $this->exception = $exception;
        $this->class_name = $class_name;
    }

    /**
     * Route notifications for the Slack channel.
     *
     * @return string
     */
    public function routeNotificationForSlack()
    {
        return config('helpers.notify.slack.webhook');
    }

    /**
     * Notification of code errors in the Slack channel.
     *
     * @return $this
     */
    public function slack()
    {
        $slack = new SlackNotify($this->exception, $this->titleForSlack());

        $this->notify($slack);

        return $this;
    }

    private function titleForSlack()
    {
        $server = request()->getHost() ?? config('app.url');
        $environment = config('app.env');

        return implode("\n", [
            sprintf('*Exception | Server - %s | Environment - %s*', $server, $environment),
            sprintf('`%s`', $this->class_name),
        ]);
    }
}
