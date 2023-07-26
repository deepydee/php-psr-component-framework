<?php

declare(strict_types=1);

namespace Framework\Http;

use PHPUnit\Framework\TestCase;

final class CreateServerRequestFromGlobalsTest extends TestCase
{
    public function testGlobals(): void
    {
        $server = [
            'HTTP_HOST' => 'localhost',
            'REQUEST_URI' => '/home',
            'REQUEST_METHOD' => 'POST',
            'CONTENT_TYPE' => 'text/plain',
            'CONTENT_LENGTH' => '4',
            'HTTP_ACCEPT_LANGUAGE' => 'en',
        ];

        $query = ['param' => 'value'];
        $cookie = ['name' => 'John'];
        $body = ['age' => '42'];
        $input = 'Body';

        $request = createServerRequestFromGlobals(
            server: $server,
            query: $query,
            cookie: $cookie,
            body: $body,
            input: $input,
        );

        $this->assertEquals($server, $request->getServerParams());
        $this->assertEquals('/home', $request->getUri());
        $this->assertEquals('POST', $request->geMethod());
        $this->assertEquals($query, $request->getQueryParams());
        $this->assertEquals([
            'Host' => 'localhost',
            'Content-Type' => 'text/plain',
            'Content-Length' => '4',
            'Accept-Language' => 'en',
        ], $request->getHeaders());
        $this->assertEquals($cookie, $request->getCookieParams());
        $this->assertEquals($body, $request->getParsedBody());
        $this->assertEquals($input, $request->getBody());
    }
}
