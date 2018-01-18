<?php

if (!function_exists('flash')) {
    /**
     * Make a flash message or retrieve a FlashMessageSender instance.
     *
     * @see https://gist.github.com/Ellrion/7ee8085b35f0de8c6d386255f9dd16bb
     *
     * @param null  $message
     * @param array $data
     *
     * @return \Illuminate\Foundation\Application|mixed
     */
    function flash($message = null, $data = [])
    {
        if (is_null($message)) {
            return app('flash');
        }

        return app('flash')->info($message, $data);
    }
}
