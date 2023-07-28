<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();

            $table->foreignId('telegraph_bot_id')->constrained('bots')->cascadeOnDelete();

            $table->string('chat_id');
            $table->string('name')->nullable();

            $table->timestamps();

            $table->unique(['chat_id', 'telegraph_bot_id']);
        });
    }
};
