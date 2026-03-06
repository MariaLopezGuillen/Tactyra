<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Favicon -->
    @include('components.favicon.favicon')
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <!-- Menu -->
    @include('components.menu.nav')
    <div class="container">
    <h1>Tu herramienta favorita para <a style="color: #1f51f5;">scouting de futbol base</a></h1>
     <!-- Grid de 2 columnas -->
        <div class="grid-container">
            
            <!-- BLOQUE IZQUIERDO -->
            <div class=" block-left">
                <!-- Encabezado -->
                <p>Analiza jugadores y equipos de categorias formativas. Crea informes detallados, gestiona tu equipo y planifica tu estrategia personalizada</p>
            </div>

            <!-- BLOQUE DERECHO -->
            <div class="block-right">
                <img src="{{ asset('img/tactyra-background.png') }}" alt="Imagen de bienvenida" class="welcome-image">
               
            </div>

        </div>
    </div>
    </div>
    <div id="about">    
        <h2>Gestiona tu equipo de forma eficiente</h2>
         <h4>Con tan solo unos pocos clics</h4>
           <!-- Galeria de fotos -->
    <div class="grid-gallery">
    <a class="grid-gallery__item" href="#">
        <img class="grid-gallery__image" src="{{ asset('img/tactyra-logo.png') }}">
    </a>
    <a class="grid-gallery__item" href="#">
        <img class="grid-gallery__image" src="{{ asset('img/tactyra-background.png') }}">
    </a>
    <a class="grid-gallery__item" href="#">
        <img class="grid-gallery__image" src="{{ asset('img/feature1.png') }}">
    </a>
    <a class="grid-gallery__item" href="#">
        <img class="grid-gallery__image" src="{{ asset('img/feature2.png') }}">
    </a>
</div>
    </div>

   <section class="features-section" id="features">
        <div class="features-container">
            <h2 class="features-title">Nuestras Características</h2>
            <p class="features-subtitle">Descubre todas las funciones que Tactyra pone a tu disposición</p>

            <div class="features-grid">
                <!-- Feature 1 -->
                <div class="feature-card">
                    <div class="feature-icon">👥</div>
                    <h3 class="feature-title">Análisis de Jugadores Base</h3>
                    <p class="feature-description">
                        Crea informes detallados de jugadores jóvenes con métricas avanzadas, posiciones en campo y evaluaciones técnicas enfocadas en categorías formativas.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="feature-card">
                    <div class="feature-icon">🏆</div>
                    <h3 class="feature-title">Gestión de Equipos Formativos</h3>
                    <p class="feature-description">
                        Analiza equipos de categorías base, sistemas de juego, fortalezas y debilidades tácticas en competiciones formativas españolas.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="feature-card">
                    <div class="feature-icon">❤️</div>
                    <h3 class="feature-title">Lista de Favoritos</h3>
                    <p class="feature-description">
                        Guarda tus jugadores jóvenes, equipos formativos y competiciones de base favoritas para acceso rápido o seguimiento continuo.
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="feature-card">
                    <div class="feature-icon">📅</div>
                    <h3 class="feature-title">Planificación</h3>
                    <p class="feature-description">
                        Programa y organiza tus sesiones de scouting con calendario integrado y notificaciones inteligentes.
                    </p>
                </div>

                <!-- Feature 5 -->
                <div class="feature-card">
                    <div class="feature-icon">📄</div>
                    <h3 class="feature-title">Informes PDF</h3>
                    <p class="feature-description">
                        Genera reportes profesionales en PDF para compartir con tu equipo técnico y directiva del club.
                    </p>
                </div>

                <!-- Feature 6 -->
                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3 class="feature-title">Base de Datos Nacional</h3>
                    <p class="feature-description">
                        Accede a una amplia base de datos de jugadores y equipos de competiciones españolas de fútbol base.
                    </p>
                </div>
            </div>
        </div>
    </section>



  
<!-- Footer -->
    @include('components.footer.footer')
</body>
</html>