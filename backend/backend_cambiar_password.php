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
    $fechaOper            = date('Y-m-d');
    $horaOper             = date('H:i:s');
}

// ===================================================================================================

// DATOS PEDIDOS POR POST
$idUsuario = $_POST['idUsuario'];
$password  = $_POST['password'];

// SE REGISTRA AL USUARIO
$resultadoUsuarioContrasena  = cambioContrasenia($dbConnect, $password, $idUsuario);
$arrayResultados             = unirArrays($arrayResultados, $resultadoUsuarioContrasena);

if(!isset($backendIncluido)){
    $ejecutarDb   = true;
    $respuesta    = committedRolledbackDb($dbConnect, $arrayResultados, $ejecutarDb, $objetoRespuesta, $mensaje);
    $codigo       = "exito";
    $mensaje      = "Contraseña cambiada correctamente";
}else {
    $codigo = "fallo";
    $mensaje = "Error la contraseña no se pudo cambiar.";
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