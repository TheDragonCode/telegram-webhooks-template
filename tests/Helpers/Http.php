<?php

declare(strict_types=1);

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

expect()->extend('toBeSent', function (string $uri) {
    Http::assertSent(function (Request $request) use ($uri) {
        return Str::endsWith($request->url(), "/$uri")
            && $request->data() === webhookSentContent($this->value);
    });

    return $this;
});

expect()->extend('toBeNotSent', function (string $uri) {
    Http::assertNotSent(function (Request $request) use ($uri) {
        return Str::endsWith($request->url(), "/$uri")
            && $request->data() === webhookSentContent($this->value);
    });

    return $this;
});
