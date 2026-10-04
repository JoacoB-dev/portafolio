# Portafolio

[English version](README.en.md)

Sitio de portafolio en PHP sin frameworks (compatible con PHP 5.6 a 8.x), Bootstrap 5 y jQuery.

- `index.php`: página principal; los datos personales salen de `includes/perfil.php`.
- **Enfoques:** el mismo sitio sirve para distintas búsquedas. `index.php?enfoque=web` muestra el perfil de PHP, `index.php?enfoque=sistemas` el de C/C++, Python y Java, `index.php?enfoque=fullstack` el de React, Next.js y Node.js, `index.php?enfoque=cobol` el de COBOL y mainframe, `index.php?enfoque=dotnet` el de C#, .NET y Angular, `index.php?enfoque=azure` el de Azure, `index.php?enfoque=oracle` el de Oracle PL/SQL, `index.php?enfoque=java` el de Java y Spring Boot, `index.php?enfoque=datos` el de Python y datos, `index.php?enfoque=qa` el de QA automation, y sin parámetro el perfil general. Cambian el título, el resumen, el stack, los filtros y qué proyectos aparecen primero.
- `proyectos.php`: endpoint JSON que lee `data/proyectos.json`; el front lo consume con `$.ajax` y filtra por etiqueta (`web`, `sistemas`, `cpp`, `python`, `java`, `sql`, etc.).
- `contacto.php`: recibe el formulario por Ajax, valida (CSRF, campo trampa, límite por sesión) y guarda en la tabla `mensajes` con consultas preparadas (PDO).
- `sql/schema.sql`: tabla para MySQL.

## Correr en local
    php -S localhost:8000
Sin configurar base, usa SQLite en `data/local.sqlite`.

## Subir a InfinityFree
1. Crear la base MySQL en el panel y ejecutar `sql/schema.sql` en phpMyAdmin.
2. Completar `DB_DSN`, `DB_USER` y `DB_PASS` en `includes/config.php`.
3. Subir el contenido de esta carpeta a `htdocs/`.
