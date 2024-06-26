<?php

namespace App\Http;


use Spatie\Permission\Middlewares\RoleMiddleware;
use App\Http\Middleware\LocalizationMiddleware;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use Spatie\Permission\Middlewares\RoleOrPermissionMiddleware;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Global middleware
        \App\Http\Middleware\LocalizationMiddleware::class,
    ];

    protected $middlewareGroups = [
        'web' => [
            // Web middleware
        ],

        'api' => [
            'throttle:api',
            'bindings',
        ],
    ];

    protected $middlewareAliases = [
        'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
        'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
        'role_or_permission' => \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class,
    ];
}
