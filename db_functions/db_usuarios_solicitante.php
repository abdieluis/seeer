<?php
/*
************************************************************************************************************************
INDICE FUNCIONES
registrarUsuarioSolicitante($dbConnect, $nombres, $apellidos, $genero, $edad, $nroIdentificacion, $telefono, $ciudad)
************************************************************************************************************************
*/

function registrarUsuarioSolicitante($dbConnect, $nombres, $apellidos, $genero, $edad, $nroIdentificacion, $telefono, $estado, $municipio, $ciudad){
    $query = 'INSERT INTO usuario_solicitante (nombres, apellidos, genero, edad, nroIdentificacionOficial, telefono, estado, municipio, idCiudad)
    VALUES (?,?,?,?,?,?,?,?,?)';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('ssssssssi', $nombres, $apellidos, $genero, $edad, $nroIdentificacion, $telefono, $estado, $municipio, $ciudad);
    
    return array(array($stmt->execute()), $stmt->insert_id);
}

function obtenerDatosUsuarioSolicitante($dbConnect){
    $respuesta = array();
    $query = 'SELECT usso.idUsuarioSolicitante, usso.nombres, usso.apellidos, usso.genero, usso.edad, usso.nroIdentificacionOficial, usso.telefono, ci.ciudad, usso.eliminado FROM usuario_solicitante usso INNER JOIN ciudad ci WHERE ci.idCiudad = usso.idCiudad';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }

    return $respuesta;
}

function obtenerDatosUsuarioSolicitanteSeleccionado($dbConnect, $campo, $valor){
  $fila = array();
  $query = 'SELECT usso.idUsuarioSolicitante, usso.nombres, usso.apellidos, usso.genero, usso.edad, usso.nroIdentificacionOficial, usso.telefono, ci.ciudad, usso.eliminado FROM usuario_solicitante usso INNER JOIN ciudad ci WHERE ci.idCiudad = usso.idCiudad AND '.$campo.' = ?';
  $stmt = $dbConnect->prepare($query);
  $stmt->bind_param('s', $valor);
  $stmt->execute();
  $resultado = $stmt->get_result();
  $fila = $resultado->fetch_assoc();
  return $fila;
}

function obtenerDatosSolicitanteEditar($dbConnect, $campo, $valor){
  $fila = array();
  $query = 'SELECT * FROM usuario_solicitante WHERE '.$campo.' = ?';
  $stmt = $dbConnect->prepare($query);
  $stmt->bind_param('s', $valor);
  $stmt->execute();
  $resultado = $stmt->get_result();
  $fila = $resultado->fetch_assoc();
  return $fila;
}

?>