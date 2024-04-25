<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PsaPedidoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('dashboard')->group(function () {
    Route::get('PsaPedidos', [PsaPedidoController::class, 'index'])->name('psapedido.index');
    Route::post('PsaPedidos', [PsaPedidoController::class, 'store'])->name('psapedido.store');
    Route::get('PsaPedidos/create', [PsaPedidoController::class, 'create'])->name('psapedido.create');
    Route::get('PsaPedidos/{PsaPedido}/edit', [PsaPedidoController::class, 'edit'])->name('psapedido.edit');

});


require __DIR__.'/auth.php';
