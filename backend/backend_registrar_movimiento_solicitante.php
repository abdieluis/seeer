<?php
require_once ("../db_functions/db_global.php");
require_once ("../db_functions/db_commited_rolledback.php");
require_once ("../utilidades/funciones_utilidades.php");
require_once ("../db_functions/db_solicitud.php");
require_once ("../db_functions/db_audiencia.php");
// require_once ("../db_functions/db_ratificacion.php");
require_once ("../db_functions/db_usuarios.php");
require_once ("../db_functions/db_usuarios_solicitante.php");
require_once ("../db_functions/db_log_movimiento.php");

if(!isset($backendIncluido)){
    $dbConnect            = comenzarConexion();
    $ejecutarDb           = true;
    $arrayResultados      = array();
    $objetoRespuesta      = array();
    $codigo               = '';
    $mensaje              = '';
    $fechaOper            = date('Y-m-d');
    $horaOper             = date('H:i:s');
    $idUsuario       = $_POST['idUsuario'];
}

// ===================================================================================================

$motivoRegistrar      = $_POST['selectMotivo'];
$idUsuarioSolicitante = $_POST['idUsuarioSolicitante'];

// DATOS PEDIDOS POR POST

if ($motivoRegistrar == 0) {
    $nombreSolicitante         = ucwords($_POST['nombreSolicitante']);
    $apellidosSolicitante      = ucwords($_POST['apellidosSolicitante']);
    $auxiliarAsignado          = ucwords($_POST['auxiliarAsignado']);
    $generoSolicitante         = $_POST['generoSolicitante'];
    $nroIdentificacionOficial  = $_POST['nroIdentificacionOficial'];
    $edadSolicitante           = $_POST['edadSolicitante'];
    $motivoSolicitud           = $_POST['motivoSolicitud'];
    $observaciones             = $_POST['observaciones'];

    // SE REGISTRA AL USUARIO
    $resultadoSolicitudes  = registrarSolicitud($dbConnect, $idUsuarioSolicitante, $fechaOper, $nombreSolicitante, $apellidosSolicitante, $auxiliarAsignado, $generoSolicitante, $nroIdentificacionOficial, $edadSolicitante, $motivoSolicitud, $observaciones);
    $arrayResultados       = unirArrays($arrayResultados, $resultadoSolicitudes);

    // =================================================================================
    // SE OBTIENEN LOS DATOS DE USUARIO ENTRE OTROS DETALLES PARA EL LOG DE MOVIMIENTOS
    // =================================================================================
    $resultadoMostrarDatosUsuario = obtenerDatosLogMovimiento($dbConnect, 'idUsuario', $idUsuario);
    $nombreUsuario = $resultadoMostrarDatosUsuario['nombres'];
    $apellidosUsuario = $resultadoMostrarDatosUsuario['apellidos'];
    $ciudadUsuario = $resultadoMostrarDatosUsuario['ciudad'];

    $nombreCompletoUsuario = $nombreUsuario ." ". $apellidosUsuario;

    $resultadoMostrarDatosUsuarioSolicitante = obtenerDatosUsuarioSolicitanteSeleccionado($dbConnect, 'idUsuarioSolicitante', $idUsuarioSolicitante);
    $nombreSolicitante    = $resultadoMostrarDatosUsuarioSolicitante['nombres'];
    $apellidosSolicitante = $resultadoMostrarDatosUsuarioSolicitante['apellidos'];

    $nombreCompletoSolicitante = $nombreSolicitante ." ". $apellidosSolicitante;

    $detalleMovimiento  = "El usuario ".$nombreCompletoUsuario." dio de alta una solicitud en la ciudad de ".$ciudadUsuario." a nombre del solicitante ".$nombreCompletoSolicitante." ";

    $areaMovimiento = "Solicitudes";

    // SE CREA EL LOG DE MOVIMIENTOS

    $resultadoCrearLogMovimientos = registrarLogMovimientos($dbConnect, $fechaOper, $horaOper, $idUsuario, $idUsuarioSolicitante, $ciudadUsuario, $areaMovimiento, $detalleMovimiento);

    $arrayResultados = unirArrays($arrayResultados, $resultadoCrearLogMovimientos);

    // =================================================================================
}
elseif ($motivoRegistrar == 1) {
    $fechaSolicitudAudiencia       = $_POST['fechaSolicitudAudiencia'];
    $fechaAudiencia                = $_POST['fechaAudiencia'];
    $horarioAudiencia              = $_POST['horarioAudiencia'];
    $nombreSolicitanteAudiencia    = $_POST['nombreSolicitanteAudiencia'];
    $apellidosSolicitanteAudiencia = $_POST['apellidosSolicitanteAudiencia'];
    $nombreCitadoAudiencia         = $_POST['nombreCitadoAudiencia'];
    $conciliadorAsignadoAudiencia  = $_POST['conciliadorAsignadoAudiencia'];
    $observacionesAudiencia        = $_POST['observacionesAudiencia'];

    // SE REGISTRA AL USUARIO
    $resultadoAudiencia  = registrarAudiencia($dbConnect, $idUsuarioSolicitante, $fechaSolicitudAudiencia, $fechaAudiencia, $horarioAudiencia, $nombreSolicitanteAudiencia, $apellidosSolicitanteAudiencia, $nombreCitadoAudiencia, $conciliadorAsignadoAudiencia, $observacionesAudiencia);
    $arrayResultados       = unirArrays($arrayResultados, $resultadoAudiencia);

    // =================================================================================
    // SE OBTIENEN LOS DATOS DE USUARIO ENTRE OTROS DETALLES PARA EL LOG DE MOVIMIENTOS
    // =================================================================================
    $resultadoMostrarDatosUsuario = obtenerDatosLogMovimiento($dbConnect, 'idUsuario', $idUsuario);
    $nombreUsuario = $resultadoMostrarDatosUsuario['nombres'];
    $apellidosUsuario = $resultadoMostrarDatosUsuario['apellidos'];
    $ciudadUsuario = $resultadoMostrarDatosUsuario['ciudad'];

    $nombreCompletoUsuario = $nombreUsuario ." ". $apellidosUsuario;

    $resultadoMostrarDatosUsuarioSolicitante = obtenerDatosUsuarioSolicitanteSeleccionado($dbConnect, 'idUsuarioSolicitante', $idUsuarioSolicitante);
    $nombreSolicitante    = $resultadoMostrarDatosUsuarioSolicitante['nombres'];
    $apellidosSolicitante = $resultadoMostrarDatosUsuarioSolicitante['apellidos'];

    $nombreCompletoSolicitante = $nombreSolicitante ." ". $apellidosSolicitante;

    $detalleMovimiento  = "El usuario ".$nombreCompletoUsuario." dio de alta una audiencia en la ciudad de ".$ciudadUsuario." a nombre del solicitante ".$nombreCompletoSolicitante." ";

    $areaMovimiento = "Audiencias";

    // SE CREA EL LOG DE MOVIMIENTOS

    $resultadoCrearLogMovimientos = registrarLogMovimientos($dbConnect, $fechaOper, $horaOper, $idUsuario, $idUsuarioSolicitante, $ciudadUsuario, $areaMovimiento, $detalleMovimiento);

    $arrayResultados = unirArrays($arrayResultados, $resultadoCrearLogMovimientos);

    // =================================================================================
}


if(!isset($backendIncluido)){
  $ejecutarDb = true;
  $respuesta  = committedRolledbackDb($dbConnect, $arrayResultados, $ejecutarDb, $objetoRespuesta, $mensaje);
  $codigo     = "exito";
  $mensaje    = "Registro exitoso";
}else {
    $codigo   = "fallo";
    $mensaje  = "Error no se pudo registrar";
    $objetoRespuesta = array();
}

//***********************************************************************************************
if(!isset($backendIncluido))
  cerrarConexion($dbConnect);
//***********************************************************************************************

//***********************************************************************************************
echo json_encode(constructorRespuesta($codigo, $mensaje, $objetoRespuesta), JSON_ERROR_UTF8);
//***********************************************************************************************

?>