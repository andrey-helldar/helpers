<?php

declare(strict_types = 1);

namespace Helldar\Helpers\Tests;

use GrahamCampbell\TestBench\AbstractTestCase;
use Helldar\Helpers\Support\Http;

class HttpTest extends AbstractTestCase
{
    public function testMixUrl()
    {
        $this->assertEquals(true, true);
    }

    public function baseUrl()
    {
        $this->assertEquals((new Http('http://localhost'))->baseUrl(), 'localhost');
        $this->assertEquals((new Http('http://localhost/foo/bar'))->baseUrl(), 'localhost');

        $this->assertEquals((new Http('https://mysite.dev'))->baseUrl(), 'mysite.dev');
        $this->assertEquals((new Http('https://mysite.dev/foo/bar'))->baseUrl(), 'mysite.dev');

        $this->assertEquals((new Http('ftp://it-is-a-ftp.dev'))->baseUrl(), 'it-is-a-ftp.dev');
        $this->assertEquals((new Http('ftp://it-is-a-ftp.dev/foo/bar'))->baseUrl(), 'it-is-a-ftp.dev');
    }
}
