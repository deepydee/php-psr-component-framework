<?php

declare(strict_types=1);

namespace Framework\Http\Message;

final class Stream
{
    public function __construct(
        private mixed $resource
    ) {
    }

    public function seek(int $offset): void
    {
        fseek($this->resource, $offset);
    }

    public function rewind(): void
    {
        $this->seek(0);
    }

    public function read(int $length): string
    {
        return fread($this->resource, $length);
    }

    public function write(string $string): void
    {
        fwrite($this->resource, $string);
    }

    public function getContents(): string
    {
        return stream_get_contents($this->resource);
    }

    public function __toString(): string
    {
        $this->rewind();

        return $this->getContents();
    }
}
