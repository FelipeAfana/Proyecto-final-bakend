@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formula Rosca - Salitre Mágico</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
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

        /* Main Content */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            margin-top: 2rem;
        }

        /* Gallery Section */
        .gallery-section {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .main-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .thumbnail-gallery {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
        }

        .thumbnail {
            width: 100%;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            border: 3px solid transparent;
        }

        .thumbnail:hover {
            border-color: #7C2FE6;
            transform: scale(1.05);
        }

        /* Info Section */
        .info-section {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .breadcrumb {
            color: #888;
            font-size: 0.9rem;
        }

        .breadcrumb a {
            color: #7C2FE6;
            text-decoration: none;
        }

        .attraction-title-section h1 {
            font-size: 3rem;
            color: #7C2FE6;
            margin-bottom: 0.5rem;
        }

        .rating-section {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .stars {
            color: #FFA502;
            font-size: 1.5rem;
        }

        .rating-text {
            color: #666;
            font-size: 1.1rem;
        }

        .description {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
            background: #f9f9f9;
            padding: 1.5rem;
            border-radius: 15px;
            border-left: 5px solid #A0FF3F;
        }

        .requirements {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .requirements h2 {
            color: #7C2FE6;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .requirement-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .requirement-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: #f9f9f9;
            border-radius: 10px;
        }

        .requirement-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #7C2FE6, #9B4FFF);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            flex-shrink: 0;
        }

        .requirement-icon.warning {
            background: linear-gradient(135deg, #FF4757, #FF6B7A);
        }

        .requirement-text h3 {
            font-size: 1rem;
            color: #333;
            margin-bottom: 0.3rem;
        }

        .requirement-text p {
            font-size: 0.9rem;
            color: #666;
        }

        /* Calendar Section */
        .calendar-section {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .calendar-header h2 {
            color: #7C2FE6;
            font-size: 1.5rem;
        }

        .month-selector {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .month-btn {
            background: #7C2FE6;
            color: white;
            border: none;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.3s;
        }

        .month-btn:hover {
            background: #6A1FD6;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .calendar-day-header {
            text-align: center;
            font-weight: bold;
            padding: 0.8rem;
            color: #7C2FE6;
            font-size: 0.9rem;
        }

        .calendar-day {
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 500;
        }

        .calendar-day.available {
            background: #f5f5f5;
            color: #333;
        }

        .calendar-day.available:hover {
            background: #A0FF3F;
            color: #333;
        }

        .calendar-day.selected {
            background: #7C2FE6;
            color: white;
        }

        .calendar-day.unavailable {
            background: transparent;
            color: #ccc;
            cursor: not-allowed;
        }

        .ticket-section {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 2px solid #f0f0f0;
        }

        .ticket-options {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .ticket-option {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            background: #f9f9f9;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .ticket-option:hover {
            border-color: #7C2FE6;
            background: white;
        }

        .ticket-option.selected {
            border-color: #7C2FE6;
            background: #f0e7ff;
        }

        .btn-book {
            background: linear-gradient(135deg, #A0FF3F 0%, #8FFF00 100%);
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
            width: 100%;
        }

        .btn-book:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(160, 255, 63, 0.4);
        }

        /* Reviews Section */
        .reviews-section {
            margin-top: 4rem;
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .reviews-section h2 {
            color: #7C2FE6;
            margin-bottom: 2rem;
            font-size: 2rem;
        }

        .review-item {
            padding: 1.5rem;
            background: #f9f9f9;
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .reviewer-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .reviewer-avatar {
            width: 50px;
            height: 50px;
            background: #7C2FE6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
        }

        .review-text {
            color: #555;
            line-height: 1.6;
        }

        /* Footer */
        .footer {
            background: #7C2FE6;
            color: white;
            padding: 3rem 2rem 1rem;
            margin-top: 4rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 3rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .footer-section p, .footer-section a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
        }

        .footer-section a:hover {
            color: #A0FF3F;
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

        @media (max-width: 1024px) {
            .detail-grid {
                grid-template-columns: 1fr;
            }

            .requirement-grid {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

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
                        <h2>Selecciona tu Fecha</h2>
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
                            <strong>María González</strong>
                            <div class="stars" style="font-size: 1rem;">⭐⭐⭐⭐⭐</div>
                        </div>
                    </div>
                    <span style="color: #888; font-size: 0.9rem;">Hace 2 días</span>
                </div>
                <p class="review-text">¡Increíble experiencia! La Formula Rosca superó todas mis expectativas. Las inversiones son brutales y la velocidad es impresionante. Definitivamente volveré.</p>
            </div>

            <div class="review-item">
                <div class="review-header">
                    <div class="reviewer-info">
                        <div class="reviewer-avatar">C</div>
                        <div>
                            <strong>Carlos Rodríguez</strong>
                            <div class="stars" style="font-size: 1rem;">⭐⭐⭐⭐⭐</div>
                        </div>
                    </div>
                    <span style="color: #888; font-size: 0.9rem;">Hace 1 semana</span>
                </div>
                <p class="review-text">La mejor montaña rusa en la que he estado. Los loops son perfectos y la sensación de caída libre es única. ¡100% recomendada!</p>
            </div>

            <div class="review-item">
                <div class="review-header">
                    <div class="reviewer-info">
                        <div class="reviewer-avatar">L</div>
                        <div>
                            <strong>Laura Martínez</strong>
                            <div class="stars" style="font-size: 1rem;">⭐⭐⭐⭐</div>
                        </div>
                    </div>
                    <span style="color: #888; font-size: 0.9rem;">Hace 2 semanas</span>
                </div>
                <p class="review-text">Emocionante de principio a fin. Las filas pueden ser largas, pero vale totalmente la pena. Recomiendo el Fast Pass.</p>
            </div>
        </div>
    </div>

    <script>
        // Thumbnail gallery functionality
        const thumbnails = document.querySelectorAll('.thumbnail');
        const mainImage = document.getElementById('mainImage');

        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', () => {
                mainImage.src = thumb.src.replace('w=200', 'w=800');
            });
        });

        // Calendar day selection
        const calendarDays = document.querySelectorAll('.calendar-day.available');
        calendarDays.forEach(day => {
            day.addEventListener('click', () => {
                document.querySelector('.calendar-day.selected')?.classList.remove('selected');
                day.classList.add('selected');
            });
        });

        // Ticket option selection
        const ticketOptions = document.querySelectorAll('.ticket-option');
        ticketOptions.forEach(option => {
            option.addEventListener('click', () => {
                document.querySelector('.ticket-option.selected')?.classList.remove('selected');
                option.classList.add('selected');
            });
        });
    </script>
</body>


@endsection