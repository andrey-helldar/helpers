<?php

namespace Helldar\Helpers\Support;

use Helldar\Helpers\Notifications\SlackNotify;
use Helldar\Helpers\Traits\Init;
use Illuminate\Notifications\Notifiable;

class Notifications
{
    use Notifiable, Init;

    /**
     * @var \Exception
     */
    protected $exception;

    /**
     * @var string
     */
    protected $class_name;

    /**
     * @param \Exception $exception
     *
     * @return $this
     */
    public function exception($exception)
    {
        $this->exception = $exception;

        return $this;
    }

    /**
     * @param $class_name
     *
     * @return $this
     */
    public function className($class_name)
    {
        $this->class_name = $class_name;

        return $this;
    }

    private function title()
    {
        $server = request()->getHost() ?? config('app.url');
        $environment = config('app.env');

        return sprintf('Exception | Server - %s | Environment - %s', $server, $environment);
    }

    /**
     * @return string
     */
    public function routeNotificationForSlack()
    {
        return config('helpers.notify.slack');
    }

    public function send()
    {
        $slack = new SlackNotify($this->exception, $this->class_name, $this->title());

        $this->notify($slack);
    }
}
