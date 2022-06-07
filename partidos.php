<!DOCTYPE html>
<html lang="es">
<link rel="icon" type="image/x-icon" href="liga.jpeg">
<head>
    <meta charset="UTF-8">
    <title>Partidos</title>
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
    
    <p>Código del Partido:</p>
    <input type="text" name="test" value="<?php echo rand(1,1000000000)?>">

    <p>Puntos Equipo Local:</p>
    <input type="number" name="plocal">

    <p>Puntos Equipo Visitante:</p>
    <input type="number" name="pvisi">

    <p>Rebotes Equipo Local:</p>
    <input type="number" name="rlocal">

    <p>Rebotes Equipo Visitante:</p>
    <input type="number" name="rvisi">

    <p>Asistencias Equipo Local:</p>
    <input type="number" name="alocal">

    <p>Asistencias Equipo Visitante:</p>
    <input type="number" name="avisi">

    <p>Fecha del Partido:</p>
    <input type="date" name="fecha">

    <p><input type="submit" name="estadistica" value="Elaborar Estadística"></p>

    <?php
                if (isset($_POST["estadistica"])){
                mysqli_select_db($enlace, "liga");

                $test = $_POST["test"];
                $plocal = $_POST["plocal"];
                $pvisi = $_POST["pvisi"];
                $rlocal = $_POST["rlocal"];
                $rvisi = $_POST["rvisi"];
                $alocal = $_POST["alocal"];
                $avisi = $_POST["avisi"];
                $fecha = $_POST["fecha"];

                $registro_partido = "INSERT INTO partidos(id_partido, puntoslocal, puntosvisi, reboteslocal, rebotesvisi, asistenciaslocal, asistenciasvisi, fecha_partido) VALUES('$test', $plocal, $pvisi, $rlocal, $rvisi, $alocal, $avisi, '$fecha');";
                mysqli_query($enlace, $registro_partido);
                }

                ?>


</form>
    
</body>
</html>