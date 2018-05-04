<?php

namespace Helldar\Helpers\Traits;

trait Init
{
    /**
     * @return $this
     */
    public static function init()
    {
        return new self();
    }
}
