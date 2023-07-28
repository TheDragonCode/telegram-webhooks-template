<?php

declare(strict_types=1);

use App\Models\Bot;
use DragonCode\LaravelActions\Action;

return new class extends Action {
    public function __invoke(): void
    {
        $this->create($this->token(), $this->name());
    }

    protected function create(string $token, string $name): void
    {
        Bot::create(compact('token', 'name'));
    }

    protected function token(): string
    {
        return config('telegraph.bot.token');
    }

    protected function name(): string
    {
        return config('telegraph.bot.name');
    }
};
