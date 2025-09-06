<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresupuestoController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DashboardController;

// Redirigir la página principal al login
Route::get('/', function () {
    return redirect()->route('login');
});

// Ruta principal al dashboard (vista principal después del login)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {

    // Rutas visibles para todos los usuarios autenticados
    Route::resource('presupuestos', PresupuestoController::class);
    Route::resource('transacciones', TransaccionController::class);
    Route::resource('reportes', ReporteController::class);

    // Ruta para la gestión de usuarios (si aplica)
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');

    // Rutas exclusivas para rol "admin"
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', function () {
            return view('admin.panel'); // Recuerda crear esta vista
        })->name('admin.panel');

        Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios.index');
        Route::post('/admin/usuarios/{usuario}/rol', [UsuarioController::class, 'actualizarRol'])->name('admin.usuarios.actualizarRol');
    });
});

// Rutas de autenticación (login, registro, etc.)
require __DIR__ . '/auth.php';
