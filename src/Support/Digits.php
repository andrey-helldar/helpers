<?php

namespace Helldar\Helpers\Support;

use Helldar\Helpers\Exceptions\InvalidNumberException;

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

    /**
     * Converts a number into a short version.
     * eg: 1000 >> 1k
     *
     * @param int $value
     * @param int $precision
     *
     * @return int|string
     */
    public static function shortNumber($value = 0, $precision = 1)
    {
        if (!is_numeric($value)) {
            throw new InvalidNumberException($value);
        }

        if ($value < 1000) {
            return $value;
        }

        if ($value < 1000000) {
            $value = self::numberFormat($value, 1000, $precision);

            return $value.'K';
        }

        if ($value < 1000000000) {
            $value = self::numberFormat($value, 1000000, $precision);

            return $value.'M';
        }

        if ($value < 1000000000000) {
            $value = self::numberFormat($value, 1000000000, $precision);

            return $value.'B';
        }

        $value = self::numberFormat($value, 1000000000000, $precision);

        return $value.'T+';
    }

    /**
     * Format a number with grouped with divider.
     *
     * @param int $value
     * @param int $divider
     * @param int $precision
     *
     * @return string
     */
    private static function numberFormat($value = 0, $divider = 1000, $precision = 1)
    {
        return round($value / $divider, $precision);
    }
}
