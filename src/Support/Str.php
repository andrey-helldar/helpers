<?php

namespace Helldar\Helpers\Support;

use Illuminate\Contracts\Support\Htmlable;

class Str
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * Str constructor.
     *
     * @param null $value
     */
    public function __construct($value = null)
    {
        $this->value = $value;
    }

    /**
     * The str_choice function translates the given language line with inflection.
     *
     * @param array  $choice
     * @param string $additional
     *
     * @return string
     */
    public function choice(array $choice = [], string $additional = '')
    {
        $result = $choice[0] ?? '';
        $num    = (int) $this->value;
        $mod    = $num % 10;

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
     * @var bool
     *
     * @return string
     */
    public function e($double_encode = true)
    {
        if ($this->value instanceof Htmlable) {
            return $this->value->toHtml();
        }

        return htmlspecialchars($this->value, ENT_QUOTES, 'UTF-8', $double_encode);
    }

    /**
     * Convert special HTML entities back to characters.
     *
     * @return string
     */
    public function de()
    {
        return htmlspecialchars_decode($this->value, ENT_QUOTES);
    }

    /**
     * Replacing multiple spaces with a single space.
     *
     * @return null|string|string[]
     */
    public function replaceSpaces()
    {
        return preg_replace('!\s+!', ' ', $this->value);
    }
}
