<!-- resources/views/partials/hero.blade.php -->
<section class="hero">
    {{-- <img class="hero-bg" src="/images/hero.avif" alt="Imagen de fondo principal"> --}}
    {{-- <img class="hero-bg" src="/images/hero.avif" width="1920" height="1080" sizes="(max-width: 768px) 100vw, 100vh"
        alt="Imagen de fondo principal"> --}}


        <link rel="preload" as="image" href="/images/hero.avif" imagesrcset="/images/hero-small.avif 768w, /images/hero.avif 1920w" imagesizes="(max-width: 768px) 100vw, 1920px" />

        <img
          class="hero-bg"
          src="/images/hero.avif"
          srcset="
            /images/hero-small.avif 100vw,
            /images/hero.avif 100vw
          "
          sizes="(max-width: 768px) 100vw, 100vh"
          width="1920"
          height="1080"
          alt="Imagen de fondo principal">


    <div class="hero-content">
        <h1><span>Desarrolla el Futuro de tu Negocio</span></h1>
        <p class="lead mt-3">
            Automatiza procesos, reduce errores y ahorra tiempo con sistemas a medida que reemplazan Excel y mejoran el control de tu operación
        </p>

        <div class="hero-cta d-flex flex-column flex-md-row justify-content-center align-items-center gap-3 mt-4">
            <x-whatsapp-button 
                label="Cotizar por WhatsApp" 
                tracking="whatsapp_hero_primary"
                class="shadow-lg" />
            <x-email-button 
                label="Enviar correo" 
                tracking="email_hero_secondary"
                class="shadow-lg" />
          </div>

        <p class="mt-3 mb-0 small text-white fw-semibold">
            <i class="fas fa-clock me-2"></i>{{ config('contact.response_time.whatsapp') }}
        </p>
    </div>
</section>
