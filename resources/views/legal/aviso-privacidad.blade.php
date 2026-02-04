{{-- Aviso de Privacidad – AgsoftWeb / Alfredo Gutiérrez Torres – México --}}
@extends('layouts.app')

@section('title', 'Aviso de Privacidad | AgsoftWeb')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <h1 class="h2 mb-4">Aviso de Privacidad</h1>
            <p class="text-muted small mb-4">Última actualización: Febrero 2026</p>

            <section class="mb-4">
                <h2 class="h5 mb-2">Responsable</h2>
                <p class="mb-0">
                    <strong>Alfredo Gutiérrez Torres</strong>, operando bajo el nombre comercial <strong>AgsoftWeb</strong> (persona física con actividad en México, sin marca registrada). Ubicación: Monterrey, Nuevo León. Dirección para notificaciones: Manuel Doblado 105, Palo Blanco, 66236 San Pedro Garza García, N.L.
                </p>
            </section>

            <section class="mb-4">
                <h2 class="h5 mb-2">Datos que recabamos</h2>
                <p>En el sitio <strong>agsoftweb.com.mx</strong> podemos recabar:</p>
                <ul>
                    <li><strong>Formulario de contacto y cotizaciones:</strong> nombre, correo electrónico, teléfono y mensaje.</li>
                    <li><strong>Datos de facturación</strong> (si aplica): nombre o razón social, RFC, domicilio fiscal y datos necesarios para emitir factura.</li>
                    <li><strong>Datos técnicos:</strong> dirección IP, tipo de navegador y datos de uso del sitio cuando utilizamos herramientas de análisis (p. ej. Google Analytics).</li>
                </ul>
            </section>

            <section class="mb-4">
                <h2 class="h5 mb-2">Finalidades</h2>
                <p>Usamos tus datos para:</p>
                <ul>
                    <li>Responder solicitudes de contacto y cotizaciones.</li>
                    <li>Prestar los servicios contratados y dar seguimiento.</li>
                    <li>Facturación cuando aplique.</li>
                    <li>Mejorar el sitio y la experiencia del usuario (con datos agregados o anónimos cuando usamos analytics).</li>
                </ul>
            </section>

            <section class="mb-4">
                <h2 class="h5 mb-2">Medios de contacto</h2>
                <p class="mb-0">
                    Para cualquier tema relacionado con tus datos personales o este aviso: <a href="mailto:contacto@agsoftweb.com.mx">contacto@agsoftweb.com.mx</a>.
                </p>
            </section>

            <section class="mb-4">
                <h2 class="h5 mb-2">Derechos ARCO</h2>
                <p>
                    Tienes derecho a <strong>Acceder</strong>, <strong>Rectificar</strong>, <strong>Cancelar</strong> u <strong>Oponerte</strong> al tratamiento de tus datos (derechos ARCO). Para ejercerlos, envía un correo a <a href="mailto:contacto@agsoftweb.com.mx">contacto@agsoftweb.com.mx</a> indicando tu nombre, correo y lo que solicitas. Te responderemos en un plazo razonable. Si consideras que tu derecho a la protección de datos fue afectado, puedes acudir al Instituto Nacional de Transparencia, Acceso a la Información y Protección de Datos Personales (INAI).
                </p>
            </section>

            <section class="mb-4">
                <h2 class="h5 mb-2">Transferencias</h2>
                <p class="mb-0">
                    No vendemos ni compartimos tus datos con terceros para fines comerciales. Solo podremos compartir información cuando la ley lo exija o con proveedores necesarios para operar el sitio y los servicios (por ejemplo: hosting, correo electrónico o herramientas de análisis), bajo compromiso de confidencialidad y uso limitado.
                </p>
            </section>

            <section class="mb-4">
                <h2 class="h5 mb-2">Cookies y tecnologías similares</h2>
                <p>
                    El sitio puede utilizar <strong>cookies</strong> y tecnologías similares para el correcto funcionamiento de la página y, en su caso, para análisis de visitas (p. ej. Google Analytics). Puedes configurar tu navegador para bloquear o eliminar cookies; ello puede afectar algunas funciones del sitio.
                </p>
            </section>

            <section class="mb-4">
                <h2 class="h5 mb-2">Medidas de seguridad</h2>
                <p class="mb-0">
                    Aplicamos medidas razonables para proteger tus datos: acceso restringido, contraseñas y buenas prácticas en el manejo de la información. Ningún medio por Internet es 100% infalible; hacemos lo posible por reducir riesgos.
                </p>
            </section>

            <section class="mb-4">
                <h2 class="h5 mb-2">Cambios al aviso</h2>
                <p class="mb-0">
                    Cualquier cambio a este Aviso de Privacidad se publicará en esta misma página. Te recomendamos consultarla de vez en cuando. La “Última actualización” indicada al inicio refleja la vigencia del texto.
                </p>
            </section>

            <hr class="my-4">
            <p class="small text-muted mb-0">
                AgsoftWeb · <a href="{{ url('/') }}">agsoftweb.com.mx</a> · <a href="mailto:contacto@agsoftweb.com.mx">contacto@agsoftweb.com.mx</a>
            </p>
        </div>
    </div>
</div>
@endsection
