<?php

namespace Helldar\Helpers\Support;

use Helldar\Helpers\Notifications\SlackNotify;
use Illuminate\Notifications\Notifiable;

class Notifications
{
    use Notifiable;

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
        $this->exception = $exception;
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

    public function send()
    {
        $this->toMail();
        $this->toSlack();
    }

    /**
     * @deprecated
     *
     * @return $this
     */
    public function slack()
    {
        return $this;
    }

    /**
     * @deprecated
     *
     * @return $this
     */
    public function mail()
    {
        return $this;
    }

    /**
     * Notification of code errors in the Slack channel.
     *
     * @return $this
     */
    private function toSlack()
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
    private function toMail()
    {
        app('sneaker')->captureException($this->exception);

        return $this;
    }

    private function titleForSlack()
    {
        $server      = request()->getHost() ?? config('app.url');
        $environment = config('app.env');

        return implode("\n", [
            sprintf('*%s | Server - %s | Environment - %s*', get_class($this->exception), $server, $environment),
            sprintf('`%s:%s`', $this->exception->getFile(), $this->exception->getLine()),
        ]);
    }
}
