<section id="contact" class="contact-form py-5 text-center" data-aos="fade-up" data-aos-duration="1200">
    <h2 class="section-title">Cuéntame tu proceso y te digo el siguiente paso</h2>
    <p class="lead mb-4">
        Completa el formulario o escríbeme por WhatsApp. Respondo el mismo día (lun–vie).
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
                        placeholder="¿Qué proceso llevas en Excel? Ejemplo: Control de inventario, reportes de ventas, gestión de permisos..." required></textarea>
                </div>
                <div class="d-grid gap-2 col-12 mx-auto" data-aos="fade-up" data-aos-delay="800">
                    <button 
                        type="submit" 
                        class="btn btn-primary btn-lg"
                        onclick="if(typeof gtag !== 'undefined') { gtag('event', 'lead_form_submit', {'event_category': 'conversion', 'event_label': 'contact_form'}); } console.log('Form submit');">
                        Enviar
                    </button>
                </div>
                <div class="text-center mt-3">
                    <p class="small text-muted mb-2">
                        <i class="fas fa-shield-alt text-success me-1"></i>
                        <strong>No spam.</strong> Respondo personalmente.
                    </p>
                    <p class="small text-muted mb-0">
                        <i class="fas fa-clock text-primary me-1"></i>
                        <strong>{{ config('contact.response_time.email') }}</strong>
                    </p>
                </div>
            </form>

        </div>
        
        <!-- CTAs Alternativos -->
        <div class="row mt-5">
            <div class="col-12 text-center">
                <p class="lead mb-4">¿Prefieres contactar directamente?</p>
                <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
                    <x-whatsapp-button 
                        label="Cotizar por WhatsApp" 
                        tracking="whatsapp_contact_alternative"
                        class="shadow-lg" />
                    <x-email-button 
                        label="Enviar correo" 
                        tracking="email_contact_alternative"
                        class="shadow-lg" />
                </div>
            </div>
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
                    Sistemas que ahorran tiempo: reportes en minutos, menos captura manual, menos retrabajo.
                </li>
                <li class="list-group-item">
                    <i class="fas fa-check text-success me-2"></i>
                    Reducción de errores: elimina captura duplicada y procesos sin control.
                </li>
                <li class="list-group-item">
                    <i class="fas fa-check text-success me-2"></i>
                    Mejor control: roles, permisos, trazabilidad y visibilidad en tiempo real.
                </li>
                <li class="list-group-item">
                    <i class="fas fa-check text-success me-2"></i>
                    Entregas por etapas: ves avance cada 2 semanas, no esperas meses.
                </li>
                <li class="list-group-item">
                    <i class="fas fa-check text-success me-2"></i>
                    Soporte continuo: mantenimiento y mejoras cuando las necesites.
                </li>
            </ul>
        </div>
    </div>


    <!-- Información de Ubicación y Privacidad -->
    <p class="mt-4" data-aos="fade-up" data-aos-delay="1000">
        <small>
            Respuesta el mismo día (lun–vie). Sin spam, trato directo.
        </small>
    </p>
    <p class="mt-2">
        <small>Operamos de manera remota para ofrecerte flexibilidad y adaptabilidad en cada proyecto.</small>
    </p>
    <p class="mt-2">
        <small>Tu privacidad es importante para nosotros. Toda la información proporcionada será tratada con estricta
            confidencialidad.</small>
    </p>


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
