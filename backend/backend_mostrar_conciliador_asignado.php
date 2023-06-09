<?php

require_once ("../db_functions/db_global.php");
require_once ("../db_functions/db_commited_rolledback.php");
require_once ("../db_functions/db_usuario_conciliador.php");
require_once ("../utilidades/funciones_utilidades.php");

$dbConnect                = comenzarConexion();
$codigo                   = 'exito';
$mensaje                  = '';
$objetoRespuesta          = array();

$idConciliador = $_POST['idConciliador'];

$mostrarConciliadorAsignado = obtenerConciliador($dbConnect, 'idUsuarioConciliador', $idConciliador);

cerrarConexion($dbConnect);

if (!empty($mostrarConciliadorAsignado)){

    $objetoRespuesta['usuarioConciliador'] = $mostrarConciliadorAsignado;

}else {
    $codigo          = 'fallo';
    $mensaje         = "No hay Conciliadores asignados";
    $objetoRespuesta = "";
}


//***************************************************************************************************************

echo json_encode(constructorRespuesta($codigo, $mensaje, $objetoRespuesta), JSON_ERROR_UTF8);

?>