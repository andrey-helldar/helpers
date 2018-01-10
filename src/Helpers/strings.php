<?php

if (!function_exists('str_choice')) {
    /**
     * The str_choice function translates the given language line with inflection:
     *
     * @param int    $num
     * @param array  $choice
     * @param string $additional
     *
     * @return string
     */
    function str_choice(int $num, array $choice = [], string $additional = '')
    {
        return \Helldar\Helpers\Support\Str::choice($num, $choice, $additional);
    }
}

if (!function_exists('e')) {
    /**
     * Escape HTML special characters in a string.
     *
     * @param $value
     *
     * @return string
     */
    function e($value)
    {
        return \Helldar\Helpers\Support\Str::e($value);
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
        return \Helldar\Helpers\Support\Str::de($value);
    }
}

if (!function_exists('str_replace_spaces')) {
    /**
     * Replacing multiple spaces with a single space.
     *
     * @param $input
     *
     * @return null|string|string[]
     */
    function str_replace_spaces($input)
    {
        return \Helldar\Helpers\Support\Str::replaceSpaces($input);
    }
}
