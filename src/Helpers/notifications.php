<?php

if (!function_exists('notify')) {
    /**
     * Notification of code errors.
     *
     * @param \Exception $exception
     *
     * @return \Helldar\Helpers\Support\Notifications
     */
    function notify($exception)
    {
        return new \Helldar\Helpers\Support\Notifications($exception);
    }
}
