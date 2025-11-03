<?php

use App\Http\Controllers\VistasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('vistas.inicio');
});
Route::get('/atracciones', [VistasController::class, 'atrac'])->name('atracciones');
