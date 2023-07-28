<?php

declare(strict_types=1);

namespace App\Services\Processors;

use DefStudio\Telegraph\Enums\ChatActions;

class Text extends Base
{
    public function handle(): void
    {
        $this->chat->action(ChatActions::TYPING)->send();
        $this->chat->html(__('Text accepted for processing'))->send();
    }
}
