<link rel="stylesheet" href="{{ asset('css/nav.css') }}">
<script src="{{ asset('js/nav.js') }}"></script>
<nav class="navbar-tactyra">
    <div class="nav-container">

        <!-- Logo -->
        <div class="nav-logo">
            <img src="{{ asset('img/tactyra-logo.png') }}" alt="logo">
        </div>

        <!-- Hamburguesa -->
        <div class="menu-toggle" id="mobile-menu">
            ☰
        </div>

        <!-- Menu -->
        <ul class="nav-menu" id="nav-menu">

            <li><a href="#features">Características</a></li>
            <li><a href="#prices">Precios</a></li>
            <li><a href="#about">Acerca de</a></li>
            <li><a href="#contact">Contacto</a></li>

            <li>
                <a href="{{ route('login') }}" class="btn-login">
                    Acceso Pro
                </a>
            </li>

            <li>
                <a href="{{ route('register') }}" class="btn-register">
                    Empezar a ser Pro
                </a>
            </li>

        </ul>

    </div>
</nav>