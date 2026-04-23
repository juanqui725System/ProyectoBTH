<?php
//namespace Config;
require_once "config.php";
class ConexionPDO
{
    // static private $conn;
    private static ?PDO $cnn = null;
    public static function connect(): PDO
    {
        $pdo = 'mysql:host=' . HOST . ';port=' . PORT . ';dbname=' . DATABASE . ";" . CHARSET;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
        try {
            self::$cnn = new PDO($pdo, USERNAME, PASSWORD, $options);
        } catch (PDOException $e) {
            die(json_encode(["error" => "Error de conexión: " . $e->getMessage()]));
        }
        return self::$cnn;
    }
    public static function insert(string $sql, array $params = [], bool $returnId = false)
    {
        try {
            $stmt = self::connect()->prepare($sql);
            $success = $stmt->execute($params);

            if ($success && $returnId) {
                return self::connect()->lastInsertId();
            }

            return $success ? "Ok" : "Error";
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public static function close(): void
    {
        self::$cnn = null;
    }
    public static function query(string $sql, array $params = []): array
    {
        try
        {
            $stmt = self::connect()->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        }
        catch(Exception $e){
            return ["error"=>$e->getMessage()];
        }
        
    }
    /**
     * Ejecuta UPDATE o DELETE y devuelve el número de filas afectadas
     */
    public static function execute(string $sql, array $params = []): int
    {
        try {
            $stmt = self::connect()->prepare($sql);
            $stmt->execute($params);

            // Retorna cuántas filas se actualizaron o eliminaron realmente
            return $stmt->rowCount();
        } catch (Exception $e) {
            // Log del error o manejo según tu API
            return 0;
        }
    }
}
