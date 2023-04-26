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
  $idSolicitud = $_POST['idSolicitud'];
  $resultadoMostrarSolicitudSeleccionada = obtenerDatosSolicitudSeleccionada($dbConnect, 'idSolicitud', $idSolicitud);

  // MOSTRAR LOS DATOS EN UN OBJETO RESPUESTA
  if(!empty($resultadoMostrarSolicitudSeleccionada)){

    $objetoRespuesta['solicitudSeleccionada'] = $resultadoMostrarSolicitudSeleccionada;

    $codigo = "fallo";
  } else {
    $mensaje = "No hay solicitudes";
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