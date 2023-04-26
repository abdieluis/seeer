<?php
/*
************************************************************************************************************************
INDICE FUNCIONES
registrarSolicitud($dbConnect, $idUsuarioSolicitante, $fechaOper, $nombreSolicitante, $apellidosSolicitante, $auxiliarAsignado, $generoSolicitante, $nroIdentificacionOficial, $edadSolicitante, $motivoSolicitud, $observaciones);

obtenerDatosSolicitudSolicitante($dbConnect, $campo, $valor)
obtenerDatosSolicitudSeleccionada($dbConnect, $campo, $valor)
************************************************************************************************************************
*/

function registrarSolicitud($dbConnect, $idUsuarioSolicitante, $fechaOper, $nombreSolicitante, $apellidosSolicitante, $auxiliarAsignado, $generoSolicitante, $nroIdentificacionOficial, $edadSolicitante, $motivoSolicitud, $observaciones){
    $query = 'INSERT INTO solicitud (idUsuarioSolicitante, fecha, nombreSolicitante, apellidosSolicitante, auxiliarAsignado, generoSolicitante, nroIdentificacionOficial, edad, motivoSolicitud, observaciones)
    VALUES (?,?,?,?,?,?,?,?,?,?)';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('isssssssss', $idUsuarioSolicitante, $fechaOper, $nombreSolicitante, $apellidosSolicitante, $auxiliarAsignado, $generoSolicitante, $nroIdentificacionOficial, $edadSolicitante, $motivoSolicitud, $observaciones);
    
    return array(array($stmt->execute()), $stmt->insert_id);
}

function obtenerDatosSolicitudSolicitante($dbConnect, $campo, $valor){
  $respuesta = array();
  $query = 'SELECT * FROM solicitud WHERE '.$campo.' = ?';
  $stmt = $dbConnect->prepare($query);
  $stmt->bind_param('s', $valor);
  $stmt->execute();
  $resultado = $stmt->get_result();
  while ($fila = $resultado->fetch_assoc()) {
      array_push($respuesta, $fila);
   }
   return $respuesta;
}

function obtenerDatosSolicitudSeleccionada($dbConnect, $campo, $valor){
  $fila = array();
  $query = 'SELECT * FROM solicitud WHERE '.$campo.' = ?';
  $stmt = $dbConnect->prepare($query);
  $stmt->bind_param('s', $valor);
  $stmt->execute();
  $resultado = $stmt->get_result();
  $fila = $resultado->fetch_assoc();
  return $fila;
}

function mostrarDatosSolicitudes($dbConnect){
    $respuesta = array();
    $query = 'SELECT so.idSolicitud, so.fecha, CONCAT(so.nombreSolicitante, " ", so.apellidosSolicitante) as nombreCompletoSolicitante, so.auxiliarAsignado, so.nroIdentificacionOficial, ci.ciudad,so.eliminado FROM solicitud so
    INNER JOIN usuario_solicitante usso
    INNER JOIN ciudad ci
    ON so.idUsuarioSolicitante = usso.idUsuarioSolicitante AND usso.idCiudad = ci.idCiudad AND so.eliminado = 0';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }

    return $respuesta;
}

function actualizarDatosSolicitud($dbConnect, $nombreSolicitante, $apellidosSolicitante, $auxiliarAsignado, $generoSolicitante, $nroIdentificacionOficial, $edadSolicitante, $motivoSolicitud, $observaciones, $idSolicitud){
  $query = 'UPDATE solicitud SET nombreSolicitante = ?, apellidosSolicitante = ?, auxiliarAsignado = ?, generoSolicitante = ?, nroIdentificacionOficial = ?, edadSolicitante = ?, motivoSolicitud = ?, observaciones = ? WHERE idSolicitud = ?';
  $stmt = $dbConnect->prepare($query);
  $stmt->bind_param('ssssssssi', $nombreSolicitante, $apellidosSolicitante, $auxiliarAsignado, $generoSolicitante, $nroIdentificacionOficial, $edadSolicitante, $motivoSolicitud, $observaciones, $idSolicitud);
  return array($stmt->execute());
}

function eliminarSolicitud($dbConnect, $estatus, $idSolicitud){
    $query = 'UPDATE solicitud SET eliminado = ? WHERE idSolicitud = ?';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('ii', $estatus, $idSolicitud);
    return array($stmt->execute());
}

?>