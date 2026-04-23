<?php
class User {
    // Simulación de una base de datos en un array estático
    private static $users = [
        ["id" => 1, "name" => "Juan Pérez", "email" => "juan@example.com"],
        ["id" => 2, "name" => "Maria Lopez", "email" => "maria@example.com"],
        ["id" => 3, "name" => "Carlos Ruiz", "email" => "carlos@example.com"]
    ];

    public static function all() {
        return self::$users;
    }

    public static function find($id) {
        foreach (self::$users as $user) {
            if ($user['id'] == $id) return $user;
        }
        return null;
    }
}