<?php

declare(strict_types=1);

namespace App\Observers;

use DefStudio\Telegraph\Models\TelegraphBot;

class BotObserver
{
    public function created(TelegraphBot $bot): void
    {
        $bot->registerWebhook()->send();
    }

    public function deleted(TelegraphBot $bot): void
    {
        $bot->unregisterWebhook()->send();
    }
}
