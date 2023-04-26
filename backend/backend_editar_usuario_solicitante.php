<?php
require_once ("../db_functions/db_global.php");
require_once ("../db_functions/db_commited_rolledback.php");
require_once ("../utilidades/funciones_utilidades.php");
require_once ("../db_functions/db_usuarios_solicitante.php");

if(!isset($backendIncluido)){
    $dbConnect            = comenzarConexion();
    $ejecutarDb           = true;
    $arrayResultados      = array();
    $objetoRespuesta      = array();
    $codigo               = '';
    $mensaje              = '';
    $fechaRegistro        = date('Y-m-d');
    $horaOper             = date('H:i:s');
}

// ===================================================================================================

// DATOS PEDIDOS POR POST
$idSolicitud              = $_POST['idSolicitud'];
$nombreSolicitante        = $_POST['nombreSolicitante'];
$apellidosSolicitante     = $_POST['apellidosSolicitante'];
$auxiliarAsignado         = $_POST['auxiliarAsignado'];
$generoSolicitante        = $_POST['generoSolicitante'];
$nroIdentificacionOficial = $_POST['nroIdentificacionOficial'];
$edadSolicitante          = $_POST['edadSolicitante'];
$motivoSolicitud          = $_POST['motivoSolicitud'];
$observaciones            = $_POST['observaciones'];


$resultadoUsuarioSolicitanteActualizar  = actualizarDatosUsuarioSolicitante($dbConnect, $idSolicitud, $nombreSolicitante, $apellidosSolicitante, $auxiliarAsignado, $generoSolicitante, $nroIdentificacionOficial, $edadSolicitante, $motivoSolicitud, $observaciones);

$arrayResultados            = unirArrays($arrayResultados, $resultadoUsuarioSolicitanteActualizar);



if(!isset($backendIncluido)){
    $ejecutarDb   = true;
    $respuesta    = committedRolledbackDb($dbConnect, $arrayResultados, $ejecutarDb, $objetoRespuesta, $mensaje);
    $codigo = "exito";
    $mensaje = "Usuario actualizado correctamente";
    $objetoRespuesta = array();

}
else {
    $codigo = "fallo";
    $mensaje = "Error el usuario no se actualizo.";
    $objetoRespuesta = array();
}


//******************************************************************************************************
if(!isset($backendIncluido))
  cerrarConexion($dbConnect);
//******************************************************************************************************
//******************************************************************************************************
echo json_encode(constructorRespuesta($codigo, $mensaje, $objetoRespuesta), JSON_ERROR_UTF8);
//******************************************************************************************************

?>