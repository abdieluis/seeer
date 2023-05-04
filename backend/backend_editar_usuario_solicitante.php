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
$idUsuarioSolicitante = $_POST['idUsuarioSolicitante'];
$nombres              = ucwords($_POST['nombres']);
$apellidos            = ucwords($_POST['apellidos']);
$genero               = $_POST['genero'];
$edad                 = $_POST['edad'];
$nroIdentificacion    = $_POST['nroIdentificacion'];
$telefono             = $_POST['telefono'];
$estado               = $_POST['estado'];
$municipio            = $_POST['municipio'];
$ciudad               = $_POST['ciudad'];

// print_r($_POST);


$resultadoUsuarioSolicitanteActualizar  = actualizarDatosUsuarioSolicitante($dbConnect, $nombres, $apellidos, $genero, $edad, $nroIdentificacion, $telefono, $estado, $municipio, $ciudad, $idUsuarioSolicitante);

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