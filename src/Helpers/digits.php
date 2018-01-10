<?php

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
        return \Helldar\Helpers\Support\Digits::factorial($n);
    }
}

if (!function_exists('short_number')) {
    /**
     * Converts a number into a short version.
     * eg: 1000 >> 1k
     *
     * @param int $value
     * @param int $precision
     *
     * @return int
     */
    function short_number($value = 0, $precision = 1)
    {
        return \Helldar\Helpers\Support\Digits::shortNumber($value, $precision);
    }
}
