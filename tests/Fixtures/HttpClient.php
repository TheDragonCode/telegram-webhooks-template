<?php

declare(strict_types=1);

namespace Tests\Fixtures;

use App\Models\Bot;
use App\Services\Text;
use DefStudio\Telegraph\Telegraph;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

trait HttpClient
{
    protected function setUpHttpClient(): void
    {
        Http::fake(fn () => Http::response());
    }

    protected function httpAssertSentCount(int $count): void
    {
        Http::assertSentCount($count);
    }

    protected function httpAssertSent(string $message): void
    {
        Http::assertSent(function (Request $request) use ($message) {
            return $request->url() == $this->telegramUrl(Telegraph::ENDPOINT_MESSAGE)
                // && dump([$request->body(), $this->telegramContent($message)])
                && $request->body() == $this->telegramContent($message);
        });
    }

    protected function telegramUrl(string $uri): string
    {
        $bot = Bot::first();

        return sprintf('%sbot%s/%s', config('telegraph.telegram_api_url'), $bot->token, $uri);
    }

    protected function telegramContent(string $text): string
    {
        return json_encode([
            'text'       => Text::resolve($text),
            'chat_id'    => (string) $this->chatId,
            'parse_mode' => 'MarkdownV2',
        ]);
    }
}
