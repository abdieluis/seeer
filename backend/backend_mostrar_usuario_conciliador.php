<?php

require_once ("../db_functions/db_global.php");
require_once ("../db_functions/db_commited_rolledback.php");
require_once ("../db_functions/db_usuario_conciliador.php");
require_once ("../utilidades/funciones_utilidades.php");

$dbConnect                = comenzarConexion();
$codigo                   = 'exito';
$mensaje                  = '';
$objetoRespuesta          = array();

$idCiudad = $_POST['idCiudad'];

$mostrarUsuarioConciliador = obtenerConciliadorCiudad($dbConnect, $idCiudad);

cerrarConexion($dbConnect);

if (!empty($mostrarUsuarioConciliador)){

    $objetoRespuesta['usuarioConciliador'] = $mostrarUsuarioConciliador;

}else {
    $codigo          = 'fallo';
    $mensaje         = "No hay Conciliadores en esta ciudad";
    $objetoRespuesta = "";
}


//***************************************************************************************************************

echo json_encode(constructorRespuesta($codigo, $mensaje, $objetoRespuesta), JSON_ERROR_UTF8);

?>