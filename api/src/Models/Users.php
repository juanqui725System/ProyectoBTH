<?php
require_once __DIR__ . '/../Config/ConexionPDO.php'; 
class User
{
    // Simulación de una base de datos en un array estático
    private static $users = [
        ["id" => 1, "name" => "Juan Pérez", "email" => "juan@example.com"],
        ["id" => 2, "name" => "Maria Lopez", "email" => "maria@example.com"],
        ["id" => 3, "name" => "Carlos Ruiz", "email" => "carlos@example.com"]
    ];

    public static function all()
    {
        return self::$users;
    }
    public static function allUser()
    {
        $sql = "SELECT u.id, u.nombre, u.email, r.nombre as rol, u.activo 
                FROM usuarios u 
                INNER JOIN roles r ON u.rol_id = r.id";
        return ConexionPDO::query($sql);
    }

    public static function find($id)
    {
        foreach (self::$users as $user) {
            if ($user['id'] == $id) return $user;
        }
        return null;
    }
    public static function findUser($id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = ? LIMIT 1";
        $result = ConexionPDO::query($sql, [$id]);
        return $result ? $result[0] : null;
    }
    //crear usuario
    public static function create($data)
    {
        $sql = "INSERT INTO usuarios (rol_id, nombre, email, password) VALUES (?, ?, ?, ?)";

        // Encriptamos la contraseña antes de guardar
        $passwordHash = password_hash($data['password'], PASSWORD_BCRYPT);

        $params = [
            $data['rol_id'],
            $data['nombre'],
            $data['email'],
            $passwordHash
        ];

        return ConexionPDO::insert($sql, $params, true); // Retorna el ID insertado
    }
}
