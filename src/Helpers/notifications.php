<?php

if (!function_exists('notify')) {
    /**
     * @return \Helldar\Helpers\Support\Notifications
     */
    function notify()
    {
        return \Helldar\Helpers\Support\Notifications::init();
    }
}
