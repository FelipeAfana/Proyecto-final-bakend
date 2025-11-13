@extends('layouts.app')

@section('content')
<div class="container" style="padding: 40px; background-color: #f9f9fc; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); font-family: 'Segoe UI', sans-serif;">
    <h1 style="color: #3e3e3e; border-bottom: 4px solid #7C2FE6; padding-bottom: 12px; margin-bottom: 30px; font-weight: 700;">
        Mis Reservas 🎟️
    </h1>

    {{-- Bloque de Alerta si no hay reservas --}}
    @if ($reservas->isEmpty())
        <div style="background-color: #fff3cd; color: #856404; padding: 20px; border: 1px solid #ffeeba; border-radius: 10px; text-align: center; font-size: 1.1rem;">
            Aún no tienes ninguna reserva activa. ¡Explora nuestras atracciones y reserva tu diversión!
        </div>
    @else
        {{-- Tabla de Reservas --}}
        <div class="table-responsive" style="background-color: white; padding: 25px; border-radius: 10px; box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);">
            <table class="table" style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: linear-gradient(90deg, #7C2FE6, #9c4df5); color: white; text-align: left;">
                        <th style="padding: 15px;">Atracción</th>
                        <th style="padding: 15px;">Fecha y Hora</th>
                        <th style="padding: 15px;">Entrada</th>
                        <th style="padding: 15px;">Cantidad</th>
                        <th style="padding: 15px;">Precio Total</th>
                        <th style="padding: 15px;">Estado</th>
                        <th style="padding: 15px; text-align: center;">Seleccionar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservas as $reserva)
                    @php
                        // Suponiendo que tienes un campo precio_unitario o puedes ajustar este cálculo
                        $precioTotal = ($reserva->entrada->Precio ?? 50000) * $reserva->Cantidad;
                    @endphp
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 15px;"><strong>{{ $reserva->entrada?->atraccion?->Nombre ?? 'Atracción' }}</strong></td>
                        <td style="padding: 15px;">{{ \Carbon\Carbon::parse($reserva->Hora_entrada)->format('d/M/Y H:i') }}</td>
                        <td style="padding: 15px;">{{ $reserva->entrada?->Tipo ?? 'General' }}</td>
                        <td style="padding: 15px;">{{ $reserva->Cantidad }}</td>
                        <td style="padding: 15px; font-weight:bold;">${{ number_format($precioTotal, 0, ',', '.') }}</td>
                        <td style="padding: 15px;">
                            @if (\Carbon\Carbon::parse($reserva->Hora_entrada)->isPast())
                                <span style="color: #dc3545; font-weight: bold;">Finalizada</span>
                            @else
                                <span style="color: #28a745; font-weight: bold;">Activa</span>
                            @endif
                        </td>
                        <td style="padding: 15px; text-align: center;">
                            <button
                                class="btn-seleccionar"
                                data-id="{{ $reserva->id }}"
                                data-precio="{{ $precioTotal }}"
                                style="background-color: #e0e0e0; color: #333; border: none; padding: 8px 18px; border-radius: 20px; cursor: pointer; font-weight: 600; transition: all 0.3s ease;">
                                Seleccionar
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Botón de pagar al final --}}
        <div style="text-align: center; margin-top: 35px;">
            <form id="formPagar" action="{{ route('pasarela') }}" method="GET">
                <input type="hidden" name="ids" id="inputIds">
                <input type="hidden" name="total" id="inputTotal">
                <button
                    type="submit"
                    id="btnPagar"
                    style="background: linear-gradient(90deg, #7C2FE6, #9c4df5); color: white; border: none; padding: 15px 40px; font-size: 1.1rem; border-radius: 30px; font-weight: 700; cursor: pointer; transition: all 0.3s ease;">
                    💸 Pagar Seleccionados
                </button>
            </form>
        </div>

        {{-- Lógica JS --}}
        <script>
            const seleccionados = new Map();

            document.querySelectorAll('.btn-seleccionar').forEach(btn => {
                btn.addEventListener('click', () => {
                    const id = btn.dataset.id;
                    const precio = parseFloat(btn.dataset.precio);

                    if (seleccionados.has(id)) {
                        seleccionados.delete(id);
                        btn.style.backgroundColor = '#e0e0e0';
                        btn.style.color = '#333';
                        btn.textContent = 'Seleccionar';
                    } else {
                        seleccionados.set(id, precio);
                        btn.style.backgroundColor = '#7C2FE6';
                        btn.style.color = 'white';
                        btn.textContent = 'Seleccionado';
                    }
                });
            });

            document.getElementById('formPagar').addEventListener('submit', (e) => {
                if (seleccionados.size === 0) {
                    e.preventDefault();
                    alert('⚠️ No has seleccionado ninguna reserva para pagar.');
                    return;
                }

                const ids = Array.from(seleccionados.keys());
                const total = Array.from(seleccionados.values()).reduce((acc, val) => acc + val, 0);

                document.getElementById('inputIds').value = ids.join(',');
                document.getElementById('inputTotal').value = total;
            });
        </script>
    @endif
</div>
@endsection

