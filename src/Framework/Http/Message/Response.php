<?php

declare(strict_types=1);

namespace Framework\Http\Message;

class Response
{
    public function __construct(
        private int $statusCode = 200,
        private array $headers = [],
        private string $body = '',
    ) {
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getBody(): string
    {
        return $this->body;
    }
}
