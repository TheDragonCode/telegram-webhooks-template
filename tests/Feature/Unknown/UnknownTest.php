<?php

declare(strict_types=1);

namespace Tests\Feature;

use function Pest\Laravel\postJson;

it('checks if the command was sent on behalf of the bot', function () {
    postJson(webhook('unknown'), webhookMessage('start'))->assertNotFound();
});

it('checks if the command was sent on behalf of the user', function () {
    postJson(webhook('unknown'), webhookMessage('start', false))->assertNotFound();
});

it('checks if text is sent on behalf of the bot', function () {
    postJson(webhook('unknown'), webhookMessage('text'))->assertNotFound();
});

it('checks if text is sent on behalf of the user', function () {
    postJson(webhook('unknown'), webhookMessage('start', false))->assertNotFound();
});
