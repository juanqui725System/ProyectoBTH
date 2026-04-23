<?php
require_once "../src/Models/Users.php"; // Importamos el modelo

class UserController
{

    public function getAll11()
    {
        $users = User::all(); // Pedimos los datos al modelo
        echo json_encode($users);
    }
    public function getAll()
    {
        header('Content-Type: application/json');
        $users = User::allUser();
        echo json_encode($users);
    }

    public function getById($id)
    {
        $user = User::find($id); // Buscamos por ID a través del modelo

        if ($user) {
            echo json_encode($user);
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Usuario no encontrado"]);
        }
    }
    public function getByIdUser($id)
    {
        header('Content-Type: application/json');
        $user = User::find($id);

        if ($user) {
            echo json_encode($user);
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Usuario no encontrado"]);
        }
    }
    public function store()
    {
        header('Content-Type: application/json');

        // Obtenemos los datos enviados por POST (JSON)
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        // Validación básica
        if (!isset($data['nombre'], $data['email'], $data['password'], $data['rol_id'])) {
            http_response_code(400);
            echo json_encode(["error" => "Datos incompletos"]);
            return;
        }

        $userId = User::create($data);

        if (is_numeric($userId)) {
            http_response_code(201);
            echo json_encode([
                "message" => "Usuario creado con éxito",
                "id" => $userId
            ]);
        } else {
            http_response_code(500);
            echo json_encode(["error" => "No se pudo crear el usuario", "detalle" => $userId]);
        }
    }
}
