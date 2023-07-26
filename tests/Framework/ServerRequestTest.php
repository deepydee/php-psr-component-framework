<?php

declare(strict_types=1);

namespace Framework\Http\Message;

use Framework\Http\Message\ServerRequest;
use PHPUnit\Framework\TestCase;

final class ServerRequestTest extends TestCase
{
    public function testCreate(): void
    {
        $request =  new ServerRequest(
            serverParams: $serverParams = ['HOST' => 'app.test'],
            uri: $uri = new Uri('https//user:pass@test:81/home?a=2&b=3#first'),
            method: $method = 'GET',
            queryParams: $queryParams = ['name' => 'John'],
            cookieParams: $cookieParams = ['Cookie' => 'Val'],
            body: $body = new Stream(fopen('php://memory', 'r')),
            parsedBody: $parsedBody = ['title' => 'Title'],
            headers: $headers = [
                'X-Header' => 'Value',
            ]
        );

        $this->assertEquals($serverParams, $request->getServerParams());
        $this->assertEquals($uri, $request->getUri());
        $this->assertEquals($method, $request->geMethod());
        $this->assertEquals($queryParams, $request->getQueryParams());
        $this->assertEquals($cookieParams, $request->getCookieParams());
        $this->assertEquals($body, $request->getBody());
        $this->assertEquals($parsedBody, $request->getParsedBody());
        $this->assertEquals($headers, $request->getHeaders());
    }
}
