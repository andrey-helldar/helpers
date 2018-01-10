<?php

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
        return \Helldar\Helpers\Support\Files::urlExists($path);
    }
}