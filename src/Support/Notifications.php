<?php

namespace Helldar\Helpers\Support;

use Helldar\Helpers\Notifications\SlackNotify;
use Helldar\Helpers\Traits\Init;
use Illuminate\Notifications\Notifiable;

class Notifications
{
    use Notifiable, Init;

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
     * @param string     $class_name
     */
    public function __construct($exception, string $class_name)
    {
        $this->exception  = $exception;
        $this->class_name = $class_name;
    }

    /**
     * @return string
     */
    public function routeNotificationForSlack()
    {
        return config('helpers.notify.slack.webhook');
    }

    public function send()
    {
        $slack = new SlackNotify($this->exception, $this->title());

        $this->notify($slack);
    }

    private function title()
    {
        $server      = request()->getHost() ?? config('app.url');
        $environment = config('app.env');

        return implode("\n", [
            sprintf("*Exception | Server - %s | Environment - %s*", $server, $environment),
            sprintf("`%s`", $this->class_name),
        ]);
    }
}
