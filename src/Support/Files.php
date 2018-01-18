<?php

namespace Helldar\Helpers\Support;

class Files
{
    /**
     * @var string
     */
    private $path;

    /**
     * Files constructor.
     *
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Checks whether a file or directory exists on URL.
     *
     * @return bool
     */
    public function urlExists()
    {
        try {
            $headers = get_headers($this->path);

            return stripos(reset($headers), '200 OK') !== false;
        } catch (\Exception $e) {
            return false;
        }
    }
}
