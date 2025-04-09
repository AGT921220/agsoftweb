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
            Soluciones digitales que impulsan tu crecimiento y rentabilidad
        </p>
        <a href="#contact" class="btn btn-hero btn-lg mt-4">Comienza tu proyecto hoy</a>
    </div>
</section>
