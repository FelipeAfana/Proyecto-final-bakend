<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index(Request $request)
    {
        // Recibe el total desde la URL (no se guardan datos)
        $total = $request->input('total', 0);

        // Asegurar que el total sea numérico
        $total = is_numeric($total) ? (float) $total : 0;

        // Retorna la vista correcta de la carpeta vistas
        return view('vistas.pasarelapagos', compact('total'));
    }
}


