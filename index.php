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
        <label for="id">Id:</label>
        <input type="text" id="id" name="id"><br><br>
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" placeholder="Nombre"><br><br>
        <label for="lastname">Apellidos:</label>
        <input type="text" name="lastname" id="lastname" placeholder="Apellidos"><br><br>
        <label for="gener">Genero:</label>
        <input type="radio" name="gener" id="female" value="Femenino">
        <label for="female">Femenino</label>
        <input type="radio" name="gener" id="male" value="Masculino">
        <label for="male">Masculino:</label><br><br>
        <label for="fecnac">Fecha de Nacimiento:</label>
        <input type="date" name="fecnac" id="fecnac" placeholder="Fecha de Nacimiento"><br><br>
        <label for="ci">Cedula de Identidad:</label>
        <input type="text" name="ci" id="ci" placeholder="Cedula de Identidad"><br><br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
    </form>
</body>

</html>