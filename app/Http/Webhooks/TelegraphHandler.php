<?php

declare(strict_types=1);

namespace App\Http\Webhooks;

use DefStudio\Telegraph\Handlers\EmptyWebhookHandler;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use LaravelLang\Publisher\Facades\Helpers\Locales;

class TelegraphHandler extends WebhookHandler
{
    protected string $default = EmptyWebhookHandler::class;

    public function handle(Request $request, TelegraphBot $bot): void
    {
        $this->setLocale();
        $this->callHandler($request, $bot);
    }

    protected function callHandler(Request $request, TelegraphBot $bot): void
    {
        $handler = $this->detectHandler($bot);

        (new $handler())->handle($request, $bot);
    }

    protected function detectHandler(TelegraphBot $bot): string|WebhookHandler
    {
        $class = 'App\Http\Webhooks\Bots\\' . $this->botClassName($bot);

        return class_exists($class) ? $class : $this->default;
    }

    protected function botClassName(TelegraphBot $bot): string
    {
        return Str::of($bot->name)->trim()->studly()->toString();
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
