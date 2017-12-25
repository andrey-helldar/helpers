<?php

namespace Helldar\Helpers\Support;

class Images
{
    /**
     * Check the existence of the file and return the default value if it is missing.
     *
     * @param string $filename
     * @param null   $default
     *
     * @return null|string
     */
    public static function imageOrDefault(string $filename, $default = null)
    {
        return file_exists($filename) ? $filename : $default;
    }
}
