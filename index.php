<!DOCTYPE html>
<html lang="es">
<link rel="icon" type="image/x-icon" href="liga.jpeg">
<head>
<meta charset="UTF-8">
    <title>X Liga 3x3 Cele Cortés</title>
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

    <h1>Bienvenidos a la Liga 3x3 Cele Cortés</h1>
    <img src="liga.jpeg">
    <p>Bienvenidos una vez más a otro liga 3x3 organizada por el Club Baloncesto Paradas</p>
    <p>¿Qué desea realizar?</p>
    
    <p>
        <input type="submit" name="equipo" value="Inscribir Equipo">
        <input type="submit" name="mesa" value="Isncribir Mesa">
        <input type="submit" name="partido" value="Rellenar Estadística">
    </p>

    <?php
        if(isset($_POST["partido"])){
        header ('Location: partidos.php');

        } elseif(isset($_POST["mesa"])){
            header ('Location: mesas.php');
        }
        elseif(isset($_POST["equipo"])){
            header ('Location: equipos.php');
        }
    ?>



</form>
    
</body>
</html>