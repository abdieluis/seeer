<?php

require_once ("../db_functions/db_global.php");
require_once ("../db_functions/db_commited_rolledback.php");
require_once ("../db_functions/db_solicitud.php");
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
  $idUsuarioSolicitante = $_POST['idUsuarioSolicitante'];

  $resultadoMostrarDatosSolicitudSolicitante = obtenerDatosSolicitudSolicitante($dbConnect, 'idUsuarioSolicitante', $idUsuarioSolicitante);

cerrarConexion($dbConnect);

if (!empty($resultadoMostrarDatosSolicitudSolicitante)){

        $objetoRespuesta['solicitudes'] = $resultadoMostrarDatosSolicitudSolicitante;

}else {
    $codigo          = 'fallo';
    $mensaje         = "No hay solicitudes";
    $objetoRespuesta = "";
}


//***************************************************************************************************************
if(!isset($backendIncluido))
echo json_encode(constructorRespuesta($codigo, $mensaje, $objetoRespuesta), JSON_ERROR_UTF8);
//***************************************************************************************************************

// //***************************************************************************************************************

// echo json_encode(constructorRespuesta($codigo, $mensaje, $objetoRespuesta), JSON_ERROR_UTF8);

?>