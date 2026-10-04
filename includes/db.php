<?php
require_once dirname(__FILE__) . '/config.php';

/**
 * Devuelve una única conexión PDO (MySQL en producción, SQLite en local).
 */
function db()
{
    static $pdo = null;
    if ($pdo !== null) {
        return $pdo;
    }

    $opciones = array(
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    );

    if (DB_DSN !== '') {
        $pdo = new PDO(DB_DSN, DB_USER, DB_PASS, $opciones);
    } else {
        $archivo = dirname(dirname(__FILE__)) . '/data/local.sqlite';
        $pdo = new PDO('sqlite:' . $archivo, null, null, $opciones);
        $pdo->exec('CREATE TABLE IF NOT EXISTS mensajes (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nombre VARCHAR(100) NOT NULL,
            email VARCHAR(150) NOT NULL,
            mensaje TEXT NOT NULL,
            ip VARCHAR(45),
            creado_en DATETIME NOT NULL
        )');
    }

    return $pdo;
}
