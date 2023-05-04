<?php
/*
************************************************************************************************************************
INDICE FUNCIONES

************************************************************************************************************************
*/

function mostrarSolicitudesMorelia($dbConnect){
    $respuesta = array();
    $query = 'SELECT COUNT(ciudad) AS totalSolicitud FROM log_movimientos WHERE ciudad = "Morelia" AND area = "Solicitud"';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }

    return $respuesta;
}

function mostrarAudienciasMorelia($dbConnect){
    $respuesta = array();
    $query = 'SELECT COUNT(ciudad) AS totalAudiencia FROM log_movimientos WHERE ciudad = "Morelia" AND area = "Audiencias"';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }

    return $respuesta;
}

function mostrarRatificacionesMorelia($dbConnect){
    $respuesta = array();
    $query = 'SELECT COUNT(ciudad) AS totalRatificacion FROM log_movimientos WHERE ciudad = "Morelia" AND area = "Ratificacion"';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }

    return $respuesta;
}

function mostrarSolicitudesUruapan($dbConnect){
    $respuesta = array();
    $query = 'SELECT COUNT(ciudad) AS totalSolicitud FROM log_movimientos WHERE ciudad = "Uruapan" AND area = "Solicitud"';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }

    return $respuesta;
}

function mostrarAudienciasUruapan($dbConnect){
    $respuesta = array();
    $query = 'SELECT COUNT(ciudad) AS totalAudiencia FROM log_movimientos WHERE ciudad = "Uruapan" AND area = "Audiencias"';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }

    return $respuesta;
}

function mostrarRatificacionesUruapan($dbConnect){
    $respuesta = array();
    $query = 'SELECT COUNT(ciudad) AS totalRatificacion FROM log_movimientos WHERE ciudad = "Uruapan" AND area = "Ratificacion"';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }

    return $respuesta;
}

function mostrarSolicitudesZamora($dbConnect){
    $respuesta = array();
    $query = 'SELECT COUNT(ciudad) AS totalSolicitud FROM log_movimientos WHERE ciudad = "Zamora" AND area = "Solicitud"';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }

    return $respuesta;
}

function mostrarAudienciasZamora($dbConnect){
    $respuesta = array();
    $query = 'SELECT COUNT(ciudad) AS totalAudiencia FROM log_movimientos WHERE ciudad = "Zamora" AND area = "Audiencias"';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }

    return $respuesta;
}

function mostrarRatificacionesZamora($dbConnect){
    $respuesta = array();
    $query = 'SELECT COUNT(ciudad) AS totalRatificacion FROM log_movimientos WHERE ciudad = "Zamora" AND area = "Ratificacion"';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }

    return $respuesta;
}

function mostrarGeneroHombres($dbConnect){
    $respuesta = array();
    $query = 'SELECT COUNT(genero) AS totalHombres FROM usuario_solicitante WHERE genero = "Hombre"';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }

    return $respuesta;
}

function mostrarGeneroMujeres($dbConnect){
    $respuesta = array();
    $query = 'SELECT COUNT(genero) AS totalMujeres FROM usuario_solicitante WHERE genero = "Mujer"';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }

    return $respuesta;
}

?>