@extends('layouts.app')

@section('content')
<div class="container" style="padding: 40px; background-color: #f7f7f7; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
    <h1 style="color: #4A4A4A; border-bottom: 3px solid #7C2FE6; padding-bottom: 15px; margin-bottom: 30px; font-weight: 700;">
        Mis Reservas 🎟️
    </h1>

    {{-- Bloque de Alerta si no hay reservas --}}
    @if ($reservas->isEmpty())
        <div style="background-color: #fff3cd; color: #856404; padding: 20px; border: 1px solid #ffeeba; border-radius: 8px; text-align: center; font-size: 1.1rem;">
            Aún no tienes ninguna reserva activa. ¡Explora nuestras atracciones y reserva tu diversión!
        </div>
    @else
        {{-- Tabla de Reservas --}}
        <div class="table-responsive" style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);">
            <table class="table" style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #7C2FE6; color: white; text-align: left;">
                        <th style="padding: 15px; border-bottom: 2px solid #5d22b2;">Atracción</th>
                        {{-- Se mantiene la columna Fecha para mostrar la Fecha y Hora en un solo campo --}}
                        <th style="padding: 15px; border-bottom: 2px solid #5d22b2;">Fecha y Hora</th>
                        <th style="padding: 15px; border-bottom: 2px solid #5d22b2;">Entrada</th>
                        <th style="padding: 15px; border-bottom: 2px solid #5d22b2;">Cantidad</th>
                        <th style="padding: 15px; border-bottom: 2px solid #5d22b2;">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservas as $reserva)
                    <tr style="border-bottom: 1px solid #eee;">

                        {{-- CAMBIO CLAVE: ACCESO ANIDADO A TRAVÉS DE ENTRADA --}}
                        <td style="padding: 15px;">
                            <strong>
                                {{-- Si $reserva->entrada->atraccion existe, muestra su Nombre. Si no, muestra 'Salitre Magico'. --}}
                                {{ $reserva->entrada?->atraccion?->Nombre ?? 'Salitre Mágico' }}
                            </strong>
                        </td>

                        {{-- CAMBIO CLAVE: Se formatea Hora_entrada para mostrar Fecha y Hora --}}
                        <td style="padding: 15px;">
                            {{ \Carbon\Carbon::parse($reserva->Hora_entrada)->format('d/M/Y H:i') }}
                        </td>

                        {{-- Se asume que en el modelo Entrada tienes un campo 'Tipo' con T mayúscula --}}
                        <td style="padding: 15px;">
                            {{ $reserva->entrada?->Tipo ?? 'General' }}
                        </td>

                        <td style="padding: 15px;">{{ $reserva->Cantidad }}</td>

                        <td style="padding: 15px;">
                            {{-- Se usa Hora_entrada para la verificación del pasado --}}
                            @if (\Carbon\Carbon::parse($reserva->Hora_entrada)->isPast())
                                <span style="color: #dc3545; font-weight: bold;">Finalizada</span>
                            @else
                                <span style="color: #28a745; font-weight: bold;">Activa</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
