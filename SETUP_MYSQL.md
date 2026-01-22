# Configuración MySQL - Solución al Error de Conexión

## Problema Resuelto ✅

El error `SQLSTATE[HY000] [1130] Host '172.25.0.3' is not allowed to connect` ha sido solucionado.

## Solución Aplicada

Se ejecutaron los siguientes comandos en el contenedor MySQL:

```sql
-- Crear usuarios con host '%' para permitir conexiones desde la red Docker
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
CREATE USER IF NOT EXISTS 'root'@'%' IDENTIFIED BY '1234';

-- Otorgar privilegios
GRANT ALL PRIVILEGES ON `db`.* TO 'user'@'%';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;

-- Crear base de datos
CREATE DATABASE IF NOT EXISTS `db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

FLUSH PRIVILEGES;
```

## Para Futuras Instalaciones

### Opción 1: Instalación Nueva (Volumen No Existe)

El script `docker/mysql/init/01-grants.sh` se ejecutará automáticamente.

**Pasos:**
```bash
# 1. Crear directorio y script (requiere sudo)
sudo mkdir -p docker/mysql/init
sudo cp /tmp/01-grants.sh docker/mysql/init/01-grants.sh
sudo chmod +x docker/mysql/init/01-grants.sh

# 2. Levantar contenedores
docker compose down
docker volume rm agsoftweb_mysql_data  # Solo si quieres empezar desde cero
docker compose up -d --build
```

### Opción 2: Volumen Ya Existe (Ejecutar Manualmente)

Si el volumen MySQL ya existe, ejecuta este comando:

```bash
# Ejecutar script de corrección
docker compose exec mysql bash -c "$(cat /tmp/fix-mysql-permissions.sh)"
```

O manualmente:

```bash
docker compose exec mysql mysql -u root << 'SQL'
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON `db`.* TO 'user'@'%';
CREATE USER IF NOT EXISTS 'root'@'%' IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;
CREATE DATABASE IF NOT EXISTS `db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
FLUSH PRIVILEGES;
SQL
```

## Verificar Conexión

```bash
# Limpiar caché de Laravel
docker compose exec php php artisan config:clear
docker compose exec php php artisan cache:clear

# Probar conexión
docker compose exec php php artisan tinker --execute="echo DB::connection()->getPdo() ? 'Connected' : 'Not connected';"
```

## Configuración Actual

### Variables de Entorno (docker-compose.yml)
- `MYSQL_ROOT_PASSWORD=1234`
- `MYSQL_USER=user`
- `MYSQL_PASSWORD=password`
- `MYSQL_DATABASE=db`

### Variables de Entorno (.env)
- `DB_HOST=mysql` (nombre del servicio Docker)
- `DB_PORT=3306`
- `DB_DATABASE=db`
- `DB_USERNAME=user`
- `DB_PASSWORD=password`

## Archivos Creados

- `/tmp/01-grants.sh` - Script para inicialización automática (copiar a `docker/mysql/init/`)
- `/tmp/fix-mysql-permissions.sh` - Script para ejecutar manualmente cuando el volumen ya existe

## Estado Actual

✅ Usuarios creados: `user@%`, `root@%`  
✅ Base de datos creada: `db`  
✅ Conexión funcionando desde contenedor PHP  
✅ Permisos configurados correctamente
