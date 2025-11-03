<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Ejemplo</title>
    <style>
        /* ===== Estilos del Footer ===== */
        .footer {
            background: #7C2FE6;
            color: white;
            padding: 3rem 2rem 1rem;
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

        .footer-section p,
        .footer-section a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
            line-height: 1.5;
        }

        .footer-section a:hover {
            color: #A0FF3F;
        }

        .footer-bottom {
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 1rem;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
        }
        .social-container {
            display: flex;
            gap: 5rem;
            margin-top: 1rem;
        }
        .social-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;             /* ← Tamaño del círculo */
            height: 60px;            /* ← Tamaño del círculo */
            background-color: rgb(78, 24, 155); /* ← Color del círculo */
            border-radius: 50%;      /* ← Hace el fondo circular */
            cursor: pointer;
            transition: all 0.3s ease;
        }

        /* Estilos de los íconos */
        .social-icon {
            font-size: 2.2rem;      /* ← Aumenta o reduce este valor para cambiar el tamaño */
            cursor: pointer;
            transition: transform 0.2s ease, color 0.3s ease;
        }

        /* Efecto al pasar el mouse */
        .social-icon:hover {
            transform: scale(1.2);
            color: #A0FF3F;         
        }
    </style>
</head>
<body>
    
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Contacto</h3>
                <p>📞 +57 3058556247</p>
                <p>🏠 Cra 68 #94d-24</p>
                <p>✉️ Salitrecontacto@salitre.com</p>
            </div>
            <div class="footer-section">
                <h3>Enlaces Rápidos</h3>
                <a href="#">Atracciones</a>
                <a href="#">Planes y Precios</a>
                <a href="#">Promociones</a>
                <a href="#">Eventos</a>
            </div>
            <div class="footer-section">
                <h3>Síguenos</h3>
                <div class="social-icons">
                    <div class="social-icon">📘</div>
                    <div class="social-icon">📷</div>
                    <div class="social-icon">🎥</div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Salitre Mágico. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
<
</footer>

