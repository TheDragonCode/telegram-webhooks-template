<?php

namespace Database\Seeders;

use App\Models\Bot;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Bot::factory()->create();
    }
}
