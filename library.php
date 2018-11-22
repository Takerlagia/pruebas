<?php

function identificaUsuario($usuario, $clave, $db) {
    $conexion = mysqli_connect($db['host'], $db['usuario'], $db['clave'], $db['bd'], $db['puerto']);
    $resultado = mysqli_query($conexion, "SELECT nombre FROM usuario WHERE nombre = '$usuario' AND clave = md5('$clave')");
    if (mysqli_num_rows($resultado) > 0) {
        return TRUE;
    } else {
        return FALSE;
    }
    mysqli_close($conexion);
}

function existeUsuario($usuario, $db) {
    $conexion = mysqli_connect($db['host'], $db['usuario'], $db['clave'], $db['bd'], $db['puerto']);
    //No se controla posible error en la consulta.
    $resultado = mysqli_query($conexion, "SELECT nombre FROM usuario WHERE nombre = '$usuario'");
    if (mysqli_num_rows($resultado) > 0) {
        return TRUE;
    } else {
        return FALSE;
    }
    mysqli_close($conexion);
}

function crearUsuario($usuario, $clave, $email, $db) {
    $conexion = mysqli_connect($db['host'], $db['usuario'], $db['clave'], $db['bd'], $db['puerto']);
    //No se controla posible error en la consulta.
    mysqli_query($conexion, "INSERT INTO usuario VALUE('$usuario', md5('$clave'), '$email')");
    mysqli_close($conexion);
}

function leerCiudades($db) {
    $conexion = mysqli_connect($db['host'], $db['usuario'], $db['clave'], $db['bd'], $db['puerto']);
    $ciudades = array();
    //No se controla posible error en la consulta.
    $resultado = mysqli_query($conexion, "SELECT nombre FROM ciudad");
    while ($row = mysqli_fetch_array($resultado)) {
        $ciudades[] = $row[0];
    }
    return $ciudades;
    mysqli_close($conexion);
}

function leerEquipos($db) {
    $conexion = mysqli_connect($db['host'], $db['usuario'], $db['clave'], $db['bd'], $db['puerto']);
    $equipos = array();
    //No se controla posible error en la consulta.
    $resultado = mysqli_query($conexion, "SELECT nombre FROM equipo");
    while ($row = mysqli_fetch_array($resultado)) {
        $equipos[] = $row[0];
    }
    return $equipos;
    mysqli_close($conexion);
}

function crearEquipo($nombre, $ciudad, $db) {
    $conexion = mysqli_connect($db['host'], $db['usuario'], $db['clave'], $db['bd'], $db['puerto']);
    //No se controla posible error en la consulta.
    mysqli_query($conexion, "INSERT INTO equipo (nombre, ciudad) VALUES ('$nombre', '$ciudad')");
    mysqli_close($conexion);
}

function leerIdEquipo($nombre, $conexion) {
    $resultado = mysqli_query($conexion, "SELECT id FROM equipo WHERE nombre = '$nombre'");
    $row = mysqli_fetch_array($resultado);
    return $row[0];
}

function existePartido($local, $visitante, $db) {
    $conexion = mysqli_connect($db['host'], $db['usuario'], $db['clave'], $db['bd'], $db['puerto']);
    //No se controla posible error en la consulta.
    $ilocal = leerIdEquipo($local, $conexion);
    $ivisitante = leerIdEquipo($visitante, $conexion);
    $resultado = mysqli_query($conexion, "SELECT elocal FROM partido WHERE elocal = $ilocal and evisitante = $ivisitante");
    if (mysqli_num_rows($resultado) > 0) {
        return TRUE;
    } else {
        return FALSE;
    }
    mysqli_close($conexion);
}

function agregarPartido($local, $visitante, $glocal, $gvisitante, $db) {
    $conexion = mysqli_connect($db['host'], $db['usuario'], $db['clave'], $db['bd'], $db['puerto']);
    $ilocal = leerIdEquipo($local, $conexion);
    $ivisitante = leerIdEquipo($visitante, $conexion);
    //No se controla posible error en la consulta.
    mysqli_query($conexion, "INSERT INTO partido VALUES ($ilocal, $ivisitante, $glocal, $gvisitante)");
    if ($glocal != $gvisitante) {
        $ganador = $local;
        $gganador = $glocal;
        $perdedor = $visitante;
        $gperdedor = $perdedor;
        if ($glocal < $gvisitante) {
            $ganador = $visitante;
            $perdedor = $local;
            $gganador = $gvisitante;
            $gperdedor = $glocal;
        }
        mysqli_query($conexion, "UPDATE equipo SET pg = pg + 1, pj = pj + 1, puntos = puntos + 3 WHERE nombre = '$ganador'");
        mysqli_query($conexion, "UPDATE equipo SET pp = pp + 1, pj = pj + 1 WHERE nombre = '$perdedor'");
    } else {
        mysqli_query($conexion, "UPDATE equipo SET pe = pe + 1, pj = pj + 1, puntos = puntos + 1 WHERE nombre = '$local' or nombre = '$visitante'");
    }
    mysqli_query($conexion, "UPDATE equipo SET gf = gf + $glocal, ge = ge + $gvisitante  WHERE nombre = '$local'");
    mysqli_query($conexion, "UPDATE equipo SET gf = gf + $gvisitante, ge = ge + $glocal  WHERE nombre = '$visitante'");
    mysqli_close($conexion);
}

function leerClasificacion($db) {
    $conexion = mysqli_connect($db['host'], $db['usuario'], $db['clave'], $db['bd'], $db['puerto']);
    $equipos = array();
    //No se controla posible error en la consulta.
    $resultado = mysqli_query($conexion, "SELECT * FROM equipo ORDER BY puntos DESC, gf-ge DESC");
    while ($row = mysqli_fetch_assoc($resultado)) {
        $equipos[] = $row;
    }
    return $equipos;
    mysqli_close($conexion);
}

?>
