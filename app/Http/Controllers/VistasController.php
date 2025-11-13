<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atraccion;
use Illuminate\Support\Facades\Log;

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
        $atraccion = null;

        try {

            $atraccion = Atraccion::with(['comentarios.user'])
                                 ->find($atraccionId);

            if (!$atraccion) {

                throw new \Exception("La atracción con ID {$atraccionId} no existe en la base de datos.");
            }

        } catch (\Exception $e) {

            Log::error("Error al cargar la atracción #{$atraccionId}: " . $e->getMessage());


            return view('vistas.atracciones.montaña', compact('atraccion'))
                       ->with('error', 'Atracción no encontrada o error de conexión a DB. Mensaje: ' . $e->getMessage());
        }


        return view('vistas.atracciones.montaña', compact('atraccion'));
    }

    function barco() {
        $atraccionId = 3; // Ajusta este ID al barco real
        $atraccion = Atraccion::with(['comentarios.user'])->find($atraccionId);
        return view('vistas.atracciones.barco', compact('atraccion'));
    }

    function rueda() {
        $atraccionId = 2; // Ajusta este ID a la rueda real
        $atraccion = Atraccion::with(['comentarios.user'])->find($atraccionId);
        return view('vistas.atracciones.rueda', compact('atraccion'));
    }

    function carro() {
        $atraccionId = 4; // Ajusta este ID al carro real
        $atraccion = Atraccion::with(['comentarios.user'])->find($atraccionId);
        return view('vistas.atracciones.carros', compact('atraccion'));
    }
}
