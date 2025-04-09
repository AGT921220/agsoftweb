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
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" media="print" onload="this.media='all'" />

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        media="print" onload="this.media='all'" />

    <!-- AOS Animations -->
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}" media="print" onload="this.media='all'" />

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}" media="print" onload="this.media='all'" />

    <!-- CSS Crítico Inline para la sección hero -->
    <style>
        /* CSS Crítico Extraído */

        .hero {
            position: relative;
            height: 100vh;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;

        }

        @media (max-width: 768px) {
            .hero-content {
                animation: none !important;
                opacity: 1 !important;
            }
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(3px);
            z-index: 1;
        }

        .hero-content {
            z-index: 1;
        }


        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 300;
            color: #ffd700;
            margin-top: 2rem;
        }

        .hero h1 span {
            display: inline-block;
            animation: typing 3s steps(30, end), blink-caret 0.75s step-end infinite;
            white-space: nowrap;
            overflow: hidden;
            border-right: 3px solid #ffd700;
        }

        @keyframes typing {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        @keyframes blink-caret {
            50% {
                border-color: transparent;
            }
        }

        .hero p {
            color: #fff;
            font-size: 1.2rem;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
                margin-top: 1rem;
            }

            .hero h1 span {
                white-space: normal;
                display: block;
            }

            .hero p {
                font-size: 1rem;
            }
        }
    </style>

    <!-- Carga Asíncrona del CSS Principal -->
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}" media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
    </noscript>

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-154969113-1"></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-K4XF8WCYPE"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-K4XF8WCYPE');
    </script>



    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-154969113-1');
    </script>

    <!-- SweetAlert2 JS -->
    <script defer src="{{ asset('js/sweetalert2.min.js') }}"></script>

    <!-- App JS -->
    <script defer src="{{ asset('js/app.js') }}"></script>
    <link rel="preload" as="image" href="/images/hero.avif" type="image/avif">

</head>

<body>
    <!-- Botón flotante de WhatsApp -->
    <a href="{{ config('site.whatsapp_link') }}" target="_blank" class="whatsapp-float" title="Contáctanos por WhatsApp"
        data-aos="zoom-in" data-aos-delay="200">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Navbar -->
    @include('partials.nav')

    <!-- Contenido dinámico -->
    @yield('content')

    <!-- Footer -->
    @include('partials.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 1200,
                once: true,
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
