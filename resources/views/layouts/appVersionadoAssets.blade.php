<!-- SweetAlert2 JS -->
<script defer src="{{ asset('js/sweetalert2.min.js') }}?v={{ filemtime(env('APP_ENV') === 'production' ? base_path('public_html/js/sweetalert2.min.js') : public_path('js/sweetalert2.min.js')) }}"></script>

<!-- App JS -->
<script defer src="{{ asset('js/app.js') }}?v={{ filemtime(env('APP_ENV') === 'production' ? base_path('public_html/js/app.js') : public_path('js/app.js')) }}"></script>

<!-- Bootstrap CSS (Carga diferida) -->
<link
    rel="stylesheet"
    href="{{ asset('css/bootstrap.min.css') }}?v={{ filemtime(env('APP_ENV') === 'production' ? base_path('public_html/css/bootstrap.min.css') : public_path('css/bootstrap.min.css')) }}"
    media="print"
    onload="this.media='all'"
/>

<!-- AOS Animations -->
<link
    rel="stylesheet"
    href="{{ asset('css/aos.css') }}?v={{ filemtime(env('APP_ENV') === 'production' ? base_path('public_html/css/aos.css') : public_path('css/aos.css')) }}"
    media="print"
    onload="this.media='all'"
/>

<!-- SweetAlert2 CSS -->
<link
    rel="stylesheet"
    href="{{ asset('css/sweetalert2.min.css') }}?v={{ filemtime(env('APP_ENV') === 'production' ? base_path('public_html/css/sweetalert2.min.css') : public_path('css/sweetalert2.min.css')) }}"
    media="print"
    onload="this.media='all'"
/>

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
<link rel="stylesheet" href="{{ asset('css/app.min.css') }}?v={{ filemtime(env('APP_ENV') === 'production' ? base_path('public_html/css/app.min.css') : public_path('css/app.min.css')) }}" media="print" onload="this.media='all'">
<noscript><link rel="stylesheet" href="{{ asset('css/app.min.css') }}?v={{ filemtime(env('APP_ENV') === 'production' ? base_path('public_html/css/app.min.css') : public_path('css/app.min.css')) }}"></noscript>
