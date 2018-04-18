<?php

if (!function_exists('image_or_default')) {
    /**
     * Check the existence of the file and return the default value if it is missing.
     *
     * @param null|string $filename
     * @param null|string $default
     * @param bool        $is_asset
     *
     * @return null|string
     */
    function image_or_default($filename, $default = null, $is_asset = true)
    {
        $path = (new \Helldar\Helpers\Support\Images($filename))
            ->imageOrDefault($default);

        return $is_asset ? asset($path) : $path;
    }
}
