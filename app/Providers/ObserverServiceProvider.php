<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Bot;
use App\Observers\BotObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Bot::observe(BotObserver::class);
    }
}
