<?php

if (!function_exists('notify')) {
    /**
     * Notification of code errors.
     *
     * @param $exception
     */
    function notify($exception)
    {
        (new \Helldar\Helpers\Support\Notifications($exception))
            ->send();
    }
}
