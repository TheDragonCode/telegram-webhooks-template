<?php

declare(strict_types=1);

namespace App\Services\Processors;

class Start extends Base
{
    public function handle(): void
    {
        $this->chat->html(__('Welcome!'))->send();
    }
}
