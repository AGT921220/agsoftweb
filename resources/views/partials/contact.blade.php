<section id="contact" class="contact-form py-5 text-center" data-aos="fade-up" data-aos-duration="1200">
    <h2 class="section-title">¿Listo para llevar tu negocio al siguiente nivel?</h2>
    <p class="lead mb-4">
        Completa el formulario para recibir tu cotización sin compromiso y descubre
        cómo podemos impulsar tus resultados en tiempo récord.
    </p>


    <div class="container">
        <!-- Resumen de beneficios y llamada a la acción -->
        <div class="row justify-content-center mb-5">

            <!-- Formulario de contacto -->
            <form action="/contact" method="POST" class="mt-4">
                @csrf
                <input type="hidden" name="recaptcha_token" id="recaptcha_token">

                <div class="mb-3" data-aos="fade-up">
                    <input type="text" class="form-control form_input" name="nombre" placeholder="Nombre"
                        required />
                </div>
                <div class="mb-3" data-aos="fade-up" data-aos-delay="200">
                    <input type="email" class="form-control form_input" name="email"
                        placeholder="Correo electrónico" required />
                </div>
                <div class="mb-3" data-aos="fade-up" data-aos-delay="400">
                    <input type="tel" class="form-control form_input" name="telefono"
                        placeholder="Teléfono (Opcional)" />
                </div>
                <div class="mb-3" data-aos="fade-up" data-aos-delay="600">
                    <textarea class="form-control form_input" rows="4" name="mensaje"
                        placeholder="Cuéntanos brevemente sobre tu proyecto o necesidad" required></textarea>
                </div>
                <div class="d-grid gap-2 col-12 mx-auto" data-aos="fade-up" data-aos-delay="800">
                    <button type="submit" class="btn btn-primary btn-lg">
                        Obtener Consulta Personalizada Gratis
                    </button>
                </div>
            </form>

        </div>
    </div>

</section>


<!-- resources/views/partials/contact.blade.php -->
<div class="container">
    <!-- Resumen de beneficios y llamada a la acción -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <ul class="list-group list-group-flush text-start">
                <li class="list-group-item">
                    <i class="fas fa-check text-success me-2"></i>
                    Soluciones totalmente personalizadas y escalables para tu negocio.
                </li>
                <li class="list-group-item">
                    <i class="fas fa-check text-success me-2"></i>
                    Equipo de expertos con más de <strong>7 años</strong> de experiencia
                    en proyectos de alto impacto.
                </li>
                <li class="list-group-item">
                    <i class="fas fa-check text-success me-2"></i>
                    Acompañamiento <strong>antes, durante y después</strong> del
                    lanzamiento.
                </li>
                <li class="list-group-item">
                    <i class="fas fa-check text-success me-2"></i>
                    Implementación de las mejores prácticas en tu industria para asegurar
                    la calidad y eficiencia de tus proyectos.
                </li>
                <li class="list-group-item">
                    <i class="fas fa-check text-success me-2"></i>
                    Soporte técnico dedicado para resolver cualquier inquietud de manera
                    oportuna.
                </li>
                <li class="list-group-item">
                    <i class="fas fa-check text-success me-2"></i>
                    Herramientas y tecnologías actualizadas para mantener tu negocio
                    competitivo en el mercado.
                </li>
            </ul>
        </div>
    </div>


    <!-- Información de Ubicación y Privacidad -->
    <p class="mt-4" data-aos="fade-up" data-aos-delay="1000">
        <small>
            Responderemos tu solicitud en menos de 24 horas hábiles. ¡Estamos ansiosos
            por ayudarte a lograr resultados tangibles con la transformación digital
            de tu negocio!
        </small>
    </p>
    <p class="mt-2">
        <small>Basados en San Nicolás, Nuevo León | Operamos de manera remota para ofrecerte flexibilidad y
            adaptabilidad en cada proyecto.</small>
    </p>
    <p class="mt-2">
        <small>Tu privacidad es importante para nosotros. Toda la información proporcionada será tratada con estricta
            confidencialidad.</small>
    </p>

    <!-- Mapa General de San Nicolás -->
    <div class="mt-4" data-aos="fade-up" data-aos-delay="1200">
        <h3>Ubicación</h3>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.746755727296!2d-100.30892118459514!3d25.682864383959343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8692b94f7f1d5fdb%3A0x9b3f7a1f3f4c5a8!2sSan%20Nicol%C3%A1s%20de%20los%20Garza%2C%20Nuevo%20Le%C3%B3n!5e0!3m2!1ses-419!2smx!4v1617186487053!5m2!1ses-419!2smx"
            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
            title="Mapa de San Nicolás de los Garza, Nuevo León"></iframe>
    </div>

    {{-- <!-- Testimonios -->
    <div class="testimonial-section mt-5" data-aos="fade-up" data-aos-delay="1400">
      <h5>Lo que dicen nuestros clientes</h5>
      <div class="testimonial">
        <p>"Gracias a su equipo, nuestra aplicación móvil superó todas las expectativas y mejoró significativamente nuestra interacción con los clientes."</p>
        <cite>- Juan Pérez, CEO de Empresa XYZ</cite>
      </div>
      <!-- Agrega más testimonios según sea necesario -->
    </div> --}}
</div>
