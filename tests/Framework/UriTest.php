<?php

declare(strict_types=1);

namespace Framework\Http\Message;

use PHPUnit\Framework\TestCase;

final class UriTest extends TestCase
{
    public function testCreate(): void
    {
        $uri = new Uri($string = 'https://user:pass@test:81/home?a=2&b=3#first');

        $this->assertEquals('https', $uri->getScheme());
        $this->assertEquals('user:pass', $uri->getUserInfo());
        $this->assertEquals('test', $uri->getHost());
        $this->assertEquals(81, $uri->getPort());
        $this->assertEquals('/home', $uri->getPath());
        $this->assertEquals('a=2&b=3', $uri->getQuery());
        $this->assertEquals('first', $uri->getFragment());

        $this->assertEquals($string, (string) $uri);
    }
}
