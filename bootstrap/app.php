<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Laravel\Sanctum\Http\Middleware\CheckAbilities;
use Laravel\Sanctum\Http\Middleware\CheckForAnyAbility;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'abilities' => CheckAbilities::class,
            'ability' => CheckForAnyAbility::class,
            'token.check' => App\Http\Middleware\CheckToken::class,
        ]);

        // add middleware to api group
        // Ini akan menerapkan middleware CheckToken ke semua route yang berada di dalam prefix 'api/'
        $middleware->group('api', [
            'token.check' => App\Http\Middleware\CheckToken::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        
    })->create();
