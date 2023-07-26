<?php

declare(strict_types=1);

namespace App;

require_once '../vendor/autoload.php';

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
