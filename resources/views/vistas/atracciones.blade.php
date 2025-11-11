@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/style_atrax.css') }}">

    


    <!-- Page Header -->
    <section class="page-header">
        <h1>Nuestras Atracciones</h1>
        <p>Descubre todas las experiencias que tenemos para ti</p>
    </section>


    <!-- Attractions -->
    <div class="container">
        <h2 class="section-title">Atracciones Extremas</h2>
        <div class="attractions-grid">
            <div class="attraction-card">
                
                <div class="attraction-img-container">
                    <img src="{{asset('imagenes/montaña_rusa1.jpg')}}" alt="Formula Rosca" class="attraction-img">
                </div>
                <div class="attraction-content">
                    <h3 class="attraction-title">Formula Rosca</h3>
                    <div class="rating">
                        <span class="stars">⭐⭐⭐⭐⭐</span>
                        <span class="rating-count">(1,234 reseñas)</span>
                    </div>
                    <p class="attraction-description">La montaña rusa más extrema de Colombia con 6 inversiones y velocidades de hasta 120 km/h.</p>
                    <div class="attraction-meta">
                        <span class="meta-item">⚡ Alta intensidad</span>
                        <span class="meta-item">📏 145 cm mín.</span>
                        <span class="meta-item">⏱️ 3 min</span>
                    </div>
                    <a class="btn-details" href="{{ route('montaña')}}">Ver Más</a>
                </div>
            </div>

            <div class="attraction-card">
            
                <div class="attraction-img-container">
                    <img src="{{asset('imagenes/barco_atraccion.jpg')}}" alt="Thriller Bark" class="attraction-img">
                </div>
                <div class="attraction-content">
                    <h3 class="attraction-title">Thriller Bark</h3>
                    <div class="rating">
                        <span class="stars">⭐⭐⭐⭐⭐</span>
                        <span class="rating-count">(987 reseñas)</span>
                    </div>
                    <p class="attraction-description">Experimenta la sensación de volar mientras giras a gran velocidad.</p>
                    <div class="attraction-meta">
                        <span class="meta-item">⚡ Alta intensidad</span>
                        <span class="meta-item">📏 140 cm mín.</span>
                        <span class="meta-item">⏱️ 5 min</span>
                    </div>
                    <a class="btn-details" href="{{ route('barco')}}">Ver Más</a>
                </div>
            </div>

            
        </div>

        <h2 class="section-title">Atracciones Familiares</h2>
        <div class="attractions-grid">
            <div class="attraction-card">
                
                <div class="attraction-img-container">
                    <img src="{{asset('imagenes/rueda_fortuna.jpg')}}" alt="Pacific Park" class="attraction-img">
                </div>
                <div class="attraction-content">
                    <h3 class="attraction-title">Pacific Park</h3>
                    <div class="rating">
                        <span class="stars">⭐⭐⭐⭐⭐</span>
                        <span class="rating-count">(2,145 reseñas)</span>
                    </div>
                    <p class="attraction-description">La rueda de la fortuna más grande de la ciudad con vistas espectaculares.</p>
                    <div class="attraction-meta">
                        <span class="meta-item">🎡 Relajante</span>
                        <span class="meta-item">👨‍👩‍👧 Para todos</span>
                        <span class="meta-item">⏱️ 7 min</span>
                    </div>
                    <a class="btn-details" href="{{ route('rueda')}}">Ver Más</a>
                </div>
            </div>

            <div class="attraction-card">
                
                <div class="attraction-img-container">
                    <img src="{{asset('imagenes/carro.jpg')}}" alt="Turbo Crash" class="attraction-img">
                </div>
                <div class="attraction-content">
                    <h3 class="attraction-title">Turbo Crash</h3>
                    <div class="rating">
                        <span class="stars">⭐⭐⭐⭐</span>
                        <span class="rating-count">(1,543 reseñas)</span>
                    </div>
                    <p class="attraction-description">Carritos chocones para toda la familia. ¡Diversión garantizada!</p>
                    <div class="attraction-meta">
                        <span class="meta-item">🚗 Choque</span>
                        <span class="meta-item">📏 110 cm mín.</span>
                        <span class="meta-item">⏱️ 5 min</span>
                    </div>
                    <a class="btn-details" href="{{ route('carro')}}">Ver Más</a>
                </div>
            </div>

          

        

           
        </div>
    </div>




@endsection