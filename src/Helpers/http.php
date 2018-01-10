<?php

if (!function_exists('mix_url')) {
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
    function mix_url($path, $manifestDirectory = '')
    {
        return \Helldar\Helpers\Support\Http::mixUrl($path, $manifestDirectory);
    }
}

if (!function_exists('base_url')) {
    /**
     * Get the domain name from the URL.
     *
     * @param $url
     *
     * @return string
     */
    function base_url($url)
    {
        return \Helldar\Helpers\Support\Http::baseUrl($url);
    }
}
