@extends("layouts.app")

@section("content")

<link rel="stylesheet" href="{{ asset('css/style_ini.css') }}">




    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Encuentra Nuevas Emociones</h1>
            <p>Vive la experiencia más emocionante de tu vida en el parque de diversiones más grande de Colombia</p>
            <a class="btn-primary" href="{{ route('promo') }}">¡Compra tus Entradas!</a>
        </div>
    </section>

    <!-- Featured Attractions -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">Atracciones Destacadas</h2>
            <div class="attractions-grid">
                <div class="attraction-card featured">
                    <span class="badge popular">Popular</span>
                    <img src="{{asset('imagenes/montaña_rusa1.jpg')}}" alt="Formula Rosca" class="attraction-img">
                    <div class="attraction-content">
                        <h3 class="attraction-title">Formula Rosca</h3>
                        <div class="attraction-meta">
                            <span class="meta-item">⚡ Alta intensidad</span>
                            <span class="meta-item">📏 145 cm</span>
                        </div>
                        <p class="attraction-description">La montaña rusa más extrema del país. Seis inversiones que te dejarán sin aliento.</p>
                        <button class="btn-secondary">Ver Detalles</button>
                    </div>
                </div>

                <div class="attraction-card featured">
                    <span class="badge">Clásico</span>
                    <img src="{{asset('imagenes/rueda_fortuna.jpg')}}" alt="Pacific Park" class="attraction-img">
                    <div class="attraction-content">
                        <h3 class="attraction-title">Pacific Park</h3>
                        <div class="attraction-meta">
                            <span class="meta-item">🎡 Relajante</span>
                            <span class="meta-item">👨‍👩‍👧 Familiar</span>
                        </div>
                        <p class="attraction-description">Disfruta de vistas panorámicas desde nuestra icónica rueda de la fortuna.</p>
                        <button class="btn-secondary">Ver Detalles</button>
                    </div>
                </div>

                <div class="attraction-card featured">
                    <span class="badge new">Nuevo</span>
                    <img src="{{asset('imagenes/barco_atraccion.jpg')}}" alt="Thriller Bark" class="attraction-img">
                    <div class="attraction-content">
                        <h3 class="attraction-title">Thriller Bark</h3>
                        <div class="attraction-meta">
                            <span class="meta-item">⚡ Alta intensidad</span>
                            <span class="meta-item">📏 140 cm</span>
                        </div>
                        <p class="attraction-description">Experimenta la emoción de volar con inversiones extremas.</p>
                        <a class="btn-secondary" href="{{ route('atracciones') }}">Ver Detalles</a>

                    </div>
                </div>

                <div class="attraction-card featured">
                    <img src="{{asset('imagenes/agua.jpg')}}" alt="Tsunami Splash" class="attraction-img">
                    <div class="attraction-content">
                        <h3 class="attraction-title">Tsunami Splash</h3>
                        <div class="attraction-meta">
                            <span class="meta-item">💦 Acuática</span>
                            <span class="meta-item">👨‍👩‍👧 Familiar</span>
                        </div>
                        <p class="attraction-description">¡Prepárate para mojarte! Una ola gigante te espera al final.</p>
                        <button class="btn-secondary">Ver Detalles</button>
                    </div>
                </div>

                <div class="attraction-card featured">
                    <img src="{{asset('imagenes/carro.jpg')}}" alt="Turbo Crash" class="attraction-img">
                    <div class="attraction-content">
                        <h3 class="attraction-title">Turbo Crash</h3>
                        <div class="attraction-meta">
                            <span class="meta-item">🚗 Choque</span>
                            <span class="meta-item">👨‍👩‍👧 Para todos</span>
                        </div>
                        <p class="attraction-description">Diversión asegurada chocando con tus amigos y familia.</p>
                        <button class="btn-secondary">Ver Detalles</button>
                    </div>
                </div>

                <div class="attraction-card featured">
                    <img src="{{asset('imagenes/casamiedo.jpeg')}}" alt="El Laberinto" class="attraction-img">
                    <div class="attraction-content">
                        <h3 class="attraction-title">El Laberinto del Miedo</h3>
                        <div class="attraction-meta">
                            <span class="meta-item">👻 Terror</span>
                            <span class="meta-item">📏 120 cm</span>
                        </div>
                        <p class="attraction-description">¿Te atreves a perderte en nuestro laberinto embrujado?</p>
                        <button class="btn-secondary">Ver Detalles</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Promo Section -->
    <section class="promo-section">
        <div class="promo-content">
            <div class="promo-text">
                <h2>¡Prepárate para la Temporada de Verano!</h2>
                <p>Descuentos especiales en paquetes familiares. Compra online y ahorra hasta un 30% en tu entrada.</p>
                <a class="btn-primary" href="{{ route('promo') }}">Ver Promociones</a>
            </div>
            <img src="{{asset('imagenes/promocion_imagen.png')}}" alt="Promo" class="promo-img">
        </div>
    </section>

    <!-- Plans Section -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">Mira Nuestros Planes</h2>
            <div class="plans-grid">
                <div class="plan-card">
                    <div class="plan-icon">✈️</div>
                    <h3 class="plan-title">Solo</h3>
                    <p class="plan-description">Disfruta de un día completo con acceso ilimitado a todas las atracciones.</p>
                    <a class="btn-secondary" href="{{ route('promo') }}">Comprar</a>
                </div>

                <div class="plan-card">
                    <div class="plan-icon">👥</div>
                    <h3 class="plan-title">Amigos</h3>
                    <p class="plan-description">Experiencia compartida para grupos. Incluye descuentos especiales.</p>
                    <a class="btn-secondary" href="{{ route('promo') }}">Comprar</a>
                </div>

                <div class="plan-card">
                    <div class="plan-icon">👨‍👩‍👧‍👦</div>
                    <h3 class="plan-title">Familiar</h3>
                    <p class="plan-description">Plan perfecto para toda la familia con áreas exclusivas.</p>
                    <a class="btn-secondary" href="{{ route('promo') }}">Comprar</a>
                </div>
            </div>
        </div>
    </section>

@endsection