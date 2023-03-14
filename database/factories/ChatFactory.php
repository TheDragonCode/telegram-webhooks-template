<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Chat;
use DefStudio\Telegraph\Database\Factories\TelegraphChatFactory;

class ChatFactory extends TelegraphChatFactory
{
    protected $model = Chat::class;

    public function definition(): array
    {
        return [
            'telegraph_bot_id' => $this->faker->randomNumber(),

            'chat_id' => $this->faker->randomNumber(3),

            'name' => $this->faker->name(),
        ];
    }
}
