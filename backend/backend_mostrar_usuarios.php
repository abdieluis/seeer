<?php

require_once ("../db_functions/db_global.php");
require_once ("../db_functions/db_commited_rolledback.php");
require_once ("../db_functions/db_usuarios.php");
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
$idUsuario = $_POST['idUsuario'];
$resultadoMostrarDatosUsuarios = datosUsuarios($dbConnect, 'idUsuario', $idUsuario);

  // MOSTRAR LOS DATOS EN UN OBJETO RESPUESTA
if(!empty($resultadoMostrarDatosUsuarios)){

    $objetoRespuesta['usuarioSeeer'] = $resultadoMostrarDatosUsuarios;

} else {
    $codigo = "fallo";
    $mensaje = "No hay datos del usuario";
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