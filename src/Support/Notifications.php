<?php

namespace Helldar\Helpers\Support;

use Helldar\Helpers\Notifications\SlackNotify;
use Illuminate\Notifications\Notifiable;

class Notifications
{
    use Notifiable;

    protected $object;

    /**
     * @var \Exception
     */
    protected $exception;

    /**
     * Notifications constructor.
     *
     * @param \Exception $exception
     * @param            $object
     */
    public function __construct($exception, $object)
    {
        $this->exception = $exception;
        $this->object = $object;
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
        $server = request()->getHost() ?? config('app.url');
        $environment = config('app.env');

        return implode("\n", [
            sprintf('*%s | Server - %s | Environment - %s*', get_class($this->exception), $server, $environment),
            sprintf('`%s`', get_class($this->object)),
            sprintf('`%s:%s`', $this->exception->getFile(), $this->exception->getLine()),
        ]);
    }
}
