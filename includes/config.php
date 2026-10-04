<?php
/**
 * Configuración general.
 * Compatible con PHP 5.6 en adelante (sin operadores ni tipos de PHP 7+).
 *
 * En el hosting (InfinityFree u otro con MySQL) completar DB_DSN, DB_USER y DB_PASS.
 * En local, si DB_DSN queda vacío se usa un archivo SQLite en /data.
 */

define('DB_DSN',  '');   // ej: 'mysql:host=sql123.infinityfree.com;dbname=if0_xxx_portafolio;charset=utf8'
define('DB_USER', '');
define('DB_PASS', '');

define('SITE_URL', '');  // ej: 'https://tuusuario.infinityfreeapp.com'

ini_set('display_errors', '0');
error_reporting(E_ALL);
date_default_timezone_set('America/Argentina/Buenos_Aires');
