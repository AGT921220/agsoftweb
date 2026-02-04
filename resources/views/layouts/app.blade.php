<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="Creamos p?ginas y sistemas web a medida (Laravel) para negocios en Monterrey y NL. Cotiza por WhatsApp y recibe respuesta r?pida.">
    <meta name="geo.region" content="MX-NLE">
    <meta name="geo.placename" content="San Pedro Garza Garc?a">
    <meta name="geo.position" content="25.6532;-100.3573">
    <meta name="ICBM" content="25.6532, -100.3573">
    <meta name="author" content="AgSoftWeb">
    <meta name="robots" content="index, follow">
    <meta name="generator" content="Laravel">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Desarrollo Web en Monterrey | Sistemas y Landing que Venden - AG SoftWeb')</title>
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url('/') }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="Desarrollo Web en Monterrey | Sistemas y Landing que Venden - AG SoftWeb">
    <meta property="og:description" content="Creamos p?ginas y sistemas web a medida (Laravel) para negocios en Monterrey y NL. Cotiza por WhatsApp y recibe respuesta r?pida.">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="es_MX">
    <meta property="og:site_name" content="AG SoftWeb">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url('/') }}">
    <meta name="twitter:title" content="Desarrollo Web en Monterrey | Sistemas y Landing que Venden - AG SoftWeb">
    <meta name="twitter:description" content="Creamos p?ginas y sistemas web a medida (Laravel) para negocios en Monterrey y NL. Cotiza por WhatsApp y recibe respuesta r?pida.">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">
    
    <!-- JSON-LD LocalBusiness Schema (SEO local, NAP consistente) -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "{{ config('site.name') }}",
        "description": "Desarrollo web y sistemas a medida para negocios. Creamos páginas web, sistemas personalizados y aplicaciones móviles.",
        "url": "{{ url('/') }}",
        "telephone": "+52-81-1487-5729",
        "email": "{{ config('site.contact.email') }}",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "{{ config('site.contact.address_street') }}",
            "addressLocality": "{{ config('site.contact.address_locality') }}",
            "addressRegion": "{{ config('site.contact.address_region') }}",
            "postalCode": "{{ config('site.contact.postal_code') }}",
            "addressCountry": "{{ config('site.contact.address_country') }}"
        },
        "areaServed": [
            {
                "@type": "City",
                "name": "{{ config('site.contact.address_locality') }}"
            },
            {
                "@type": "State",
                "name": "Nuevo León"
            }
        ],
        "sameAs": [
            "https://wa.me/5218114875729"
        ]
    }
    </script>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">

    <!-- Bootstrap CSS (Carga diferida) -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" media="print" onload="this.media='all'" />

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        media="print" onload="this.media='all'" />

    <!-- AOS Animations -->
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}" media="print" onload="this.media='all'" />

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}" media="print" onload="this.media='all'" />

    <!-- CSS Cr?tico Inline para la secci?n hero -->
    <style>
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
            width: 100vw;
            height: 50vh;
            overflow: hidden;

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
            font-weight: 700;
            color: #ffffff;
            margin-top: 2rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .hero h1 span {
            display: inline-block;
            white-space: normal;
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

        /* Bot?n Flotante WhatsApp Premium */
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 32px;
            text-decoration: none;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4),
                        0 8px 30px rgba(37, 211, 102, 0.3);
            z-index: 1000;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            animation: pulse-whatsapp 2s ease-in-out infinite;
        }

        .whatsapp-float:hover {
            transform: scale(1.1) translateY(-2px);
            box-shadow: 0 6px 25px rgba(37, 211, 102, 0.5),
                        0 12px 40px rgba(37, 211, 102, 0.4);
            background: linear-gradient(135deg, #128C7E 0%, #25D366 100%);
        }

        .whatsapp-float:active {
            transform: scale(0.95);
        }

        .whatsapp-float i {
            transition: transform 0.3s ease;
        }

        .whatsapp-float:hover i {
            transform: scale(1.1);
        }

        @keyframes pulse-whatsapp {
            0%, 100% {
                box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4),
                            0 8px 30px rgba(37, 211, 102, 0.3);
            }
            50% {
                box-shadow: 0 4px 20px rgba(37, 211, 102, 0.6),
                            0 8px 30px rgba(37, 211, 102, 0.5),
                            0 0 0 10px rgba(37, 211, 102, 0.1);
            }
        }

        @media (max-width: 768px) {
            .whatsapp-float {
                bottom: 20px;
                right: 20px;
                width: 56px;
                height: 56px;
                font-size: 28px;
            }
        }

        /* Mejoras Est?ticas Generales */
        .card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 12px;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .btn {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 8px;
            font-weight: 500;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .btn:active {
            transform: translateY(0);
        }

        .section-title {
            position: relative;
            padding-bottom: 15px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #2563EB, #10B981);
            border-radius: 2px;
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Mejoras en Formularios */
        .form-control,
        .form_input {
            transition: all 0.3s ease;
            border-radius: 8px;
        }

        .form-control:focus,
        .form_input:focus {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.15);
            border-color: #2563EB;
        }

        /* Mejoras en Iconos */
        .service-icon,
        .choose-us-icon {
            transition: all 0.3s ease;
        }

        .service-icon:hover,
        .choose-us-icon:hover {
            transform: scale(1.1) rotate(5deg);
        }

        /* Mejoras en Listas */
        .benefits-list li,
        .list-group-item {
            transition: all 0.2s ease;
        }

        .benefits-list li:hover,
        .list-group-item:hover {
            transform: translateX(5px);
            background-color: rgba(37, 99, 235, 0.05);
        }

        /* Navbar mejorado */
        .navbar {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.95) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .nav-link {
            transition: all 0.2s ease;
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%) scaleX(0);
            width: 0;
            height: 2px;
            background: #2563EB;
            transition: all 0.3s ease;
        }

        .nav-link:hover::after {
            width: 80%;
            transform: translateX(-50%) scaleX(1);
        }

        /* Accordion mejorado */
        .accordion-button {
            transition: all 0.3s ease;
        }

        .accordion-button:not(.collapsed) {
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.1), rgba(16, 185, 129, 0.1));
        }

        /* Animaci?n suave para elementos con AOS */
        [data-aos] {
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>

    <!-- Carga As?ncrona del CSS Principal -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}" media="print" onload="this.media='all'">

    <noscript>
        <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
    </noscript>


    {{-- <script src="https://cdn.lgrckt-in.com/LogRocket.min.js" crossorigin="anonymous"></script>
    <script>window.LogRocket && window.LogRocket.init('agsoftweb/pagina-agsoftweb');</script> --}}

    <script src="https://cdn.lgrckt-in.com/LogRocket.min.js" crossorigin="anonymous"></script>
<script>
  if (window.LogRocket) {
    // Inicializa LogRocket con tu proyecto
    LogRocket.init('agsoftweb/pagina-agsoftweb');

    // Genera un ID aleatorio por sesi?n para invitados
    const guestId = 'guest-' + Math.random().toString(36).substring(2, 10);

    // Llama a identify para marcar como completado en LogRocket
    LogRocket.identify(guestId, {
      userType: 'guest'
    });
  }
</script>

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


    <!-- SweetAlert2 JS -->
    <script defer src="{{ asset('js/sweetalert2.min.js') }}"></script>

    <!-- App JS -->
    <script defer src="{{ asset('js/app.js') }}"></script>
    <link rel="preload" as="image" href="/images/oficina_fondo.jpeg" type="image/jpeg">

<script src="https://www.google.com/recaptcha/api.js?render={{ config('app.captcha_public_key') }}"></script>

<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('{{ config('app.captcha_public_key') }}', {action: 'submit'}).then(function(token) {
            document.getElementById('recaptcha_token').value = token;
        });
    });
</script>

</head>

<body>
    <!-- Bot?n flotante de WhatsApp -->
    @include('components.whatsapp-float')

    <!-- Navbar -->
    @include('partials.nav')

    <!-- Contenido din?mico -->
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
