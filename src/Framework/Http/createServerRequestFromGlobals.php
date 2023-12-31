<?php

declare(strict_types=1);

use Framework\Http\Message\ServerRequest;
use Framework\Http\Message\Stream;
use Framework\Http\Message\Uri;

function createServerRequestFromGlobals(
    mixed $input = null,
    ?array $server = null,
    ?array $query = null,
    ?array $cookie = null,
    ?array $body = null,
): ServerRequest {
    $server ??= $_SERVER;

    $headers = [
        'Content-Type' => $server['CONTENT_TYPE'],
        'Content-Length' => $server['CONTENT_LENGTH'],
    ];

    foreach ($server as $serverName => $serverValue) {
        if (str_starts_with($serverName, 'HTTP_')) {
            $name = ucwords(strtolower(str_replace('_', '-', substr($serverName, 5))), '-');
            $headers[$name] = $serverValue;
        }
    }

    return new ServerRequest(
        serverParams: $server,
        uri: new Uri(
            (!empty($server['HTTPS']) ? 'https' : 'http') . '://' . $server['HTTP_HOST'] . $server['REQUEST_URI']
        ),
        method: $server['REQUEST_METHOD'],
        queryParams: $query ?? $_GET,
        cookieParams: $cookie ?? $_COOKIE,
        body: new Stream($input ?? fopen('php://input', 'r')),
        parsedBody: $body ?? ($_POST ?: null),
        headers: $headers,
    );
}
