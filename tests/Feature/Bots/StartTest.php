<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Chat;
use DefStudio\Telegraph\Telegraph;
use Illuminate\Support\Facades\Http;

use function Pest\Laravel\postJson;

it('should send a welcome text', function () {
    httpFake();

    $this->assertDatabaseCount(Chat::class, 0);

    $count = 3;

    for ($i = 0; $i < $count; $i++) {
        postJson(webhook(), webhookMessage('start'))->assertSuccessful();
    }

    $this->assertDatabaseCount(Chat::class, 1);

    expect(__('Welcome!'))->toBeSent(Telegraph::ENDPOINT_MESSAGE);

    Http::assertSentCount($count + 1);
});
