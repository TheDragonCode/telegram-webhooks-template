<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Chat;
use Tests\TestCase;

class Text extends TestCase
{
    public function testCount(): void
    {
        $this->assertDatabaseCount(Chat::class, 0);

        for ($i = 0; $i < 3; ++$i) {
            $this->postJson($this->route(), $this->message('09:12', false))->assertSuccessful();
        }

        $this->assertDatabaseCount(Chat::class, 1);

        $this->httpAssertSentCount(3);
        $this->httpAssertSent(__('Text accepted for processing'));
    }
}
