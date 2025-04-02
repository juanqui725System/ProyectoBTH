<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>MI FORMULARIO HTML</h1>
    <form action="alumno.php" method="POST">
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" placeholder="Nombre"><br><br>
        <label for="email">Correo electronico:</label>
        <input type="text" name="email" id="email" placeholder="email"><br><br>
        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" id="telefono" placeholder="telefono"><br><br>
        <label for="password">Fecha de Nacimiento:</label>
        <input type="password" name="password" id="password" placeholder="password"><br><br>
        <label for="permiso">permiso:</label>
        <input type="number" name="permiso" id="permiso" placeholder="permiso"><br><br>
        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
    </form>
</body>

</html>