<?php

namespace Helldar\Helpers\Support;

class Images
{
    /**
     * @var string
     */
    private $filename;

    /**
     * Images constructor.
     *
     * @param $filename
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Check the existence of the file and return the default value if it is missing.
     *
     * @param null $default
     *
     * @return null|string
     */
    public function imageOrDefault($default = null)
    {
        if (!$this->filename) {
            return $default;
        }

        if (strripos($this->filename, '://') !== false) {
            return (new Files($this->filename))->urlExists() ? $this->filename : $default;
        }

        return file_exists($this->filename) ? $this->filename : $default;
    }
}
