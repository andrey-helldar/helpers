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
        return (new \Helldar\Helpers\Support\Str($num))
            ->choice($choice, $additional);
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
        return (new \Helldar\Helpers\Support\Str($value))
            ->e();
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
        return (new \Helldar\Helpers\Support\Str($value))
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
        return (new \Helldar\Helpers\Support\Str($value))
            ->replaceSpaces();
    }
}
