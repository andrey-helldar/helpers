<?php

namespace Helldar\Helpers\Support;

use Helldar\Helpers\Exceptions\InvalidNumberException;

class Digits
{
    /**
     * @var int
     */
    private $digit = 0;

    /**
     * Digits constructor.
     *
     * @param int $digit
     */
    public function __construct($digit = 0)
    {
        $this->digit = $digit;
    }

    /**
     * Calculating the factorial of a number.
     *
     * @param int $n
     *
     * @return float|int
     */
    public function factorial($n = 0)
    {
        if ((int) $n == 0) {
            return 1;
        }

        return (int) $n * $this->factorial((int) $n - 1);
    }

    /**
     * Converts a number into a short version.
     * eg: 1000 >> 1K
     *
     * @param int $precision
     *
     * @return int|string
     */
    public function shortNumber($precision = 1)
    {
        if (!is_numeric($this->digit)) {
            throw new InvalidNumberException($this->digit);
        }

        $length = strlen((string) ((int) $this->digit));
        $length = ceil($length / 3) * 3 + 1;

        $suffix = self::suffix($length);
        $value = self::numberFormat($length, $precision);

        return $value.$suffix;
    }

    /**
     * Format a number with grouped with divider.
     *
     * @param int $length
     * @param int $precision
     *
     * @return string
     */
    private function numberFormat($length = 4, $precision = 1)
    {
        $divider = (double) bcpow(10, ($length - 4), 2);

        return round($this->digit / $divider, $precision);
    }

    /**
     * Getting the suffix for abbreviated numbers.
     *
     * @param int $length
     *
     * @return mixed
     */
    private function suffix($length = 0)
    {
        $suffix = config('ah_helpers.digits.short_number', []);

        if (array_key_exists((int) $length, $suffix)) {
            return $suffix[$length];
        }

        ksort($suffix);

        return last($suffix);
    }
}
