# Portfolio

[Versión en español](README.md)

Portfolio website in plain PHP (no frameworks, compatible with PHP 5.6 to 8.x), Bootstrap 5 and jQuery.

- `index.php`: main page; personal data comes from `includes/perfil.php`.
- **Focus modes:** the same site serves different job searches. `index.php?enfoque=web` shows the PHP profile, `index.php?enfoque=sistemas` the C/C++, Python and Java one, `index.php?enfoque=fullstack` the React, Next.js and Node.js one, `index.php?enfoque=cobol` the COBOL and mainframe one, `index.php?enfoque=dotnet` the C#, .NET and Angular one, `index.php?enfoque=azure` the Azure one, `index.php?enfoque=oracle` the Oracle PL/SQL one, `index.php?enfoque=java` the Java and Spring Boot one, `index.php?enfoque=datos` the Python and data one, `index.php?enfoque=qa` the QA automation one, and no parameter shows the general profile. The title, summary, stack, filters and project order change.
- `proyectos.php`: JSON endpoint that reads `data/proyectos.json`; the front end loads it with `$.ajax` and filters by tag (`web`, `sistemas`, `cpp`, `python`, `java`, `sql`, etc.).
- `contacto.php`: receives the contact form via Ajax, validates it (CSRF token, honeypot field, per-session rate limit) and stores it in the `mensajes` table with prepared statements (PDO).
- `sql/schema.sql`: MySQL table.

## Run locally
    php -S localhost:8000
With no database configured, it uses SQLite in `data/local.sqlite`.

## Deploy to InfinityFree
1. Create the MySQL database in the control panel and run `sql/schema.sql` in phpMyAdmin.
2. Fill in `DB_DSN`, `DB_USER` and `DB_PASS` in `includes/config.php`.
3. Upload the contents of this folder to `htdocs/`.
