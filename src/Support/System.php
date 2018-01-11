<?php

namespace Helldar\Helpers\Support;

class System
{
    /**
     * Determine whether the current environment is Windows based.
     *
     * @return bool
     */
    public function isWindows()
    {
        return mb_strtolower(substr(PHP_OS, 0, 3), 'UTF-8') === 'win';
    }

    /**
     * Determine whether the current environment is Linux based.
     *
     * @return bool
     */
    public function isLinux()
    {
        return mb_strtolower(PHP_OS, 'UTF-8') === 'linux';
    }
}
