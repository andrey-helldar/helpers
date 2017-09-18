<?php

declare(strict_types = 1);

namespace Helldar\Helpers\Tests;

use GrahamCampbell\TestBench\AbstractTestCase;
use Helldar\Helpers\Support\Digits;

class DigitsTest extends AbstractTestCase
{
    public function testFactorial()
    {
        $this->assertEquals(1, Digits::factorial());
        $this->assertEquals(120, Digits::factorial(5));
        $this->assertEquals('1.0888869450418E+28', (string) Digits::factorial(27));
        $this->assertEquals(87178291200, Digits::factorial(14));
    }
}
