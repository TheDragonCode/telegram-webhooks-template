<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Chat;
use Tests\TestCase;

class Start extends TestCase
{
    public function testSuccess(): void
    {
        $this->assertDatabaseCount(Chat::class, 0);

        for ($i = 0; $i < 3; ++$i) {
            $this->postJson($this->route(), $this->message('start'))->assertSuccessful();
        }

        $this->assertDatabaseCount(Chat::class, 1);

        $this->httpAssertSentCount(3);
        $this->httpAssertSent(__('Welcome!'));
    }
}
