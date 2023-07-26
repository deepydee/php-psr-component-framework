<?php

declare(strict_types=1);

namespace Framework\Http\Message;

final class ServerRequest
{
    public function __construct(
        private array $serverParams = [],
        private string $uri = '',
        private string $method = '',
        private array $queryParams = [],
        private array $headers = [],
        private array $cookieParams = [],
        private string $body = '',
        private ?array $parsedBody = null,
    ) {
    }

    public function getServerParams(): array
    {
        return $this->serverParams;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function geMethod(): string
    {
        return $this->method;
    }

    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getCookieParams(): array
    {
        return $this->cookieParams;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getParsedBody(): ?array
    {
        return $this->parsedBody;
    }
}
