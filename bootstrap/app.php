<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Temporarily exclude the contact form endpoint from CSRF validation to avoid
        // 419 errors in embedded/webview environments that block cookies.
        // NOTE: Consider removing this once the client is posting with cookies properly.
        $middleware->validateCsrfTokens(
            except: [
                'contact', // POST /contact
            ]
        );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
