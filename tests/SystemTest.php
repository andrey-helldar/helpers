<?php

declare(strict_types = 1);

namespace Helldar\Helpers\Tests;

use Helldar\Helpers\Support\System;
use PHPUnit\Framework\TestCase;

class SystemTest extends TestCase
{
    public function testIsWindows()
    {
        $this->assertEquals(false, (new System())->isWindows());
    }

    public function testIsLinux()
    {
        $this->assertEquals(true, (new System())->isLinux());
    }
}
