<?php

use Helldar\Helpers\Support\System;

if (!function_exists('is_windows')) {
    /**
     * Determine whether the current environment is Windows based.
     *
     * @return bool
     */
    function is_windows()
    {
        return (new System())
            ->isWindows();
    }
}

if (!function_exists('is_linux')) {
    /**
     * Determine whether the current environment is Linux based.
     *
     * @return bool
     */
    function is_linux()
    {
        return (new System())
            ->isLinux();
    }
}
