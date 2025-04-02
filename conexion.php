<?php 
$servername="localhost"; // servidor
$database="DBSEXTO2025"; // nombre de la base de datos creado
$username="root"; //nombre del usuario de la base de datos
$password=""; //contrasena en este caso es vacio
$port=3307; // puerto 
// linea para conectarnos a una base de datos
//usando libreria mysqli
$conn= mysqli_connect($servername,
                    $username,
                    $password,
                    $database,
                    $port);
//verificar la conexion
if($conn->connect_error)
{
    die("Error de conexion".$conn->connect_error);
}
else
{
    echo "Conexion exitosa";
}
?>