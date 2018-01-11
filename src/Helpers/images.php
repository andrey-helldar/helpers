<?php

if (!function_exists('image_or_default')) {
    /**
     * Check the existence of the file and return the default value if it is missing.
     *
     * @param string $filename
     * @param null   $default
     *
     * @return null|string
     */
    function image_or_default(string $filename, $default = null)
    {
        return (new \Helldar\Helpers\Support\Images($filename))
            ->imageOrDefault($default);
    }
}
