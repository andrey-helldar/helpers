<?php

if (!function_exists('mix_url')) {
    /**
     * Convert the relative path of a versioned Mix files to absolute.
     *
     * @param string $url
     * @param string $manifestDirectory
     *
     * @throws \Exception
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function mix_url($url, $manifestDirectory = '')
    {
        return (new \Helldar\Helpers\Support\Http($url))
            ->mixUrl($manifestDirectory);
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
        return (new \Helldar\Helpers\Support\Http($url))
            ->baseUrl();
    }
}
