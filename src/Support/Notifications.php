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
     * @param \Exception $exception
     */
    public function __construct($exception)
    {
        $this->exception  = $exception;
        $this->class_name = get_class($exception);
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

    /**
     * Notification of code errors in the Email.
     *
     * @return $this
     */
    public function mail()
    {
        app('sneaker')->captureException($this->exception);

        return $this;
    }

    private function titleForSlack()
    {
        $server      = request()->getHost() ?? config('app.url');
        $environment = config('app.env');

        return implode("\n", [
            sprintf('*Exception | Server - %s | Environment - %s*', $server, $environment),
            sprintf('`%s`', $this->class_name),
        ]);
    }
}
