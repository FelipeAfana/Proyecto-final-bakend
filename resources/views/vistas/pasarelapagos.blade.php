@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px; margin-top: 60px; margin-bottom: 60px; background: #ffffff; border-radius: 16px; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1); padding: 40px; font-family: 'Segoe UI', sans-serif;">
    <h2 style="text-align: center; color: #7C2FE6; font-weight: 800; margin-bottom: 20px;">💳 Pasarela de Pago</h2>
    <p style="text-align: center; color: #666; margin-bottom: 30px;">
        Completa los siguientes datos para simular tu pago. (Solo demostrativo)
    </p>

    {{-- Total a pagar recibido desde "Mis Reservas" --}}
    <div style="background-color: #f8f5ff; border: 2px solid #7C2FE6; padding: 20px; border-radius: 12px; text-align: center; margin-bottom: 30px;">
        <h4 style="color: #4a4a4a; margin: 0;">Total a pagar</h4>
        <h2 style="color: #7C2FE6; font-weight: 900; margin: 10px 0;">
            ${{ number_format(request('total') ?? 0, 0, ',', '.') }}
        </h2>
    </div>

    {{-- Formulario visual --}}
    <form id="formPago">
        {{-- Nombre --}}
        <div style="margin-bottom: 20px;">
            <label style="font-weight: 600; color: #4a4a4a;">Nombre completo</label>
            <input type="text" name="nombre" required placeholder="Ejemplo: Juan Pérez"
                style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 10px; margin-top: 5px;">
        </div>

        {{-- Correo --}}
        <div style="margin-bottom: 20px;">
            <label style="font-weight: 600; color: #4a4a4a;">Correo electrónico</label>
            <input type="email" name="correo" required placeholder="Ejemplo: juan@email.com"
                style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 10px; margin-top: 5px;">
        </div>

        {{-- Tipo de documento --}}
        <div style="margin-bottom: 20px;">
            <label style="font-weight: 600; color: #4a4a4a;">Tipo de documento</label>
            <select name="tipo_documento" required
                style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 10px; margin-top: 5px;">
                <option value="">Seleccione...</option>
                <option value="CC">Cédula de ciudadanía</option>
                <option value="TI">Tarjeta de identidad</option>
                <option value="CE">Cédula de extranjería</option>
                <option value="PAS">Pasaporte</option>
            </select>
        </div>

        {{-- Número de documento --}}
        <div style="margin-bottom: 20px;">
            <label style="font-weight: 600; color: #4a4a4a;">Número de documento</label>
            <input type="text" name="numero_documento" required placeholder="Ejemplo: 1025436789"
                style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 10px; margin-top: 5px;">
        </div>

        {{-- Dirección --}}
        <div style="margin-bottom: 20px;">
            <label style="font-weight: 600; color: #4a4a4a;">Dirección</label>
            <input type="text" name="direccion" required placeholder="Ejemplo: Calle 123 #45-67"
                style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 10px; margin-top: 5px;">
        </div>

        {{-- Número de tarjeta --}}
        <div style="margin-bottom: 20px;">
            <label style="font-weight: 600; color: #4a4a4a;">Número de tarjeta</label>
            <input type="text" maxlength="19" name="tarjeta" required placeholder="**** **** **** ****"
                style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 10px; margin-top: 5px;">
        </div>

        {{-- Expiración y CVV --}}
        <div style="display: flex; gap: 20px; margin-bottom: 20px;">
            <div style="flex: 1;">
                <label style="font-weight: 600; color: #4a4a4a;">Expira</label>
                <input type="text" maxlength="5" name="expira" required placeholder="MM/AA"
                    style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 10px; margin-top: 5px;">
            </div>
            <div style="flex: 1;">
                <label style="font-weight: 600; color: #4a4a4a;">CVV</label>
                <input type="password" maxlength="3" name="cvv" required placeholder="***"
                    style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 10px; margin-top: 5px;">
            </div>
        </div>

        {{-- Botón de pagar --}}
        <div style="text-align: center; margin-top: 30px;">
            <button type="submit" id="btnPagar"
                style="background: linear-gradient(90deg, #7C2FE6, #9c4df5); color: white; border: none; padding: 15px 50px; font-size: 1.1rem; border-radius: 40px; font-weight: 700; cursor: pointer; box-shadow: 0 4px 12px rgba(124, 47, 230, 0.4); transition: all 0.3s ease;">
                💸 Pagar Ahora
            </button>
        </div>
    </form>

    {{-- Cargando --}}
    <div id="procesandoPago" style="display: none; text-align: center; margin-top: 40px;">
        <div class="spinner" style="width: 50px; height: 50px; border: 5px solid #eee; border-top-color: #7C2FE6; border-radius: 50%; margin: 0 auto; animation: girar 1s linear infinite;"></div>
        <p style="margin-top: 15px; color: #555;">Procesando tu pago...</p>
    </div>

    {{-- Éxito --}}
    <div id="mensajeExito" style="display: none; text-align: center; margin-top: 30px;">
        <h3 style="color: #28a745;">✅ ¡Pago simulado con éxito!</h3>
        <p style="color: #555;">Gracias por tu compra. Recuerda que este pago es solo visual.</p>
        <a href="{{ route('misreservas') }}" style="display: inline-block; margin-top: 15px; text-decoration: none; background: #7C2FE6; color: white; padding: 12px 30px; border-radius: 30px; font-weight: 600;">Volver a Mis Reservas</a>
    </div>

    <style>
        @keyframes girar {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>

    <script>
        const form = document.getElementById('formPago');
        const procesando = document.getElementById('procesandoPago');
        const mensaje = document.getElementById('mensajeExito');

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            form.style.display = 'none';
            procesando.style.display = 'block';

            // Simulación de carga visual
            setTimeout(() => {
                procesando.style.display = 'none';
                mensaje.style.display = 'block';
            }, 2500);
        });
    </script>
</div>
@endsection


