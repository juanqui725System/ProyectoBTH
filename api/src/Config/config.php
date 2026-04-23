<?php

// const BASE_URL = 'http://localhost/proymvc';
// const HOST = 'localhost';
// const USER='root';
// const PASSWORD = '';
// const DATA_BASE='dbsexto';
// const CHARSET = 'utf8';
// const VERSION = 'v1';
// CONST PORT=3307; //maria db 3307,mysql 3306
// const TITLE='Sistema Proyecto Final';
// const CLIENTE_ID='';
// // define("CONSTANTE", "valor");
//Carga las variables del archivo .env
$path = dirname(__DIR__, 2) . '/.env';

if (file_exists($path)) {
    $config = parse_ini_file($path);

    // Definir las constantes
    define('HOST', $config['DB_HOST'] ?? 'localhost');
    define('DATABASE', $config['DB_NAME'] ?? '');
    define('USERNAME', $config['DB_USER'] ?? '');
    define('PASSWORD', $config['DB_PASSWORD'] ?? '');
    define('PORT', $config['DB_PORT'] ?? '3306');
    define('CHARSET', $config['DB_CHARSET'] ?? 'utf8mb4');
} else {
    die("Error: No se encontró el archivo .env en la ruta: " . $path);
}
