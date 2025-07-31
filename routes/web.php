<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresupuestoController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\UsuarioController;


#Route::get('/', function () {
#   return redirect()->route('/register');
#});
Route::middleware(['auth', 'role:admin'])->get('/admin', function () {
    return view('admin.panel'); // Crea esta vista luego
})->name('admin.panel');


// Rutas compartidas para administradores y contadores
Route::middleware(['auth', 'role:admin,contador'])->group(function () {
    Route::get('/presupuestos', [PresupuestoController::class, 'index'])->name('presupuestos.index');
    Route::get('/transacciones', [TransaccionController::class, 'index'])->name('transacciones.index');
    Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/presupuestos', [PresupuestoController::class, 'index'])->name('presupuestos.index');
    Route::get('/transacciones', [TransaccionController::class, 'index'])->name('transacciones.index');
    Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios.index');
    Route::post('/admin/usuarios/{usuario}/rol', [UsuarioController::class, 'actualizarRol'])->name('admin.usuarios.actualizarRol');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
Route::get('/transacciones', function () {
    return view('transacciones.index');
})->middleware(['auth'])->name('transacciones.index');

Route::middleware(['auth'])->group(function () {
    Route::resource('transacciones', TransaccionController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('presupuestos', PresupuestoController::class);
});

Route::resource('reportes', App\Http\Controllers\ReporteController::class)->middleware(['auth']);
