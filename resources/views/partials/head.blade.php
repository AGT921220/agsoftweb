{{-- resources/views/partials/head.blade.php --}}
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
      content="Creamos páginas y sistemas web a medida (Laravel) para negocios en Monterrey y NL. Cotiza por WhatsApp y recibe respuesta rápida.">
    <meta name="geo.region" content="MX-NLE">
    <meta name="geo.placename" content="Monterrey">
    <meta name="geo.placename" content="San Nicolás">
    <meta name="geo.position" content="25.686614;-100.316112">
    <meta name="ICBM" content="25.686614, -100.316112">
    <meta name="author" content="AgSoftWeb">
    <meta name="robots" content="index, follow">
    <meta name="generator" content="Laravel">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Desarrollo Web en Monterrey | Sistemas y Landing que Venden - AG SoftWeb</title>
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url('/') }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="Desarrollo Web en Monterrey | Sistemas y Landing que Venden - AG SoftWeb">
    <meta property="og:description" content="Creamos páginas y sistemas web a medida (Laravel) para negocios en Monterrey y NL. Cotiza por WhatsApp y recibe respuesta rápida.">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="es_MX">
    <meta property="og:site_name" content="AG SoftWeb">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url('/') }}">
    <meta name="twitter:title" content="Desarrollo Web en Monterrey | Sistemas y Landing que Venden - AG SoftWeb">
    <meta name="twitter:description" content="Creamos páginas y sistemas web a medida (Laravel) para negocios en Monterrey y NL. Cotiza por WhatsApp y recibe respuesta rápida.">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">

    <!-- Bootstrap CSS (Carga diferida) -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      media="print"
      onload="this.media='all'"
    />
    <noscript>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    </noscript>

    <!-- FontAwesome (Carga diferida) -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      media="print"
      onload="this.media='all'"
    />
    <noscript>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </noscript>

    <!-- AOS Animations (Carga diferida) -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
      media="print"
      onload="this.media='all'"
    />
    <noscript>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    </noscript>

    <!-- SweetAlert2 CSS (Carga diferida) -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"
      media="print"
      onload="this.media='all'"
    />
    <noscript>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    </noscript>

    <!-- CSS Crítico Inline para la sección hero -->
    <style>
      /* CSS Crítico Extraído */
      .hero {
        background: url('/images/hero.avif') no-repeat center center/cover;
        height: 100vh;
        position: relative;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        border-radius: 0 0 25px 25px;
      }

      .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 200px;
        background-color: rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(3px);
        z-index: 1;
      }

      .hero-content {
        position: relative;
        z-index: 2;
        animation-duration: 1.5s;
        animation-name: fadeInDown;
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
    <noscript><link rel="stylesheet" href="{{ asset('css/app.min.css') }}"></noscript>

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
