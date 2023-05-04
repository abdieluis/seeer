<?php
/*
************************************************************************************************************************
INDICE FUNCIONES
registrarAudiencia$dbConnect, $idUsuarioSolicitante, $fechaSolicitudAudiencia, $fechaAudiencia, $horarioAudiencia, $nombreSolicitanteAudiencia, $apellidosSolicitanteAudiencia, $nombreCitadoAudiencia, $conciliadorAsignadoAudiencia, $observacionesAudiencia)


obtenerDatosSolicitud($dbConnect);
************************************************************************************************************************
*/

function registrarAudiencia($dbConnect, $idUsuarioSolicitante, $fechaSolicitudAudiencia, $fechaAudiencia, $horarioAudiencia, $nombreSolicitanteAudiencia, $apellidosSolicitanteAudiencia, $nombreCitadoAudiencia, $conciliadorAsignadoAudiencia, $observacionesAudiencia){
    $query = 'INSERT INTO audiencia (idUsuarioSolicitante, fechaSolicitud, fechaAudiencia, horarioAudiencia, nombreSolicitante, apellidosSolicitante, nombreCitado, conciliadorAsignado, observaciones)
    VALUES (?,?,?,?,?,?,?,?,?)';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('issssssss', $idUsuarioSolicitante, $fechaSolicitudAudiencia, $fechaAudiencia, $horarioAudiencia, $nombreSolicitanteAudiencia, $apellidosSolicitanteAudiencia, $nombreCitadoAudiencia, $conciliadorAsignadoAudiencia, $observacionesAudiencia);
    
    return array(array($stmt->execute()), $stmt->insert_id);
}

function mostrarDatosAudiencias($dbConnect){
    $respuesta = array();
    $query = 'SELECT au.idAudiencia, au.fechaSolicitud, au.fechaAudiencia, CONCAT(au.nombreSolicitante, " ", au.apellidosSolicitante) as nombreCompletoSolicitante, au.conciliadorAsignado, au.horarioAudiencia, ci.ciudad, au.eliminado FROM audiencia au
    INNER JOIN usuario_solicitante usso
    INNER JOIN ciudad ci
    ON au.idUsuarioSolicitante = usso.idUsuarioSolicitante AND usso.idCiudad = ci.idCiudad AND au.eliminado = 0';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }

    return $respuesta;
}

function obtenerDatosAudienciaSeleccionada($dbConnect, $campo, $valor){
    $fila = array();
    $query = 'SELECT * FROM audiencia WHERE '.$campo.' = ?';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('s', $valor);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $fila = $resultado->fetch_assoc();
    return $fila;
}

function actualizarDatosAudiencia($dbConnect, $nombreSolicitante, $apellidosSolicitante, $conciliadorAsignado, $fechaSolicitud, $fechaAudiencia, $horarioAudiencia, $nombreCitado, $observaciones, $idAudiencia){
    $query = 'UPDATE audiencia SET nombreSolicitante = ?, apellidosSolicitante = ?, conciliadorAsignado = ?, fechaSolicitud = ?, fechaAudiencia = ?, horarioAudiencia = ?, nombreCitado = ?, observaciones = ? WHERE idAudiencia = ?';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('ssssssssi', $nombreSolicitante, $apellidosSolicitante, $conciliadorAsignado, $fechaSolicitud, $fechaAudiencia, $horarioAudiencia, $nombreCitado, $observaciones, $idAudiencia);
    return array($stmt->execute());
}

function eliminarAudiencia($dbConnect, $estatus, $idAudiencia){
    $query = 'UPDATE audiencia SET eliminado = ? WHERE idAudiencia = ?';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('ii', $estatus, $idAudiencia);
    return array($stmt->execute());
}

?>