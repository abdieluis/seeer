<?php
/*
************************************************************************************************************************
INDICE FUNCIONES
registrarUsuarioAuxiliar($dbConnect, $nombres, $apellidos, $ciudad, $idUsuarioConciliador)
************************************************************************************************************************
*/

function registrarUsuarioAuxiliar($dbConnect, $nombres, $apellidos, $ciudad, $idUsuarioConciliador){
    $query = 'INSERT INTO usuario_auxiliar (nombres, apellidos, idCiudad, idUsuarioConciliador)
    VALUES (?,?,?,?)';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('ssii', $nombres, $apellidos, $ciudad, $idUsuarioConciliador);
    
    return array(array($stmt->execute()), $stmt->insert_id);
}

function obtenerAuxiliarCiudad($dbConnect, $campo, $valor){
    $respuesta = array();
    $query = 'SELECT * FROM usuario_auxiliar WHERE '.$campo.' = ? ORDER BY idUsuarioAuxiliar'; 
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('s', $valor);
    $stmt->execute();
    $resultado = $stmt->get_result();
    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }
    return $respuesta;
}

?>