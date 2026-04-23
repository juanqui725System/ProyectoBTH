<?php
//namespace Config;
class ConexionPDO {
    // static private $conn;
    static private $cnn;
    public function __construct()
    {
        $pdo='mysql:host='.HOST.';port='.PORT.';dbname='.DATA_BASE.";".CHARSET;
        $options=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_EMULATE_PREPARES=>false];
        try
        {
            self::$cnn = new PDO($pdo, USER, PASSWORD,$options);
        }
        catch(PDOException $e)
        {
            die("ERROR ".$e->getMessage());
        }
    }
    static public function conexion()
    {
        return self::$cnn;
    }
    static public function connect() 
    {
        return self::$cnn;
    }
    static public function close() {
        return self::$cnn=null;
    }
    static function InsertarSql($consulta,$dato)
    {
        $mensaje = "";
        try {
            $insert = self::$cnn->prepare($consulta);
            $resultInsert = $insert->execute($dato);
            if ($resultInsert) {
                //$idInsert = self::$cnn->lastInsertId();
                $mensaje = "Ok";
                //return $idInsert;
            } else {
                $mensaje = "Error";
            }
        } catch (Exception $e) {
            $mensaje = "Error " . $e->getMessage();
        }
        return  $mensaje;
    }
    static function InsertarSqlID($consulta,$dato)
    {
        $mensaje = "";
        try {
            $insert = self::$cnn->prepare($consulta);
            $resultInsert = $insert->execute($dato);
            if ($resultInsert) {
                $idInsert = self::$cnn->lastInsertId();
                return $idInsert;
                exit;
            } else {
                $mensaje = "Error";
            }
        } catch (Exception $e) {
            $mensaje = "Error " . $e->getMessage();
        }
        return  $mensaje;
    }
    static function executeQuery($sql) {
        $execute = self::$cnn->query($sql);
        $result = $execute->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}
?>