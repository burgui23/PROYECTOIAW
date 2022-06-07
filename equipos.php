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
                <?php
                    mysqli_select_db($enlace, "liga");
                    $buscarlo = "SELECT localidad_equipo, id_equipo FROM equipos";
                    $buscarlocali = mysqli_query($enlace, $buscarlo);
                    if (mysqli_num_rows($buscarlocali) > 0){
                        while($fila1 = mysqli_fetch_array($buscarlocali)){
                            echo "<option value= " .$fila1[0]. ">" .$fila1[0]. "</option>";
                        }
                    }
                ?>
     </select></p>

    <p>Número de Componentes:</p>
    <input type="number" name="ncomponentes">

    <p>Categoría</p>
    <p><input type="radio" name="categoria" value="alevín"> Alevín</p>
    <p><input type="radio" name="categoria" value="infantil"> Infantil</p>
    <p><input type="radio" name="categoria" value="cadete"> Cadete</p>
    <p><input type="radio" name="categoria" value="junior"> Junior</p>
    <p><input type="radio" name="categoria" value="senior"> Senior</p>

    <p>
            <input type="submit" name="registrar" value="Registrar Equipo">
            <input type="submit" name="modificar" value="Modificar becario">
            <input type="submit" name="eliminar" value="Eliminar becario">
            <input type="submit" name="mostrar" value="Mostrar becarios">
    </p>

    <?php
            if (isset($_POST["registrar"])){
                mysqli_select_db($enlace, "liga");

                $id = $_POST["id"];
                $nombre = $_POST["nombreequipo"];
                $loca = $_POST["loca_equipo"];
                $ncomponentes = $_POST["ncomponentes"];
                $categoria = $_POST["categoria"];

                $registro_equipos = "INSERT INTO equipos(id_equipo, nombre_equipo, categoria, ncomponentes, localidad_equipo) VALUES($id, '$nombre', '$loca', $ncomponentes, '$categoria');";
                mysqli_query($enlace, $registro_equipos);
    ?>
                <h1>Liga 3x3 Cele Cortés</h1>
                <h2>Inscripción de Jugadores</h2>

                <p>DNI del Jugador:</p>
                <input type="text" name="dni_jugador">

                <p>Nombre Completo:</p>
                <p>
                <input type="text" name="nombre_ju" placeholder="Nombre">
                <input type="text" name="apellidos_ju" placeholder="Apellidos">
                </p>

                <p>Correo Electrónico:</p>
                <input type="text" name="correo_ju" placeholder="ejemplo@gmail.com">

                <p>Número de Teléfono:</p>
                <input type="text" name="ntelefono_ju" placeholder="ej:23">
                
                <p>Localidad:</p>
                <select name="loca_ju">
                <?php
                    mysqli_select_db($enlace, "liga");
                    $buscarloca = "SELECT localidad_jugador, dni FROM jugadores";
                    $buscarlocalidad = mysqli_query($enlace, $buscarloca);
                    if (mysqli_num_rows($buscarlocalidad) > 0){
                        while($fila1 = mysqli_fetch_array($buscarlocalidad)){
                            echo "<option value= " .$fila1[0]. ">" .$fila1[0]. "</option>";
                        }
                    }
                ?>
                </select></p>

                <p>Fecha de Nacimiento:</p>
                <input type="date" name="fechanaci_ju">

                <p>Posición:</p>
                <p>
                    <input type="checkbox" name="posicion" value="Base">Base
                    <input type="checkbox" name="posicion" value="Alero">Alero
                    <input type="checkbox" name="posicion" value="Ala-Pivot">Ala-Pivot
                    <input type="checkbox" name="posicion" value="Escolta">Escolta
                    <input type="checkbox" name="posicion" value="Pivot">Pivot
                </p>

                <input type="submit" name="registro" value="Registrar Jugador">



                <?php
                if (isset($_POST["registro"])){
                mysqli_select_db($enlace, "liga");

                $dni_ju = $_POST["dni_jugador"];
                $nombre_ju = $_POST["nombre_ju"];
                $apellidos_ju = $_POST["apellidos_ju"];
                $correo_ju = $_POST["correo_ju"];
                $netelefono_ju = $_POST["ntelefono_ju"];
                $loca_ju = $_POST["loca_ju"];
                $fechanaci_ju = $_POST["fechanaci_ju"];
                $posicion = $_POST["posicion"];

                $registro_ju = "INSERT INTO jugadores(dni, nombre_jugadore, apellidos_jugador, correo_jugador, ntelefono_jugador, localidad_jugador, fechanacimiento_jugador, posicion) VALUES('$dni_ju', '$nombre_ju', '$apellidos_ju', '$correo_ju', $ntelefono_ju, '$loca_ju', $fechanaci_ju, '$posicion');";
                mysqli_query($enlace, $registro_ju);
                }
    ?>

    <?php

            }
    ?>







</form>
    
</body>
</html>