<?php

if (!function_exists('notify')) {
    /**
     * @param \Exception $exception
     * @param string     $class_name
     */
    function notify_slack($exception, string $class_name)
    {
        (new \Helldar\Helpers\Support\Notifications($exception, $class_name))
            ->slack();
    }
}
