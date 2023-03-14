<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Chat;
use Illuminate\Support\Arr;

class ChatObserver
{
    public function created(Chat $chat): void
    {
        $chat->name = $this->name($chat);
        $chat->saveQuietly();
    }

    protected function name(Chat $chat): string
    {
        return Arr::get($chat->info(), 'username', $chat->id);
    }
}
