<?php

declare(strict_types = 1);

namespace Helldar\Helpers\Tests;

use GrahamCampbell\TestBench\AbstractTestCase;
use Helldar\Helpers\Exceptions\InvalidNumberException;
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

    public function testShortNumber()
    {
        $this->assertEquals('0', Digits::shortNumber(0));
        $this->assertEquals('576', Digits::shortNumber(576));

        $this->assertEquals('1K', Digits::shortNumber(1000));
        $this->assertEquals('1.4K', Digits::shortNumber(1440));

        $this->assertEquals('3M', Digits::shortNumber(3000000));
        $this->assertEquals('376M', Digits::shortNumber(376000027));

        $this->assertEquals('3B', Digits::shortNumber(3000000000));
        $this->assertEquals('376B', Digits::shortNumber(376000000000));

        $this->assertEquals('3T+', Digits::shortNumber(3000000000000));
        $this->assertEquals('376T+', Digits::shortNumber(376000000000000));

        $this->expectException(InvalidNumberException::class);
        $this->assertEquals('The value of "not number" is not a number!', Digits::shortNumber('not number'));
    }
}
