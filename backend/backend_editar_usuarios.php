<?php
require_once ("../db_functions/db_global.php");
require_once ("../db_functions/db_commited_rolledback.php");
require_once ("../utilidades/funciones_utilidades.php");
require_once ("../db_functions/db_usuarios.php");

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
$idUsuario   = $_POST['idUsuario'];
$nombres     = ucwords($_POST['nombres']);
$apellidos   = ucwords($_POST['apellidos']);
$usuario     = $_POST['usuario'];
$tipo        = $_POST['tipo'];
$ciudad      = $_POST['ciudad'];

// print_r($_POST);


$resultadoUsuarioActualizar  = actualizarDatosUsuario($dbConnect, $nombres, $apellidos, $usuario, $tipo, $ciudad, $idUsuario);

$arrayResultados             = unirArrays($arrayResultados, $resultadoUsuarioActualizar);

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