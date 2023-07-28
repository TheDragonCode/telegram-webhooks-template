<?php

declare(strict_types=1);

namespace App\Http\Webhooks\Bots;

use App\Services\Processors\Base;
use App\Services\Processors\Start;
use App\Services\Processors\Text;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use Illuminate\Support\Stringable;

class ExampleBot extends WebhookHandler
{
    public function start(): void
    {
        $this->process(Start::class);
    }

    protected function handleChatMessage(Stringable $text): void
    {
        if (! $this->hasMessage()) {
            $this->disallow();

            return;
        }

        $this->process(Text::class);
    }

    protected function hasMessage(): bool
    {
        return $this->request->has('message');
    }

    protected function disallow(): void
    {
        $this->chat->html(__('telegram.message_type_not_supported'))->send();
    }

    protected function process(Base|string $processor): void
    {
        (new $processor($this->bot, $this->chat, $this->message))->handle();
    }
}
