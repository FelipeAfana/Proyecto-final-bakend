<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VistasController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\PagoController;
use Illuminate\Support\Facades\Auth;

// Vistas principales
Route::get('/', [VistasController::class, 'inicio'])->name('inicio');
Route::get('/promo', [VistasController::class, 'promo'])->name('promo');
Route::get('/atracciones', [VistasController::class, 'atrac'])->name('atracciones');

Route::prefix("atracciones")->controller(VistasController::class)->group(function(){
    Route::get("montaña", "montaña")->name('montaña');
    Route::get("rueda", "rueda")->name('rueda');
    Route::get("barco", "barco")->name('barco');
    Route::get("carro", "carro")->name('carro');
});

// Rutas protegidas
Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store')->middleware('auth');
Route::post('/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store')->middleware('auth');
Route::get('/misreservas', [ReservaController::class, 'showMisReservas'])->name('misreservas')->middleware('auth');

// Pasarela de pago
Route::get('/pago', [PagoController::class, 'index'])->name('pasarela');

// Autenticación
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
