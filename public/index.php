<?php

declare(strict_types=1);

namespace App;

use Framework\Http\Message\ServerRequest;

http_response_code(500);

require_once __DIR__ . '/../vendor/autoload.php';

### Page

/**
 * @return array{statusCode: int, headers: array<string, string>, body: string}
 */
function home(ServerRequest $request): array
{
    $name = $request->getQueryParams()['name'] ?? 'Guest';

    if (!is_string($name)) {
        return [
            'statusCode' => 400,
            'headers' => [],
            'body' => '',
        ];
    }

    $lang = detectLang(request: $request, default: 'ru');

    return [
        'statusCode' => 200,
        'headers' => [
            'Content-Type' => 'text/plain; charset=utf-8',
            'X-Frame-Options' => 'DENY',
        ],
        'body' => 'Hello, ' . $name . '! Your lang is ' . $lang
    ];
}

### Grabbing
$request = createServerRequestFromGlobals();

# Running
$response = home($request);

#Sending

http_response_code($response['statusCode']);

foreach ($response['headers'] as $name => $value) {
    header($name . ': ' . $value);
}

echo $response['body'];
