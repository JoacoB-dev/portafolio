<?php
/**
 * Datos personales y "enfoques" del portafolio.
 *
 * Un mismo sitio sirve para distintas búsquedas: index.php?enfoque=web para puestos de PHP,
 * index.php?enfoque=sistemas para C/C++/Python/Java, index.php?enfoque=fullstack para React/Node.js,
 * index.php?enfoque=cobol para COBOL / mainframe, index.php?enfoque=dotnet para C# / .NET y Angular,
 * index.php?enfoque=azure para Azure (Functions, Service Bus, Event Grid),
 * index.php?enfoque=oracle para Oracle PL/SQL, index.php?enfoque=java para Java y Spring Boot,
 * index.php?enfoque=datos para Python y análisis de datos, index.php?enfoque=qa para QA automation,
 * y sin parámetro muestra el perfil general.
 * Cambian el título, el resumen, el stack, los filtros y qué proyectos aparecen primero.
 *
 * Todo lo marcado [COMPLETAR] lo tiene que confirmar Joaquin: no se inventa experiencia ni estudios.
 */
$perfil = array(
    'nombre'    => 'Joaquin Alejandro Bobbio',
    'estudios'  => 'Licenciatura en Programación, Universidad Nacional de Hurlingham (en curso)',
    'ubicacion' => 'Buenos Aires, Argentina',
    'email'     => 'joa.bobbio@hotmail.com',
    'github'    => 'https://github.com/joacuwu',
    'linkedin'  => 'https://www.linkedin.com/in/[COMPLETAR]',
    'cv'        => 'assets/cv.pdf',
);

$enfoques = array(
    'general' => array(
        'titulo'  => 'Desarrollador de software',
        'resumen' => 'Programo desde 2023. Hago aplicaciones web con PHP y MySQL, y software para Linux en C, C++, '
                   . 'Python y Java: sockets, hilos y bases de datos, siempre con pruebas y documentación.',
        'sobre_mi' => array(
            'Desarrollo software desde %d. Del lado web trabajo con PHP, MySQL, JavaScript, jQuery y Bootstrap; '
          . 'del lado de sistemas, con C, C++ y Qt, Python y Java sobre Linux.',
            'Me interesa analizar el problema antes de escribir código, probar lo que hago con pruebas automáticas '
          . 'y documentar cada proyecto para que otra persona pueda retomarlo.',
        ),
        'stack' => array(
            'Web'           => array('PHP 5 / 7 / 8', 'JavaScript, jQuery, Ajax', 'HTML5, CSS3, Bootstrap', 'API REST (JSON)'),
            'Sistemas'      => array('C (sockets POSIX, pthreads)', 'C++17 y Qt 6', 'Python 3', 'Java 21'),
            'Base de datos' => array('MySQL / MariaDB', 'SQLite', 'SQL (JOIN, GROUP BY, subconsultas)', 'PDO y JDBC'),
            'Herramientas'  => array('Git / GitHub', 'Linux (consola)', 'Make, CMake y Maven', 'Pruebas automáticas'),
        ),
        'dato'     => array('icono' => 'bi-geo-alt', 'texto' => 'Buenos Aires, Argentina'),
        'filtros'  => array('todos' => 'Todos', 'web' => 'Web (PHP)', 'fullstack' => 'Full stack (Node / Next.js)',
                            'sistemas' => 'C / C++ · Python · Java', 'cobol' => 'COBOL', 'dotnet' => '.NET', 'azure' => 'Azure', 'oracle' => 'Oracle PL/SQL',
                            'datos' => 'Datos (Python)', 'qa' => 'QA', 'real' => 'Clientes reales'),
        'primero'  => '',
    ),
    'web' => array(
        'titulo'  => 'Desarrollador PHP Semi Senior',
        'resumen' => 'Programo desde 2023. Desarrollo aplicaciones web con PHP, MySQL, JavaScript, jQuery y Bootstrap: '
                   . 'desde el modelo de datos hasta la interfaz, con foco en código claro, documentado y fácil de mantener.',
        'sobre_mi' => array(
            'Desarrollo software desde %d. Trabajo con PHP y MySQL del lado del servidor y con '
          . 'HTML, CSS, JavaScript, jQuery y Bootstrap en la interfaz.',
            'Me interesa analizar el problema antes de escribir código, documentar cada caso para que el equipo pueda '
          . 'retomarlo, y mantener los sistemas existentes corrigiendo bugs sin romper lo que ya funciona.',
        ),
        'stack' => array(
            'Backend'       => array('PHP 5 / 7 / 8', 'PDO / MySQLi', 'API REST (JSON)', 'Sesiones y autenticación'),
            'Base de datos' => array('MySQL / MariaDB', 'SQL (JOIN, GROUP BY, subconsultas)', 'Modelado relacional'),
            'Frontend'      => array('HTML5', 'CSS3', 'JavaScript', 'jQuery', 'Ajax', 'Bootstrap'),
            'Herramientas'  => array('Git / GitHub', 'Linux (consola, Apache)', 'Paquete Office', 'Documentación técnica'),
        ),
        'dato'     => array('icono' => 'bi-house-door', 'texto' => 'Disponible para Home Office'),
        'filtros'  => array('todos' => 'Todos', 'real' => 'Clientes reales', 'crud' => 'CRUD + Login',
                            'ajax' => 'Ajax / jQuery', 'sql' => 'SQL / Reportes', 'sistemas' => 'Otros lenguajes'),
        'primero'  => 'web',
    ),
    'sistemas' => array(
        'titulo'  => 'Programador C / C++ · Python · Java',
        'resumen' => 'Programo desde 2023. Desarrollo software para Linux en C, C++, Python y Java: comunicación por '
                   . 'sockets TCP/IP, programas multihilo, interfaces con Qt y bases de datos SQL, con pruebas automáticas.',
        'sobre_mi' => array(
            'Desarrollo software desde %d. Hice un conjunto de proyectos alrededor de una red de telefonía móvil '
          . 'simulada: antenas en Python, un centro de monitoreo en C++ con Qt, una central de mensajes en C y '
          . 'una prueba de carga en Java, que se comunican por TCP.',
            'Me gusta entender qué pasa por debajo: cómo viajan los datos por un socket, cómo se coordinan los hilos '
          . 'y cómo encontrar un error de concurrencia con las herramientas correctas. También hago aplicaciones web con PHP y MySQL.',
        ),
        'stack' => array(
            'Lenguajes'      => array('C', 'C++17', 'Python 3', 'Java 21', 'SQL'),
            'Comunicaciones' => array('Sockets TCP/IP', 'Protocolos de texto y JSON', 'Cliente y servidor', 'Control de flujo'),
            'Concurrencia'   => array('pthreads y mutex', 'QThread, señales y slots', 'threading y Queue', 'java.util.concurrent'),
            'Herramientas'   => array('Linux', 'Git / GitHub', 'Make, CMake y Maven', 'Qt 6', 'Valgrind y sanitizers'),
        ),
        'dato'     => array('icono' => 'bi-geo-alt', 'texto' => 'Buenos Aires, Argentina'),
        'filtros'  => array('todos' => 'Todos', 'cpp' => 'C / C++', 'python' => 'Python', 'java' => 'Java',
                            'sql' => 'SQL', 'web' => 'Web (PHP)'),
        'primero'  => 'sistemas',
    ),
    'fullstack' => array(
        'titulo'  => 'Desarrollador Full Stack',
        'resumen' => 'Programo desde 2023. Desarrollo aplicaciones web completas con React, Next.js, Node.js y PostgreSQL: '
                   . 'APIs REST y GraphQL, tiempo real con WebSockets, pagos, colas con Redis e integración con IA, '
                   . 'con pruebas automáticas y Docker.',
        'sobre_mi' => array(
            'Desarrollo software desde %d. Hice tiendas online para clientes reales con Next.js y una plataforma de '
          . 'cursos de IA completa: API en Node.js con REST y GraphQL, PostgreSQL, colas en Redis, clases en vivo con '
          . 'Socket.io, pagos con Mercado Pago y un tutor que usa la API de Claude.',
            'Me interesa que lo que hago funcione de punta a punta y se pueda mantener: pruebas automáticas, integración '
          . 'continua, contenedores y documentación. También me gusta explicar: escribí los cursos de esa plataforma '
          . 'pensando en personas que no programan.',
        ),
        'stack' => array(
            'Frontend'      => array('React 19', 'Next.js (App Router)', 'TypeScript', 'HTML5 y CSS3'),
            'Backend'       => array('Node.js + Express', 'API REST y GraphQL', 'WebSockets (Socket.io)', 'Colas con Redis (BullMQ)'),
            'Datos'         => array('PostgreSQL', 'Redis', 'SQL (transacciones, JOIN)', 'MySQL'),
            'Infra y calidad' => array('Docker y Docker Compose', 'GitHub Actions (CI)', 'Vitest y Playwright', 'Mercado Pago y API de Claude'),
        ),
        'dato'     => array('icono' => 'bi-geo-alt', 'texto' => 'Buenos Aires · presencial o híbrido'),
        'filtros'  => array('todos' => 'Todos', 'fullstack' => 'Full stack (Node / Next.js)', 'real' => 'Clientes reales',
                            'web' => 'Web', 'sistemas' => 'C / C++ · Python · Java'),
        'primero'  => 'fullstack',
    ),
    'cobol' => array(
        'titulo'  => 'Programador COBOL Junior',
        'resumen' => 'Programo desde 2023. Desarrollo programas COBOL batch y en línea: archivos secuenciales e indexados, '
                   . 'copybooks, SORT, cortes de control, validación de datos y manejo de códigos de retorno, '
                   . 'con pruebas automáticas de cada programa.',
        'sobre_mi' => array(
            'Desarrollo software desde %d. Para trabajar con COBOL hice dos proyectos con GnuCOBOL: un proceso batch '
          . 'bancario de cinco pasos (carga, validación, ordenamiento, actualización del maestro y listado) orquestado '
          . 'como un JCL, y un ABM de clientes con pantalla y un módulo servidor al estilo CICS que se llama con COMMAREA.',
            'Me interesa el código que tiene que funcionar todos los días sin errores: validar cada dato, controlar '
          . 'cada FILE STATUS y dejar el proceso documentado para quien lo opere. También programo en C, Java, Python y PHP.',
        ),
        'stack' => array(
            'COBOL'         => array('COBOL (GnuCOBOL 3)', 'Copybooks, REDEFINES y niveles 88', 'COMP-3 (empaquetado)', 'SORT y cortes de control'),
            'Archivos'      => array('Secuenciales e indexados (VSAM KSDS)', 'Claves alternativas', 'FILE STATUS', 'Acceso RANDOM y DYNAMIC'),
            'Mainframe'     => array('JCL (pasos, DD, COND)', 'Programas batch y en línea', 'CALL con COMMAREA', 'Códigos de retorno'),
            'Herramientas'  => array('Linux y shell', 'Git / GitHub', 'Make', 'SQL', 'C, Java y Python'),
        ),
        'dato'     => array('icono' => 'bi-geo-alt', 'texto' => 'Buenos Aires · híbrido'),
        'filtros'  => array('todos' => 'Todos', 'cobol' => 'COBOL', 'sistemas' => 'C / C++ · Python · Java',
                            'real' => 'Clientes reales', 'web' => 'Web'),
        'primero'  => 'cobol',
    ),
    'dotnet' => array(
        'titulo'  => 'Desarrollador .NET',
        'resumen' => 'Programo desde 2023. Desarrollo aplicaciones con C#, ASP.NET Core y Angular: APIs REST, servicios SOAP, '
                   . 'lógica en stored procedures y bases de datos relacionales, con pruebas automáticas y diagramas UML.',
        'sobre_mi' => array(
            'Desarrollo software desde %d. En .NET hice una mesa de reclamos completa: API en ASP.NET Core con capas '
          . 'separadas, stored procedures en PostgreSQL, un servicio SOAP para integrar otros sistemas, login con JWT y roles, '
          . 'e interfaz en Angular.',
            'Me interesa el código que se pueda mantener: programación orientada a objetos, reglas de negocio en un solo lugar, '
          . 'pruebas automáticas y documentación con UML. También trabajo con PHP y MySQL, C, Java y Python.',
        ),
        'stack' => array(
            'Backend'       => array('C# y .NET 10', 'ASP.NET Core Web API', 'Servicios SOAP (CoreWCF)', 'JWT y roles'),
            'Base de datos' => array('Stored procedures y funciones', 'PostgreSQL', 'MySQL / MariaDB', 'SQL (JOIN, transacciones)'),
            'Frontend'      => array('Angular', 'TypeScript y JavaScript', 'HTML5 y CSS3', 'Bootstrap'),
            'Calidad'       => array('POO y UML', 'xUnit y Playwright', 'Git / GitHub', 'C, Java y Python'),
        ),
        'dato'     => array('icono' => 'bi-geo-alt', 'texto' => 'Buenos Aires · híbrido'),
        'filtros'  => array('todos' => 'Todos', 'dotnet' => '.NET', 'web' => 'Web', 'real' => 'Clientes reales',
                            'sistemas' => 'C / C++ · Python · Java'),
        'primero'  => 'dotnet',
    ),
    'azure' => array(
        'titulo'  => 'Desarrollador .NET · Azure',
        'resumen' => 'Programo desde 2023. Desarrollo en C# y .NET, y diseño integraciones orientadas a eventos en Azure: '
                   . 'Azure Functions, Service Bus, Event Grid, Logic Apps y API Management, con esquemas JSON y pruebas automáticas.',
        'sobre_mi' => array(
            'Desarrollo software desde %d. Para Azure armé una integración de pedidos serverless: una API detrás de API Management, '
          . 'una cola de Service Bus, funciones que reservan stock sin vender de más y eventos en Event Grid que consumen '
          . 'otra función y una Logic App. La infraestructura está escrita en Bicep.',
            'Me interesa que los sistemas aguanten fallas: mensajes que llegan dos veces, procesos que se caen a mitad de camino '
          . 'y pedidos simultáneos. También hice aplicaciones web con .NET y Angular, Next.js y PHP.',
        ),
        'stack' => array(
            'Azure'         => array('Azure Functions (.NET aislado)', 'Service Bus y Event Grid', 'Logic Apps', 'API Management'),
            'Integraciones' => array('APIs REST y SOAP', 'JSON Schema', 'CloudEvents', 'Mensajería y reintentos'),
            'Datos'         => array('Table Storage', 'PostgreSQL', 'MySQL / MariaDB', 'Stored procedures'),
            'Herramientas'  => array('C# y .NET', 'Bicep', 'xUnit y Azurite', 'Git / GitHub'),
        ),
        'dato'     => array('icono' => 'bi-house-door', 'texto' => 'Disponible para trabajo remoto'),
        'filtros'  => array('todos' => 'Todos', 'azure' => 'Azure', 'dotnet' => '.NET', 'web' => 'Web',
                            'real' => 'Clientes reales'),
        'primero'  => 'azure',
    ),
    'oracle' => array(
        'titulo'  => 'Desarrollador PL/SQL',
        'resumen' => 'Programo desde 2023. Escribo la lógica de negocio en la base de datos: paquetes PL/SQL, cursores, '
                   . 'manejo de excepciones, procesos batch y consultas para reportes, con pruebas automáticas.',
        'sobre_mi' => array(
            'Desarrollo software desde %d. En Oracle armé el núcleo de un sistema de facturación: paquetes PL/SQL que emiten '
          . 'facturas con numeración por talonario, controlan crédito y stock con bloqueos, imputan pagos y calculan intereses '
          . 'por mora en un proceso batch con BULK COLLECT y FORALL, más los reportes de cuenta corriente.',
            'Me gusta que las reglas vivan en un solo lugar y que la pantalla solo muestre y llame. También escribí stored '
          . 'procedures en PostgreSQL para una API .NET y programas COBOL batch.',
        ),
        'stack' => array(
            'Oracle'        => array('PL/SQL: paquetes, cursores, excepciones', 'BULK COLLECT y FORALL', 'Triggers y transacciones autónomas', 'Funciones pipelined'),
            'SQL'           => array('Funciones analíticas', 'Modelado relacional', 'Bloqueos y concurrencia', 'Índices y restricciones'),
            'Otras bases'   => array('PostgreSQL (stored procedures)', 'MySQL / MariaDB', 'SQLite'),
            'Herramientas'  => array('utPLSQL', 'SQL*Plus / SQLcl', 'Git / GitHub', 'COBOL, C#, PHP'),
        ),
        'dato'     => array('icono' => 'bi-house-door', 'texto' => 'Disponible para trabajo remoto'),
        'filtros'  => array('todos' => 'Todos', 'oracle' => 'Oracle PL/SQL', 'sql' => 'SQL', 'cobol' => 'COBOL',
                            'dotnet' => '.NET', 'real' => 'Clientes reales'),
        'primero'  => 'oracle',
    ),
    'java' => array(
        'titulo'  => 'Desarrollador Java · Spring Boot',
        'resumen' => 'Programo desde 2023. Desarrollo APIs REST con Java y Spring Boot: JPA, PostgreSQL, seguridad con JWT '
                   . 'y pruebas automáticas, cuidando la concurrencia y los errores claros.',
        'sobre_mi' => array(
            'Desarrollo software desde %d. En Java armé una API de cuentas y transferencias con Spring Boot: las transferencias '
          . 'bloquean las cuentas en un orden fijo para que no haya deadlocks, no se duplican si el cliente reintenta, y hay '
          . 'pruebas que lanzan 20 transferencias a la vez para comprobar que nunca se gasta de más.',
            'También programé en Java un cliente de carga con hilos y sockets, y trabajo con C, C++, Python, C# y PHP.',
        ),
        'stack' => array(
            'Backend'       => array('Java 21', 'Spring Boot 3', 'Spring Data JPA / Hibernate', 'Spring Security y JWT'),
            'Base de datos' => array('PostgreSQL', 'Flyway', 'Transacciones y bloqueos', 'MySQL / MariaDB'),
            'Calidad'       => array('JUnit 5 y Mockito', 'MockMvc', 'Pruebas de concurrencia', 'OpenAPI / Swagger'),
            'Herramientas'  => array('Maven', 'Git / GitHub', 'Docker (escrito)', 'Linux'),
        ),
        'dato'     => array('icono' => 'bi-geo-alt', 'texto' => 'Buenos Aires, Argentina'),
        'filtros'  => array('todos' => 'Todos', 'java' => 'Java', 'sql' => 'SQL', 'dotnet' => '.NET',
                            'real' => 'Clientes reales'),
        'primero'  => 'java',
    ),
    'datos' => array(
        'titulo'  => 'Analista de datos · Python',
        'resumen' => 'Programo desde 2023. Limpio, cargo y analizo datos con Python, pandas y SQL, y los muestro en tableros, '
                   . 'Excel y APIs, con pruebas automáticas.',
        'sobre_mi' => array(
            'Desarrollo software desde %d. Armé un proceso ETL que limpia 154.000 líneas de ventas con errores, rechaza las '
          . 'inválidas explicando el motivo y las carga en un modelo estrella de PostgreSQL. Después las comparo con la '
          . 'inflación real del INDEC para separar el aumento de precios del aumento de ventas.',
            'Me interesa que los números se puedan explicar: cada fila rechazada tiene su motivo y cada hallazgo, su consulta. '
          . 'También programo en Java, C# y PHP.',
        ),
        'stack' => array(
            'Python'        => array('pandas y numpy', 'FastAPI', 'Streamlit y Plotly', 'Jupyter'),
            'SQL'           => array('PostgreSQL', 'Modelo estrella', 'CTE y funciones de ventana', 'Oracle PL/SQL'),
            'Reportes'      => array('Excel (openpyxl)', 'Tableros', 'Gráficos', 'Notebooks con hallazgos'),
            'Herramientas'  => array('pytest', 'Git / GitHub', 'Linux', 'Docker (escrito)'),
        ),
        'dato'     => array('icono' => 'bi-geo-alt', 'texto' => 'Buenos Aires, Argentina'),
        'filtros'  => array('todos' => 'Todos', 'datos' => 'Datos', 'python' => 'Python', 'sql' => 'SQL',
                            'real' => 'Clientes reales'),
        'primero'  => 'datos',
    ),
    'qa' => array(
        'titulo'  => 'QA Automation',
        'resumen' => 'Programo desde 2023. Automatizo pruebas de interfaz y de API con Playwright y TypeScript, escribo planes '
                   . 'y casos de prueba, y reporto bugs con evidencia.',
        'sobre_mi' => array(
            'Desarrollo software desde %d. Armé una suite de 98 pruebas con Playwright sobre dos aplicaciones mías, con Page '
          . 'Object Model, pruebas guiadas por datos y pruebas de API con contratos en JSON Schema. Encontró 6 bugs reales, '
          . 'que documenté con pasos, severidad y capturas.',
            'Como también programo (PHP, Java, Python, C#), entiendo qué puede fallar por dentro y escribo pruebas que lo buscan.',
        ),
        'stack' => array(
            'Automatización' => array('Playwright', 'TypeScript', 'Page Object Model', 'Pruebas guiadas por datos'),
            'API'            => array('Pruebas REST', 'JSON Schema (ajv)', 'Códigos de estado y errores', 'Autenticación'),
            'Gestión'        => array('Plan de pruebas', 'Casos de prueba', 'Reporte de bugs', 'Gherkin'),
            'Herramientas'   => array('Git / GitHub', 'GitHub Actions (escrito)', 'Linux', 'xUnit, JUnit, pytest'),
        ),
        'dato'     => array('icono' => 'bi-geo-alt', 'texto' => 'Buenos Aires, Argentina'),
        'filtros'  => array('todos' => 'Todos', 'qa' => 'QA', 'web' => 'Web (PHP)', 'real' => 'Clientes reales'),
        'primero'  => 'qa',
    ),
);

$enfoque = isset($_GET['enfoque']) && isset($enfoques[$_GET['enfoque']]) ? $_GET['enfoque'] : 'general';
$perfil = array_merge($perfil, $enfoques[$enfoque]);
$stack = $perfil['stack'];
