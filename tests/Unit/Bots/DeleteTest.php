<?php

declare(strict_types=1);

use App\Models\Bot;
use DefStudio\Telegraph\Telegraph;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

it('check webhook registration when deleting a bot', function () {
    httpFake();

    $bot = Bot::factory()->create();

    $bot->delete();

    Http::assertSent(function (Request $request) {
        return Str::endsWith($request->url(), '/' . Telegraph::ENDPOINT_UNSET_WEBHOOK)
            && $request->data() === ['drop_pending_updates' => false];
    });
});
