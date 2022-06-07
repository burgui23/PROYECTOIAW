<!DOCTYPE html>
<html lang="es">
<link rel="icon" type="image/x-icon" href="liga.jpeg">
<head>
    <meta charset="UTF-8">
    <title>Jugadores</title>
</head>
<body>
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

                <h1>Liga 3x3 Cele Cortés</h1>
                <h2>Inscripción de Jugadores</h2>
                <h3>¡Inscribe a los jugadores de tu Equipo!</h3>

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
                <input type="submit" name="modificar" value="Modificar Jugador">
                <input type="submit" name="borrar" value="Eliminar Jugador">
                <input type="submit" name="mostrar" value="Mostrar Datos Jugadores">



                <?php
                if (isset($_POST["registro"])){
                mysqli_select_db($enlace, "liga");

                $dni_ju = $_POST["dni_jugador"];
                $nombre_ju = $_POST["nombre_ju"];
                $apellidos_ju = $_POST["apellidos_ju"];
                $correo_ju = $_POST["correo_ju"];
                $ntelefono_ju = $_POST["ntelefono_ju"];
                $loca_ju = $_POST["loca_ju"];
                $fechanaci_ju = $_POST["fechanaci_ju"];
                $posicion = $_POST["posicion"];

                $registro_ju = "INSERT INTO jugadores(dni, nombre_jugadore, apellidos_jugador, correo_jugador, ntelefono_jugador, localidad_jugador, fechanacimiento_jugador, posicion) VALUES('$dni_ju', '$nombre_ju', '$apellidos_ju', '$correo_ju', $ntelefono_ju, '$loca_ju', '$fechanaci_ju', '$posicion');";
                mysqli_query($enlace, $registro_ju);
                echo "<p>Jugador inscrito correctamente</p>";

                } elseif (isset($_POST["modificar"])){
                    mysqli_select_db($enlace, "liga");
    
                    $dni_ju = $_POST["dni_jugador"];
                    $nombre_ju = $_POST["nombre_ju"];
                    $apellidos_ju = $_POST["apellidos_ju"];
                    $correo_ju = $_POST["correo_ju"];
                    $ntelefono_ju = $_POST["ntelefono_ju"];
                    $loca_ju = $_POST["loca_ju"];
                    $fechanaci_ju = $_POST["fechanaci_ju"];
                    $posicion = $_POST["posicion"];
    
                    $modificacion_ju = "UPDATE jugadores SET dni = '$dni_ju', nombre_jugadore = '$nombre_ju', apellidos_jugador = '$apellidos_ju', correo_jugador = '$correo_ju', ntelefono_jugador = $ntelefono_ju, localidad_jugador = '$loca_ju', fechanacimiento_jugador = '$fechanaci_ju', posicion = '$posicion' WHERE dni = $dni_ju";
                    mysqli_query($enlace, $modificacion_ju);
                    echo "<p>Jugador modificado correctamente</p>";
                    }

                    elseif (isset($_POST["borrar"])){
                        mysqli_select_db($enlace, "liga");
        
                        $dni_ju = $_POST["dni_jugador"];
                        $nombre_ju = $_POST["nombre_ju"];
                        $apellidos_ju = $_POST["apellidos_ju"];
                        $correo_ju = $_POST["correo_ju"];
                        $ntelefono_ju = $_POST["ntelefono_ju"];
                        $loca_ju = $_POST["loca_ju"];
                        $fechanaci_ju = $_POST["fechanaci_ju"];
                        $posicion = $_POST["posicion"];
        
                        $eliminacion = "DELETE FROM jugadores WHERE dni = $dni_ju;";
                        $borrar = mysqli_query($enlace, $eliminacion);
                        echo "<p>Jugador eliminado correctamente";
                        }

                        elseif (isset($_POST["mostrar"])){
                            mysqli_select_db($enlace, "liga");
            
                            $dni_ju = $_POST["dni_jugador"];
                            $nombre_ju = $_POST["nombre_ju"];
                            $apellidos_ju = $_POST["apellidos_ju"];
                            $correo_ju = $_POST["correo_ju"];
                            $ntelefono_ju = $_POST["ntelefono_ju"];
                            $loca_ju = $_POST["loca_ju"];
                            $fechanaci_ju = $_POST["fechanaci_ju"];
                            $posicion = $_POST["posicion"];
            
                            $mostrar = "SELECT nombre_jugadore,apellidos_jugador,localidad_jugador,posicion FROM jugadores WHERE dni = '$dni_ju';";
                            $mostrardatos = mysqli_query($enlace, $mostrar);
                            if (mysqli_num_rows($mostrardatos) > 0){
                                while ($datos = mysqli_fetch_array($mostrardatos)){
                                    echo "<p>Nombre ------- " .$datos[0]. "</p>";
                                    echo "<p>Apellidos ------- " .$datos[1]. "</p>";
                                    echo "<p>Localidad ------- " .$datos[2]. "</p>";
                                    echo "<p>Poscion ------- " .$datos[3]. "</p>";
                                }
                            }
                        }

                ?>


</form>
    
</body>
</html>