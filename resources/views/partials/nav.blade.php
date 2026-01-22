<!-- resources/views/partials/nav.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" data-aos="fade-down">
    <div class="container">
        <img src="{{ asset('images/logo.avif') }}" alt="Logo" width="100px" class="d-inline-block align-text-top me-2">
      {{-- <a class="navbar-brand" href="#">AgSoftWeb</a> --}}
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link text-dark" href="#services">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#clients">Clientes</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link text-dark" href="#projects">Proyectos</a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link text-dark" href="#benefits">Beneficios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#about-us">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#why-choose-us">Por qué elegirnos</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link text-dark" href="#faq">FAQ</a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link text-dark" href="#contact">Contacto</a>
          </li>
        </ul>
        <div class="d-none d-lg-flex contact-icons ms-3">
          <a href="tel:{{ config('site.phone') }}" class="btn btn-link"
            ><i class="fas fa-phone-alt"></i
          >Llamar</a>
          <a href="mailto:{{ config('site.email') }}" class="btn btn-link"
            ><i class="fas fa-envelope"></i
          >Correo</a>
          <a href="{{ config('site.whatsapp_link') }}" class="btn btn-link"
            ><i class="fab fa-whatsapp"></i
          >Whatsapp</a>
        </div>
      </div>
    </div>
  </nav>
