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

        $length = strlen((string) ((int) $value));

        if ($length < 4) {
            $length = 4;
        } elseif ($length < 7) {
            $length = 7;
        } elseif ($length < 10) {
            $length = 10;
        } elseif ($length < 13) {
            $length = 13;
        } else {
            $length = 16;
        }

        $suffix = self::suffix($length);
        $value = self::numberFormat($value, $length, $precision);

        return $value.$suffix;
    }

    /**
     * Format a number with grouped with divider.
     *
     * @param int $value
     * @param int $length
     * @param int $precision
     *
     * @return string
     */
    private static function numberFormat($value = 0, $length = 4, $precision = 1)
    {
        $divider = (double) bcpow(10, ($length - 4), 2);

        return round($value / $divider, $precision);
    }

    /**
     * Getting the suffix for abbreviated numbers.
     *
     * @param int $length
     *
     * @return mixed
     */
    private static function suffix($length = 0)
    {
        $suffix = config('ah_helpers.digits.short_number', []);

        if (array_key_exists($length, $suffix)) {
            return $suffix[$length];
        }

        ksort($suffix);

        return last($suffix);
    }
}
