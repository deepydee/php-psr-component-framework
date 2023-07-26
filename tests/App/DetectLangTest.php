<?php

declare(strict_types=1);

namespace Framework\Http\Message;

use PHPUnit\Framework\TestCase;

final class DetectLangTest extends TestCase
{
    public function testDefault(): void
    {
        $request = new ServerRequest(
            serverParams: [],
            uri: new Uri('/'),
            method: 'GET',
            queryParams: [],
            headers: [],
            cookieParams: [],
            body: new Stream(fopen('php://memory', 'r')),
            parsedBody: null,
        );

        $lang = detectLang($request, 'en');

        $this->assertEquals('en', $lang);
    }

    public function testQueryParam(): void
    {
        $request = new ServerRequest(
            serverParams: [],
            uri: new Uri('/'),
            method: 'GET',
            queryParams: ['lang' => 'de'],
            headers: ['Accept-Language' => 'ru-ru'],
            cookieParams: ['lang' => 'pt'],
            body: new Stream(fopen('php://memory', 'r')),
            parsedBody: null,
        );

        $lang = detectLang($request, 'en');

        $this->assertEquals('de', $lang);
    }
}
