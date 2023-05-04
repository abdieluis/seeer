<?php
require_once ("../db_functions/db_global.php");
require_once ("../db_functions/db_commited_rolledback.php");
require_once ("../utilidades/funciones_utilidades.php");
require_once ("../db_functions/db_audiencia.php");

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
$idAudiencia          = $_POST['idAudiencia'];
$nombreSolicitante    = $_POST['nombreSolicitante'];
$apellidosSolicitante = $_POST['apellidosSolicitante'];
$conciliadorAsignado  = $_POST['conciliadorAsignado'];
$fechaSolicitud       = $_POST['fechaSolicitud'];
$fechaAudiencia       = $_POST['fechaAudiencia'];
$horarioAudiencia     = $_POST['horarioAudiencia'];
$nombreCitado         = $_POST['nombreCitado'];
$observaciones        = $_POST['observaciones'];


$resultadoAudienciaActualizar  = actualizarDatosAudiencia($dbConnect, $nombreSolicitante, $apellidosSolicitante, $conciliadorAsignado, $fechaSolicitud, $fechaAudiencia, $horarioAudiencia, $nombreCitado, $observaciones, $idAudiencia);

$arrayResultados            = unirArrays($arrayResultados, $resultadoAudienciaActualizar);



if(!isset($backendIncluido)){
    $ejecutarDb   = true;
    $respuesta    = committedRolledbackDb($dbConnect, $arrayResultados, $ejecutarDb, $objetoRespuesta, $mensaje);
    $codigo = "exito";
    $mensaje = "Audiencia actualizada correctamente";
    $objetoRespuesta = array();

}
else {
    $codigo = "fallo";
    $mensaje = "Error en la actualización de la audiencia.";
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