<?php

declare(strict_types=1);

use Framework\Http\Message\ServerRequest;

require_once '../vendor/autoload.php';


function detectLang(
    ServerRequest $request,
    string $default = 'en',
): string {
    if (!empty($request->getQueryParams()['lang']) && is_string($request->getQueryParams()['lang'])) {
        return $request->getQueryParams()['lang'];
    }

    if (!empty($request->getParsedBody()['lang']) && is_string($request->getParsedBody()['lang'])) {
        return $request->getParsedBody()['lang'];
    }

    if (!empty($request->getCookieParams()['lang'])) {
        return $request->getCookieParams()['lang'];
    }

    if (!empty($request->getHeaders()['Accept-Language'])) {
        return substr($request->getHeaders()['Accept-Language'], 0, 2);
    }

    return $default;
}

$request = createServerRequestFromGlobals();

http_response_code(500);

$name = $request->getQueryParams()['name'] ?? 'Guest';

if (!is_string($name)) {
    http_response_code(400);
    exit;
}

$lang = detectLang(request: $request, default: 'ru');

http_response_code(200);
header('content-Type: text/plain; charset=utf-8');
header('X-Frame-Options: DENY');

echo 'Hello, ' . $name . '! Your lang is ' . $lang;
