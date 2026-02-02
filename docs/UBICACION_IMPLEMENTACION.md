# Implementación: Ubicación / Dirección (lista para conversión)

## Resumen de cambios

- **Dirección mostrada en todo el sitio:**  
  `Manuel Doblado 105, Palo Blanco, 66236 San Pedro Garza García, N.L.`

- **Dónde se agregó la ubicación**
  - **Footer:** Columna "Contáctanos" (NAP: Name, Address, Phone). Dirección final + enlace "Abrir en Google Maps".
  - **Sección Contacto:** Bloque "Ubicación" con ícono, dirección, enlace "Abrir en Google Maps" y microcopy ("Estamos en San Pedro Garza García. Visítanos cuando quieras.").
  - **CTA en Contacto:** Botón secundario "Cómo llegar" que abre Google Maps (junto a WhatsApp y Enviar correo).

- **Archivos modificados**
  - `config/site.php` — Dirección completa, campos para schema (street, locality, region, postal, country), `maps_url`.
  - `resources/views/partials/contact.blade.php` — Bloque Ubicación + CTA "Cómo llegar".
  - `resources/views/partials/footer.blade.php` — NAP con dirección final y link "Abrir en Google Maps"; aria-labels en enlaces.
  - `resources/views/layouts/app.blade.php` — JSON-LD LocalBusiness con `address` completo; meta geo actualizadas a San Pedro Garza García.
  - **Nuevo:** `resources/views/partials/location-block.blade.php` — Partial reutilizable (dirección + link Maps).

- **SEO local**
  - JSON-LD tipo `LocalBusiness` con `address` (streetAddress, addressLocality, addressRegion, postalCode, addressCountry).
  - Meta `geo.region`, `geo.placename`, `geo.position` / ICBM para San Pedro Garza García.
  - NAP consistente entre Contacto, Footer y schema.

- **UX / accesibilidad**
  - Enlaces con `aria-label` (teléfono, correo, Maps).
  - "Abrir en Google Maps" con `target="_blank"` y `rel="noopener noreferrer"`.
  - CTA "Cómo llegar" con tamaño táctil adecuado (btn-lg) y responsive (flex-wrap).

---

## TODOs pendientes (placeholders)

- **Nombre del negocio:** Ya en uso `config('site.name')` (AgSoftWeb). Si el cliente quiere otro nombre comercial, cambiar en `config/site.php`.
- **Teléfono:** Ya configurado en `config('site.contact.phone')`. Si falta o cambia, actualizar en `config/site.php`.
- **Horarios:** No implementados. Si el cliente los proporciona, se pueden añadir al JSON-LD (`openingHours`) y opcionalmente al Footer/Contacto.
- **Link oficial de Maps:** Actualmente se usa búsqueda por dirección (`?api=1&query=...`). Si el cliente pasa un link de Google Business / Maps con Place ID, sustituir `config('site.contact.maps_url')` por esa URL.
- **Mapa embebido:** No se añadió iframe por defecto. Opción futura: embed de Maps bajo demanda (lazy) si el cliente lo solicita.

---

## Comprobaciones realizadas

- Dirección idéntica en Contacto y Footer (viene de `config('site.contact.address')`).
- "Abrir en Google Maps" construido con la dirección URL-encoded en `config('site.contact.maps_url')`.
- JSON-LD válido (objeto `address` con todos los campos requeridos); no rompe el HTML.
