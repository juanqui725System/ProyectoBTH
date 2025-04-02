<?php
//var_dump($_POST);\
include_once "conexion.php";
$nombre = "";
$telefono = '';
$password = '';
$permiso = 0;
$email = '';
if (!empty($_POST)) {
    if (empty($_POST["name"])) {
        echo "<script>alert('Nombre es obligatorio')</script><br>";
    } else {
        $nombre = $_POST["name"];
    }
    if (empty($_POST["email"])) {
        echo "Email es obligatorio<br>";
    } else
        $email = $_POST["email"];
    if (empty($_POST["telefono"])) {
        echo "Telefono es obligatorio<br>";
    } else
        $telefono = $_POST["telefono"];
    if (empty($_POST["password"])) {
        echo "password es obligatorio<br>";
    } else
        $password = $_POST["password"];
    if (empty($_POST["permiso"])) {
        echo "permiso es obligatorio<br>";
    } else
        $permiso = $_POST["permiso"];
    //codigo para adiconar a la base de datos
    $sql = "INSERT INTO USUARIO(NOMBRE,EMAIL,PASSWORD,TELEFONO,IDPERMISO)";
    $sql = $sql . " VALUES('$nombre','$email','$password','$telefono',$permiso)";
    //echo $sql;
    $queryResult=mysqli_query($conn,$sql);
    header('Location:reporteusuario.php');
} else {
    echo "Error al recibir datos";
}
 //header('Location:index.php');