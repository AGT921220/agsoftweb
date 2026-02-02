# Troubleshooting 406 Not Acceptable - agsoftweb.com.mx

## Diagnóstico: 406 NO viene de Laravel

**Evidencia del código Laravel:**
- ✅ No hay `abort(406)` en `routes/web.php`
- ✅ No hay middleware que valide headers (Accept, User-Agent)
- ✅ No hay `app/Http/Middleware/` personalizado
- ✅ No hay `app/Exceptions/Handler.php` con lógica de 406
- ✅ `bootstrap/app.php` no tiene middleware restrictivo
- ✅ `app/Providers/AppServiceProvider.php` no tiene lógica de headers

**Conclusión**: El error 406 viene del **servidor/WAF** (Nginx/Apache + ModSecurity) o **Cloudflare**, NO del código Laravel.

## Comandos curl para Reproducir 406

```bash
# Test 1: Request básico (simula algunos bots)
curl -I https://agsoftweb.com.mx/

# Test 2: Con User-Agent de navegador común
curl -A "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36" \
     -I https://agsoftweb.com.mx/

# Test 3: Con Accept headers explícitos
curl -H "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8" \
     -H "Accept-Language: es-MX,es;q=0.9,en;q=0.8" \
     -I https://agsoftweb.com.mx/

# Test 4: Sin Accept header (simula bots sin headers)
curl -H "Accept:" -I https://agsoftweb.com.mx/

# Test 5: Con User-Agent vacío (algunos bots)
curl -H "User-Agent:" -I https://agsoftweb.com.mx/
```

**Si alguno retorna 406**: Confirma que es problema del servidor/WAF.

## Revisar Logs del Servidor

### Nginx (Ubuntu/Debian)

```bash
# Error log
sudo tail -f /var/log/nginx/error.log | grep 406

# Access log (buscar requests que retornan 406)
sudo tail -f /var/log/nginx/access.log | grep " 406 "

# Si usa logrotate, buscar en archivos comprimidos
sudo zgrep " 406 " /var/log/nginx/access.log.*.gz
```

**Paths alternativos** (según distribución):
- CentOS/RHEL: `/var/log/nginx/error.log`, `/var/log/nginx/access.log`
- Si está en Docker: `docker logs nginx-agsoftweb | grep 406`

### Apache (si aplica)

```bash
# Error log
sudo tail -f /var/log/apache2/error.log | grep 406

# Access log
sudo tail -f /var/log/apache2/access.log | grep " 406 "

# CentOS/RHEL
sudo tail -f /var/log/httpd/error_log | grep 406
```

## Detectar ModSecurity Rule-ID

Si ModSecurity está activo, revisar audit log:

```bash
# Ubuntu/Debian
sudo tail -f /var/log/modsec_audit.log | grep 406

# Buscar rule-id específico
sudo grep "406" /var/log/modsec_audit.log | grep "id \""

# Ver reglas que causan 406 (buscar por "Not Acceptable")
sudo grep -r "Not Acceptable\|406" /etc/modsecurity/rules/
```

**Formato del log ModSecurity**:
```
[timestamp] [id "920170"] [msg "Invalid Accept Header"] [severity "CRITICAL"] [ver "OWASP_CRS/3.3.0"]
```

**Rule-IDs comunes que causan 406**:
- `920170`: Invalid Accept Header
- `920171`: Invalid Accept-Language Header
- `920172`: Invalid Accept-Encoding Header
- `920100`: Missing User-Agent Header

## Revisar Cloudflare Security Events

Si el sitio usa Cloudflare:

1. **Dashboard**: https://dash.cloudflare.com/
2. **Security** → **Events**
3. Filtrar por:
   - Status Code: `406`
   - Action: `Block` o `Challenge`
4. Ver detalles del evento:
   - Rule ID
   - Request headers
   - IP origen

**Reglas comunes en Cloudflare que causan 406**:
- WAF Custom Rules que validan Accept headers
- Rate Limiting muy restrictivo
- Bot Fight Mode (puede bloquear algunos User-Agents)

## Fixes Seguros

### Opción 1: Whitelist Rule-ID en ModSecurity

```apache
# En /etc/modsecurity/modsecurity.conf o .htaccess
<IfModule mod_security.c>
    # Desactivar regla específica que causa 406
    SecRuleRemoveById 920170
    SecRuleRemoveById 920171
    # O hacer la regla más permisiva
    SecRule REQUEST_HEADERS:Accept "@rx ^$" \
        "id:920170,\
        phase:1,\
        pass,\
        nolog,\
        ctl:ruleRemoveById=920170"
</IfModule>
```

### Opción 2: Bajar Sensibilidad de ModSecurity

```apache
# En modsecurity.conf
SecRuleEngine DetectionOnly  # Solo detecta, no bloquea (para testing)
# O
SecRequestBodyAccess Off     # Desactivar validación de body (menos seguro)
```

### Opción 3: Exception por Ruta "/"

```apache
# En .htaccess o configuración de Apache
<IfModule mod_security.c>
    <LocationMatch "^/$">
        SecRuleRemoveById 920170
        SecRuleRemoveById 920171
    </LocationMatch>
</IfModule>
```

### Opción 4: Ajustar Nginx (si no usa ModSecurity)

```nginx
# En /etc/nginx/sites-available/agsoftweb.com.mx
server {
    listen 80;
    server_name agsoftweb.com.mx;
    
    # Aceptar todos los tipos de contenido
    location / {
        # Si hay validación de Accept, comentarla o hacerla permisiva
        # if ($http_accept = "") {
        #     set $http_accept "*/*";
        # }
        try_files $uri $uri/ /index.php?$query_string;
    }
}
```

### Opción 5: Cloudflare - Crear Page Rule

1. **Rules** → **Page Rules**
2. Crear regla:
   - URL: `agsoftweb.com.mx/*`
   - Setting: **Security Level** → Medium (o Low para testing)
   - Setting: **WAF** → Off (solo para testing)

### Opción 6: Cloudflare - Crear Firewall Rule

1. **Security** → **WAF** → **Custom Rules**
2. Crear regla:
   - Expression: `(http.request.uri.path eq "/")`
   - Action: **Allow**
   - Priority: High

## Verificación Post-Fix

Después de aplicar cambios:

```bash
# Todos estos deberían retornar 200 o 301/302, NO 406
curl -I https://agsoftweb.com.mx/
curl -A "Mozilla/5.0" -I https://agsoftweb.com.mx/
curl -H "Accept:" -I https://agsoftweb.com.mx/
curl -H "User-Agent:" -I https://agsoftweb.com.mx/
```

## Checklist de Diagnóstico

- [ ] Verificar logs de Nginx/Apache para requests 406
- [ ] Verificar logs de ModSecurity (si aplica)
- [ ] Verificar Cloudflare Security Events (si aplica)
- [ ] Probar con curl con diferentes headers
- [ ] Identificar patrón: ¿qué User-Agents/Accept headers causan 406?
- [ ] Verificar si es intermitente o constante
- [ ] Verificar si afecta a todos los usuarios o solo algunos

## Notas Importantes

- **NO desactivar ModSecurity completamente** - Solo ajustar reglas específicas
- **Probar cambios en staging primero** - Antes de aplicar en producción
- **Documentar cambios** - Para poder revertir si es necesario
- **Monitorear logs después del fix** - Verificar que no haya efectos secundarios
