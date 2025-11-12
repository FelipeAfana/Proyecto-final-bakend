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
        // Validacion de los datos del formulario
        $request->validate([
            'Fecha' => 'required|date|after_or_equal:today',
            'Hora' => 'required|date_format:H:i|after_or_equal:09:00|before_or_equal:18:00',
            'Cantidad' => 'required|integer|min:1',
            'entrada_tipo' => 'required|string|in:general,fast_pass',
            'atraccion_id' => 'required|integer',
        ]);

        $userID = Auth::id();
        $atraccionID = $request->atraccion_id;


        $dateTimeReserva = Carbon::parse($request->Fecha . ' ' . $request->Hora);


        $entradaTipo = $request->entrada_tipo;
        $precioBuscado = ($entradaTipo == 'general') ? 45000 : 75000;


        $entradaObjeto = Entrada::where('Precio', $precioBuscado)
                                ->where('atraccion_id', $atraccionID)
                                ->first();

        if (!$entradaObjeto) {
            return redirect()->back()->with('error', 'Error: La configuración de tickets está incompleta. Verifique la tabla Entradas.');
        }

        $entradaID = $entradaObjeto->id;

        // aqui se Crea la Reserva
        try {
            Reserva::create([
                'Fecha' => $request->Fecha,
                'Hora_entrada' => $dateTimeReserva,
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
