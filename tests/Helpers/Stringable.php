<?php

declare(strict_types=1);

use Illuminate\Support\Str;
use PHPUnit\Framework\Assert;

expect()->extend('toBeUrl', function (string $message = '') {
    Assert::assertTrue(Str::isUrl($this->value), $message);

    return $this;
});
