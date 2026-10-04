<?php
require_once dirname(__FILE__) . '/includes/config.php';
require_once dirname(__FILE__) . '/includes/perfil.php';
session_start();

if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = function_exists('random_bytes')
        ? bin2hex(random_bytes(32))
        : bin2hex(openssl_random_pseudo_bytes(32));
}

function e($texto)
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

$anioInicio = 2023;
$anios = (int) date('Y') - $anioInicio;
$cantProyectos = count((array) json_decode(file_get_contents(dirname(__FILE__) . '/data/proyectos.json'), true));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($perfil['nombre']); ?> · <?php echo e($perfil['titulo']); ?></title>
    <meta name="description" content="<?php echo e($perfil['resumen']); ?>">
    <link rel="stylesheet" href="assets/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body data-bs-spy="scroll" data-bs-target="#nav-principal" data-bs-offset="80">

<nav id="nav-principal" class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#inicio">&lt;<?php echo e(strtok($perfil['nombre'], ' ')); ?> /&gt;</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Abrir menú">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#sobre-mi">Sobre mí</a></li>
                <li class="nav-item"><a class="nav-link" href="#stack">Stack</a></li>
                <li class="nav-item"><a class="nav-link" href="#proyectos">Proyectos</a></li>
                <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
            </ul>
        </div>
    </div>
</nav>

<header id="inicio" class="hero d-flex align-items-center">
    <div class="container">
        <p class="text-acento mb-2 font-mono">&lt;?php echo "Hola, soy"; ?&gt;</p>
        <h1 class="display-4 fw-bold mb-3"><?php echo e($perfil['nombre']); ?></h1>
        <h2 class="h3 text-secundario mb-4"><?php echo e($perfil['titulo']); ?></h2>
        <p class="lead col-lg-7 mb-4"><?php echo e($perfil['resumen']); ?></p>
        <div class="d-flex flex-wrap gap-2">
            <a href="#proyectos" class="btn btn-acento btn-lg">Ver proyectos</a>
            <a href="<?php echo e($perfil['cv']); ?>" class="btn btn-outline-light btn-lg" download><i class="bi bi-download"></i> Descargar CV</a>
        </div>
    </div>
</header>

<main>
    <section id="sobre-mi" class="py-5">
        <div class="container">
            <h2 class="titulo-seccion">Sobre mí</h2>
            <div class="row g-4 align-items-center">
                <div class="col-lg-8">
                    <?php foreach ($perfil['sobre_mi'] as $parrafo): ?>
                    <p><?php echo e(sprintf($parrafo, $anioInicio)); ?></p>
                    <?php endforeach; ?>
                    <p class="mb-0"><strong>Formación:</strong> <?php echo e($perfil['estudios']); ?></p>
                </div>
                <div class="col-lg-4">
                    <div class="row g-3 text-center">
                        <div class="col-6"><div class="dato"><span class="dato-num"><?php echo $anios; ?>+</span><span>años programando</span></div></div>
                        <div class="col-6"><div class="dato"><span class="dato-num" id="dato-proyectos"><?php echo $cantProyectos; ?></span><span>proyectos en el portafolio</span></div></div>
                        <div class="col-12"><div class="dato"><span class="dato-num"><i class="bi <?php echo e($perfil['dato']['icono']); ?>"></i></span><span><?php echo e($perfil['dato']['texto']); ?></span></div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="stack" class="py-5 seccion-alt">
        <div class="container">
            <h2 class="titulo-seccion">Stack</h2>
            <div class="row g-4">
                <?php foreach ($stack as $grupo => $items): ?>
                <div class="col-sm-6 col-lg-3">
                    <div class="card h-100 tarjeta">
                        <div class="card-body">
                            <h3 class="h5 text-acento"><?php echo e($grupo); ?></h3>
                            <ul class="list-unstyled mb-0">
                                <?php foreach ($items as $item): ?>
                                <li><i class="bi bi-check2 text-acento"></i> <?php echo e($item); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="proyectos" class="py-5">
        <div class="container">
            <h2 class="titulo-seccion">Proyectos</h2>
            <div class="btn-group flex-wrap mb-4" role="group" aria-label="Filtrar proyectos" id="filtros" data-enfoque="<?php echo e($enfoque); ?>">
                <?php foreach ($perfil['filtros'] as $clave => $nombre): ?>
                <button type="button" class="btn btn-outline-light<?php echo $clave === 'todos' ? ' active' : ''; ?>" data-etiqueta="<?php echo e($clave); ?>"><?php echo e($nombre); ?></button>
                <?php endforeach; ?>
            </div>
            <div class="row g-4" id="lista-proyectos">
                <div class="col-12 text-center py-5" id="cargando">
                    <div class="spinner-border text-light" role="status"><span class="visually-hidden">Cargando…</span></div>
                </div>
            </div>
        </div>
    </section>

    <section id="contacto" class="py-5 seccion-alt">
        <div class="container">
            <h2 class="titulo-seccion">Contacto</h2>
            <div class="row g-4 g-lg-5">
                <div class="col-lg-5">
                    <p>¿Tenés un proyecto o una búsqueda abierta? Escribime.</p>
                    <ul class="list-unstyled contacto-links">
                        <li><i class="bi bi-envelope"></i> <a href="mailto:<?php echo e($perfil['email']); ?>"><?php echo e($perfil['email']); ?></a></li>
                        <li><i class="bi bi-github"></i> <a href="<?php echo e($perfil['github']); ?>" target="_blank" rel="noopener">GitHub</a></li>
                        <li><i class="bi bi-linkedin"></i> <a href="<?php echo e($perfil['linkedin']); ?>" target="_blank" rel="noopener">LinkedIn</a></li>
                        <li><i class="bi bi-geo-alt"></i> <?php echo e($perfil['ubicacion']); ?></li>
                    </ul>
                </div>
                <div class="col-lg-7">
                    <form id="form-contacto" action="contacto.php" method="post" novalidate>
                        <input type="hidden" name="csrf" value="<?php echo e($_SESSION['csrf']); ?>">
                        <div class="d-none" aria-hidden="true">
                            <label>Sitio web <input type="text" name="sitio_web" tabindex="-1" autocomplete="off"></label>
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" maxlength="100" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" maxlength="150" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="mensaje" class="form-label">Mensaje</label>
                            <textarea class="form-control" id="mensaje" name="mensaje" rows="5" maxlength="2000" required></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                        <button type="submit" class="btn btn-acento"><i class="bi bi-send"></i> Enviar</button>
                        <div id="respuesta" class="mt-3" role="status" aria-live="polite"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="py-4 text-center small text-secundario">
    &copy; <?php echo date('Y'); ?> <?php echo e($perfil['nombre']); ?> · Este sitio está hecho con PHP, MySQL, Bootstrap y jQuery
</footer>

<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
