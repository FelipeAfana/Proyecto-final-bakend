@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/style_atra.css') }}">

@section('content')

    <div id="toast-success" style="
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #4CAF50; /* Green */
        color: white;
        padding: 15px 25px;
        border-radius: 8px;
        z-index: 1000;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        display: none; /* Oculto por defecto */
        font-weight: bold;
    ">
        Reserva exitosa 🎉
    </div>

    @if (session('error'))
        <div class="alert alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
            <strong style="display: block; margin-bottom: 5px;">Error al procesar la reserva. Verifique los campos:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="container">
        <div class="detail-grid">
            <div class="gallery-section">
                <img src="{{asset('imagenes/barco1.jpg')}}" alt="Formula Rosca" class="main-image" id="mainImage">
                <div class="thumbnail-gallery">
                    <img src="{{asset('imagenes/barco1.jpg')}}" alt="Vista 1" class="thumbnail">
                    <img src="{{asset('imagenes/barco2.jpg')}}" alt="Vista 2" class="thumbnail">
                    <img src="{{asset('imagenes/barco3.avif')}}" alt="Vista 3" class="thumbnail">
                    <img src="{{asset('imagenes/barco4.jpg')}}" alt="Vista 4" class="thumbnail">
                </div>
            </div>

            <div class="info-section">

                <div class="attraction-title-section">
                    <h1>Thriller Bark </h1>
                    <div class="rating-section">
                        <span class="stars">⭐⭐⭐⭐⭐</span>
                        <span class="rating-text">4.8 (987 reseñas)</span>
                    </div>
                </div>

                <div class="description">
                    Experimenta toda la adrenalina de Thriller Bark, Embárcate en una aventura que pondrá a prueba tu valentía.
                    El barco se balancea con fuerza, elevándote hasta el cielo y dejándote caer como si desafiaras las olas de una tormenta.
                    ¡Prepárate para navegar entre la adrenalina y la emoción!
                </div>
                <div class="requirements">
                    <h2>Requisitos y Especificaciones</h2>
                    <div class="requirement-grid">
                        <div class="requirement-item"><div class="requirement-icon">📏</div><div class="requirement-text"><h3>Altura Mínima</h3><p>140 cm requeridos</p></div></div>
                        <div class="requirement-item"><div class="requirement-icon warning">⚡</div><div class="requirement-text"><h3>Nivel de Intensidad</h3><p>Alta - Extrema</p></div></div>
                        <div class="requirement-item"><div class="requirement-icon">⏱️</div><div class="requirement-text"><h3>Duración</h3><p>5 minutos aprox.</p></div></div>
                        <div class="requirement-item"><div class="requirement-icon">🎢</div><div class="requirement-text"><h3>Velocidad Máxima</h3><p>70 km/h</p></div></div>
                    </div>
                </div>
                <form method="POST" action="{{ route('reservas.store') }}">
                    @csrf

                    <input type="hidden" name="atraccion_id" value="1">

                    <div class="calendar-section" style="border: 1px solid #eee; padding: 20px; border-radius: 8px; margin-top: 20px;">

                        <div style="margin-bottom: 25px;">
                            <label for="fecha_reserva" style="font-weight: bold; display: block; margin-bottom: 10px; font-size: 1.1rem;">📅 Selecciona tu Fecha:</label>
                            <input
                                type="date"
                                id="fecha_reserva"
                                name="Fecha"
                                required
                                value="{{ old('Fecha') }}"
                                style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 5px; font-size: 1rem;"
                                min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                            >
                        </div>

                        <div style="margin-bottom: 25px;">
                            <label for="cantidad_boletos" style="font-weight: bold; display: block; margin-bottom: 10px; font-size: 1.1rem;">🎟️ Cantidad de Boletos:</label>
                            <input
                                type="number"
                                id="cantidad_boletos"
                                name="Cantidad"
                                min="1"
                                value="{{ old('Cantidad', 1) }}"
                                required
                                style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 5px; font-size: 1rem;"
                            >
                        </div>


                        <div class="ticket-section">
                            <h3 style="color: #7C2FE6; margin-bottom: 1.2rem; font-size: 1.3rem;">Tipo de Entrada</h3>
                            <div class="ticket-options">

                                <div style="display: flex; align-items: center; padding: 15px; border: 1px solid #ccc; border-radius: 8px; margin-bottom: 10px; cursor: pointer;">
                                    <input type="radio" id="general_pass" name="entrada_tipo" value="general" required {{ old('entrada_tipo', 'general') == 'general' ? 'checked' : '' }} style="margin-right: 15px;">
                                    <label for="general_pass" style="flex-grow: 1; display: flex; justify-content: space-between; align-items: center; margin: 0;">
                                        <div><strong>Entrada General</strong><p style="font-size: 0.9rem; color: #666; margin: 0;">Acceso a todas las atracciones</p></div>
                                        <strong style="color: #7C2FE6; font-size: 1.3rem;">$45.000</strong>
                                    </label>
                                </div>

                                <div style="display: flex; align-items: center; padding: 15px; border: 1px solid #ccc; border-radius: 8px; margin-bottom: 10px; cursor: pointer;">
                                    <input type="radio" id="fast_pass" name="entrada_tipo" value="fast_pass" required {{ old('entrada_tipo') == 'fast_pass' ? 'checked' : '' }} style="margin-right: 15px;">
                                    <label for="fast_pass" style="flex-grow: 1; display: flex; justify-content: space-between; align-items: center; margin: 0;">
                                        <div><strong>Fast Pass</strong><p style="font-size: 0.9rem; color: #666; margin: 0;">Sin filas + acceso prioritario</p></div>
                                        <strong style="color: #7C2FE6; font-size: 1.3rem;">$75.000</strong>
                                    </label>
                                </div>

                            </div>
                            <button type="submit" class="btn-book" style="width: 100%; background-color: #60D939; color: white; border: none; padding: 18px; font-size: 1.3rem; cursor: pointer; border-radius: 8px; margin-top: 25px; font-weight: bold;">
                                RESERVAR AHORA
                            </button>
                        </div>
                    </div>
                </form>
                </div>
        </div>

        <div class="reviews-section"><h2>Reseñas de Visitantes</h2></div>
    </div>

    <script>

        @if (session('success'))
            function showToast() {
                const toast = document.getElementById('toast-success');
                toast.style.display = 'block';
                setTimeout(() => {
                    toast.style.display = 'none';
                }, 3000);
            }
            showToast();
        @endif


        const thumbnails = document.querySelectorAll('.thumbnail');
        const mainImage = document.getElementById('mainImage');

        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', () => {
                mainImage.src = thumb.src;
            });
        });
    </script>

@endsection
