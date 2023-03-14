<?php

declare(strict_types=1);

namespace App\Http\Webhooks;

use App\Processors\Base;
use App\Processors\Start;
use App\Processors\Text;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Stringable;
use LaravelLang\Publisher\Facades\Helpers\Locales;

class TelegraphHandler extends WebhookHandler
{
    public function start(): void
    {
        $this->setLocale();
        $this->process(Start::class);
    }

    protected function handleChatMessage(Stringable $text): void
    {
        $this->setLocale();

        if (! $this->hasMessage()) {
            $this->disallow();

            return;
        }

        DB::transaction(
            fn () => $this->process(Text::class)
        );
    }

    protected function hasMessage(): bool
    {
        return $this->request->has('message');
    }

    protected function disallow(): void
    {
        $this->chat->markdownV2(__('telegram.message_type_not_supported'));
    }

    protected function process(Base|string $processor): void
    {
        (new $processor($this->bot, $this->chat, $this->message))->handle();
    }

    protected function setLocale(): void
    {
        $locale = $this->message?->from()?->languageCode();

        if (! empty($locale) && $this->allowLocale($locale)) {
            app()->setLocale($locale);
        }
    }

    protected function allowLocale(string $locale): bool
    {
        return Locales::isInstalled($locale);
    }
}
