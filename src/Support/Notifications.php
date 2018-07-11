<?php

namespace Helldar\Helpers\Support;

use Helldar\Helpers\Jobs\NotificationJob;
use Helldar\Helpers\Models\ErrorNotification;

class Notifications
{
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

    public function send()
    {
        if (!config('helpers.notify.enable')) {
            return;
        }

        $parent    = get_class($this->exception);
        $exception = $this->exception;

        $item = ErrorNotification::create(compact('parent', 'exception'));

        NotificationJob::dispatch($item)
            ->onQueue(config('helpers.notify.queue', 'default'));
    }
}
