<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckRole; // Importamos tu middleware personalizado

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Aquí puedes definir middlewares globales si deseas:
        // $middleware->append(\App\Http\Middleware\AnotherMiddleware::class);

        // Alias para usar middlewares por nombre en rutas
        $middleware->alias([
            'role' => CheckRole::class, // Aquí registramos el alias "role"
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Puedes personalizar la gestión de excepciones aquí si lo necesitas
    })
    ->create();
