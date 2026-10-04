<?php
/**
 * Recibe el formulario de contacto por Ajax (POST), valida y guarda el mensaje.
 * Responde JSON: { ok: bool, errores?: {campo: mensaje}, mensaje?: string }
 */
require_once dirname(__FILE__) . '/includes/db.php';
session_start();
header('Content-Type: application/json; charset=utf-8');

function responder($codigo, $datos)
{
    http_response_code($codigo);
    echo json_encode($datos);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    responder(405, array('ok' => false, 'mensaje' => 'Método no permitido'));
}

$token = isset($_POST['csrf']) ? $_POST['csrf'] : '';
if (empty($_SESSION['csrf']) || !hash_equals($_SESSION['csrf'], $token)) {
    responder(403, array('ok' => false, 'mensaje' => 'La sesión expiró. Recargá la página.'));
}

// Campo trampa para bots: si viene completo, se descarta en silencio
if (!empty($_POST['sitio_web'])) {
    responder(200, array('ok' => true, 'mensaje' => '¡Gracias! Te respondo a la brevedad.'));
}

// Límite simple: un mensaje cada 30 segundos por sesión
if (isset($_SESSION['ultimo_envio']) && time() - $_SESSION['ultimo_envio'] < 30) {
    responder(429, array('ok' => false, 'mensaje' => 'Esperá unos segundos antes de enviar otro mensaje.'));
}

$nombre  = isset($_POST['nombre'])  ? trim($_POST['nombre'])  : '';
$email   = isset($_POST['email'])   ? trim($_POST['email'])   : '';
$mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';

$errores = array();
if (mb_strlen($nombre, 'UTF-8') < 2 || mb_strlen($nombre, 'UTF-8') > 100) {
    $errores['nombre'] = 'Ingresá tu nombre (2 a 100 caracteres).';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = 'Ingresá un email válido.';
}
if (mb_strlen($mensaje, 'UTF-8') < 10 || mb_strlen($mensaje, 'UTF-8') > 2000) {
    $errores['mensaje'] = 'El mensaje debe tener entre 10 y 2000 caracteres.';
}
if (count($errores) > 0) {
    responder(422, array('ok' => false, 'errores' => $errores));
}

try {
    $stmt = db()->prepare(
        'INSERT INTO mensajes (nombre, email, mensaje, ip, creado_en) VALUES (:nombre, :email, :mensaje, :ip, :creado_en)'
    );
    $stmt->execute(array(
        ':nombre'    => $nombre,
        ':email'     => $email,
        ':mensaje'   => $mensaje,
        ':ip'        => isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null,
        ':creado_en' => date('Y-m-d H:i:s'),
    ));
} catch (Exception $e) {
    error_log('contacto.php: ' . $e->getMessage());
    responder(500, array('ok' => false, 'mensaje' => 'No se pudo enviar el mensaje. Probá de nuevo más tarde.'));
}

$_SESSION['ultimo_envio'] = time();
responder(200, array('ok' => true, 'mensaje' => '¡Gracias! Te respondo a la brevedad.'));
