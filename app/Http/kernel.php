<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{

    /**
     * Middlewares pour des groupes de routes (comme `web` ou `api`).
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            
        ],
    ];

    /**
     * Les middlewares spécifiques aux routes.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

    ];
}
