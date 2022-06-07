<!DOCTYPE html>
<html lang="es">
<link rel="icon" type="image/x-icon" href="liga.jpeg">
<head>
    <meta charset="UTF-8">
    <title>Mesas</title>
</head>
<body>
<?php
    $host = "localhost";
    $user = "root";
    $pwd = "iaw";

    $enlace = mysqli_connect($host, $user, $pwd);
    mysqli_select_db($enlace, "liga");
?>

<form action="" method="post">
    <?php
        session_start();
    ?>
    <p>DNI:</p>
    <input type="text" name="dni">

    <p>Nombre Completo:</p>
    <p>
    <input type="text" name="nombre" placeholder="Nombre">
    <input type="text" name="apellidos" placeholder="Apellidos">
    </p>

    <p>Localidad:</p>
    <input type="text" name="localidad">

    <p>Fecha de Nacimiento:</p>
    <input type="date" name="fechanaci">

    <p>Número de Teléfono:</p>
    <input type="number" name="ntelefono" placeholder="ej:23">

    <p>Correo Electrónico:</p>
    <input type="text" name="correo" placeholder="ejemplo@gmail.com">
    

</form>
    
</body>
</html>