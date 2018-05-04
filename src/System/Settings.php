<?php

namespace Helldar\Helpers\System;

use Illuminate\Support\Arr;

class Settings
{
    /**
     * @var mixed|null
     */
    private $config = null;

    /**
     * Settings constructor.
     *
     * @param $filename
     */
    public function __construct($filename)
    {
        $filename = str_finish((__DIR__ . '/../config/' . $filename), '.php');

        if (file_exists($filename)) {
            $this->config = (require $filename);
        }
    }

    /**
     * Get / set the specified configuration value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed|null
     */
    public function config($key, $default = [])
    {
        if (is_null($this->config)) {
            return $default;
        }

        return Arr::get($this->config, $key, $default);
    }
}
