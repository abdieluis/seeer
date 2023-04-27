<?php

require_once ("../db_functions/db_global.php");
require_once ("../db_functions/db_commited_rolledback.php");
require_once ("../db_functions/db_municipios.php");
require_once ("../utilidades/funciones_utilidades.php");

$dbConnect                = comenzarConexion();
$codigo                   = 'exito';
$mensaje                  = '';
$objetoRespuesta          = array();

$estado = $_POST['estado'];

$mostrarmunicipios = obtenerMunicipiosCorrespondiente($dbConnect, $estado);

cerrarConexion($dbConnect);

if (!empty($mostrarmunicipios)){

  $objetoRespuesta['municipios'] = $mostrarmunicipios;

}else {
  $codigo          = 'fallo';
  $mensaje         = "No hay municipios";
  $objetoRespuesta = "";
}


//***************************************************************************************************************

echo json_encode(constructorRespuesta($codigo, $mensaje, $objetoRespuesta), JSON_ERROR_UTF8);

?>