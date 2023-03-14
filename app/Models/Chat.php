<?php

declare(strict_types=1);

namespace App\Models;

use App\Services\Text;
use Database\Factories\ChatFactory;
use DefStudio\Telegraph\Database\Factories\TelegraphChatFactory;
use DefStudio\Telegraph\Models\TelegraphChat;
use DefStudio\Telegraph\Telegraph;
use Illuminate\Database\Eloquent\Relations\Relation;

class Chat extends TelegraphChat
{
    public function markdownV2(string $message): Telegraph
    {
        return parent::markdownV2(
            Text::resolve($message)
        );
    }

    protected static function newFactory(): TelegraphChatFactory
    {
        return ChatFactory::new();
    }
}
