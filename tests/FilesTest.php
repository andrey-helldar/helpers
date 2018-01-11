<?php

declare(strict_types = 1);

namespace Helldar\Helpers\Tests;

use GrahamCampbell\TestBench\AbstractTestCase;
use Helldar\Helpers\Support\Files;

class FilesTest extends AbstractTestCase
{
    public function testUrlFileExists()
    {
        $file1 = 'https://raw.githubusercontent.com/andrey-helldar/helpers/master/README.md';
        $file2 = 'https://raw.githubusercontent.com/andrey-helldar/helpers/master/unknown.md';

        $this->assertEquals(true, (new Files($file1))->urlExists());
        $this->assertEquals(false, (new Files($file2))->urlExists());
    }
}
