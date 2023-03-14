<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Bot;
use DefStudio\Telegraph\Database\Factories\TelegraphBotFactory;
use Illuminate\Support\Str;

class BotFactory extends TelegraphBotFactory
{
    protected $model = Bot::class;

    public function definition(): array
    {
        return [
            'token' => Str::uuid()->toString(),

            'name' => $this->faker->name(),
        ];
    }
}
