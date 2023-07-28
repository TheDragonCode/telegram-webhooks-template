<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

use App\Models\Bot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Tests\TestCase;

uses(
    TestCase::class,
    RefreshDatabase::class,
)->in('Feature', 'Unit');

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function httpFake(): void
{
    Http::fake(fn () => Http::response());
}

function webhook(Bot|string|null $token = null): string
{
    return route('telegraph.webhook', [
        'token' => $token ?? Bot::first(),
    ]);
}

function webhookMessage(int|string $text, bool $isCommand = true): array
{
    return [
        'message' => [
            'chat' => [
                'id'         => 12345,
                'type'       => 'private',
                'username'   => fake()->userName,
                'first_name' => fake()->firstName,
                'last_name'  => fake()->lastName,
            ],
            'from' => [
                'id'         => fake()->randomNumber(),
                'is_bot'     => false,
                'username'   => fake()->userName,
                'first_name' => fake()->firstName,
                'last_name'  => fake()->lastName,
            ],
            'text'     => $isCommand ? Str::start($text, '/') . ' qwerty' : $text,
            'entities' => $isCommand ? [
                [
                    'type'   => 'bot_command',
                    'length' => Str::length($text) + 1,
                    'offset' => 0,
                ],
            ] : [],
            'message_id' => fake()->randomNumber(),
            'date'       => now()->timestamp,
        ],
        'update_id' => fake()->randomNumber(),
    ];
}

function webhookSentContent(string $text): array
{
    return [
        'text'       => $text,
        'chat_id'    => '12345',
        'parse_mode' => 'html',
    ];
}
