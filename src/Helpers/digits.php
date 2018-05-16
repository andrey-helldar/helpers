<?php

use Helldar\Helpers\Support\Digits;

if (!function_exists('factorial')) {
    /**
     * Calculating the factorial of a number.
     *
     * @param int $n
     *
     * @return int
     */
    function factorial(int $n = 0)
    {
        return (new Digits())
            ->factorial($n);
    }
}

if (!function_exists('short_number')) {
    /**
     * Converts a number into a short version.
     * eg: 1000 >> 1k
     *
     * @param int $n
     * @param int $precision
     *
     * @return int
     */
    function short_number($n = 0, $precision = 1)
    {
        return (new Digits($n))
            ->shortNumber($precision);
    }
}
