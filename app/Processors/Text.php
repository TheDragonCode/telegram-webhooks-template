<?php

declare(strict_types=1);

namespace App\Processors;

class Text extends Base
{
    public function handle(): void
    {
        $this->sendMessage(__('Text accepted for processing'));
    }
}
