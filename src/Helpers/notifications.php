<?php

use Helldar\Helpers\Jobs\NotificationJob;

if (!function_exists('notify')) {
    /**
     * Notification of code errors.
     *
     * @param $exception
     */
    function notify($exception)
    {
        if (!config('helpers.notify.enable')) {
            return;
        }

        NotificationJob::dispatch($exception)
            ->onQueue(config('helpers.notify.queue', 'default'));
    }
}
