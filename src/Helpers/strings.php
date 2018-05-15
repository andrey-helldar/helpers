<?php

use Helldar\Helpers\Support\Str;

if (!function_exists('str_choice')) {
    /**
     * The str_choice function translates the given language line with inflection:
     *
     * @param int $num
     * @param array $choice
     * @param string $additional
     *
     * @return string
     */
    function str_choice(int $num, array $choice = [], string $additional = '')
    {
        return (new Str($num))
            ->choice($choice, $additional);
    }
}

if (!function_exists('e')) {
    /**
     * Escape HTML special characters in a string.
     *
     * @param \Illuminate\Contracts\Support\Htmlable|string $value
     * @param bool $doubleEncode
     *
     * @return string
     */
    function e($value, $doubleEncode = true)
    {
        return (new Str($value))
            ->e($doubleEncode);
    }
}

if (!function_exists('de')) {
    /**
     * Convert special HTML entities back to characters.
     *
     * @param null|string $value
     *
     * @return string
     */
    function de($value)
    {
        return (new Str($value))
            ->de();
    }
}

if (!function_exists('str_replace_spaces')) {
    /**
     * Replacing multiple spaces with a single space.
     *
     * @param $value
     *
     * @return null|string|string[]
     */
    function str_replace_spaces($value)
    {
        return (new Str($value))
            ->replaceSpaces();
    }
}
