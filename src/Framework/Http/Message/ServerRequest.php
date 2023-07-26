<?php

declare(strict_types=1);

namespace Framework\Http\Message;

final class ServerRequest
{
    public function __construct(
        private Uri $uri,
        private Stream $body,
        private array $serverParams = [],
        private string $method = '',
        private array $queryParams = [],
        private array $headers = [],
        private array $cookieParams = [],
        private ?array $parsedBody = null,
    ) {
    }

    public function getServerParams(): array
    {
        return $this->serverParams;
    }

    public function getUri(): Uri
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

    public function getBody(): Stream
    {
        return $this->body;
    }

    public function getParsedBody(): ?array
    {
        return $this->parsedBody;
    }
}
