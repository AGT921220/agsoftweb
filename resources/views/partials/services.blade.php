<!-- resources/views/partials/services.blade.php -->
<section
  id="services"
  class="py-5 text-center"
  data-aos="fade-up"
  data-aos-duration="1200"
>
  <div class="services-content container">
    <h2 class="section-title">Nuestros servicios</h2>
    <p class="lead mb-4">
      Sistemas que ahorran tiempo, reducen errores y dan control en tiempo real
    </p>
    <!-- Primera fila de servicios -->
    <div class="row">
      <div class="col-md-4 mb-4" data-aos="zoom-in">
        <i class="fas fa-laptop-code service-icon fa-3x"></i>
        <h3 class="mt-3">Sistemas Web a Medida</h3>
        <p>
          Reemplaza Excel con sistemas web que automatizan reportes, eliminan captura duplicada y dan visibilidad en tiempo real. Menos errores, menos horas hombre.
        </p>
        <div class="mt-3">
          <x-whatsapp-button 
            label="Cotizar Sistema Web" 
            :text="config('contact.packages.web.whatsapp_text')"
            size="sm"
            tracking="whatsapp_service_web" />
        </div>
      </div>
      <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="200">
        <i class="fas fa-mobile-alt service-icon fa-3x"></i>
        <h3 class="mt-3">Apps Móviles</h3>
        <p>
          Captura de datos en campo, sincronización automática y acceso offline. Reduce retrabajo y acelera la operación desde cualquier lugar.
        </p>
        <div class="mt-3">
          <x-whatsapp-button 
            label="Cotizar App Móvil" 
            :text="config('contact.packages.mobile.whatsapp_text')"
            size="sm"
            tracking="whatsapp_service_mobile" />
        </div>
      </div>
      <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="400">
        <i class="fas fa-network-wired service-icon fa-3x"></i>
        <h3 class="mt-3">Automatización de Procesos</h3>
        <p>
          Estandariza flujos, agrega roles y permisos, y elimina procesos manuales. Trazabilidad completa y menos pérdidas por descontrol.
        </p>
        <div class="mt-3">
          <x-whatsapp-button 
            label="Cotizar Automatización" 
            :text="config('contact.packages.automation.whatsapp_text')"
            size="sm"
            tracking="whatsapp_service_automation" />
        </div>
      </div>
    </div>
    <!-- Segunda fila de servicios -->
    <div class="row mt-4">
      <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="600">
        <i class="fas fa-tools service-icon fa-3x"></i>
        <h3 class="mt-3">Mantenimiento y Soporte</h3>
        <p>
          Soporte continuo para que tu sistema siga funcionando sin interrupciones. Actualizaciones, correcciones y mejoras que mantienen tu operación estable.
        </p>
      </div>
      <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="800">
        <i class="fas fa-server service-icon fa-3x"></i>
        <h3 class="mt-3">Hosting y Configuración</h3>
        <p>
          Infraestructura segura y escalable. Configuración profesional que garantiza disponibilidad y respaldos automáticos para proteger tu información.
        </p>
      </div>
      <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="1000">
        <i class="fas fa-shield-alt service-icon fa-3x"></i>
        <h3 class="mt-3">Seguridad y SSL</h3>
        <p>
          Protección de datos y cumplimiento de estándares. Certificados SSL, cifrado y revisiones de seguridad para evitar pérdidas por vulnerabilidades.
        </p>
      </div>
    </div>
    <!-- Tercera fila de servicios -->
    <div class="row mt-4">
      <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="1200">
        <i class="fas fa-tachometer-alt service-icon fa-3x"></i>
        <h3 class="mt-3">Optimización y Performance</h3>
        <p>
          Sistemas rápidos que no se traban con muchos datos. Optimización de consultas y caché para que tu equipo trabaje sin esperas.
        </p>
      </div>
      <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="1400">
        <i class="fas fa-plug service-icon fa-3x"></i>
        <h3 class="mt-3">Integraciones y Automatización</h3>
        <p>
          Conecta WhatsApp, correo, PDFs y APIs para eliminar tareas repetitivas. Flujos automáticos que ahorran tiempo y reducen errores manuales.
        </p>
      </div>
      <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="1600">
        <i class="fas fa-sync-alt service-icon fa-3x"></i>
        <h3 class="mt-3">Migraciones y Actualizaciones</h3>
        <p>
          Migración sin interrupciones y actualizaciones que mantienen tu sistema moderno y seguro. Sin pérdida de datos ni tiempo de inactividad.
        </p>
      </div>
    </div>
  </div>
</section>
