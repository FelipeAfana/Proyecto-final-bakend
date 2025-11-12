<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        // Verificar si el usuario está logueado
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Debes iniciar sesión para dejar un comentario.');
        }

        // Validación
        $request->validate([
            'contenido' => 'required|string|max:500',
            'atraccion_id' => 'required|exists:atracciones,id',
        ]);

        // Crear el comentario
        Comentario::create([
            'contenido' => $request->contenido,
            'user_id' => Auth::id(),
            'atraccion_id' => $request->atraccion_id,
        ]);


        return redirect()->back()->with('success_comment', 'Comentario publicado con éxito.');
    }
}
