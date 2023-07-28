<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Bot;
use App\Models\Chat;
use DefStudio\Telegraph\Telegraph;
use Illuminate\Support\Facades\Http;

use function Pest\Laravel\postJson;

it('should send a welcome text', function () {
    httpFake();

    $bot = Bot::factory()->create();

    httpFake();

    $this->assertDatabaseCount(Chat::class, 0);

    $count = 3;

    for ($i = 0; $i < $count; ++$i) {
        postJson(webhook($bot), webhookMessage('start'))->assertSuccessful();
    }

    $this->assertDatabaseCount(Chat::class, 1);

    expect(__('Welcome!'))->toBeNotSent(Telegraph::ENDPOINT_MESSAGE);

    Http::assertSentCount($count + 1);
});
