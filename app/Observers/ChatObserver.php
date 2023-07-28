<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Chat;
use Illuminate\Support\Arr;
use Throwable;

class ChatObserver
{
    public function creating(Chat $chat): void
    {
        $chat->name = $this->name($chat);
    }

    protected function name(Chat $chat): string
    {
        try {
            return Arr::get($chat->info(), 'username', $chat->id);
        }
        catch (Throwable) {
            return $chat->name;
        }
    }
}
