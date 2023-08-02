<?php

declare(strict_types=1);

namespace App;

use Framework\Http\Message\Response;
use Framework\Http\Message\ServerRequest;
use Framework\Http\Message\Stream;

use function Framework\Http\emitResponseToSapi;

http_response_code(500);

require_once __DIR__ . '/../vendor/autoload.php';

### Page

function home(ServerRequest $request): Response
{
    $name = $request->getQueryParams()['name'] ?? 'Guest';

    if (!is_string($name)) {
        return new Response(statusCode: 400, headers: [], body: new Stream(fopen('php://memory', 'r')));
    }

    $lang = detectLang(request: $request, default: 'ru');

    return new Response(
        statusCode: 200,
        headers: [
            'Content-Type' => 'video/mp4',
            'X-Frame-Options' => 'DENY',
        ],
        body: new Stream(fopen(__DIR__ . '/../video/video.mp4', 'r'))
    );
}

### Grabbing
$request = createServerRequestFromGlobals();

# Running
$response = home($request);

#Sending

emitResponseToSapi($response);
