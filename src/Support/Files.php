<?php

namespace Helldar\Helpers\Support;

class Files
{
    /**
     * Checks whether a file or directory exists on URL.
     *
     * @param string $path
     *
     * @return bool
     */
    public static function urlExists($path)
    {
        $headers = @get_headers($path);

        return (bool) stripos(reset($headers), '200 OK');
    }
}
