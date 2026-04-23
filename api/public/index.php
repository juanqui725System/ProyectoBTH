<?php
// 1. Headers para API y CORS
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Manejo de peticiones de comprobación (CORS)
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}

// 2. Importar archivos (Si no usas Composer Autoload)
require_once "../src/Router.php";
require_once "../src/Controllers/UserController.php";

use App\Router;

// 3. Configurar Rutas
$router = new Router();

// Definimos los endpoints
$router->add('GET', '/users', 'UserController@getAll');
$router->add('GET', '/users/{id}', 'UserController@getById');
$router->add('POST', '/users', 'UserController@create');

// 4. Iniciar la aplicación
$router->run();

//abrir el notepad como administrador
//abrir el C:\Windows\System32\drivers\etc\host
// adicionar 
// 127.0.0.1 api.test
//es para ejecutar el proyecto
//php -S api.test:8000 -t public/
//en el navegador tengo que colocar api.test:8000/users
//esto me devuelve el usuario