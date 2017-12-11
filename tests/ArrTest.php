<?php

declare(strict_types = 1);

namespace Helldar\Helpers\Tests;

use GrahamCampbell\TestBench\AbstractTestCase;
use Helldar\Helpers\Support\Arr;

class ArrTest extends AbstractTestCase
{
    public function testArrayItemValueMaxLength()
    {
        $arr1 = [1, 2, 34, 'foo', 'bar', 1234];
        $arr2 = [1, 2, 34, 1234589, 1234];
        $arr3 = ['qwerty', 'it is a long string', 'nope'];

        $this->assertEquals(4, Arr::itemValueMaxLength($arr1));
        $this->assertEquals(7, Arr::itemValueMaxLength($arr2));
        $this->assertEquals(19, Arr::itemValueMaxLength($arr3));
    }

    public function arrayFirst()
    {
        $arr1 = [123, 345, 546, 56756, 354, [123123, 4332]];
        $arr2 = ['foo', 324234, 34, 6, '54y', '3tr', 2, [123123, 4332]];

        $this->assertEquals(123, Arr::first($arr1));
        $this->assertEquals('foo', Arr::first($arr2));
    }

    public function arrayLast()
    {
        $arr1 = [123, 345, 546, 56756, 354, [123123, 4332]];
        $arr2 = ['foo', 324234, 34, 6, '3tr', 2, [123123, 4332], '54y'];

        $this->assertEquals([123123, 4332], Arr::last($arr1));
        $this->assertEquals('54y', Arr::last($arr2));
    }

    public function sortByKeysArray()
    {
        $arr = ['q' => 1, 'r' => 2, 's' => 5, 'w' => 123];

        array_sort_by_keys_array($arr, ['q', 'w', 'e']);

        $this->assertEquals($arr, [
            'q' => 1, 'w' => 123, 'r' => 2, 's' => 5,
        ]);
    }
}
