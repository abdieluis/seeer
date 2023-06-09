<?php
require_once ("../db_functions/db_global.php");
require_once ("../db_functions/db_commited_rolledback.php");
require_once ("../utilidades/funciones_utilidades.php");
require_once ("../db_functions/db_ratificacion.php");

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
$idUsuario      = $_POST['idUsuario'];
$idRatificacion = $_POST['idRatificacion'];



$asignarRatificacionAuxiliar  = insertarRatificacionAuxiliar($dbConnect, $idUsuario, $idRatificacion);

$arrayResultados              = unirArrays($arrayResultados, $asignarRatificacionAuxiliar);

if(!isset($backendIncluido)){
    $ejecutarDb   = true;
    $respuesta    = committedRolledbackDb($dbConnect, $arrayResultados, $ejecutarDb, $objetoRespuesta, $mensaje);
    $codigo = "exito";
    $mensaje = "Asignado correctamente.";
    $objetoRespuesta = array();

}
else {
    $codigo = "fallo";
    $mensaje = "Error no se pudo asignar.";
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