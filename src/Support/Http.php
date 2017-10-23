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
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     * @throws \Exception
     */
    public static function mixUrl($path, $manifestDirectory = '')
    {
        return url(mix($path));
    }
}
