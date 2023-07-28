<?php

declare(strict_types=1);

namespace App\Services\Processors;

use App\Models\Bot;
use App\Models\Chat;
use DefStudio\Telegraph\DTO\Message;

abstract class Base
{
    abstract public function handle(): void;

    public function __construct(
        protected Bot $bot,
        protected Chat $chat,
        protected Message $message,
    ) {}
}
