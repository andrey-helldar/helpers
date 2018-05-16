<?php

use Helldar\Helpers\Support\Http;

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
        return (new Http($url))
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
        return (new Http($url))
            ->baseUrl();
    }
}

if (!function_exists('build_url')) {
    /**
     * Reverse function for parse_url() (http://php.net/manual/en/function.parse-url.php).
     *
     * @see https://gist.github.com/Ellrion/f51ba0d40ae1d62eeae44fd1adf7b704
     *
     * @param array $parts
     *
     * @return string
     */
    function build_url(array $parts = [])
    {
        return (new Http($parts))
            ->buildUrl();
    }
}

if (!function_exists('subdomain_name')) {
    /**
     * Retrieving the current subdomain name.
     *
     * @return null|string
     */
    function subdomain_name()
    {
        return (new Http())
            ->getSubdomain();
    }
}
