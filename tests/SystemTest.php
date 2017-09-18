<?php

declare(strict_types = 1);

namespace Helldar\Helpers\Tests;

use GrahamCampbell\TestBench\AbstractTestCase;
use Helldar\Helpers\Support\System;

class SystemTest extends AbstractTestCase
{
    public function testIsWindows()
    {
        $this->assertEquals(false, System::isWindows());
    }

    public function testIsLinux()
    {
        $this->assertEquals(true, System::isLinux());
    }
}
