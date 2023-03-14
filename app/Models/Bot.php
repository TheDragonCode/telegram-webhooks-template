<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\BotFactory;
use DefStudio\Telegraph\Database\Factories\TelegraphBotFactory;
use DefStudio\Telegraph\Models\TelegraphBot;

class Bot extends TelegraphBot
{
    protected static function newFactory(): TelegraphBotFactory
    {
        return BotFactory::new();
    }
}
