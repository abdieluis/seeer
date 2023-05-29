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
$propuestaCuatificacion){
    $query = 'INSERT INTO ratificacion (fechaInicioLabores, fechaTerminoLabores, nombreTrabajador, apellidosTrabajador, generoTrabajador, 
    edadTrabajador, puestoDesempeñado, calleTrabajador, numeroExteriorTrabajador, numeroInteriorTrabajador, coloniaTrabajador, cpTrabajador, estadoTrabajador, 
    municipio, curpTrabajador, rfcTrabajador, nssTrabajador, tipoIdentificacion, numeroIdentificaion, emailTrabajador, telefonoTrabajador, 
    sueldo, tipoSueldo, horarioLaboral, horasLaboradas, razonSocialEmpresa, nombreComercial, nombrePatron, giroEmpresa, 
    curpRfcPatron, calleEmpresaPatron, numeroExteriorEmpresaPatron, numeroInteriorEmpresaPatron, coloniaEmpresaPatron, cpEmpresaPatron, estadoEmpresaPatron, municipioEmpresaPatron, 
    telefonoEmpresaPatron, emailEmpresaPatron, cuantificacion)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('ssssssssssssssssssssssssssssssssssssssss', $fechaInicioLaboralTrabajador, $fechaFinLaboralTrabajador, $nombresTrabajador, $apellidosTrabajador, $generoTrabajador, 
    $edadTrabajador, $puestoDesempeñadoTrabajador, $calleTrabajador, $numeroExteriorTrabajador, $numeroInteriorTrabajador, $coloniaTrabajador, $codigoPostalTrabajador, $estadoTrabajador, 
    $municipioTrabajador, $curpTrabajador, $rfcTrabajador, $nssTrabajador, $tipoIdentificacionTrabajador, $numeroIdentificacionTrabajador, $emailTrabajador, $telefonoTrabajador, 
    $sueldoTrabajador, $tipoSueldoTrabajador, $horarioTrabajador, $horasLaboradasTrabajador, $razonSocialEmpresa, $nombreComercialEmpresa, $nombrePatronEmpresa, $dedicaEmpresa, 
    $curpRfcEmpresa, $calleEmpresa, $numeroExteriorEmpresa, $numeroIneriorEmpresa, $coloniaEmpresa, $cpEmpresa, $estadoEmpresa, $municipioEmpresa, $telefonoEmpresa, $emailEmpresa, 
    $propuestaCuatificacion);
    
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

?>