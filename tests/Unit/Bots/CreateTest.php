<?php

declare(strict_types=1);

use App\Models\Bot;
use DefStudio\Telegraph\Telegraph;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

it('check webhook registration when creating a bot', function () {
    httpFake();

    $bot = Bot::factory()->create();

    Http::assertSent(function (Request $request) use ($bot) {
        return Str::endsWith($request->url(), '/' . Telegraph::ENDPOINT_SET_WEBHOOK)
            && $request->data() === ['url' => webhook($bot)];
    });
});
