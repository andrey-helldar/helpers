<?php

namespace Helldar\Helpers\Support;

class Arr
{
    /**
     * @var array
     */
    private $array = [];

    /**
     * Arr constructor.
     *
     * @param array $array
     */
    public function __construct(array $array = [])
    {
        $this->array = $array;
    }

    /**
     * Returns the number of characters of the longest element in the array.
     *
     * @return int
     */
    public function itemValueMaxLength()
    {
        $max = 0;

        foreach ($this->array as $item) {
            if (strlen($item) > $max) {
                $max = strlen((string) $item);
            }
        }

        return $max;
    }

    /**
     * Renaming array keys.
     * As the first parameter, a callback function is passed, which determines the actions for processing the value.
     * The output of the function must be a string with a name.
     *
     * @param $callback
     *
     * @return array
     */
    public function renameKeys($callback)
    {
        $result = [];

        foreach ($this->array as $key => $value) {
            $new_key = $callback($key);

            $result[$new_key] = $value;
        }

        return $result;
    }

    /**
     * Get the size of the longest text element of the array.
     *
     * @return int
     */
    public function sizeOfMaxValue()
    {
        return mb_strlen(max($this->array), 'UTF-8');
    }

    /**
     * Push one or more elements onto the end of array.
     *
     * @param $array
     * @param $value
     */
    public function add(&$array, $value)
    {
        array_push($array, $value);
    }

    /**
     * Push one a unique element onto the end of array.
     *
     * @param array       $array
     * @param array|mixed $values
     */
    public function addUnique(&$array, $values)
    {
        if (is_array($values) || is_object($values)) {
            foreach ($values as $value) {
                $this->addUnique($array, $value);
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
    public function sortByKeysArray(array &$array, array $sorter)
    {
        $sorter = array_intersect($sorter, array_keys($array));
        $array = array_merge(array_flip($sorter), $array);
    }
}
