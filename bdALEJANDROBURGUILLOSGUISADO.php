<?php
    $host = "localhost";
    $user = "root";
    $pwd = "iaw";

    $enlace = mysqli_connect($host, $user, $pwd);
    
    $basedatos = "CREATE DATABASE liga";
    mysqli_query($enlace, $basedatos);
    
    mysqli_select_db($enlace, "liga");
    

    $jugadores = "CREATE TABLE jugadores (
        dni CHAR(9) PRIMARY KEY NOT NULL,
        nombre_jugadore VARCHAR(20),
        apellidos_jugador VARCHAR(40),
        correo_jugador VARCHAR(40),
        ntelefono_jugador INT,
        localidad_jugador VARCHAR(20),
        fechanacimiento_jugador DATE,
        posicion VARCHAR(20)
    );";

    mysqli_query($enlace, $jugadores);

    $mesas = "CREATE TABLE mesas (
        dni_mesa CHAR(9) PRIMARY KEY NOT NULL,
        nombre_mesa VARCHAR(30),
        apellidos_mesa VARCHAR(40),
        localidad_mesa VARCHAR(20),
        fechanacimiento_mesa DATE,
        ntelefono_mesa INT,
        correo_mesa VARCHAR(40)
    );";

    mysqli_query($enlace, $mesas);
    
    $partidos = "CREATE TABLE partidos (
        id_partido CHAR(9) PRIMARY KEY NOT NULL,
        puntoslocal INT,
        puntosvisi INT,
        reboteslocal INT,
        rebotesvisi INT,
        asistenciaslocal INT,
        asistenciasvisi INT,
        fecha_partido DATE,
        mesa CHAR(9),
        FOREIGN KEY FK_MESA(mesa) REFERENCES mesas(dni_mesa)
    );";
    
    mysqli_query($enlace, $partidos);

    $equipos = "CREATE TABLE equipos (
        id_equipo CHAR(9) PRIMARY KEY NOT NULL,
        nombre_equipo VARCHAR(20),
        categoria VARCHAR(20),
        ncomponentes INT,
        localidad_equipo VARCHAR(20),
        jugador CHAR(9),
        partido CHAR(9),
        FOREIGN KEY FK_JUGADOR(jugador) REFERENCES jugadores(dni),
        FOREIGN KEY FK_PARTIDO(partido) REFERENCES partidos(id_partido)
    );";
    
    mysqli_query($enlace, $equipos);

    $insertlocajugador1 = "INSERT INTO jugadores(localidad_jugador) VALUES('Paradas');";
    mysqli_query($enlace, $insertlocajugador1);
    $insertlocajugador2 = "INSERT INTO jugadores(localidad_jugador) VALUES('Arahal');";
    mysqli_query($enlace, $insertlocajugador2);
    $insertlocajugador3 = "INSERT INTO jugadores(localidad_jugador) VALUES('Marchena');";
    mysqli_query($enlace, $insertlocajugador3);
    $insertlocajugador4 = "INSERT INTO jugadores(localidad_jugador) VALUES('La Puebla de Cazalla');";
    mysqli_query($enlace, $insertlocajugador4);
    $insertlocajugador5 = "INSERT INTO jugadores(localidad_jugador) VALUES('El Coronil');";
    mysqli_query($enlace, $insertlocajugador5);
    $insertlocajugador6 = "INSERT INTO jugadores(localidad_jugador) VALUES('Montellano');";
    mysqli_query($enlace, $insertlocajugador6);
    

    $insertlocamesa1 = "INSERT INTO mesas(localidad_mesa) VALUES('Paradas');";
    mysqli_query($enlace, $insertlocamesa1);
    $insertlocamesa2 = "INSERT INTO mesas(localidad_mesa) VALUES('Arahal');";
    mysqli_query($enlace, $insertlocamesa2);
    $insertlocamesa3 = "INSERT INTO mesas(localidad_mesa) VALUES('Marchena');";
    mysqli_query($enlace, $insertlocamesa3);
    $insertlocamesa4 = "INSERT INTO mesas(localidad_mesa) VALUES('La Puebla de Cazalla');";
    mysqli_query($enlace, $insertlocamesa4);
    $insertlocamesa5 = "INSERT INTO mesas(localidad_mesa) VALUES('El Coronil');";
    mysqli_query($enlace, $insertlocamesa5);
    $insertlocamesa6 = "INSERT INTO mesas(localidad_mesa) VALUES('Montellano');";
    mysqli_query($enlace, $insertlocamesa6);


    $insertlocaequipo1 = "INSERT INTO equipos(localidad_equipos) VALUES('Paradas');";
    mysqli_query($enlace, $insertlocaequipo1);
    $insertlocaequipo2 = "INSERT INTO equipos(localidad_equipo) VALUES('Arahal');";
    mysqli_query($enlace, $insertlocaequipo2);
    $insertlocaequipo3 = "INSERT INTO equipos(localidad_equipo) VALUES('Marchena');";
    mysqli_query($enlace, $insertlocaequipo3);
    $insertlocaequipo4 = "INSERT INTO equipos(localidad_equipo) VALUES('La Puebla de Cazalla');";
    mysqli_query($enlace, $insertlocaequipo4);
    $insertlocaequipo5 = "INSERT INTO equipos(localidad_equipo) VALUES('El Coronil');";
    mysqli_query($enlace, $insertlocaequipo5);
    $insertlocaequipo6 = "INSERT INTO equipos(localidad_equipo) VALUES('Montellano');";
    mysqli_query($enlace, $insertlocaequipo6);


?>