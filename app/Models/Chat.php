<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\ChatFactory;
use DefStudio\Telegraph\Database\Factories\TelegraphChatFactory;
use DefStudio\Telegraph\Models\TelegraphChat;

class Chat extends TelegraphChat
{
    protected static function newFactory(): TelegraphChatFactory
    {
        return ChatFactory::new();
    }
}
