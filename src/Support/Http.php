<?php

namespace Helldar\Helpers\Support;

class Http
{
    /**
     * @var
     */
    private $url;

    /**
     * Http constructor.
     *
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Convert the relative path of a versioned Mix files to absolute.
     *
     * @param string $manifestDirectory
     *
     * @throws \Exception
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function mixUrl($manifestDirectory = '')
    {
        return url(mix($this->url, $manifestDirectory));
    }

    /**
     * Get the domain name from the URL.
     *
     * @return string
     */
    public function baseUrl()
    {
        return parse_url($this->url, PHP_URL_HOST);
    }
}
