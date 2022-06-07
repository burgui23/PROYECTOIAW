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
    <p>
            <select name="loca_mesa">
                <?php
                    mysqli_select_db($enlace, "liga");
                    $buscarl = "SELECT localidad_mesa, dni_mesa FROM mesas";
                    $buscarloca = mysqli_query($enlace, $buscarl);
                    if (mysqli_num_rows($buscarloca) > 0){
                        while($fila1 = mysqli_fetch_array($buscarloca)){
                            echo "<option value= " .$fila1[0]. ">" .$fila1[0]. "</option>";
                        }
                    }
                ?>
        </select></p>

    <p>Fecha de Nacimiento:</p>
    <input type="date" name="fechanaci">

    <p>Número de Teléfono:</p>
    <input type="text" name="ntelefono" placeholder="ej:23">

    <p>Correo Electrónico:</p>
    <input type="text" name="correo" placeholder="ejemplo@gmail.com">
    

</form>
    
</body>
</html>