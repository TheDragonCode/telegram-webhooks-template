<?php

namespace App\Http;

use App\Http\Middleware\PreventRequestsDuringMaintenance;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Middleware\HandleCors;
use Illuminate\Http\Middleware\SetCacheHeaders;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class Kernel extends HttpKernel
{
    protected $middleware = [
        HandleCors::class,
        PreventRequestsDuringMaintenance::class,
        ValidatePostSize::class,
    ];

    protected $middlewareGroups = [
        'web' => [
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            ShareErrorsFromSession::class,
            VerifyCsrfToken::class,
            SubstituteBindings::class,
        ],

        'api' => [
            ThrottleRequests::class . ':api',
            SubstituteBindings::class,
        ],
    ];

    protected $middlewareAliases = [
        'cache.headers' => SetCacheHeaders::class,
        'throttle'      => ThrottleRequests::class,
    ];
}
