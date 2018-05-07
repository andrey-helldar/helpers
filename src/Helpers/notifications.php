<?php

if (!function_exists('notify')) {
    /**
     * Notification of code errors.
     *
     * @param \Exception $exception
     * @param            $object
     *
     * @return \Helldar\Helpers\Support\Notifications
     */
    function notify($exception, $object)
    {
        return new \Helldar\Helpers\Support\Notifications($exception, $object);
    }
}
