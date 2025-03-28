<?php
//var_dump($_POST);\
if (!empty($_POST)) {
    if (empty($_POST["name"])) {
        echo "<script>alert('Nombre es obligatorio')</script><br>";
        //header('Location:index.php');
    } else
        echo "Gracias por registrarte: " . $_POST["name"] . " " . $_POST["lastname"] . "<br>";
    if (empty($_POST["ci"])) {
        echo "<script>alert('Ci es obligatorio')</script>";
        //header('Location:index.php');
    } else
        echo "Tu CI es: " . $_POST["ci"];
    if (empty($_POST["gener"])) {
        echo "Genero es obligatorio<br>";
        //header('Location:index.php');
    } else
        echo "<br>Tu Genero es: " . $_POST["gener"];
    if (empty($_POST["fecnac"])) {
        echo "Fec. Nacimiento es obligatorio<br>";
        //header('Location:index.php');
    } else
        echo "<br>Tu Fecha es: " . $_POST["fecnac"];
} else {
    echo "Error al recibir datos";
}
