<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
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

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <!-- FontAwesome para íconos -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
  />
  <!-- AOS para animaciones de scroll -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
  />

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-154969113-1"></script>
  <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
          dataLayer.push(arguments);
      }
      gtag('js', new Date());

      gtag('config', 'UA-154969113-1');
  </script>

<!-- SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
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
    <i class="fab fa-whatsapp fa-2x"></i>
  </a>

  <!-- Navbar (o nav.blade.php) -->
  @include('partials.nav')

  <!-- Contenido dinámico de la página -->
  @yield('content')

  <!-- Footer -->
  @include('partials.footer')

  <!-- Scripts necesarios para Bootstrap y AOS -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
  ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
    AOS.init({
      duration: 1200,
      once: true,
    });
  </script>

  @stack('scripts')
  <!-- Si quieres inyectar más scripts específicos en distintas vistas -->
</body>
</html>
