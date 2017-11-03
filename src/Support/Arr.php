<?php

/*
 * The MIT License
 *
 * Copyright 2017 Andrey Helldar <helldar@ai-rus.com>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

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
}
