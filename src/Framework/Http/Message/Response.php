<?php

declare(strict_types=1);

namespace Framework\Http\Message;

class Response
{
    public function __construct(
        private int $statusCode,
        private array $headers,
        private Stream $body,
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

    public function getBody(): Stream
    {
        return $this->body;
    }
}
