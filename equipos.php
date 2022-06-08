<!DOCTYPE html>
<html lang="es">
<link rel="icon" type="image/x-icon" href="liga.jpeg">
<head>
    <meta charset="UTF-8">
    <title>Equipos</title>
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
    <h1>Liga 3x3 Cele Cortés</h1>
    <h2>Registro de Equipos</h2>

    <?php
        session_start();
    ?>

    <p>Código del Equipo:</p>
    <input type="text" name="id" value="<?php echo rand(1,1000000000)?>">

    <p>Nombre del Equipo:</p>
    <input type="text" name="nombreequipo">

    <p>Localidad:</p>
    <select name="loca_equipo">
        <option value="paradas">Paradas</option>
        <option value="marchena">Marchena</option>
        <option value="arahal">Arahal</option>
        <option value="montellano">Montellano</option>
        <option value="lapuebla">La Puebla de Cazalla</option>
        <option value="elcoronil">El Coronil</option>
    </select></p>

    <p>Número de Componentes:</p>
    <input type="number" name="ncomponentes">

    <p>Categoría</p>
    <select name="categoria">
        <option value="alevin">Alevin</option>
        <option value="infantil">Infantil</option>
        <option value="cadete">Cadete</option>
        <option value="junior">Junior</option>
        <option value="senior">Senior</option>
    </select></p>

    <p>
            <input type="submit" name="registrar" value="Registrar Equipo">
            <input type="submit" name="mostraequipos" value="Mostrar Equipos Inscritos">
    </p>

    <?php
            if (isset($_POST["registrar"])){
                mysqli_select_db($enlace, "liga");

                $id = $_POST["id"];
                $nombre = $_POST["nombreequipo"];
                $loca = $_POST["loca_equipo"];
                $ncomponentes = $_POST["ncomponentes"];
                $categoria = $_POST["categoria"];

                $registro_equipos = "INSERT INTO equipos(id_equipo, nombre_equipo, categoria, ncomponentes, localidad_equipo) VALUES($id, '$nombre', '$categoria', $ncomponentes, '$loca');";
                mysqli_query($enlace, $registro_equipos);
                }

    ?>

</form>
    
</body>
</html>