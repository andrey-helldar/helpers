<?php

use Helldar\Helpers\Support\Notifications;

if (!function_exists('notify')) {
    /**
     * Notification of code errors.
     *
     * @param $exception
     */
    function notify($exception)
    {
        (new Notifications($exception))
            ->send();
    }
}
