<?php
/*
************************************************************************************************************************
INDICE FUNCIONES
registrarUsuarioConciliador($dbConnect, $nombres, $apellidos, $ciudad)
************************************************************************************************************************
*/

function registrarUsuarioConciliador($dbConnect, $idUsuario, $nombres, $apellidos, $ciudad){
    $query = 'INSERT INTO usuario_conciliador (idUsuarioConciliador, nombres, apellidos, idCiudad)
    VALUES (?,?,?,?)';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('issi', $idUsuario, $nombres, $apellidos, $ciudad);
    
    return array(array($stmt->execute()), $stmt->insert_id);
}

function obtenerConciliadorCiudad($dbConnect, $idCiudad){
    $respuesta = array();
    $query = 'SELECT * FROM usuario_conciliador WHERE idCiudad = ?';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('i', $idCiudad); 
    $stmt->execute();
    $resultado = $stmt->get_result();
    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }
    return $respuesta;
}

function obtenerConciliador($dbConnect, $campo, $valor){
    $fila = array();
    $query = 'SELECT * FROM usuario_conciliador WHERE '.$campo.' = ?';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('s', $valor);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $fila = $resultado->fetch_assoc();
    return $fila;
}

?>