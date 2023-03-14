<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class UnknownTest extends TestCase
{
    public function testStart(): void
    {
        $this->postJson($this->route('unknown'), $this->message('start'))->assertNotFound();
    }

    public function testSet(): void
    {
        $this->postJson($this->route('unknown'), $this->message('foo', false))->assertNotFound();
    }

    public function testDiff(): void
    {
        $this->postJson($this->route('unknown'), $this->message('diff'))->assertNotFound();
    }
}
