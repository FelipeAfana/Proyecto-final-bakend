

<link rel="stylesheet" href="{{ asset('css/style_header.css') }}">

<header class="header">
    <div class="header-container">
        <img src="{{ asset('imagenes/logo.png') }}" alt="Logo Salitre" class="logo-img">
        
        <nav class="nav-main">
            <a href="{{ route('inicio') }}" class="nav-link">INICIO</a>
            <a href="{{ route('atracciones') }}" class="nav-link">ATRACCIONES</a>
            <a href="{{ route('promo') }}" class="nav-link">PLANES</a>
        </nav>

        <div class="header-actions">
            
            <button class="icon-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
            </button>

            @guest
                <a href="{{ route('login') }}" class="header-btn-secondary">INICIAR SESIÓN</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="header-btn-primary">REGISTRARSE</a>
                @endif
            @else
                <div class="user-dropdown">
                    <button class="btn-user" onclick="toggleDropdown()">
                        {{ Auth::user()->name }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="dropdown-content" id="userDropdown">
                        <a href="#" class="dropdown-item">Mi Perfil</a>
                        <a href="#" class="dropdown-item">Mis Compras</a>
                        <hr>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Cerrar Sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
        </div>

        <!-- Botón hamburguesa para móvil -->
        <button class="menu-toggle" onclick="toggleMobileMenu()">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>



<script>
function toggleDropdown() {
    const dropdown = document.getElementById('userDropdown');
    dropdown.classList.toggle('show');
}

function toggleMobileMenu() {
    // Implementar menú móvil si es necesario
    alert('Menú móvil - Por implementar');
}

// Cerrar dropdown al hacer clic fuera
window.onclick = function(event) {
    if (!event.target.matches('.btn-user') && !event.target.matches('.btn-user *')) {
        const dropdown = document.getElementById('userDropdown');
        if (dropdown && dropdown.classList.contains('show')) {
            dropdown.classList.remove('show');
        }
    }
}
</script>