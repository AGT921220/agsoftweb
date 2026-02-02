# OUTPUT PARA CHATGPT

## 1) 406 - Hallazgos

**¿Causa en Laravel?** NO

**Evidencia:**
- Archivo: `routes/web.php` (líneas 1-61) - No contiene `abort(406)`, solo rutas estándar
- Archivo: `bootstrap/app.php` (líneas 1-19) - No tiene middleware restrictivo, solo configuración básica
- Archivo: `app/Providers/AppServiceProvider.php` (líneas 1-25) - Métodos `register()` y `boot()` vacíos, sin lógica de headers
- Directorio: `app/Http/Middleware/` - NO EXISTE (no hay middleware personalizado)
- Archivo: `app/Exceptions/Handler.php` - NO EXISTE (Laravel 11 usa bootstrap/app.php)
- Archivo: `app/Http/Kernel.php` - NO EXISTE (Laravel 11)

**Búsqueda realizada:**
```bash
grep -r "406\|abort(406\|setStatusCode(406\|NotAcceptableHttpException" app/
# Resultado: No matches found

grep -r "Accept\|User-Agent\|Content-Type\|header.*validate" app/Http/Middleware/
# Resultado: Directory not found (no existe el directorio)
```

**Fix propuesto:**
El 406 viene del servidor/WAF (Nginx/Apache + ModSecurity) o Cloudflare, NO del código Laravel.

**Documentación completa:** Ver `docs/DEPLOY_TROUBLESHOOTING_406.md` (220 líneas) con:
- 5 comandos curl para reproducir 406
- Paths de logs Nginx/Apache (Ubuntu/Debian/CentOS)
- Cómo detectar ModSecurity rule-id en audit log
- Cómo revisar Cloudflare Security Events
- 6 fixes seguros (whitelist rule-id, bajar sensibilidad, exception por ruta "/")

---

## 2) Conversión - Hallazgos

**Landing view:** `resources/views/index.blade.php` (32 líneas)
- Extiende: `layouts.app`
- Incluye: hero, services, clients, benefits, about, why-choose-us, contact

**Layout:** `resources/views/layouts/app.blade.php` (449 líneas)
- Incluye botón flotante WhatsApp en línea 422: `@include('components.whatsapp-float')`

**Problemas detectados:**
- ✅ Hero tiene CTAs (WhatsApp + Email) - YA IMPLEMENTADO
- ✅ Botón flotante WhatsApp visible - YA IMPLEMENTADO
- ✅ WhatsApp usa wa.me con texto precargado - YA IMPLEMENTADO (config/contact.php)
- ✅ Email usa mailto con subject/body - YA IMPLEMENTADO (config/contact.php)
- ✅ Tracking GA4 implementado - YA IMPLEMENTADO (gtag events)
- ⚠️ CTAs repetidos: Hero (2), Benefits (1), Contact (2) = 5 ubicaciones totales (OK)
- ✅ Formulario tiene tracking - YA IMPLEMENTADO (línea 37 de contact.blade.php)

**Cambios implementados:**
- ✅ Componentes Blade creados: whatsapp-button, email-button, whatsapp-float
- ✅ Config centralizada: config/contact.php
- ✅ Hero optimizado con CTAs y tracking
- ✅ Servicios con CTAs específicos por paquete
- ✅ Formulario con tracking y CTAs alternativos
- ✅ Botón flotante en layout global

---

## 3) Código agregado/modificado (copiable)

### config/contact.php (completo)

```php
<?php

return [
    'whatsapp' => [
        'phone' => '5218114875729',
        'text' => 'Hola, quiero una cotización. Necesito: ____ . Mi ciudad: ____ . ¿Cuándo podemos hablar?',
        'url' => 'https://wa.me/5218114875729?text=Hola%2C%20quiero%20una%20cotización.%20Necesito%3A%20____%20.%20Mi%20ciudad%3A%20____%20.%20¿Cuándo%20podemos%20hablar%3F',
    ],

    'email' => [
        'address' => 'contacto@agsoftweb.com.mx',
        'subject' => 'Cotización - AG SoftWeb',
        'body' => 'Hola, quiero una cotización para mi proyecto. Necesito: ____ . Mi ciudad: ____ . ¿Cuándo podemos hablar?',
        'url' => 'mailto:contacto@agsoftweb.com.mx?subject=Cotización%20-%20AG%20SoftWeb&body=Hola%2C%20quiero%20una%20cotización%20para%20mi%20proyecto.%20Necesito%3A%20____%20.%20Mi%20ciudad%3A%20____%20.%20¿Cuándo%20podemos%20hablar%3F',
    ],

    'response_time' => [
        'whatsapp' => 'Respuesta el mismo día (lun–vie)',
        'email' => 'Respuesta en menos de 24 horas (lun–vie)',
    ],

    'packages' => [
        'web' => [
            'name' => 'Sistema Web',
            'whatsapp_text' => 'Hola, me interesa cotizar un sistema web para automatizar mis procesos.',
        ],
        'mobile' => [
            'name' => 'App Móvil',
            'whatsapp_text' => 'Hola, me interesa cotizar una aplicación móvil para mi negocio.',
        ],
        'automation' => [
            'name' => 'Automatización',
            'whatsapp_text' => 'Hola, me interesa automatizar procesos e integraciones (WhatsApp, correo, APIs).',
        ],
    ],
];
```

### resources/views/components/whatsapp-button.blade.php (completo)

```blade
@props([
    'text' => null,
    'label' => 'Cotizar por WhatsApp',
    'size' => 'lg',
    'class' => '',
    'tracking' => 'whatsapp_button',
])

@php
    $whatsappConfig = config('contact.whatsapp');
    $phone = $whatsappConfig['phone'];
    $defaultText = $whatsappConfig['text'];
    $message = $text ?? $defaultText;
    $encodedMessage = rawurlencode($message);
    $url = "https://wa.me/{$phone}?text={$encodedMessage}";
@endphp

<a 
    href="{{ $url }}" 
    target="_blank" 
    rel="noopener noreferrer"
    class="btn btn-success btn-{{ $size }} {{ $class }}"
    data-tracking="{{ $tracking }}"
    onclick="if(typeof gtag !== 'undefined') { gtag('event', 'click_whatsapp', {'event_category': 'engagement', 'event_label': '{{ $tracking }}'}); } console.log('WhatsApp click: {{ $tracking }}');">
    <i class="fab fa-whatsapp me-2"></i>{{ $label }}
</a>
```

### resources/views/components/email-button.blade.php (completo)

```blade
@props([
    'subject' => null,
    'body' => null,
    'label' => 'Enviar correo',
    'size' => 'lg',
    'class' => '',
    'tracking' => 'email_button',
])

@php
    $emailConfig = config('contact.email');
    $email = $emailConfig['address'];
    $defaultSubject = $emailConfig['subject'];
    $defaultBody = $emailConfig['body'];
    $subject = $subject ?? $defaultSubject;
    $body = $body ?? $defaultBody;
    $encodedSubject = rawurlencode($subject);
    $encodedBody = rawurlencode($body);
    $url = "mailto:{$email}?subject={$encodedSubject}&body={$encodedBody}";
@endphp

<a 
    href="{{ $url }}" 
    class="btn btn-primary btn-{{ $size }} {{ $class }}"
    data-tracking="{{ $tracking }}"
    onclick="if(typeof gtag !== 'undefined') { gtag('event', 'click_email', {'event_category': 'engagement', 'event_label': '{{ $tracking }}'}); } console.log('Email click: {{ $tracking }}');">
    <i class="fas fa-envelope me-2"></i>{{ $label }}
</a>
```

### resources/views/components/whatsapp-float.blade.php (completo)

```blade
@php
    $whatsappConfig = config('contact.whatsapp');
    $phone = $whatsappConfig['phone'];
    $text = $whatsappConfig['text'];
    $encodedText = rawurlencode($text);
    $url = "https://wa.me/{$phone}?text={$encodedText}";
@endphp

<a 
    href="{{ $url }}" 
    target="_blank" 
    rel="noopener noreferrer"
    class="whatsapp-float"
    title="Contáctanos por WhatsApp"
    aria-label="Contáctanos por WhatsApp"
    data-tracking="whatsapp_floating"
    onclick="if(typeof gtag !== 'undefined') { gtag('event', 'click_whatsapp', {'event_category': 'engagement', 'event_label': 'whatsapp_floating'}); } console.log('WhatsApp floating click');">
    <i class="fab fa-whatsapp"></i>
</a>
```

### Snippet: Inclusión del botón flotante en layout

**Archivo:** `resources/views/layouts/app.blade.php`
**Líneas:** 420-422

```blade
<body>
    <!-- Botón flotante de WhatsApp -->
    @include('components.whatsapp-float')

    <!-- Navbar -->
    @include('partials.nav')
```

---

## 4) Checklist de pruebas

- [ ] **Mobile iOS**: Abrir https://agsoftweb.com.mx/ - Verificar que CTA WhatsApp hero es visible sin scroll
- [ ] **Mobile Android**: Clic en botón flotante WhatsApp - Verificar que abre app nativa con mensaje prellenado
- [ ] **Desktop**: Clic en "Cotizar por WhatsApp" del hero - Verificar que abre WhatsApp Web con mensaje prellenado
- [ ] **Desktop**: Clic en "Enviar correo" del hero - Verificar que abre cliente de correo con subject="Cotización - AG SoftWeb" y body prellenado
- [ ] **406 Test 1**: `curl -I https://agsoftweb.com.mx/` - Debe retornar 200 o 301/302, NO 406
- [ ] **406 Test 2**: `curl -A "Mozilla/5.0" -I https://agsoftweb.com.mx/` - Debe retornar 200 o 301/302, NO 406
- [ ] **406 Test 3**: `curl -H "Accept:" -I https://agsoftweb.com.mx/` - Debe retornar 200 o 301/302, NO 406
- [ ] **Tracking**: Abrir consola del navegador, hacer clic en WhatsApp - Verificar que aparece `console.log('WhatsApp click: whatsapp_hero_primary')` o evento en GA4 Real-Time

---

## Archivos de Referencia

- **Troubleshooting 406**: `docs/DEPLOY_TROUBLESHOOTING_406.md` (220 líneas)
- **Rutas**: `routes/web.php` (61 líneas)
- **Hero**: `resources/views/partials/hero.blade.php` (45 líneas)
- **Layout**: `resources/views/layouts/app.blade.php` (449 líneas)
- **Config contacto**: `config/contact.php` (46 líneas)
