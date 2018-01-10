<?php

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