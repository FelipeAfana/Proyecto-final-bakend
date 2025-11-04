@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/style_promo.css') }}">


<body>
   

    <!-- Hero Section -->
    <section class="hero">
        <h1>Planes y Promociones</h1>
        <p>Encuentra el plan perfecto para tu visita y aprovecha nuestras ofertas especiales</p>
    </section>

    <!-- Plans Section -->
    <div class="container">
        <div class="plans-grid">
            <!-- Plan Solo -->
            <div class="plan-card">
                <div class="plan-header">
                    <div class="plan-icon">✈️</div>
                    <h3 class="plan-title">Plan Solo</h3>
                    <p class="plan-subtitle">Perfecto para aventureros independientes</p>
                </div>
                <div class="plan-price">
                    <div class="price-amount">$45.000</div>
                    <div class="price-period">Por persona / Día completo</div>
                </div>
                <div class="plan-content">
                    <p class="plan-description">
                        Disfruta de un día completo de diversión con acceso ilimitado a todas nuestras atracciones. Ideal para quienes buscan adrenalina sin límites.
                    </p>
                    <ul class="plan-features">
                        <li><span class="feature-icon">✓</span> Acceso a todas las atracciones</li>
                        <li><span class="feature-icon">✓</span> Entrada todo el día</li>
                        <li><span class="feature-icon">✓</span> 1 visita por atracción</li>
                        <li><span class="feature-icon disabled">✗</span> Fast Pass</li>
                        <li><span class="feature-icon disabled">✗</span> Comida incluida</li>
                        <li><span class="feature-icon">✓</span> Acceso a shows</li>
                    </ul>
                    <button class="btn-select-plan" onclick="viewPlanDetail('solo')">Ver Detalles</button>
                </div>
            </div>

            <!-- Plan Familiar -->
            <div class="plan-card featured">
                <span class="featured-badge">⭐ Más Popular</span>
                <div class="plan-header">
                    <div class="plan-icon">👨‍👩‍👧‍👦</div>
                    <h3 class="plan-title">Plan Familiar</h3>
                    <p class="plan-subtitle">La mejor opción para toda la familia</p>
                </div>
                <div class="plan-price">
                    <div class="price-amount">$140.000</div>
                    <div class="price-period">4 personas / Día completo</div>
                </div>
                <div class="plan-content">
                    <p class="plan-description">
                        Paquete completo para disfrutar en familia. Incluye beneficios especiales y áreas exclusivas para hacer de tu visita una experiencia inolvidable.
                    </p>
                    <ul class="plan-features">
                        <li><span class="feature-icon">✓</span> Acceso a todas las atracciones</li>
                        <li><span class="feature-icon">✓</span> Entrada todo el día (4 personas)</li>
                        <li><span class="feature-icon">✓</span> Acceso ilimitado a atracciones</li>
                        <li><span class="feature-icon">✓</span> 2 Fast Pass incluidos</li>
                        <li><span class="feature-icon">✓</span> Combo de almuerzo familiar</li>
                        <li><span class="feature-icon">✓</span> Área de descanso VIP</li>
                        <li><span class="feature-icon">✓</span> Foto familiar de recuerdo</li>
                    </ul>
                    <button class="btn-select-plan featured" onclick="viewPlanDetail('familiar')">Ver Detalles</button>
                </div>
            </div>

            <!-- Plan Amigos -->
            <div class="plan-card">
                <div class="plan-header">
                    <div class="plan-icon">👥</div>
                    <h3 class="plan-title">Plan Amigos</h3>
                    <p class="plan-subtitle">Diversión en grupo garantizada</p>
                </div>
                <div class="plan-price">
                    <div class="price-amount">$100.000</div>
                    <div class="price-period">3 personas / Día completo</div>
                </div>
                <div class="plan-content">
                    <p class="plan-description">
                        Comparte momentos épicos con tus amigos. Descuentos grupales y beneficios especiales para grupos de amigos aventureros.
                    </p>
                    <ul class="plan-features">
                        <li><span class="feature-icon">✓</span> Acceso a todas las atracciones</li>
                        <li><span class="feature-icon">✓</span> Entrada todo el día (3 personas)</li>
                        <li><span class="feature-icon">✓</span> Acceso ilimitado a atracciones</li>
                        <li><span class="feature-icon">✓</span> 1 Fast Pass por persona</li>
                        <li><span class="feature-icon">✓</span> 10% descuento en food court</li>
                        <li><span class="feature-icon">✓</span> Acceso a shows especiales</li>
                    </ul>
                    <button class="btn-select-plan" onclick="viewPlanDetail('amigos')">Ver Detalles</button>
                </div>
            </div>
        </div>

        <!-- Comparison Table -->
        <div class="comparison-section">
            <h2>Compara Nuestros Planes</h2>
            <table class="comparison-table">
                <thead>
                    <tr>
                        <th>Beneficio</th>
                        <th>Solo</th>
                        <th>Familiar</th>
                        <th>Amigos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Acceso a atracciones</td>
                        <td><span class="check">✓</span></td>
                        <td><span class="check">✓</span></td>
                        <td><span class="check">✓</span></td>
                    </tr>
                    <tr>
                        <td>Comida incluida</td>
                        <td><span class="cross">✗</span></td>
                        <td><span class="check">✓</span></td>
                        <td><span class="cross">✗</span></td>
                    </tr>
                    <tr>
                        <td>Área VIP</td>
                        <td><span class="cross">✗</span></td>
                        <td><span class="check">✓</span></td>
                        <td><span class="cross">✗</span></td>
                    </tr>
                    <tr>
                        <td>Descuento en tienda</td>
                        <td><span class="cross">✗</span></td>
                        <td><span class="check">15%</span></td>
                        <td><span class="check">10%</span></td>
                    </tr>
                    <tr>
                        <td>Foto de recuerdo</td>
                        <td><span class="cross">✗</span></td>
                        <td><span class="check">✓</span></td>
                        <td><span class="cross">✗</span></td>
                    </tr>
                </tbody>
            </table>
        </div>


        <!-- FAQ Section -->
        <div class="faq-section">
            <h2>Preguntas Frecuentes</h2>
            <div class="faq-item">
                <div class="faq-question">
                    ¿Puedo cambiar mi plan después de comprarlo? <span>▼</span>
                </div>
                <div class="faq-answer">
                    Sí, puedes modificar tu plan hasta 48 horas antes de tu visita sin costo adicional. Contacta a nuestro servicio al cliente para realizar el cambio.
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    ¿Los niños menores de 3 años pagan entrada? <span>▼</span>
                </div>
                <div class="faq-answer">
                    No, los niños menores de 3 años entran gratis al parque. Solo deben ir acompañados de un adulto responsable.
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    ¿Puedo ingresar comida al parque? <span>▼</span>
                </div>
                <div class="faq-answer">
                    No está permitido ingresar comida externa. Sin embargo, contamos con múltiples opciones gastronómicas dentro del parque para todos los gustos y presupuestos.
                </div>
            </div>
        </div>
    </div>


</body>

@endsection