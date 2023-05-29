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
$nombres   = ucwords($_POST['nombres']);
$apellidos = ucwords($_POST['apellidos']);
$usuario   = $_POST['usuario'];
$password  = $_POST['password'];
$tipo      = $_POST['tipo'];
$ciudad    = $_POST['ciudad'];


// SE REGISTRA AL USUARIO
$resultadoUsuarioRegistro  = registrarUsuario($dbConnect, $nombres, $apellidos, $usuario, $password, $tipo, $ciudad);
$arrayResultados            = unirArrays($arrayResultados, $resultadoUsuarioRegistro);

if(!isset($backendIncluido)){
    $ejecutarDb   = true;
    $respuesta    = committedRolledbackDb($dbConnect, $arrayResultados, $ejecutarDb, $objetoRespuesta, $mensaje);
    $codigo       = "exito";
    $mensaje      = "Usuario registrado correctamente";
}else {
    $codigo = "fallo";
    $mensaje = "Error usuario no registrado";
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