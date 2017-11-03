<?php

namespace Helldar\Helpers\Tests;

use GrahamCampbell\TestBench\AbstractTestCase;
use Helldar\Helpers\Support\Files;

class FilesTest extends AbstractTestCase
{
    public function testUrlFileExists()
    {
        $file1 = 'https://raw.githubusercontent.com/andrey-helldar/helpers/master/README.md';
        $file2 = 'https://raw.githubusercontent.com/andrey-helldar/helpers/master/unknown.md';

        $this->assertEquals(true, Files::urlExists($file1));
        $this->assertEquals(false, Files::urlExists($file2));
    }
}
