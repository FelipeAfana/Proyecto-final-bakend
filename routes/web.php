<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VistasController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ComentarioController;
use Illuminate\Support\Facades\Auth;


// Rutas de Vistas GET
Route::get('/', [VistasController::class, 'inicio'])->name('inicio');
Route::get('/promo', [VistasController::class, 'promo'])->name('promo');
Route::get('/atracciones', [VistasController::class, 'atrac'])->name('atracciones');

Route::prefix("atracciones")->controller(VistasController::class)->group(function(){
    Route::get("montaña", "montaña")->name('montaña');
    Route::get("rueda", "rueda")->name('rueda');
    Route::get("barco", "barco")->name('barco');
    Route::get("carro", "carro")->name('carro');
});


Route::post('/reservas', [ReservaController::class, 'store'])
    ->name('reservas.store')
    ->middleware('auth');

Route::post('/comentarios', [ComentarioController::class, 'store'])
    ->name('comentarios.store')
    ->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
