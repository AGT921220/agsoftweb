<footer>
    <div class="container">
        <div class="row">
            <!-- Columna 1 -->
            <div class="col-12 col-md-4 mb-4">
                <p class="footer-brand">{{ config('site.name') }}</p>
                <p>{{ config('site.description') }}</p>
            </div>
            <!-- Columna 2 -->
            <div class="col-12 col-md-4 mb-4">
                <h3>Enlaces útiles</h3>
                <ul class="list-unstyled">
                    <li><a href="{{ config('site.useful_links.services') }}" rel="noopener">Servicios</a></li>
                    {{-- <li><a href="{{ config('site.useful_links.projects') }}" rel="noopener">Proyectos</a></li> --}}
                    <li><a href="{{ config('site.useful_links.faq') }}" rel="noopener">FAQ</a></li>
                    <li><a href="{{ config('site.useful_links.contact') }}" rel="noopener">Contacto</a></li>
                </ul>
            </div>
            <!-- Columna 3 -->
            <div class="col-12 col-md-4 mb-4">
                <h3>Contáctanos</h3>
                <p>
                    <i class="fas fa-phone-alt" role="img" aria-hidden="true"></i>
                    <a href="tel:{{ config('site.contact.phone') }}">{{ config('site.contact.phone') }}</a>
                </p>
                <p>
                    <i class="fas fa-envelope" role="img" aria-hidden="true"></i>
                    <a href="mailto:{{ config('site.contact.email') }}">{{ config('site.contact.email') }}</a>
                </p>
                <p>
                    <i class="fas fa-map-marker-alt" role="img" aria-hidden="true"></i>
                    {{ config('site.contact.address') }}
                </p>
            </div>
        </div>
        <!-- Línea de división y créditos -->
        <div class="footer-bottom">
            &copy; {{ date('Y') }} {{ config('site.name') }}. Todos los derechos reservados.
        </div>
    </div>
</footer>
