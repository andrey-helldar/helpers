<?php

use Helldar\Helpers\Support\Files;

if (!function_exists('url_file_exists')) {
    /**
     * Checks whether a file or directory exists on URL.
     *
     * @param string $path
     *
     * @return bool
     */
    function url_file_exists($path)
    {
        return (new Files($path))
            ->urlExists();
    }
}
