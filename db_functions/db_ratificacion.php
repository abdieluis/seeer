<?php
/*
************************************************************************************************************************
INDICE FUNCIONES

************************************************************************************************************************
*/

function registrarRatificacion($dbConnect, $fechaInicioLaboralTrabajador, $fechaFinLaboralTrabajador, $nombresTrabajador, $apellidosTrabajador, $generoTrabajador, 
$edadTrabajador, $puestoDesempeñadoTrabajador, $calleTrabajador, $numeroExteriorTrabajador, $numeroInteriorTrabajador, $coloniaTrabajador, $codigoPostalTrabajador, $estadoTrabajador, 
$municipioTrabajador, $curpTrabajador, $rfcTrabajador, $nssTrabajador, $tipoIdentificacionTrabajador, $numeroIdentificacionTrabajador, $emailTrabajador, $telefonoTrabajador, 
$sueldoTrabajador, $tipoSueldoTrabajador, $horarioTrabajador, $horasLaboradasTrabajador, $razonSocialEmpresa, $nombreComercialEmpresa, $nombrePatronEmpresa, $dedicaEmpresa, 
$curpRfcEmpresa, $calleEmpresa, $numeroExteriorEmpresa, $numeroIneriorEmpresa, $coloniaEmpresa, $cpEmpresa, $estadoEmpresa, $municipioEmpresa, $telefonoEmpresa, $emailEmpresa, 
$propuestaCuatificacion, $fechaOper){
    $query = 'INSERT INTO ratificacion (fechaInicioLabores, fechaTerminoLabores, nombreTrabajador, apellidosTrabajador, generoTrabajador, 
    edadTrabajador, puestoDesempeñado, calleTrabajador, numeroExteriorTrabajador, numeroInteriorTrabajador, coloniaTrabajador, cpTrabajador, estadoTrabajador, 
    municipio, curpTrabajador, rfcTrabajador, nssTrabajador, tipoIdentificacion, numeroIdentificaion, emailTrabajador, telefonoTrabajador, 
    sueldo, tipoSueldo, horarioLaboral, horasLaboradas, razonSocialEmpresa, nombreComercial, nombrePatron, giroEmpresa, 
    curpRfcPatron, calleEmpresaPatron, numeroExteriorEmpresaPatron, numeroInteriorEmpresaPatron, coloniaEmpresaPatron, cpEmpresaPatron, estadoEmpresaPatron, municipioEmpresaPatron, 
    telefonoEmpresaPatron, emailEmpresaPatron, cuantificacion, fechaCreacion)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('sssssssssssssssssssssssssssssssssssssssss', $fechaInicioLaboralTrabajador, $fechaFinLaboralTrabajador, $nombresTrabajador, $apellidosTrabajador, $generoTrabajador, 
    $edadTrabajador, $puestoDesempeñadoTrabajador, $calleTrabajador, $numeroExteriorTrabajador, $numeroInteriorTrabajador, $coloniaTrabajador, $codigoPostalTrabajador, $estadoTrabajador, 
    $municipioTrabajador, $curpTrabajador, $rfcTrabajador, $nssTrabajador, $tipoIdentificacionTrabajador, $numeroIdentificacionTrabajador, $emailTrabajador, $telefonoTrabajador, 
    $sueldoTrabajador, $tipoSueldoTrabajador, $horarioTrabajador, $horasLaboradasTrabajador, $razonSocialEmpresa, $nombreComercialEmpresa, $nombrePatronEmpresa, $dedicaEmpresa, 
    $curpRfcEmpresa, $calleEmpresa, $numeroExteriorEmpresa, $numeroIneriorEmpresa, $coloniaEmpresa, $cpEmpresa, $estadoEmpresa, $municipioEmpresa, $telefonoEmpresa, $emailEmpresa, 
    $propuestaCuatificacion, $fechaOper);
    
    return array(array($stmt->execute()), $stmt->insert_id);
}

function mostrarRatificaciones($dbConnect){
    $respuesta = array();
    $query = 'SELECT aura.idUsuario, aura.idRatificacion, aura.ciudad 
    FROM auxiliar_ratificacion aura 
    INNER JOIN usuario_categoria usca 
    WHERE usca.idTipoUsuario = 3 
    AND aura.eliminado = 0;';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }

    return $respuesta;
}

function obtenerLaUltimaRatificacionCreada($dbConnect){
    $fila = array();
    $query = 'SELECT * FROM ratificacion WHERE fechaCreacion >= CURDATE() ORDER BY idRatificacion DESC LIMIT 1';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $fila = $resultado->fetch_assoc();
    return $fila;
}

// function insertarRatificacionAuxiliar($dbConnect, $idUsuario, $idRatificacion){
//     $query = 'UPDATE ratificacion SET idUsuario = ? WHERE idRatificacion = ?';
//     $stmt = $dbConnect->prepare($query);
//     $stmt->bind_param('ii', $idUsuario, $idRatificacion);
//     return array($stmt->execute());
// }

function insertarRatificacionAuxiliar($dbConnect, $idUsuario, $idRatificacion){
    $query = 'UPDATE ratificacion SET idUsuario = ? WHERE idRatificacion = ?';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('ii', $idUsuario, $idRatificacion);
    return array($stmt->execute());
}


function obtenerRatificacionesCreadas($dbConnect){
    $respuesta = array();
    $query = 'SELECT COUNT(*) AS total_ratificaciones FROM ratificacion';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }

    return $respuesta;
}

function obtenerRatificacionesAsignadasUsuario($dbConnect, $campo, $valor){
    $fila = array();
    $query = 'SELECT COUNT(*) AS total_ratificaciones FROM ratificacion WHERE '.$campo.' = ? AND ratificado = 0';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('s', $valor);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $fila = $resultado->fetch_assoc();
    return $fila;
}

function obtenerRatificacionesCompletas($dbConnect, $campo, $valor){
    $fila = array();
    $query = 'SELECT COUNT(*) AS total_ratificaciones FROM ratificacion WHERE '.$campo.' = ? AND ratificado = 1';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('s', $valor);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $fila = $resultado->fetch_assoc();
    return $fila;
}

function obtenerUsuarioConUltimaRatificacion($dbConnect){
    $fila = array();
    $query = 'SELECT MAX(idUsuario) AS ultimoUsuario FROM ratificacion';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $fila = $resultado->fetch_assoc();
    return $fila;
}

function obtenerRatificacionesSinAsignar($dbConnect){
    $respuesta = array();
    $query = 'SELECT idRatificacion, nombreTrabajador, apellidosTrabajador, razonSocialEmpresa, nombreComercial, nombrePatron 
    FROM ratificacion 
    WHERE idUsuario IS NULL';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }

    return $respuesta;
}

function obtenerRatificacionesAsignadasAuxiliar($dbConnect, $idUsuario){
    $respuesta = array();
    $query = 'SELECT idRatificacion, idUsuario, fechaCreacion, CONCAT(nombreTrabajador, " ", apellidosTrabajador) as nombreCompletoTrabajador, nombrePatron, nombreComercial, ratificado  
    FROM ratificacion 
    WHERE idUsuario = ?';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('i', $idUsuario); 
    $stmt->execute();
    $resultado = $stmt->get_result();
    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }
    return $respuesta;
}

function datosRatificacion($dbConnect, $campo, $valor){
    $fila = array();
    $query = 'SELECT * FROM ratificacion WHERE '.$campo.' = ?';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('s', $valor);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $fila = $resultado->fetch_assoc();
    return $fila;
}

?>