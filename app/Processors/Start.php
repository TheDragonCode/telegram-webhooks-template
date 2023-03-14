<?php

declare(strict_types=1);

namespace App\Processors;

class Start extends Base
{
    public function handle(): void
    {
        $this->sendMessage($this->message());
    }

    protected function message(): string
    {
        return __('Welcome!');
    }
}
