<?php

namespace Helldar\Helpers\Support;

class Digits
{
    /**
     * Calculating the factorial of a number.
     *
     * @param int $n
     *
     * @return int
     */
    public static function factorial(int $n = 0)
    {
        if ((int) $n == 0) {
            return 1;
        }

        return (int) $n * self::factorial((int) $n - 1);
    }
}
