<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Sentry\Laravel\Integration;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        $this->sentry();
    }

    protected function sentry(): void
    {
        $this->reportable(
            fn (Throwable $e) => Integration::captureUnhandledException($e)
        );
    }
}
