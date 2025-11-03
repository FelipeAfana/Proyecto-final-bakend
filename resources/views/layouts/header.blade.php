<style>
    .header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem 2rem;
        background: #7C2FE6;
        color: white;
    }

    .logo-img {
        width: 100px;      /* ajusta el ancho según lo que necesites */
        height: auto;      /* mantiene la proporción */
        object-fit: contain;
    }

    .nav {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .nav a {
        color: white;
        text-decoration: none;
        font-weight: 500;
    }

    .nav a:hover {
        color: #A0FF3F;
    }

    .nav-icons .icon-btn {
        background: transparent;
        border: none;
        font-size: 1.4rem;
        color: white;
        cursor: pointer;
    }

</style>


<header class="header">
    <img src="{{ asset('imagenes/logo.png') }}" alt="Tsunami Splash" class="logo-img">
    <nav class="nav">
        <a href="#inicio">Inicio</a>
        <a href="#atracciones">Atracciones</a>
        <a href="#planes">Planes</a>
        <div class="nav-icons">
            <button class="icon-btn">👤</button>
            <button class="icon-btn">🛒</button>
        </div>
    </nav>
</header>
