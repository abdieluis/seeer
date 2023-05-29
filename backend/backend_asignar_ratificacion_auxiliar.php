<?php
require_once ("../db_functions/db_global.php");
require_once ("../db_functions/db_commited_rolledback.php");
require_once ("../utilidades/funciones_utilidades.php");
require_once ("../db_functions/db_ratificacion.php");
require_once ("../db_functions/db_usuarios.php");
require_once ("../db_functions/db_usuarios_solicitante.php");
require_once ("../db_functions/db_log_movimiento.php");
require_once ("../utilidades/subir_archivos.php");

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
$fechaInicioLaboralTrabajador   = $_POST['fechaInicioLaboralTrabajador'];
$fechaFinLaboralTrabajador      = $_POST['fechaFinLaboralTrabajador'];
$nombresTrabajador              = ucwords($_POST['nombresTrabajador']);
$apellidosTrabajador            = ucwords($_POST['apellidosTrabajador']);
$generoTrabajador               = $_POST['generoTrabajador'];
$edadTrabajador                 = $_POST['edadTrabajador'];
$puestoDesempeñadoTrabajador    = ucwords($_POST['puestoDesempeñadoTrabajador']); 
$calleTrabajador                = ucwords($_POST['calleTrabajador']);
$numeroExteriorTrabajador       = $_POST['numeroExteriorTrabajador'];
$numeroInteriorTrabajador       = $_POST['numeroInteriorTrabajador'];

$coloniaTrabajador              = ucwords($_POST['coloniaTrabajador']);
$codigoPostalTrabajador         = $_POST['codigoPostalTrabajador'];
$estadoTrabajador               = $_POST['estadoTrabajador'];
$municipioTrabajador            = $_POST['municipioTrabajador'];
$curpTrabajador                 = strtoupper($_POST['curpTrabajador']);
$rfcTrabajador                  = strtoupper($_POST['rfcTrabajador']);
$nssTrabajador                  = strtoupper($_POST['nssTrabajador']);
$tipoIdentificacionTrabajador   = $_POST['tipoIdentificacionTrabajador'];
$numeroIdentificacionTrabajador = strtoupper($_POST['numeroIdentificacionTrabajador']);
$emailTrabajador                = strtolower($_POST['emailTrabajador']);

$telefonoTrabajador             = $_POST['telefonoTrabajador'];
$sueldoTrabajador               = $_POST['sueldoTrabajador'];
$tipoSueldoTrabajador           = $_POST['tipoSueldoTrabajador'];
$horarioTrabajador              = $_POST['horarioTrabajador'];
$horasLaboradasTrabajador       = $_POST['horasLaboradasTrabajador'];
$razonSocialEmpresa             = ucwords($_POST['razonSocialEmpresa']);
$nombreComercialEmpresa         = ucwords($_POST['nombreComercialEmpresa']);
$nombrePatronEmpresa            = ucwords($_POST['nombrePatronEmpresa']);
$dedicaEmpresa                  = ucwords($_POST['dedicaEmpresa']);
$curpRfcEmpresa                 = strtoupper($_POST['curpRfcEmpresa']);

$calleEmpresa                   = ucwords($_POST['calleEmpresa']);
$numeroExteriorEmpresa          = $_POST['numeroExteriorEmpresa'];
$numeroIneriorEmpresa           = $_POST['numeroIneriorEmpresa'];
$coloniaEmpresa                 = ucwords($_POST['coloniaEmpresa']);
$cpEmpresa                      = $_POST['cpEmpresa'];
$estadoEmpresa                  = $_POST['estadoEmpresa'];
$municipioEmpresa               = $_POST['municipioEmpresa'];
$telefonoEmpresa                = $_POST['telefonoEmpresa'];
$emailEmpresa                   = strtolower($_POST['emailEmpresa']);
$cuantificacion                 = $_FILES['cuantificacion'];

$tamanio = 200;

// if(isset($cuantificacion) && $cuantificacion['type']=='application/pdf'){
// 	move_uploaded_file ($cuantificacion['tmp_name'] , '../documentoCuantificacion/'.$cuantificacion['name']);
// }

if(isset($cuantificacion) && $cuantificacion['type'] == 'application/pdf'){
    // if($cuantificacion['size'] < ($tamanio * 1024)){
    $propuestaCuatificacion = $nombresTrabajador."-".$apellidosTrabajador."-Cuantificacion";

    $ruta = "../documentoCuantificacion";

    $extensionesValidas     = "pdf";

    if($cuantificacion['name']){
        $name = $cuantificacion['name'];
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $propuestaCuatificacion = $nombresTrabajador."-".$apellidosTrabajador."-Cuantificacion";
        $resultado              = subirArchivo($extensionesValidas, $cuantificacion, $propuestaCuatificacion, $ruta);
        $arrayResultados        = unirArrays($arrayResultados, array($resultado));
        $propuestaCuatificacion = $propuestaCuatificacion.".".$ext;
    }

    // SE REGISTRA LA RATIFICAIÓN
    $resultadoSolicitudes  = registrarRatificacion($dbConnect, $fechaInicioLaboralTrabajador, $fechaFinLaboralTrabajador, $nombresTrabajador, $apellidosTrabajador, $generoTrabajador, 
    $edadTrabajador, $puestoDesempeñadoTrabajador, $calleTrabajador, $numeroExteriorTrabajador, $numeroInteriorTrabajador, $coloniaTrabajador, $codigoPostalTrabajador, $estadoTrabajador, 
    $municipioTrabajador, $curpTrabajador, $rfcTrabajador, $nssTrabajador, $tipoIdentificacionTrabajador, $numeroIdentificacionTrabajador, $emailTrabajador, $telefonoTrabajador, 
    $sueldoTrabajador, $tipoSueldoTrabajador, $horarioTrabajador, $horasLaboradasTrabajador, $razonSocialEmpresa, $nombreComercialEmpresa, $nombrePatronEmpresa, $dedicaEmpresa, 
    $curpRfcEmpresa, $calleEmpresa, $numeroExteriorEmpresa, $numeroIneriorEmpresa, $coloniaEmpresa, $cpEmpresa, $estadoEmpresa, $municipioEmpresa, $telefonoEmpresa, $emailEmpresa, 
    $propuestaCuatificacion);
    // }else{
    //     echo "El documento debe pesar menos.";
    // }
}

// =================================================================================
// SE OBTIENEN LOS DATOS DE USUARIO ENTRE OTROS DETALLES PARA EL LOG DE MOVIMIENTOS
// =================================================================================
// $resultadoMostrarDatosUsuario = obtenerDatosLogMovimiento($dbConnect, 'idUsuario', $idUsuario);
// $nombreUsuario = $resultadoMostrarDatosUsuario['nombres'];
// $apellidosUsuario = $resultadoMostrarDatosUsuario['apellidos'];
// $ciudadUsuario = $resultadoMostrarDatosUsuario['ciudad'];
// $nombreCompletoUsuario = $nombreUsuario ." ". $apellidosUsuario;
// $resultadoMostrarDatosUsuarioSolicitante = obtenerDatosUsuarioSolicitanteSeleccionado($dbConnect, 'idUsuarioSolicitante', $idUsuarioSolicitante);
// $nombreSolicitante    = $resultadoMostrarDatosUsuarioSolicitante['nombres'];
// $apellidosSolicitante = $resultadoMostrarDatosUsuarioSolicitante['apellidos'];
// $nombreCompletoSolicitante = $nombreSolicitante ." ". $apellidosSolicitante;
// $detalleMovimiento  = "El usuario ".$nombreCompletoUsuario." dio de alta una solicitud en la ciudad de ".$ciudadUsuario." a nombre del solicitante ".$nombreCompletoSolicitante." ";
// $areaMovimiento = "Solicitudes";

// SE CREA EL LOG DE MOVIMIENTOS

// $resultadoCrearLogMovimientos = registrarLogMovimientos($dbConnect, $fechaOper, $horaOper, $idUsuario, $idUsuarioSolicitante, $ciudadUsuario, $areaMovimiento, $detalleMovimiento);

// $arrayResultados = unirArrays($arrayResultados, $resultadoCrearLogMovimientos);

// =================================================================================


if(!isset($backendIncluido)){
    $ejecutarDb = true;
    $respuesta  = committedRolledbackDb($dbConnect, $arrayResultados, $ejecutarDb, $objetoRespuesta, $mensaje);
    $codigo     = "exito";
    $mensaje    = "Registro exitoso";
}else {
    $codigo   = "fallo";
    $mensaje  = "Error no se pudo registrar";
    $objetoRespuesta = array();
}

//***********************************************************************************************
if(!isset($backendIncluido))
    cerrarConexion($dbConnect);
//***********************************************************************************************

//***********************************************************************************************
echo json_encode(constructorRespuesta($codigo, $mensaje, $objetoRespuesta), JSON_ERROR_UTF8);
//***********************************************************************************************

?>