<?php

declare(strict_types = 1);

namespace Helldar\Helpers\Tests;

use Helldar\Helpers\Support\Str;
use PHPUnit\Framework\TestCase;

class StrTest extends TestCase
{
    public function testChoice()
    {
        $this->assertEquals('user', (new Str(1))->choice(['user', 'users', 'users']));
        $this->assertEquals('users', (new Str(5))->choice(['user', 'users', 'users']));
        $this->assertEquals('users', (new Str(20))->choice(['user', 'users', 'users']));

        $this->assertEquals('user of this', (new Str(1))->choice(['user', 'users', 'users'], 'of this'));
        $this->assertEquals('users of this', (new Str(5))->choice(['user', 'users', 'users'], 'of this'));
        $this->assertEquals('users of this', (new Str(20))->choice(['user', 'users', 'users'], 'of this'));
    }

    public function testE()
    {
        $this->assertEquals('foo&quot;bar', (new Str('foo"bar'))->e());
        $this->assertEquals('foo&amp;bar', (new Str('foo&bar'))->e());
        $this->assertEquals('foo&#039;bar', (new Str('foo\'bar'))->e());
        $this->assertEquals('foo&#039;bar', (new Str("foo'bar"))->e());
        $this->assertEquals('foo\&#039;bar', (new Str('foo\\\'bar'))->e());
        $this->assertEquals('Foo-&gt;bar with space', (new Str('Foo->bar with space'))->e());
        $this->assertEquals('A#symbol^and%a$few@special!chars~`', (new Str('A#symbol^and%a$few@special!chars~`'))->e());
    }

    public function testDe()
    {
        $this->assertEquals('foo"bar', (new Str('foo&quot;bar'))->de());
        $this->assertEquals('foo&bar', (new Str('foo&amp;bar'))->de());
        $this->assertEquals("foo'bar", (new Str('foo&#039;bar'))->de());
        $this->assertEquals("foo'bar", (new Str('foo&#039;bar'))->de());
        $this->assertEquals('foo\\\'bar', (new Str('foo\&#039;bar'))->de());
        $this->assertEquals('Foo->bar with space', (new Str('Foo-&gt;bar with space'))->de());
        $this->assertEquals('A#symbol^and%a$few@special!chars~`', (new Str('A#symbol^and%a$few@special!chars~`'))->de());
    }

    public function testReplaceSpaces()
    {
        $this->assertEquals('foo bar', (new Str('foo bar'))->replaceSpaces());
        $this->assertEquals('foo bar', (new Str('foo  bar'))->replaceSpaces());
        $this->assertEquals('foo bar', (new Str('foo    bar'))->replaceSpaces());
        $this->assertEquals('foo bar baz', (new Str('foo bar  baz'))->replaceSpaces());
        $this->assertEquals('foo bar baz', (new Str('foo  bar     baz'))->replaceSpaces());
        $this->assertEquals('foo bar baz', (new Str('foo    bar baz'))->replaceSpaces());
    }
}
