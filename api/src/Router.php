<?php
namespace App;

class Router {
    protected $routes = [];

    // Registra una ruta con su método, URL y la acción (Controlador@método)
    public function add($method, $route, $handler) {
        $this->routes[] = [
            'method' => $method,
            'route'  => $route,
            'handler' => $handler
        ];
    }

    public function run() {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            // Reemplazamos {id} por una expresión regular para capturar números
            $pattern = str_replace(['{id}', '/'], ['([0-9]+)', '\/'], $route['route']);
            $pattern = '/^' . $pattern . '$/';

            if ($method === $route['method'] && preg_match($pattern, $uri, $matches)) {
                // Eliminamos el primer elemento (la cadena completa que coincidió)
                array_shift($matches);
                
                // Separamos el Controlador del Método (ej: UserController@index)
                list($controllerName, $methodName) = explode('@', $route['handler']);
                
                // Instanciamos y ejecutamos
                $controller = new $controllerName();
                return call_user_func_array([$controller, $methodName], $matches);
            }
        }

        // Si no encuentra nada, error 404
        http_response_code(404);
        echo json_encode(["error" => "Ruta no encontrada"]);
    }
}