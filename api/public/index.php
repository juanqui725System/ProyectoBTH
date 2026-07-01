<?php
header('Access-Control-Allow-Origin: http://www.sexto2026.com');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if($_SERVER['REQUEST_METHOD']=='OPTIONS')
    {
        http_response_code(204);
        exit;
    }
require_once "../src/Router.php";
require_once "../src/Controllers/UserController.php";
require_once "../src/Controllers/ProductoController.php";

use App\Router;

$route=new Router();
//direccion para usuarios
$route->add('GET','/','UserController@getAll');
$route->add('GET','/users','UserController@getAll'); 
//direccion de productos
$route->add('GET','/productos','ProductoController@getAll'); 
$route->add('PUT','/productos/{id}','ProductoController@actualizar'); 
$route->add('POST','/productos','ProductoController@add'); 



$route->run();
