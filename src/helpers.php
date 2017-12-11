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
     * @return string
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
        return \Helldar\Helpers\Support\Arr::itemValueMaxLength($array);
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
        return \Helldar\Helpers\Support\Arr::first($array);
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
        return \Helldar\Helpers\Support\Arr::last($array);
    }
}

if (!function_exists('array_size_max_value')) {
    /**
     * Get the size of the longest text element of the array.
     *
     * @param array $array
     *
     * @return int
     */
    function array_size_max_value(array $array = [])
    {
        return \Helldar\Helpers\Support\Arr::sizeOfMaxValue($array);
    }
}

if (!function_exists('array_rename_keys')) {
    /**
     * Renaming array keys.
     * As the first parameter, a callback function is passed, which determines the actions for processing the value.
     * The output of the function must be a string with a name.
     *
     * @param       $callback
     * @param array $array
     *
     * @return array
     */
    function array_rename_keys($callback, array $array = [])
    {
        return \Helldar\Helpers\Support\Arr::renameKeys($callback, $array);
    }
}

if (!function_exists('array_add')) {
    /**
     * Push one or more elements onto the end of array.
     *
     * @param $array
     * @param $value
     */
    function array_add(&$array, $value)
    {
        \Helldar\Helpers\Support\Arr::add($array, $value);
    }
}

if (!function_exists('array_add_unique')) {
    /**
     * Push one a unique element onto the end of array.
     *
     * @param $array
     * @param $value
     */
    function array_add_unique(&$array, $value)
    {
        \Helldar\Helpers\Support\Arr::addUnique($array, $value);
    }
}

if (!function_exists('array_sort_by_keys_array')) {
    /**
     * Sort an associative array in the order specified by an array of keys.
     *
     * Example:
     *
     *  $arr = ['q' => 1, 'r' => 2, 's' => 5, 'w' => 123];
     *
     *  array_sort_by_keys_array($arr, ['q', 'w', 'e']);
     *
     * print_r($arr);
     *
     * /*
     *   Array
     *   (
     *     [q] => 1
     *     [w] => 123
     *     [r] => 2
     *     [s] => 5
     *   )
     *
     * @param array $array
     * @param array $sorter
     */
    function array_sort_by_keys_array(array &$array, array $sorter)
    {
        \Helldar\Helpers\Support\Arr::sortByKeysArray($array, $sorter);
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

if (!function_exists('url_file_exists')) {
    /**
     * Checks whether a file or directory exists on URL.
     *
     * @param string $path
     *
     * @return bool
     */
    function url_file_exists($path)
    {
        return \Helldar\Helpers\Support\Files::urlExists($path);
    }
}

if (!function_exists('mix_url')) {
    /**
     * Convert the relative path of a versioned Mix files to absolute.
     *
     * @param string $path
     * @param string $manifestDirectory
     *
     * @throws \Exception
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function mix_url($path, $manifestDirectory = '')
    {
        return \Helldar\Helpers\Support\Http::mixUrl($path, $manifestDirectory);
    }
}

if (!function_exists('base_url')) {
    /**
     * Get the domain name from the URL.
     *
     * @param $url
     *
     * @return string
     */
    function base_url($url)
    {
        return \Helldar\Helpers\Support\Http::baseUrl($url);
    }
}
