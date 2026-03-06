<link rel="stylesheet" href="{{ asset('css/footer.css') }}">
<footer>
    <div class="footer-moderno">
        <div class="footer-container">
            {{-- Grid principal --}}
            <div class="footer-grid">
                {{-- Columna 1: Info --}}
                <div class="footer-column footer-info">
                       <img 
                src="{{ asset('img/tactyra-logo.png') }}" 
                alt="María LG"
                style="width: 200px; margin-bottom: 1rem;">
                    <p>
                        Plataforma web para registrar, visualizar y mejorar el rendimiento de tu equipo.

                </p>
                    <!-- <div class="social-links">
                        <a href="#" class="social-link" aria-label="Facebook">📘</a>
                        <a href="#" class="social-link" aria-label="Twitter">🐦</a>
                        <a href="#" class="social-link" aria-label="Instagram">📷</a>
                        <a href="#" class="social-link" aria-label="LinkedIn">💼</a>
                        <a href="#" class="social-link" aria-label="GitHub">🐙</a>
                    </div> -->
    </div>

                {{-- Columna 2: Producto --}}
                <div class="footer-column">
                    <h4>Producto</h4>
                    <ul class="footer-links">
                        <li><a href="#">Características</a></li>
                        <li><a href="#">Precios</a></li>
                        <li><a href="#">Demo</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Soporte</a></li>
                    </ul>
                </div>

                {{-- Columna 3: Compañía --}}
                <div class="footer-column">
                    <h4>Compañía</h4>
                    <ul class="footer-links">
                        <li><a href="#">Sobre nosotros</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Empleo</a></li>
                        <li><a href="#">Prensa</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                </div>

                {{-- Columna 4: Newsletter --}}
                <div class="footer-column">
                    <h4>Newsletter</h4>
                    <p style="margin-bottom: 1rem; font-size: 0.9rem;">
                        Suscríbete para recibir novedades y ofertas exclusivas.
                    </p>
                    <form class="newsletter-form">
                        <input 
                            type="email" 
                            class="newsletter-input" 
                            placeholder="Tu email"
                            required
                        >
                        <button type="submit" class="newsletter-button">
                            Suscribirse
                        </button>
                    </form>
                </div>
            </div>

            {{-- Métodos de pago (opcional) --}}
            <div class="payment-methods">
                <span class="payment-method">Visa</span>
                <span class="payment-method">MasterCard</span>
                <span class="payment-method">PayPal</span>
                <span class="payment-method">Apple Pay</span>
            </div>

            {{-- Barra inferior --}}
            <div class="footer-bottom">
                <div class="copyright">
                    &copy; {{ date('Y') }} {{ config('app.name', 'MiProyecto') }}. 
                    Todos los derechos reservados. 
                    <a href="https://www.instagram.com/marialgweb/" target="_blank" class="footer-link">Hecho por:María LG</a>
                </div>
                <div class="legal-links">
                    <a href="#">Privacidad</a>
                    <a href="#">Términos</a>
                    <a href="#">Cookies</a>
                    <a href="#">Legal</a>
                </div>
            </div>
        </div>
    </div>
</footer>