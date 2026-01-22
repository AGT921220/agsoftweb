# Troubleshooting 406 Not Acceptable

## Diagnóstico de Error 406

El error **406 Not Acceptable** generalmente ocurre cuando el servidor no puede producir una respuesta que coincida con los valores aceptables definidos en los headers de la petición (Accept, Accept-Language, Accept-Encoding, etc.).

### Causas Comunes

1. **ModSecurity (WAF)** - Reglas que bloquean requests por headers sospechosos
2. **Nginx/Apache** - Configuración restrictiva de Accept headers
3. **Cloudflare** - Reglas de firewall o WAF
4. **Laravel** - Middleware que valida Accept headers (muy raro)

## Verificación Paso a Paso

### 1. Verificar si es Error del Servidor o de Laravel

```bash
# Test básico
curl -I https://agsoftweb.com.mx/

# Test con User-Agent de navegador
curl -A "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36" -I https://agsoftweb.com.mx/

# Test con Accept headers explícitos
curl -H "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8" -I https://agsoftweb.com.mx/

# Test con Accept-Language
curl -H "Accept-Language: es-MX,es;q=0.9,en;q=0.8" -I https://agsoftweb.com.mx/
```

**Si retorna 406**: Es problema del servidor/WAF
**Si retorna 200**: El problema es intermitente o específico de ciertos navegadores/herramientas

### 2. Revisar Logs del Servidor

#### Nginx (si está en producción con Nginx)

```bash
# Error log
tail -f /var/log/nginx/error.log | grep 406

# Access log
tail -f /var/log/nginx/access.log | grep 406

# Buscar en logs de ModSecurity (si está instalado)
tail -f /var/log/modsec_audit.log | grep 406
```

#### Apache (si está en producción con Apache)

```bash
# Error log
tail -f /var/log/apache2/error.log | grep 406

# Access log
tail -f /var/log/apache2/access.log | grep 406

# ModSecurity audit log
tail -f /var/log/apache2/modsec_audit.log | grep 406
```

### 3. Verificar Configuración de Nginx

Si el servidor usa Nginx, revisar:

```nginx
# En /etc/nginx/sites-available/agsoftweb.com.mx o similar
server {
    # Asegurar que acepta todos los tipos de contenido
    location / {
        # NO restringir Accept headers
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    # Si hay validación de Accept, comentarla o hacerla más permisiva
    # location / {
    #     if ($http_accept !~* "text/html") {
    #         return 406;
    #     }
    # }
}
```

### 4. Verificar ModSecurity (WAF)

Si ModSecurity está activo, puede estar bloqueando requests. Revisar:

```bash
# Ver reglas activas
grep -r "406" /etc/modsecurity/

# Ver reglas que validan Accept headers
grep -r "Accept" /etc/modsecurity/rules/
```

**Reglas comunes que causan 406:**
- Validación estricta de `Accept` header
- Validación de `User-Agent` (bloquea bots sin User-Agent)
- Validación de `Accept-Language`
- Reglas contra "suspicious" headers

**Solución temporal (solo para testing):**
```apache
# En .htaccess o configuración de Apache
<IfModule mod_security.c>
    SecRuleRemoveById 123456  # ID de la regla problemática
</IfModule>
```

### 5. Verificar Cloudflare (si aplica)

Si el sitio usa Cloudflare:

1. **Revisar Firewall Rules:**
   - Cloudflare Dashboard → Security → WAF
   - Buscar reglas que puedan bloquear por headers

2. **Revisar Rate Limiting:**
   - Cloudflare Dashboard → Security → Rate Limiting
   - Verificar si hay límites muy restrictivos

3. **Revisar Page Rules:**
   - Cloudflare Dashboard → Rules → Page Rules
   - Verificar si hay reglas que modifiquen headers

4. **Modo de desarrollo (temporal):**
   - Cambiar a "Development Mode" para desactivar WAF temporalmente

### 6. Verificar Laravel (muy raro)

Si el 406 viene de Laravel, buscar en el código:

```bash
# Buscar abort(406) en el código
grep -r "abort(406" app/
grep -r "406" app/Http/Middleware/

# Buscar validación de Accept headers
grep -r "Accept" app/Http/Middleware/
```

**Si encuentra middleware restrictivo:**
- Revisar `app/Http/Kernel.php`
- Comentar o modificar el middleware problemático

## Soluciones Recomendadas

### Para Nginx

```nginx
# Asegurar que acepta todos los tipos de contenido
server {
    listen 80;
    server_name agsoftweb.com.mx;
    
    # Aceptar todos los tipos de contenido
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    # No validar Accept headers estrictamente
    # Si hay validación, hacerla permisiva:
    # location / {
    #     if ($http_accept = "") {
    #         set $http_accept "*/*";
    #     }
    #     try_files $uri $uri/ /index.php?$query_string;
    # }
}
```

### Para Apache + ModSecurity

```apache
# En .htaccess o configuración de Apache
<IfModule mod_headers.c>
    # Asegurar que se aceptan todos los tipos de contenido
    Header always set Accept "*/*"
</IfModule>

# Si ModSecurity está bloqueando, desactivar reglas específicas
<IfModule mod_security.c>
    # Desactivar validación estricta de Accept (ajustar ID según tu configuración)
    SecRuleRemoveById 920170
    SecRuleRemoveById 920171
</IfModule>
```

### Para Cloudflare

1. **Crear Page Rule:**
   - URL: `agsoftweb.com.mx/*`
   - Setting: Security Level → Medium (o Low para testing)
   - Setting: WAF → Off (solo para testing)

2. **Crear Firewall Rule:**
   - Expression: `(http.request.uri.path contains "/")`
   - Action: Allow
   - Priority: High

## Verificación Post-Fix

Después de aplicar cambios:

```bash
# Test 1: Request básico
curl -I https://agsoftweb.com.mx/

# Test 2: Con User-Agent de navegador
curl -A "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36" \
     -H "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8" \
     -I https://agsoftweb.com.mx/

# Test 3: Sin Accept header (simula algunos bots)
curl -H "Accept:" -I https://agsoftweb.com.mx/

# Test 4: Con diferentes Accept headers
curl -H "Accept: application/json" -I https://agsoftweb.com.mx/
curl -H "Accept: */*" -I https://agsoftweb.com.mx/
```

**Todos deberían retornar 200 o 301/302 (redirect), NO 406**

## Checklist de Diagnóstico

- [ ] Verificar logs del servidor (nginx/apache)
- [ ] Verificar logs de ModSecurity (si aplica)
- [ ] Verificar configuración de Cloudflare (si aplica)
- [ ] Probar con curl con diferentes headers
- [ ] Probar desde diferentes navegadores
- [ ] Verificar si es intermitente o constante
- [ ] Verificar si afecta a todos los usuarios o solo algunos
- [ ] Revisar si hay patrones (ciertos User-Agents, IPs, países)

## Notas Importantes

- **NO desactivar ModSecurity completamente** - Solo ajustar reglas específicas
- **NO exponer logs públicamente** - Contienen información sensible
- **Probar cambios en staging primero** - Antes de aplicar en producción
- **Documentar cambios** - Para poder revertir si es necesario

## Contacto para Soporte

Si el problema persiste después de seguir estos pasos:
1. Recopilar logs del servidor (últimas 24 horas)
2. Recopilar ejemplos de requests que fallan (curl output)
3. Documentar configuración actual del servidor
4. Contactar al administrador del servidor o proveedor de hosting
