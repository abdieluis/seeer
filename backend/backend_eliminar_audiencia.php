<?php
require_once ("../db_functions/db_global.php");
require_once ("../db_functions/db_commited_rolledback.php");
require_once ("../db_functions/db_audiencia.php");
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

$idAudiencia = $_POST['idAudiencia'];

// =================================================================================
// SE OBTIENEN LOS DATOS DE LA SOLICITUD PARA SACAR EL ELIMINADO
// =================================================================================
$resultadoMostrarDatosAudiencia = obtenerDatosAudienciaSeleccionada($dbConnect, 'idAudiencia', $idAudiencia);
$eliminado = $resultadoMostrarDatosAudiencia['eliminado'];

// CONDICION PARA ACTUALIZAR ESTATUS 

if ($eliminado == 0) {
    $eliminado = 1;
    $mensaje      = "Audiencia eliminado correctamente.";
}else{
    $eliminado = 0;
    $mensaje      = "Audiencia activado correctamente.";
} 

$resultadoEliminarAudiencia = eliminarAudiencia($dbConnect, $eliminado, $idAudiencia);
$arrayResultados          = unirArrays($arrayResultados,$resultadoEliminarAudiencia);

if(!isset($backendIncluido)){
    $ejecutarDb   = true;
    $respuesta    = committedRolledbackDb($dbConnect, $arrayResultados, $ejecutarDb, $objetoRespuesta, $mensaje);
    $codigo       = "exito";
    // $mensaje      = "Usuario eliminado correctamente.";
}else {
    $codigo = "fallo";
    $mensaje = "Audiencia no se elimino";
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