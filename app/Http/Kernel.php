<?php

namespace App\Http;


use Spatie\Permission\Middlewares\RoleMiddleware;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use Spatie\Permission\Middlewares\RoleOrPermissionMiddleware;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Global middleware
    ];

    protected $middlewareGroups = [
        'web' => [
            // Web middleware
            \App\Http\Middleware\SetLocale::class,  
        ],

        'api' => [
            'throttle:api',
            'bindings',
        ],
    ];

    // protected $routeMiddleware = [
    //     'auth' => \App\Http\Middleware\Authenticate::class,
    //     'admin' => \App\Http\Middleware\AdminMiddleware::class, // Register admin middleware

    //     'role' => RoleMiddleware::class,

    //     'permission' => PermissionMiddleware::class,

    //     'role_or_permission' => RoleOrPermissionMiddleware::class,
    //     // Other middleware
    // ];

    protected $middlewareAliases = [
        'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
        'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
        'role_or_permission' => \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class,

    ];
}
