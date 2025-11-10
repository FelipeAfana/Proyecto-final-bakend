<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Entrada;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'Fecha' => 'required|date|after_or_equal:today',
            'Cantidad' => 'required|integer|min:1',
            'entrada_tipo' => 'required|string|in:general,fast_pass',

        ]);

        $userID = Auth::id();

        $atraccionID = 1;

        $entradaTipo = $request->entrada_tipo;
        $precioBuscado = ($entradaTipo == 'general') ? 45000 : 75000;


        $entradaObjeto = Entrada::where('Precio', $precioBuscado)
                                ->where('atraccion_id', $atraccionID) // Usa el ID 1 para buscar la entrada
                                ->first();

        if (!$entradaObjeto) {

            return redirect()->back()->with('error', 'Error: La configuración de tickets está incompleta. Verifique la tabla Entradas.');
        }

        $entradaID = $entradaObjeto->id;

        // Crear la Reserva
        try {
            Reserva::create([
                'Fecha' => $request->Fecha,
                'Hora_entrada' => Carbon::parse($request->Fecha)->startOfDay(),
                'Cantidad' => $request->Cantidad,
                'Estado' => 'Pendiente',
                'user_id' => $userID,
                'entrada_id' => $entradaID,

            ]);


            return redirect()->route('montaña')->with('success', true);

        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Error fatal al guardar. Revisa las llaves foráneas o el estado de la DB.');
        }
    }
}
