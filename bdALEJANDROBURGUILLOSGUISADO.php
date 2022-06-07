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



?>