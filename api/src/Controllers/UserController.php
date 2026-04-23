<?php
require_once "../src/Models/Users.php"; // Importamos el modelo

class UserController {

    public function getAll() {
        $users = User::all(); // Pedimos los datos al modelo
        echo json_encode($users);
    }

    public function getById($id) {
        $user = User::find($id); // Buscamos por ID a través del modelo

        if ($user) {
            echo json_encode($user);
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Usuario no encontrado"]);
        }
    }
}