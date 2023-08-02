<?php

declare(strict_types=1);

namespace Framework\Http\Message;

use PHPUnit\Framework\TestCase;

final class ResponseTest extends TestCase
{
    public function testCreate(): void
    {
        $response = new Response(
            $status = 200,
            $headers = [
                'Header-1' => 'value-1',
                'Header-2' => 'value-2',
            ],
            $body = new Stream(fopen('php://memory', 'r')),
        );

        $this->assertEquals($body, $response->getBody());
        $this->assertEquals($status, $response->getStatusCode());
        $this->assertEquals($headers, $response->getHeaders());
    }
}
