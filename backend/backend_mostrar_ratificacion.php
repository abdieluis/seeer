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
    $codigo               = '';
    $mensaje              = '';
    $fechaOper            = date('Y/m/d');
    $horaOper             = date('H:s:i');
}

  // OBTENER DATOS DEL PRODUCTO POR SU ID
$idRatificacion = $_POST['idRatificacion'];
$resultadoMostrarRatificacion = datosRatificacion($dbConnect, 'idRatificacion', $idRatificacion);

  // MOSTRAR LOS DATOS EN UN OBJETO RESPUESTA
if(!empty($resultadoMostrarRatificacion)){

    $objetoRespuesta['ratificacion'] = $resultadoMostrarRatificacion;

} else {
    $codigo = "fallo";
    $mensaje = "ERROR.";
    $objetoRespuesta = "";
}
    // =============================================================================================================================================================

if(!isset($backendIncluido)){
    $ejecutarDb = true;
    $respuesta = committedRolledbackDb($dbConnect, $arrayResultados, $ejecutarDb, $objetoRespuesta, $mensaje);

}
//***************************************************************************************************************

//***************************************************************************************************************
if(!isset($backendIncluido))
    cerrarConexion($dbConnect);
//***************************************************************************************************************

//***************************************************************************************************************
if(!isset($backendIncluido))
echo json_encode($respuesta, JSON_ERROR_UTF8);
//***************************************************************************************************************


?>