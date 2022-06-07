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
    <?php
        session_start();
    ?>

    <p>Código del Equipo:</p>
    <input type="text" name="test" value="<?php echo rand(1,1000000000)?>">

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
    <p><input type="radio" id="ale" name="categoria" value="alevín"> Alevín</p>
    <p><input type="radio" id="inf" name="categoria" value="infantil"> Infantil</p>
    <p><input type="radio" id="cad" name="categoria" value="cadete"> Cadete</p>
    <p><input type="radio" id="jun" name="categoria" value="junior"> Junior</p>
    <p><input type="radio" id="sen" name="categoria" value="senior"> Senior</p>







</form>
    
</body>
</html>