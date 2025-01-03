<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description"
    content="Servicios de desarrollo web, creación de páginas web y aplicaciones móviles, formateo y reparación de computadoras en Monterrey y San Nicolás, Nuevo León.">
  <meta name="keywords"
    content="Desarrollo Web Monterrey, Páginas Web San Nicolás, Aplicaciones Móviles Nuevo León, Formateo de Computadoras, Reparación de Computadoras, Monterrey, San Nicolás, Nuevo León">
  <meta name="geo.region" content="MX-NLE">
  <meta name="geo.placename" content="Monterrey">
  <meta name="geo.placename" content="San Nicolás">
  <meta name="geo.position" content="25.686614;-100.316112">
  <meta name="ICBM" content="25.686614, -100.316112">
  <meta name="author" content="AgSoftWeb">
  <meta name="robots" content="index, follow">
  <meta name="generator" content="Laravel">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>AgSoftWeb - Desarrolla el Futuro de tu Negocio</title>

  <!-- Bootstrap CSS (Carga diferida) -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
    media="print"
    onload="this.media='all'"
  />

  <!-- FontAwesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    media="print"
    onload="this.media='all'"
  />

  <!-- AOS Animations -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
    media="print"
    onload="this.media='all'"
  />

  <!-- SweetAlert2 CSS -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"
    media="print"
    onload="this.media='all'"
  />

  <!-- App CSS -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-154969113-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-154969113-1');
  </script>

  <!-- SweetAlert2 JS -->
  <script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

  <!-- App JS -->
  <script defer src="{{ asset('js/app.js') }}"></script>
</head>
<body>
  <!-- Botón flotante de WhatsApp -->
  <a
    href="{{ config('site.whatsapp_link') }}"
    target="_blank"
    class="whatsapp-float"
    title="Contáctanos por WhatsApp"
    data-aos="zoom-in"
    data-aos-delay="200"
  >
    <i class="fab fa-whatsapp"></i>
  </a>

  <!-- Navbar -->
  @include('partials.nav')

  <!-- Contenido dinámico -->
  @yield('content')

  <!-- Footer -->
  @include('partials.footer')

  <!-- Scripts -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    defer
  ></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"
    defer
  ></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      AOS.init({
        duration: 2500,
        once: true,
      });
    });
  </script>

  @stack('scripts')
</body>
</html>
