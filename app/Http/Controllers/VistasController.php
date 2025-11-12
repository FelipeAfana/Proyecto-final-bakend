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
        $atraccion = null; // Inicializamos a null para evitar 'Undefined variable' en caso de error

        try {
            // Buscamos la atracción, precargando comentarios y usuarios
            $atraccion = Atraccion::with(['comentarios.user'])
                                 ->find($atraccionId);

            if (!$atraccion) {
                // Generamos una excepción si el ID no existe
                throw new \Exception("La atracción con ID {$atraccionId} no existe en la base de datos.");
            }

        } catch (\Exception $e) {
            // Si hay un error (no encontrada o error de DB), registramos y continuamos
            Log::error("Error al cargar la atracción #{$atraccionId}: " . $e->getMessage());

            // Pasamos $atraccion = null (del valor inicial) a la vista,
            // y adjuntamos el mensaje de error.
            return view('vistas.atracciones.montaña', compact('atraccion'))
                       ->with('error', 'Atracción no encontrada o error de conexión a DB. Mensaje: ' . $e->getMessage());
        }

        // Si la atracción se cargó correctamente, la pasamos a la vista
        return view('vistas.atracciones.montaña', compact('atraccion'));
    }

    function barco() {
        $atraccionId = 3; // ID del Barco
        $atraccion = null; // Inicialización

        try {
            // Buscamos la atracción, precargando comentarios y usuarios
            $atraccion = Atraccion::with(['comentarios.user'])
                                 ->find($atraccionId);

            if (!$atraccion) {
                // Generamos una excepción si el ID no existe
                throw new \Exception("La atracción con ID {$atraccionId} no existe en la base de datos.");
            }

        } catch (\Exception $e) {
            // Si hay un error (no encontrada o error de DB), registramos y continuamos
            Log::error("Error al cargar la atracción #{$atraccionId} (Barco): " . $e->getMessage());

            // Pasamos $atraccion = null a la vista con el mensaje de error.
            return view('vistas.atracciones.barco', compact('atraccion'))
                       ->with('error', 'Atracción Barco no encontrada o error de conexión a DB. Mensaje: ' . $e->getMessage());
        }

        // Si la atracción se cargó correctamente, la pasamos a la vista
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
