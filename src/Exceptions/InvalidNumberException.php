<?php

namespace Helldar\Helpers\Exceptions;

class InvalidNumberException extends \InvalidArgumentException
{
    /**
     * InvalidArgumentException constructor.
     *
     * @param mixed $message
     * @param int   $code
     */
    public function __construct($message, $code = 400)
    {
        $message = "The value of \"{$message}\" is not a number!";
        parent::__construct($message, $code);
    }
}
