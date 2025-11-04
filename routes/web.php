<?php

use App\Http\Controllers\VistasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('vistas.inicio');
});

Route::get('/promo', [VistasController::class, 'promo'])->name('promo');

Route::get('/atracciones', [VistasController::class, 'atrac'])->name('atracciones');

Route::get('/inicio', [VistasController::class, 'inicio'])->name('inicio');

Route::prefix("atracciones")->controller(VistasController::class) ->group(function(){
    Route::get("/montaña", "montaña")->name('montaña');
});
