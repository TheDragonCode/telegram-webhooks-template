<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Chat;
use DefStudio\Telegraph\Telegraph;
use Illuminate\Support\Facades\Http;

use function Pest\Laravel\postJson;

it('should send information about the invalid message', function () {
    httpFake();

    $this->assertDatabaseCount(Chat::class, 0);

    $count = 3;

    for ($i = 0; $i < $count; $i++) {
        postJson(webhook(), webhookMessage('09:12', false))->assertSuccessful();
    }

    $this->assertDatabaseCount(Chat::class, 1);

    expect(__('Text accepted for processing'))->toBeSent(Telegraph::ENDPOINT_MESSAGE);

    Http::assertSentCount($count + 4);
});
