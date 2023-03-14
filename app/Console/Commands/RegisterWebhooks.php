<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Bot;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;

class RegisterWebhooks extends Command
{
    protected $signature = 'bots:register-webhooks';

    protected $description = 'Update bots webhooks';

    public function handle(): void
    {
        $this->bots()->each(
            fn (Bot $bot) => $bot->registerWebhook()->send()
        );
    }

    protected function bots(): Collection
    {
        return Bot::get();
    }
}
