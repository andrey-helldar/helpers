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

class Str
{
    /**
     * The str_choice function translates the given language line with inflection.s
     *
     * @param int    $num
     * @param array  $choice
     * @param string $additional
     *
     * @return string
     */
    public static function choice(int $num, array $choice = [], string $additional = '')
    {
        $result = $choice[0] ?? '';
        $mod = $num % 10;

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
     * @param string $value
     *
     * @return string
     */
    public static function e(string $value)
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
    }

    /**
     * Convert special HTML entities back to characters.
     *
     * @param string $value
     *
     * @return string
     */
    public static function de(string $value)
    {
        return htmlspecialchars_decode($value, ENT_QUOTES);
    }
}
