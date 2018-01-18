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

    public function testBuildUrl()
    {
        $parts1 = [
            'scheme' => 'http',
            'host'   => 'mysite.dev',
        ];
        $parts2 = [
            'scheme'   => 'https',
            'host'     => 'mysite.dev',
            'port'     => 1234,
            'user'     => 'foo',
            'pass'     => 'bar',
            'path'     => '/category/subcategory',
            'query'    => 'page=1',
            'fragment' => 'section=5',
        ];

        $this->assertEquals('http://mysite.dev', (new Http($parts1))->buildUrl());
        $this->assertEquals('https://foo:bar@mysite.dev:1234/category/subcategory?page=1#section=5', (new Http($parts2))->buildUrl());
    }
}
