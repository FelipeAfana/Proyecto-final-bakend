<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atraccion;

class VistasController extends Controller
{
    function inicio(){
        return view("vistas.inicio");
    }

    function atrac() {
        return view('vistas.atracciones');
    }

    function promo() {
        return view('vistas.promo');
    }

    function montaña() {
        $atraccionId = 1;

        try {
            $atraccion = Atraccion::with(['comentarios.user'])
                                ->findOrFail($atraccionId);

            return view('vistas.atracciones.montaña', compact('atraccion'));

        } catch (\Exception $e) {
            return view('vistas.atracciones.montaña')->with('error', 'Atracción no encontrada o error de conexión a DB.');
        }
    }

    function barco() {

        return view('vistas.atracciones.barco');
    }

    function rueda() {

        return view('vistas.atracciones.rueda');
    }

    function carro() {
        return view('vistas.atracciones.carros');
    }
}
