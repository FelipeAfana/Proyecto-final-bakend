@extends("layouts.app")

@section("content")
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salitre Mágico - Parque de Diversiones</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            overflow-x: hidden;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #7C2FE6 0%, #9B4FFF 100%);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            color: white;
            font-size: 1.8rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .nav {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.3s;
            text-transform: uppercase;
            font-size: 0.9rem;
        }

        .nav a:hover {
            opacity: 0.8;
        }

        .nav-icons {
            display: flex;
            gap: 1rem;
        }

        .icon-btn {
            background: rgba(255,255,255,0.2);
            border: none;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.3s;
        }

        .icon-btn:hover {
            background: rgba(255,255,255,0.3);
        }

        /* Hero Section */
        .hero {
            position: relative;
            height: 600px;
            background: linear-gradient(rgba(124, 47, 230, 0.3), rgba(124, 47, 230, 0.3)),
                        url('{{asset('imagenes/principal.jpg')}}') center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .hero-content {
            max-width: 800px;
            padding: 2rem;
        }

        .hero h1 {
            font-size: 4rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.3);
        }

        .hero p {
            font-size: 1.4rem;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 5px rgba(0,0,0,0.3);
        }

        .btn-primary {
            background: #A0FF3F;
            color: #333;
            border: none;
            padding: 1.2rem 3rem;
            font-size: 1.2rem;
            font-weight: bold;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            box-shadow: 0 4px 15px rgba(160, 255, 63, 0.3);
        }

        .btn-primary:hover {
            background: #8FFF00;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(160, 255, 63, 0.4);
        }

        /* Section */
        .section {
            padding: 4rem 2rem;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            color: #7C2FE6;
            margin-bottom: 3rem;
            text-transform: uppercase;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Attractions Grid */
        .attractions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
        }

        .attraction-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s;
            position: relative;
        }

        .attraction-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(124, 47, 230, 0.2);
        }

        .attraction-card.featured {
            border: 3px solid #A0FF3F;
        }

        .badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #7C2FE6;
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
            z-index: 1;
        }

        .badge.popular {
            background: #FF4757;
        }

        .badge.new {
            background: #A0FF3F;
            color: #333;
        }

        .attraction-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .attraction-content {
            padding: 1.5rem;
        }

        .attraction-title {
            font-size: 1.5rem;
            color: #7C2FE6;
            margin-bottom: 0.5rem;
        }

        .attraction-description {
            color: #666;
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .attraction-meta {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            color: #888;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .btn-secondary {
            background: #7C2FE6;
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 25px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s;
            width: 100%;
        }

        .btn-secondary:hover {
            background: #6A1FD6;
        }

        /* Promo Section */
        .promo-section {
            background: linear-gradient(135deg, #A0FF3F 0%, #8FFF00 100%);
            padding: 4rem 2rem;
            margin: 4rem 0;
        }

        .promo-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .promo-text h2 {
            font-size: 2.5rem;
            color: #7C2FE6;
            margin-bottom: 1rem;
        }

        .promo-text p {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 2rem;
        }

        .promo-img {
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        /* Plans Section */
        .plans-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .plan-card {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }

        .plan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(124, 47, 230, 0.2);
        }

        .plan-icon {
            width: 80px;
            height: 80px;
            background: #7C2FE6;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 1rem;
        }

        .plan-title {
            font-size: 1.5rem;
            color: #7C2FE6;
            margin-bottom: 1rem;
        }

        .plan-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        

        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s;
            cursor: pointer;
        }

        .social-icon:hover {
            background: #A0FF3F;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.2);
            color: rgba(255,255,255,0.6);
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .promo-content {
                grid-template-columns: 1fr;
            }

            .plans-grid {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>


<body>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Encuentra Nuevas Emociones</h1>
            <p>Vive la experiencia más emocionante de tu vida en el parque de diversiones más grande de Colombia</p>
            <button class="btn-primary">¡Compra tus Entradas!</button>
        </div>
    </section>

    <!-- Featured Attractions -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">Atracciones Destacadas</h2>
            <div class="attractions-grid">
                <div class="attraction-card featured">
                    <span class="badge popular">Popular</span>
                    <img src="{{asset('imagenes/montaña_rusa.jpg')}}" alt="Formula Rosca" class="attraction-img">
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
                    <img src="https://images.unsplash.com/photo-1517457373958-b7bdd4587205?w=600" alt="Turbo Crash" class="attraction-img">
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
                    <img src="https://images.unsplash.com/photo-1503632478498-eb18d664e83a?w=600" alt="El Laberinto" class="attraction-img">
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
                <button class="btn-primary">Ver Promociones</button>
            </div>
            <img src="https://images.unsplash.com/photo-1572819862768-e1c117e7c1c3?w=600" alt="Promo" class="promo-img">
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
                    <button class="btn-secondary">Comprar</button>
                </div>

                <div class="plan-card">
                    <div class="plan-icon">👥</div>
                    <h3 class="plan-title">Amigos</h3>
                    <p class="plan-description">Experiencia compartida para grupos. Incluye descuentos especiales.</p>
                    <button class="btn-secondary">Comprar</button>
                </div>

                <div class="plan-card">
                    <div class="plan-icon">👨‍👩‍👧‍👦</div>
                    <h3 class="plan-title">Familiar</h3>
                    <p class="plan-description">Plan perfecto para toda la familia con áreas exclusivas.</p>
                    <button class="btn-secondary">Comprar</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    
</body>
@endsection