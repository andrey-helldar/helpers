<?php

declare(strict_types = 1);

namespace Helldar\Helpers\Tests;

use GrahamCampbell\TestBench\AbstractTestCase;
use Helldar\Helpers\Support\Images;

class ImagesTest extends AbstractTestCase
{
    public function testImageOrDefault()
    {
        $no_image = '/no-image.jpg';

        $this->assertEquals($no_image, (new Images('unknown.txt'))->imageOrDefault($no_image));
        $this->assertEquals(null, (new Images('unknown.txt'))->imageOrDefault());

        $this->assertEquals(null, (new Images('http://u.loc/unknown.txt'))->imageOrDefault());
        $this->assertEquals($no_image, (new Images('http://u.loc/unknown.txt'))->imageOrDefault($no_image));
    }
}
