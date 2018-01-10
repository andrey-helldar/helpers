<?php

namespace Helldar\Helpers\Support;

class Str
{
    /**
     * The str_choice function translates the given language line with inflection.s
     *
     * @param int    $num
     * @param array  $choice
     * @param string $additional
     *
     * @return string
     */
    public static function choice(int $num, array $choice = [], string $additional = '')
    {
        $result = $choice[0] ?? '';
        $mod = $num % 10;

        if ($mod == 0 || ($mod >= 5 && $mod <= 9) || ($num % 100 >= 11 && $num % 100 <= 20)) {
            $result = $choice[2] ?? '';
        } elseif ($mod >= 2 && $mod <= 4) {
            $result = $choice[1] ?? '';
        }

        if (empty(trim($additional))) {
            return trim($result);
        }

        return implode(' ', [trim($result), trim($additional)]);
    }

    /**
     * Escape HTML special characters in a string.
     *
     * @param null|string $value
     *
     * @return string
     */
    public static function e($value)
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
    }

    /**
     * Convert special HTML entities back to characters.
     *
     * @param null|string $value
     *
     * @return string
     */
    public static function de($value)
    {
        return htmlspecialchars_decode($value, ENT_QUOTES);
    }

    /**
     * Replacing multiple spaces with a single space.
     *
     * @param $input
     *
     * @return null|string|string[]
     */
    public static function replaceSpaces($input)
    {
        return preg_replace('!\s+!', ' ', $input);
    }
}
