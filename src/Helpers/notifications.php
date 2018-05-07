<?php

if (!function_exists('notify')) {
    /**
     * Notification of code errors.
     *
     * @param \Exception $exception
     * @param string     $class_name
     *
     * @return \Helldar\Helpers\Support\Notifications
     */
    function notify($exception, string $class_name)
    {
        return new \Helldar\Helpers\Support\Notifications($exception, $class_name);
    }
}
