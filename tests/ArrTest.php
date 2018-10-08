<?php

declare(strict_types = 1);

namespace Helldar\Helpers\Tests;

use Helldar\Helpers\Support\Arr;
use PHPUnit\Framework\TestCase;

class ArrTest extends TestCase
{
    public function testArrayItemValueMaxLength()
    {
        $arr1 = [1, 2, 34, 'foo', 'bar', 1234];
        $arr2 = [1, 2, 34, 1234589, 1234];
        $arr3 = ['qwerty', 'it is a long string', 'nope'];

        $this->assertEquals(4, (new Arr($arr1))->itemValueMaxLength());
        $this->assertEquals(7, (new Arr($arr2))->itemValueMaxLength());
        $this->assertEquals(19, (new Arr($arr3))->itemValueMaxLength());
    }

    public function testSortByKeysArray()
    {
        $arr = ['q' => 1, 'r' => 2, 's' => 5, 'w' => 123];

        array_sort_by_keys_array($arr, ['q', 'w', 'e']);

        $this->assertEquals($arr, ['q' => 1, 'w' => 123, 'r' => 2, 's' => 5]);
    }
}
