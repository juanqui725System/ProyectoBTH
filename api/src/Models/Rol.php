<?php
require_once __DIR__ . '/../Config/ConexionPDO.php'; 
class Rol
{
    public static function all()
    {
        $sql = "SELECT * FROM roles";
        return ConexionPDO::query($sql);
    }

    public static function find($id)
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
