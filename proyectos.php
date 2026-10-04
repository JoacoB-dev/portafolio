<?php
/**
 * Endpoint JSON con la lista de proyectos. Lo consume assets/js/main.js vía Ajax.
 * GET ?etiqueta=web|sistemas|fullstack|cobol|dotnet|azure|oracle|java|datos|qa|crud|ajax|sql|cpp|python|java|real  (opcional)
 * GET ?enfoque=web|sistemas|fullstack|cobol|dotnet|azure|oracle|java|datos|qa  (opcional: esos proyectos van primero)
 */
header('Content-Type: application/json; charset=utf-8');

$proyectos = json_decode(file_get_contents(dirname(__FILE__) . '/data/proyectos.json'), true);
if (!is_array($proyectos)) {
    http_response_code(500);
    echo json_encode(array('ok' => false, 'error' => 'No se pudieron leer los proyectos'));
    exit;
}

$etiqueta = isset($_GET['etiqueta']) ? trim($_GET['etiqueta']) : '';
$primero = isset($_GET['enfoque']) && in_array($_GET['enfoque'], array('web', 'sistemas', 'fullstack', 'cobol', 'dotnet', 'azure', 'oracle', 'java', 'datos', 'qa'), true) ? $_GET['enfoque'] : '';

// Se separa en dos listas en vez de usar usort: así se mantiene el orden del JSON dentro de cada grupo
$delEnfoque = array();
$resto = array();
foreach ($proyectos as $p) {
    if ($etiqueta !== '' && $etiqueta !== 'todos' && !in_array($etiqueta, $p['etiquetas'], true)) {
        continue;
    }
    if ($primero !== '' && in_array($primero, $p['etiquetas'], true)) {
        $delEnfoque[] = $p;
    } else {
        $resto[] = $p;
    }
}
$proyectos = array_merge($delEnfoque, $resto);

echo json_encode(array('ok' => true, 'total' => count($proyectos), 'proyectos' => $proyectos));
