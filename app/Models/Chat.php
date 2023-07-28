<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\ChatFactory;
use DefStudio\Telegraph\Database\Factories\TelegraphChatFactory;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Support\Arr;
use Throwable;

class Chat extends TelegraphChat
{
    protected static function newFactory(): TelegraphChatFactory
    {
        return ChatFactory::new();
    }

    public static function booted(): void
    {
        self::creating(function (TelegraphChat $chat) {
            try {
                $chat->name = Arr::get($chat->info(), 'username', "Chat #$chat->id");
            }
            catch (Throwable) {
                $chat->name = "Chat #$chat->id";
            }
        });

        self::created(fn (TelegraphChat $chat) => true);
    }
}
