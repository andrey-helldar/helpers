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
    protected $route;

    /**
     * @var string
     */
    protected $class_name;

    /**
     * @param $route
     *
     * @return $this
     */
    public function route($route)
    {
        $this->route = $route;

        return $this;
    }

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
        $server      = request()->getHost() ?? config('app.url');
        $environment = config('app.env');

        $this->title = sprintf("Exception | Server - %s | Environment - %s", $server, $environment);
    }

    /**
     * @return string
     */
    public function routeNotificationForSlack()
    {
        return $this->route;
    }

    public function send()
    {
        $this->notify(new SlackNotify($this->exception, $this->class_name, $this->title()));
    }
}
