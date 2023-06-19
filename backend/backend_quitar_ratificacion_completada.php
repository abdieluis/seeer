<?php
require_once ("../db_functions/db_global.php");
require_once ("../db_functions/db_commited_rolledback.php");
require_once ("../db_functions/db_ratificacion.php");
require_once ("../utilidades/funciones_utilidades.php");

if(!isset($backendIncluido)){
    
    $dbConnect            = comenzarConexion();
    $ejecutarDb           = true;
    $arrayResultados      = array();
    $objetoRespuesta      = array();
    $codigo = '';
    $mensaje = '';
    $fechaOper            = date('Y/m/d');
    $horaOper             = date('H:s:i');
}

$idRatificacion = $_POST['idRatificacion'];
$ratificado     = $_POST['ratificado'];

// CONDICION PARA ACTUALIZAR ESTATUS 

if ($ratificado == 0) {
    $ratificado = 1;
} 

$cambioEstatusRatificacion = cambiarEstatusRatificacion($dbConnect, $ratificado, $idRatificacion);
$arrayResultados          = unirArrays($arrayResultados,$cambioEstatusRatificacion);

if(!isset($backendIncluido)){
    $ejecutarDb   = true;
    $respuesta    = committedRolledbackDb($dbConnect, $arrayResultados, $ejecutarDb, $objetoRespuesta, $mensaje);
    $codigo       = "exito";
    $mensaje      = "Los correos fueron enviados correctamente.";
}else {
    $codigo = "fallo";
    $mensaje = "ERROR, el estatus de la ratificación no cambio, pero los correos se enviaron.";
    $objetoRespuesta = array();
}

//***************************************************************************************************************
if(!isset($backendIncluido))
    cerrarConexion($dbConnect);
//***************************************************************************************************************
//***************************************************************************************************************
echo json_encode(constructorRespuesta($codigo, $mensaje, $objetoRespuesta), JSON_ERROR_UTF8);
//***************************************************************************************************************


?>