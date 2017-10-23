<?php

namespace Helldar\Helpers\Support;

class Http
{
    /**
     * Convert the relative path of a versioned Mix files to absolute.
     *
     * @param string $path
     * @param string $manifestDirectory
     *
     * @throws \Exception
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public static function mixUrl($path, $manifestDirectory = '')
    {
        return url(mix($path));
    }
}
