@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/style_atra.css') }}">

@section('content')


  <div class="container">
        <div class="breadcrumb">
            <a href="#">Inicio</a> / <a href="#">Atracciones</a> / Formula Rosca
        </div>

        <div class="detail-grid">
            <!-- Gallery Section -->
            <div class="gallery-section">
                <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=800" alt="Formula Rosca" class="main-image" id="mainImage">
                <div class="thumbnail-gallery">
                    <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=200" alt="Vista 1" class="thumbnail">
                    <img src="https://images.unsplash.com/photo-1594818379496-da1e345b0ded?w=200" alt="Vista 2" class="thumbnail">
                    <img src="https://images.unsplash.com/photo-1544124493-1776c40ce002?w=200" alt="Vista 3" class="thumbnail">
                    <img src="https://images.unsplash.com/photo-1594995508764-c7e80d3bcf3f?w=200" alt="Vista 4" class="thumbnail">
                </div>
            </div>

            <!-- Info Section -->
            <div class="info-section">
                <div class="attraction-title-section">
                    <h1>Formula Rosca</h1>
                    <div class="rating-section">
                        <span class="stars">⭐⭐⭐⭐⭐</span>
                        <span class="rating-text">4.8 (1,234 reseñas)</span>
                    </div>
                </div>

                <div class="description">
                    Sumérgete en la adrenalina pura de la Formula Rosca, la montaña rusa más extrema de Colombia. Con 6 inversiones impresionantes, alcanzarás velocidades de hasta 120 km/h mientras experimentas fuerzas G extremas. Esta atracción icónica combina giros inversados, loops verticales y caídas vertiginosas que te dejarán sin aliento. Solo para los más valientes.
                </div>

                <div class="requirements">
                    <h2>Requisitos y Especificaciones</h2>
                    <div class="requirement-grid">
                        <div class="requirement-item">
                            <div class="requirement-icon">📏</div>
                            <div class="requirement-text">
                                <h3>Altura Mínima</h3>
                                <p>145 cm requeridos</p>
                            </div>
                        </div>
                        <div class="requirement-item">
                            <div class="requirement-icon warning">⚡</div>
                            <div class="requirement-text">
                                <h3>Nivel de Intensidad</h3>
                                <p>Alta - Extrema</p>
                            </div>
                        </div>
                        <div class="requirement-item">
                            <div class="requirement-icon">⏱️</div>
                            <div class="requirement-text">
                                <h3>Duración</h3>
                                <p>3 minutos aprox.</p>
                            </div>
                        </div>
                        <div class="requirement-item">
                            <div class="requirement-icon">🎢</div>
                            <div class="requirement-text">
                                <h3>Velocidad Máxima</h3>
                                <p>120 km/h</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="calendar-section">
                    <div class="calendar-header">
                        <h2>Selecciona tu Fecha
                            <br>
                            Momentania mientras se desarrolla la funcion
                        </h2>
                        <div class="month-selector">
                            <button class="month-btn">◀</button>
                            <span style="font-weight: bold;">Octubre 2025</span>
                            <button class="month-btn">▶</button>
                        </div>
                    </div>

                    <div class="calendar-grid">
                        <div class="calendar-day-header">L</div>
                        <div class="calendar-day-header">M</div>
                        <div class="calendar-day-header">X</div>
                        <div class="calendar-day-header">J</div>
                        <div class="calendar-day-header">V</div>
                        <div class="calendar-day-header">S</div>
                        <div class="calendar-day-header">D</div>
                        
                        <div class="calendar-day unavailable"></div>
                        <div class="calendar-day unavailable"></div>
                        <div class="calendar-day available">1</div>
                        <div class="calendar-day available">2</div>
                        <div class="calendar-day available">3</div>
                        <div class="calendar-day available">4</div>
                        <div class="calendar-day available">5</div>
                        <div class="calendar-day available">6</div>
                        <div class="calendar-day available">7</div>
                        <div class="calendar-day available">8</div>
                        <div class="calendar-day available">9</div>
                        <div class="calendar-day available">10</div>
                        <div class="calendar-day available">11</div>
                        <div class="calendar-day available">12</div>
                        <div class="calendar-day available">13</div>
                        <div class="calendar-day available">14</div>
                        <div class="calendar-day available">15</div>
                        <div class="calendar-day available">16</div>
                        <div class="calendar-day available">17</div>
                        <div class="calendar-day available">18</div>
                        <div class="calendar-day available">19</div>
                        <div class="calendar-day available">20</div>
                        <div class="calendar-day available">21</div>
                        <div class="calendar-day available">22</div>
                        <div class="calendar-day available">23</div>
                        <div class="calendar-day available">24</div>
                        <div class="calendar-day available">25</div>
                        <div class="calendar-day available">26</div>
                        <div class="calendar-day available">27</div>
                        <div class="calendar-day selected">28</div>
                        <div class="calendar-day available">29</div>
                        <div class="calendar-day available">30</div>
                        <div class="calendar-day available">31</div>
                    </div>

                    <div class="ticket-section">
                        <h3 style="color: #7C2FE6; margin-bottom: 1rem;">Tipo de Entrada</h3>
                        <div class="ticket-options">
                            <div class="ticket-option selected">
                                <div>
                                    <strong>Entrada General</strong>
                                    <p style="font-size: 0.9rem; color: #666;">Acceso a todas las atracciones</p>
                                </div>
                                <strong style="color: #7C2FE6; font-size: 1.3rem;">$45.000</strong>
                            </div>
                            <div class="ticket-option">
                                <div>
                                    <strong>Fast Pass</strong>
                                    <p style="font-size: 0.9rem; color: #666;">Sin filas + acceso prioritario</p>
                                </div>
                                <strong style="color: #7C2FE6; font-size: 1.3rem;">$75.000</strong>
                            </div>
                        </div>
                        <button class="btn-book">Reservar Ahora</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="reviews-section">
            <h2>Reseñas de Visitantes</h2>
            <div class="review-item">
                <div class="review-header">
                    <div class="reviewer-info">
                        <div class="reviewer-avatar">M</div>
                        <div>
                            <strong>Desarrollador</strong>
                            <div class="stars" style="font-size: 1rem;">⭐⭐⭐⭐⭐</div>
                        </div>
                    </div>
                    <span style="color: #888; font-size: 0.9rem;">Hace 2 días</span>
                </div>
                <p class="review-text">Puesto para desarrollar los comentarios.</p>
            </div>

        </div>
    </div>       
@endsection