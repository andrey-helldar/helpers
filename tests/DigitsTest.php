<?php

declare(strict_types = 1);

namespace Helldar\Helpers\Tests;

use Helldar\Helpers\Exceptions\InvalidNumberException;
use Helldar\Helpers\Support\Digits;
use PHPUnit\Framework\TestCase;

class DigitsTest extends TestCase
{
    public function testFactorial()
    {
        $this->assertEquals(1, (new Digits())->factorial());
        $this->assertEquals(120, (new Digits())->factorial(5));
        $this->assertEquals('1.0888869450418E+28', (string) (new Digits())->factorial(27));
        $this->assertEquals(87178291200, (new Digits())->factorial(14));
    }

    public function testShortNumber()
    {
        $this->assertEquals('0', (new Digits(0))->shortNumber());
        $this->assertEquals('576', (new Digits(576))->shortNumber());

        $this->assertEquals('1K', (new Digits(1000))->shortNumber());
        $this->assertEquals('1.4K', (new Digits(1440))->shortNumber());

        $this->assertEquals('3M', (new Digits(3000000))->shortNumber());
        $this->assertEquals('376M', (new Digits(376000027))->shortNumber());

        $this->assertEquals('3B', (new Digits(3000000000))->shortNumber());
        $this->assertEquals('376B', (new Digits(376000000000))->shortNumber());

        $this->assertEquals('3T+', (new Digits(3000000000000))->shortNumber());
        $this->assertEquals('376T+', (new Digits(376000000000000))->shortNumber());

        $this->expectException(InvalidNumberException::class);
        $this->assertEquals('The value of "not number" is not a number!', (new Digits('not number'))->shortNumber());
    }
}
