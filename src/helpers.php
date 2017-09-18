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

if (!function_exists('str_choice')) {
    /**
     * The str_choice function translates the given language line with inflection:
     *
     * @param int    $num
     * @param array  $choice
     * @param string $additional
     *
     * @return  string
     */
    function str_choice(int $num, array $choice = [], string $additional = '')
    {
        return \Helldar\Helpers\Support\Str::choice($num, $choice, $additional);
    }
}

if (!function_exists('image_or_default')) {
    /**
     * Check the existence of the file and return the default value if it is missing.
     *
     * @param string $filename
     * @param null   $default
     *
     * @return null|string
     */
    function image_or_default(string $filename, $default = null)
    {
        return \Helldar\Helpers\Support\Images::imageOrDefault($filename, $default);
    }
}

if (!function_exists('array_item_value_max_length')) {
    /**
     * Returns the number of characters of the longest element in the array.
     *
     * @param array $array
     *
     * @return int
     */
    function array_item_value_max_length(array $array = [])
    {
        return \Helldar\Helpers\Support\Arr::arrayItemValueMaxLength($array);
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
     * @param $value
     *
     * @return string
     */
    function de($value)
    {
        return \Helldar\Helpers\Support\Str::de($value);
    }
}

if (!function_exists('array_first')) {
    /**
     * Get the first element of an array. Useful for method chaining.
     *
     * @param array $array
     *
     * @return mixed
     */
    function array_first(array $array = [])
    {
        return \Helldar\Helpers\Support\Arr::arrayFirst($array);
    }
}

if (!function_exists('array_last')) {
    /**
     * Get the last element from an array.
     *
     * @param array $array
     *
     * @return mixed
     */
    function array_last(array $array = [])
    {
        return \Helldar\Helpers\Support\Arr::arrayLast($array);
    }
}

if (!function_exists('is_windows')) {
    /**
     * Determine whether the current environment is Windows based.
     *
     * @return bool
     */
    function is_windows()
    {
        return \Helldar\Helpers\Support\System::isWindows();
    }
}

if (!function_exists('is_linux')) {
    /**
     * Determine whether the current environment is Linux based.
     *
     * @return bool
     */
    function is_linux()
    {
        return \Helldar\Helpers\Support\System::isLinux();
    }
}
