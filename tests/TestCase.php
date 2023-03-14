<?php

namespace Tests;

use App\Models\Bot;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Str;
use Tests\Fixtures\HttpClient;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;
    use HttpClient;

    protected bool $seed = true;

    protected int $chatId = 123;

    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpHttpClient();
    }

    protected function route(?string $token = null): string
    {
        return route('telegraph.webhook', $token ?: Bot::first());
    }

    protected function message(string|int $text, bool $isCommand = true): array
    {
        return [
            'message'   => [
                'chat'       => [
                    'id'         => $this->chatId,
                    'type'       => 'private',
                    'username'   => fake()->userName,
                    'first_name' => fake()->firstName,
                    'last_name'  => fake()->lastName,
                ],
                'from'       => [
                    'id'         => $this->chatId,
                    'is_bot'     => false,
                    'username'   => fake()->userName,
                    'first_name' => fake()->firstName,
                    'last_name'  => fake()->lastName,
                ],
                'text'       => $isCommand ? Str::start($text, '/') : $text,
                'entities'   => $isCommand ? [
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
}
