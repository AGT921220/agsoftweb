<!-- resources/views/partials/footer.blade.php -->
<footer>
    <div class="container">
        <div class="row">
            <!-- Columna 1 -->
            <div class="col-md-4 mb-4">
                <span class="footer-brand">{{ config('site.name') }}</span>
                <p>
                    {{ config('site.description') }}
                </p>
            </div>
            <!-- Columna 2 -->
            <div class="col-md-4 mb-4">
                <h5>Enlaces útiles</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ config('site.useful_links.services') }}">Servicios</a></li>
                    <li><a href="{{ config('site.useful_links.projects') }}">Proyectos</a></li>
                    <li><a href="{{ config('site.useful_links.faq') }}">FAQ</a></li>
                    <li><a href="{{ config('site.useful_links.contact') }}">Contacto</a></li>
                </ul>
            </div>
            <!-- Columna 3 -->
            <div class="col-md-4 mb-4">
                <h5>Contáctanos</h5>
                <p><i class="fas fa-phone-alt"></i> <a href="tel:{{ config('site.contact.phone') }}">
                    {{ config('site.contact.phone') }}</a></p>
                <p><i class="fas fa-envelope"></i> <a href="mailto:{{ config('site.contact.email') }}">{{ config('site.contact.email') }}</a></p>
                <p><i class="fas fa-map-marker-alt"></i> {{ config('site.contact.address') }}</p>
            </div>
        </div>
        <!-- Línea de división y créditos -->
        <div class="footer-bottom">
            &copy;  {{ date('Y') }} {{ config('site.name') }}. Todos los derechos reservados.
        </div>
    </div>
</footer>
