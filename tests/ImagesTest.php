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

        $this->assertEquals($no_image, Images::imageOrDefault('unknown.txt', $no_image));
        $this->assertEquals(null, Images::imageOrDefault('unknown.txt'));
    }
}
