<?php

namespace Helldar\Helpers\Support;

class Http
{
    /**
     * @var
     */
    private $value;

    /**
     * Http constructor.
     *
     * @param $value
     */
    public function __construct($value = null)
    {
        $this->value = $value;
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
        return url(mix($this->value, $manifestDirectory));
    }

    /**
     * Get the domain name from the URL.
     *
     * @return string
     */
    public function baseUrl()
    {
        return parse_url($this->value, PHP_URL_HOST);
    }

    /**
     * Reverse function for parse_url() (http://php.net/manual/en/function.parse-url.php).
     *
     * @see https://gist.github.com/Ellrion/f51ba0d40ae1d62eeae44fd1adf7b704
     *
     * @return string
     */
    public function buildUrl()
    {
        $scheme = isset($this->value['scheme']) ? ($this->value['scheme'] . '://') : '';

        $host = $this->value['host'] ?? '';
        $port = isset($this->value['port']) ? (':' . $this->value['port']) : '';

        $user = $this->value['user'] ?? '';

        $pass = isset($this->value['pass']) ? (':' . $this->value['pass']) : '';
        $pass = ($user || $pass) ? ($pass . '@') : '';

        $path = $this->value['path'] ?? '';
        $path = $path ? ('/' . ltrim($path, '/')) : '';

        $query    = isset($this->value['query']) ? ('?' . $this->value['query']) : '';
        $fragment = isset($this->value['fragment']) ? ('#' . $this->value['fragment']) : '';

        return implode('', [$scheme, $user, $pass, $host, $port, $path, $query, $fragment]);
    }

    /**
     * Retrieving the current subdomain name.
     *
     * @return null|string
     */
    public function getSubdomain()
    {
        $host = explode('.', request()->getHost());

        if (sizeof($host) >= 2) {
            return reset($host);
        }

        return null;
    }
}
