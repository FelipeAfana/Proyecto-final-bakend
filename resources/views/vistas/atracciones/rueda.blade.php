@extends('layouts.app')

{{-- Asegúrate de que este archivo CSS exista en public/css/style_atra.css --}}
<link rel="stylesheet" href="{{ asset('css/style_atra.css') }}">
<style>
    /* Estilos temporales para la galería de imágenes, si no están en style_atra.css */
    .gallery-section img { transition: transform 0.2s; }
    .gallery-section img:hover { transform: scale(1.05); }
    .thumbnail-gallery { margin-top: 15px; display: flex; gap: 10px; justify-content: center; }
    .thumbnail { width: 80px; height: 60px; object-fit: cover; border-radius: 5px; cursor: pointer; border: 2px solid transparent; }
    .thumbnail:hover { border-color: #7C2FE6; }

    /* Estilos del grid que carga la info y el formulario */
    .detail-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }
    @media (min-width: 992px) {
        .detail-grid {
            grid-template-columns: 1fr 1fr;
        }
    }
    .main-image {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }
    .requirement-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-top: 15px;
    }
    .requirement-item {
        display: flex;
        align-items: center;
        background-color: #f8f8f8;
        padding: 10px;
        border-radius: 5px;
    }
    .requirement-icon {
        font-size: 1.5rem;
        margin-right: 10px;
    }
</style>

@section('content')

    {{-- Notificación Toast de Éxito para Reservas --}}
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

    {{-- Manejo de Errores de Sesión y Validación --}}
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


    <div class="container" style="padding: 20px;">
        <div class="detail-grid">
            <div class="gallery-section">
                {{-- Imagen principal de la Rueda. Usa assets/imagenes/rueda1.jpg --}}
                <img src="{{ asset('imagenes/rueda1.jpg') }}" onerror="this.onerror=null; this.src='https://placehold.co/800x600/7C2FE6/FFFFFF?text=Pacific+Park';" alt="Pacific Park Rueda Panorámica" class="main-image" id="mainImage">
                <div class="thumbnail-gallery">
                    {{-- Hemos cambiado las rutas de barco por rutas de ejemplo de rueda --}}
                    <img src="{{ asset('imagenes/rueda1.jpg') }}" onerror="this.onerror=null; this.src='https://placehold.co/80x60/7C2FE6/FFFFFF?text=V1';" alt="Vista 1" class="thumbnail">
                    <img src="{{ asset('imagenes/rueda2.jpg') }}" onerror="this.onerror=null; this.src='https://placehold.co/80x60/7C2FE6/FFFFFF?text=V2';" alt="Vista 2" class="thumbnail">
                    <img src="{{ asset('imagenes/rueda3.jpg') }}" onerror="this.onerror=null; this.src='https://placehold.co/80x60/7C2FE6/FFFFFF?text=V3';" alt="Vista 3" class="thumbnail">
                    <img src="{{ asset('imagenes/rueda4.jpg') }}" onerror="this.onerror=null; this.src='https://placehold.co/80x60/7C2FE6/FFFFFF?text=V4';" alt="Vista 4" class="thumbnail">
                </div>
            </div>

            <div class="info-section">

                <div class="attraction-title-section">
                    {{-- Título de Pacific Park, ID de Atracción: 3 --}}
                    <h1>{{ $atraccion?->nombre ?? 'Pacific Park (Rueda Panorámica)' }}</h1>
                    <div class="rating-section">
                        <span class="stars" style="color: gold;">⭐⭐⭐⭐⭐</span>
                        <span class="rating-text">4.8 (1200 reseñas)</span>
                    </div>
                </div>

                <div class="description">
                    {{ $atraccion?->descripcion ?? 'Disfruta de la mejor vista de 360 grados del parque y la ciudad. Nuestra rueda panorámica es el ícono del parque y ofrece una experiencia relajante y visualmente impresionante, ideal para fotos.' }}
                </div>

                <div class="requirements">
                    <h2>Requisitos y Especificaciones</h2>
                    <div class="requirement-grid">
                        <div class="requirement-item"><div class="requirement-icon">👨‍👩‍👧‍👦</div><div class="requirement-text"><h3>Edad Mínima</h3><p>Apto para todas las edades</p></div></div>
                        <div class="requirement-item"><div class="requirement-icon warning">😌</div><div class="requirement-text"><h3>Nivel de Intensidad</h3><p>Baja - Familiar</p></div></div>
                        <div class="requirement-item"><div class="requirement-icon">⏱️</div><div class="requirement-text"><h3>Duración</h3><p>8 minutos aprox.</p></div></div>
                        <div class="requirement-item"><div class="requirement-icon">🎡</div><div class="requirement-text"><h3>Capacidad</h3><p>{{ $atraccion?->capacidad ?? '6 personas por cabina' }}</p></div></div>
                    </div>
                </div>


                {{-- FORMULARIO DE RESERVA --}}
                <form method="POST" action="{{ route('reservas.store') }}">
                    @csrf

                    {{-- ID de la atracción de Pacific Park (asumido como 3) --}}
                    <input type="hidden" name="atraccion_id" value="{{ $atraccion?->id ?? 3 }}">

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
                            <label for="hora_reserva" style="font-weight: bold; display: block; margin-bottom: 10px; font-size: 1.1rem;">⏱️ Selecciona la Hora:</label>
                            <input
                                type="time"
                                id="hora_reserva"
                                name="Hora"
                                required
                                value="{{ old('Hora') }}"
                                style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 5px; font-size: 1rem;"
                                min="09:00"
                                max="20:00" {{-- Ampliamos el horario para la rueda --}}
                            >
                            <p style="font-size: 0.85rem; color: #666; margin-top: 5px;">Horario de atención: 9:00 AM a 8:00 PM</p>
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
                            <h3 style="color: #0056b3; margin-bottom: 1.2rem; font-size: 1.3rem;">Tipo de Entrada</h3>
                            <div class="ticket-options">

                                <div style="display: flex; align-items: center; padding: 15px; border: 1px solid #ccc; border-radius: 8px; margin-bottom: 10px; cursor: pointer;">
                                    <input type="radio" id="general_pass" name="entrada_tipo" value="general" required {{ old('entrada_tipo', 'general') == 'general' ? 'checked' : '' }} style="margin-right: 15px;">
                                    <label for="general_pass" style="flex-grow: 1; display: flex; justify-content: space-between; align-items: center; margin: 0;">
                                        <div><strong>Pase Estándar</strong><p style="font-size: 0.9rem; color: #666; margin: 0;">Acceso normal a la cabina</p></div>
                                        <strong style="color: #7C2FE6; font-size: 1.3rem;">$15.000</strong>
                                    </label>
                                </div>

                                <div style="display: flex; align-items: center; padding: 15px; border: 1px solid #ccc; border-radius: 8px; margin-bottom: 10px; cursor: pointer;">
                                    <input type="radio" id="fast_pass" name="entrada_tipo" value="fast_pass" required {{ old('entrada_tipo') == 'fast_pass' ? 'checked' : '' }} style="margin-right: 15px;">
                                    <label for="fast_pass" style="flex-grow: 1; display: flex; justify-content: space-between; align-items: center; margin: 0;">
                                        <div><strong>Cabina VIP</strong><p style="font-size: 0.9rem; color: #666; margin: 0;">Cabina privada + refrigerio</p></div>
                                        <strong style="color: #7C2FE6; font-size: 1.3rem;">$50.000</strong>
                                    </label>
                                </div>

                            </div>
                            <button type="submit" class="btn-book" style="width: 100%; background-color: #7C2FE6; color: white; border: none; padding: 18px; font-size: 1.3rem; cursor: pointer; border-radius: 8px; margin-top: 25px; font-weight: bold;">
                                RESERVAR MI VUELO
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <hr style="margin: 40px 0;">

        {{-- SECCIÓN DE COMENTARIOS --}}
        <div class="reviews-section">
            {{-- Usamos el operador null-safe (?->) y el null-coalesce (??) para evitar errores si $atraccion es null --}}
            <h2>Reseñas de Visitantes ({{ $atraccion?->comentarios->count() ?? 0 }})</h2>

            @auth
            <div style="margin-bottom: 30px; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
                <h3 style="margin-top: 0; font-size: 1.2rem;">Deja tu comentario</h3>
                <form method="POST" action="{{ route('comentarios.store') }}">
                    @csrf

                    {{-- Usamos el ID de la atracción de Pacific Park (asumido como 3) --}}
                    <input type="hidden" name="atraccion_id" value="{{ $atraccion?->id ?? 3 }}">

                    <textarea
                        name="contenido"
                        rows="4"
                        placeholder="Escribe aquí tu opinión sobre la atracción..."
                        required
                        style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; margin-bottom: 10px;"
                    >{{ old('contenido') }}</textarea>

                    <button type="submit" style="background-color: #7C2FE6; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">
                        Publicar Comentario
                    </button>

                    @if (session('success_comment'))
                        <p style="color: green; margin-top: 10px;">{{ session('success_comment') }}</p>
                    @endif
                </form>
            </div>
            @else
            <div style="padding: 15px; background-color: #f0f8ff; color: #1e88e5; border: 1px solid #bbdefb; border-radius: 5px; margin-bottom: 20px;">
                Debes <a href="{{ route('login') }}" style="color: #1e88e5; text-decoration: underline; font-weight: bold;">iniciar sesión</a> para dejar una reseña o comentario.
            </div>
            @endauth

            {{-- Lista de Comentarios --}}
            {{-- Usamos $atraccion->comentarios si existe, o una matriz vacía si no --}}
            @forelse (($atraccion?->comentarios->sortByDesc('created_at') ?? []) as $comentario)
            <div style="border-bottom: 1px solid #eee; padding: 15px 0;">
                {{-- Nota: Asumo que los comentarios se cargan a través de la relación de $atraccion --}}
                <p style="font-weight: bold; margin: 0; display: inline-block;">{{ $comentario->user?->name ?? 'Usuario Eliminado' }}</p>
                <span style="font-size: 0.85rem; color: #999; margin-left: 10px;">{{ $comentario->created_at->diffForHumans() }}</span>
                <p style="margin-top: 5px; margin-bottom: 0;">{{ $comentario->contenido }}</p>
            </div>
            @empty
            <p>Sé el primero en comentar esta atracción.</p>
            @endforelse

        </div>
    </div>

    <script>
        // Muestra la ventana flotante si la reserva fue exitosa
        @if (session('success'))
            function showToast() {
                const toast = document.getElementById('toast-success');
                toast.style.display = 'block';
                setTimeout(() => {
                    toast.style.display = 'none';
                }, 3000); // Se oculta después de 3 segundos
            }
            showToast();
        @endif

        // Funcionalidad de la galería de miniaturas
        const thumbnails = document.querySelectorAll('.thumbnail');
        const mainImage = document.getElementById('mainImage');

        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', () => {
                mainImage.src = thumb.src;
            });
        });
    </script>

@endsection
