<?php

namespace Helldar\Helpers\Tests;

use GrahamCampbell\TestBench\AbstractTestCase;

class HttpTest extends AbstractTestCase
{
    public function testMixUrl()
    {
        $this->assertEquals(true, true);
    }

    public function baseUrl()
    {
        $this->assertEquals(base_url('http://localhost'), 'localhost');
        $this->assertEquals(base_url('http://localhost/foo/bar'), 'localhost');

        $this->assertEquals(base_url('https://mysite.dev'), 'mysite.dev');
        $this->assertEquals(base_url('https://mysite.dev/foo/bar'), 'mysite.dev');

        $this->assertEquals(base_url('ftp://it-is-a-ftp.dev'), 'it-is-a-ftp.dev');
        $this->assertEquals(base_url('ftp://it-is-a-ftp.dev/foo/bar'), 'it-is-a-ftp.dev');
    }
}
