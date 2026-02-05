# Analytics (GA4) – Configuración y eventos de conversión

## 1. Qué se detectó

- **Layout principal:** `resources/views/layouts/app.blade.php` (head y scripts inline en el mismo archivo).
- **Estado anterior:** Se cargaban **dos** scripts de Google:
  - **Universal Analytics (UA-154969113-1)** — obsoleto, ya no debe usarse.
  - **Google Analytics 4 (G-K4XF8WCYPE)** — gtag.js.
- **Origen:** IDs hardcodeados en el layout. No había GTM (Google Tag Manager).
- **Eventos:** Varios `onclick` inline en componentes (whatsapp-button, email-button, whatsapp-float) y en el botón "Enviar" del formulario de contacto, con nombres antiguos (`click_whatsapp`, `click_email`, `lead_form_submit`).

**Decisión:** Un solo proveedor **gtag (GA4)**. UA eliminado. GTM no se usa; si en el futuro se migra a GTM, los eventos pueden reenviarse vía dataLayer desde el mismo `analytics.js` o desde GTM.

---

## 2. Dónde quedó integrado

| Elemento | Ubicación |
|----------|-----------|
| Configuración | `config/analytics.php` (provider, GA4 ID, GTM ID, enabled). |
| Carga de gtag | `resources/views/layouts/app.blade.php`: un solo bloque condicional que inyecta gtag.js cuando `provider=gtag` y hay `ga4_measurement_id`. |
| Eventos de conversión | `public/js/analytics.js`: delegación de eventos en `document`, sin inline. |
| Inclusión del script | Layout `app.blade.php`: `<script defer src="{{ asset('js/analytics.js') }}"></script>` después de `app.js`. |

No se duplica **page_view**: GA4 lo envía solo con `gtag('config', 'G-XXX')`; no se añade ningún page_view extra.

---

## 3. Variables de entorno

Añadir en **`.env`** (y en **`.env.example`** para documentar):

```env
# Analytics
ANALYTICS_PROVIDER=gtag
GA4_MEASUREMENT_ID=G-K4XF8WCYPE
GTM_CONTAINER_ID=
ANALYTICS_ENABLED=true
```

- **ANALYTICS_PROVIDER:** `gtag` | `gtm` | `none`. Con `none` no se inyecta gtag (recomendado en local).
- **GA4_MEASUREMENT_ID:** ID de medición GA4 (G-XXXXXXXXX). Obligatorio si `provider=gtag`.
- **GTM_CONTAINER_ID:** Para uso futuro con GTM (GTM-XXXXXXX). No se usa con `provider=gtag`.
- **ANALYTICS_ENABLED:** `true` | `false`. En `false` no se carga el script de gtag (el JS de eventos sigue cargado pero no envía nada si gtag no existe).

**Producción:** Dejar `ANALYTICS_PROVIDER=gtag`, `GA4_MEASUREMENT_ID` con tu ID real y `ANALYTICS_ENABLED=true`.  
**Local:** `ANALYTICS_PROVIDER=none` o `ANALYTICS_ENABLED=false` para evitar tráfico de prueba en GA4.

---

## 4. Eventos implementados (leads)

| Evento | Cuándo se dispara |
|--------|-------------------|
| **contact_whatsapp** | Clic en enlaces a `wa.me` o `api.whatsapp` (botones y flotante WhatsApp). |
| **contact_email** | Clic en enlaces `mailto:`. |
| **cta_contact** | Clic en enlaces/botones con texto "Contacto", "Cotizar", "Enviar", "Agenda", o con `data-cta="contact"`; o envío del formulario de contacto (action `/contact`). |
| **scroll_75** | Una vez por página cuando el usuario llega al 75 % del scroll. |

Todos se envían con `gtag('event', nombre, { event_category: 'lead' | 'engagement', event_label: ... })`. Si gtag no está cargado (p. ej. `provider=none`), el script hace no-op y no genera errores.

---

## 5. Cómo probar

### En consola del navegador

1. Con analytics activo (`provider=gtag` y ID configurado), abre la web y la consola (F12).
2. Haz clic en WhatsApp, en un mailto, en "Contacto" o "Enviar" y revisa la pestaña Red: peticiones a `google-analytics.com` o `googletagmanager.com`.
3. Para comprobar que el script no rompe con analytics desactivado: en `.env` pon `ANALYTICS_PROVIDER=none`, recarga y repite clics; no debe haber errores en consola.

### GA4 DebugView

1. Instala la extensión [Google Analytics Debugger](https://chrome.google.com/webstore/detail/google-analytics-debugger/jnkmfdileelhofjcijamephohjechhna) (Chrome) o habilita el modo debug vía consola: antes de cargar gtag, ejecuta `window.gtag = function() { console.log('gtag', arguments); };` (alternativa: en la URL de tu sitio añade `?gtm_debug=x` si usas GTM; con gtag puro la extensión o el parámetro de debug de GA4 son la opción).
2. En GA4: **Admin > Depuración y publicación > Depuración** (o flujo **Configurar > Depuración**). Abre **DebugView** en tiempo real.
3. Navega al sitio, haz clics en WhatsApp, correo, "Contacto", "Enviar" y scroll hasta ~75 %. En DebugView deberían aparecer los eventos `contact_whatsapp`, `contact_email`, `cta_contact` y `scroll_75`.

### Comprobar que no hay doble page_view

En DebugView, carga la página una vez y verifica que solo se registra un `page_view` por carga (el que envía `gtag('config', 'G-XXX')`). No se añade ningún page_view desde `analytics.js`.

---

## 6. Archivos modificados / creados

- **config/analytics.php** — Nuevo. Lee `ANALYTICS_PROVIDER`, `GA4_MEASUREMENT_ID`, `GTM_CONTAINER_ID`, `ANALYTICS_ENABLED`.
- **resources/views/layouts/app.blade.php** — Eliminados UA y doble GA4; un solo bloque gtag condicional; carga de `analytics.js`.
- **public/js/analytics.js** — Nuevo. Eventos por delegación y scroll 75 %, no-op si no hay gtag.
- **resources/views/components/whatsapp-button.blade.php** — Eliminado `onclick` de tracking.
- **resources/views/components/email-button.blade.php** — Eliminado `onclick` de tracking.
- **resources/views/components/whatsapp-float.blade.php** — Eliminado `onclick` de tracking.
- **resources/views/partials/contact.blade.php** — Eliminado `onclick` del botón "Enviar".

Los eventos de conversión quedan centralizados en `public/js/analytics.js`; no se usa código inline para analytics (compatible con CSP estricta si se aplica).
