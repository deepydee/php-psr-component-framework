<?php

declare(strict_types=1);

namespace Framework\Http\Message;

use Framework\Http\Message\ServerRequest;
use PHPUnit\Framework\TestCase;

final class SercerRequestTest extends TestCase
{
    public function testCreate(): void
    {
        $request =  new ServerRequest(
            serverParams: $serverParams = ['HOST' => 'app.test'],
            uri: $uri = '/home',
            method: $method = 'GET',
            queryParams: $queryParams = ['name' => 'John'],
            cookieParams: $cookieParams = ['Cookie' => 'Val'],
            body: $body = 'body',
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
