<?php

namespace Helldar\Helpers\Support;

class Arr
{
    /**
     * Returns the number of characters of the longest element in the array.
     *
     * @param array $array
     *
     * @return int
     */
    public static function itemValueMaxLength(array $array = [])
    {
        $max = 0;

        foreach ($array as $item) {
            if (strlen($item) > $max) {
                $max = strlen((string) $item);
            }
        }

        return $max;
    }

    /**
     * Get the first element of an array. Useful for method chaining.
     *
     * @param array $array
     *
     * @return mixed
     */
    public static function first(array $array = [])
    {
        return reset($array);
    }

    /**
     * Get the last element from an array.
     *
     * @param array $array
     *
     * @return mixed
     */
    public static function last(array $array = [])
    {
        return end($array);
    }

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
    public static function renameKeys($callback, array $array = [])
    {
        $result = [];

        foreach ($array as $key => $value) {
            $new_key = $callback($key);

            $result[$new_key] = $value;
        }

        return $result;
    }

    /**
     * Get the size of the longest text element of the array.
     *
     * @param array $array
     *
     * @return int
     */
    public static function sizeOfMaxValue(array $array = [])
    {
        return mb_strlen(max($array), 'UTF-8');
    }

    /**
     * Push one or more elements onto the end of array.
     *
     * @param $array
     * @param $value
     */
    public static function add(&$array, $value)
    {
        array_push($array, $value);
    }

    /**
     * Push one a unique element onto the end of array.
     *
     * @param array       $array
     * @param array|mixed $values
     */
    public static function addUnique(&$array, $values)
    {
        if (gettype($values) === 'array' || gettype($values) === 'object') {
            foreach ($values as $value) {
                self::addUnique($array, $value);
            }

            return;
        }

        if (!in_array($values, $array)) {
            array_push($array, $values);
        }
    }

    /**
     * Sort an associative array in the order specified by an array of keys.
     *
     * @param array $array
     * @param array $sorter
     *
     * @see https://gist.github.com/Ellrion/a3145621f936aa9416f4c04987533d8d#file-helper-php Original Source
     */
    public static function sortByKeysArray(array &$array, array $sorter)
    {
        $sorter = array_intersect($sorter, array_keys($array));
        $array = array_merge(array_flip($sorter), $array);
    }
}
