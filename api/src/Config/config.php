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
$config=parse_ini_file(__DIR__.'/../.env');

define("HOST",$config['DB_HOST']);
define("DATABASE",$config['DB_NAME']);
define("USERNAME",$config['DB_USER']);
define("PASSWORD",$config['DB_PASSWORD']);
define("PORT",$config['DB_PORT']);
define("CHARSET",$config['DB_CHARSET']);