<?php

/**
 *  Configuracion General
 */
define('nombreSitio', 'Video Tienda Jandy');
define('APP_PATH', dirname(__DIR__));

/**
 * Configuracion a la BD
 */

define('SERVER', '192.168.10.29');
define('USER', 'movies');
define('PASS', 'admin');
define('DATABASE', 'videotiendajandy');

/**
 * Base URL
 */

 define('BASE_URL', 'http://localhost/videotiendajandy/');

/**
 *  Verbos de Comunicacion
 * 
 */
define('POST', $_SERVER['REQUEST_METHOD'] === 'POST');
define('GET', $_SERVER['REQUEST_METHOD'] === 'GET');
