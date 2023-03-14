<?php

declare(strict_types=1);

namespace App\Processors;

use App\Models\Bot;
use App\Models\Chat;
use App\Services\Formatter;
use DefStudio\Telegraph\DTO\Message;

abstract class Base
{
    public function __construct(
        protected Bot       $bot,
        protected Chat      $chat,
        protected Message   $message,
        protected Formatter $formatter = new Formatter()
    ) {
    }

    abstract public function handle(): void;

    protected function sendMessage(string $text): void
    {
        $this->chat->markdownV2($text)->send();
    }
}
