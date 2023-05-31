<?php
require_once ("../db_functions/db_global.php");
require_once ("../db_functions/db_commited_rolledback.php");
require_once ("../utilidades/funciones_utilidades.php");
require_once ("../db_functions/db_ratificacion.php");
require_once ("../db_functions/db_usuario_auxiliar.php");
require_once ("../db_functions/db_ratificacion.php");
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

$idCiudad                       = $_POST['ciudadRatificacion'];

if(isset($_FILES['cuantificacion']) && $_FILES['cuantificacion']['type'] == 'application/pdf'){

    $propuestaCuatificacion = $nombresTrabajador."-".$apellidosTrabajador."-Cuantificacion";


    // SE REGISTRA LA RATIFICAIÓN
    $resultadoSolicitudes  = registrarRatificacion($dbConnect, $fechaInicioLaboralTrabajador, $fechaFinLaboralTrabajador, $nombresTrabajador, $apellidosTrabajador, $generoTrabajador, 
    $edadTrabajador, $puestoDesempeñadoTrabajador, $calleTrabajador, $numeroExteriorTrabajador, $numeroInteriorTrabajador, $coloniaTrabajador, $codigoPostalTrabajador, $estadoTrabajador, 
    $municipioTrabajador, $curpTrabajador, $rfcTrabajador, $nssTrabajador, $tipoIdentificacionTrabajador, $numeroIdentificacionTrabajador, $emailTrabajador, $telefonoTrabajador, 
    $sueldoTrabajador, $tipoSueldoTrabajador, $horarioTrabajador, $horasLaboradasTrabajador, $razonSocialEmpresa, $nombreComercialEmpresa, $nombrePatronEmpresa, $dedicaEmpresa, 
    $curpRfcEmpresa, $calleEmpresa, $numeroExteriorEmpresa, $numeroIneriorEmpresa, $coloniaEmpresa, $cpEmpresa, $estadoEmpresa, $municipioEmpresa, $telefonoEmpresa, $emailEmpresa, 
    $propuestaCuatificacion, $fechaOper);
}

// =================================================================================
// SE OBTIENEN LOS DATOS DE USUARIO AUXILIAR
// =================================================================================
$usuarios = array();

$resultadoMostrarDatosUsuarioAuxiliar = obtenerAuxiliarCiudad($dbConnect, 'idCiudad', $idCiudad);

for ($i = 0; $i < count($resultadoMostrarDatosUsuarioAuxiliar); $i++) {
    $usuarios[] = $resultadoMostrarDatosUsuarioAuxiliar[$i]["idUsuarioAuxiliar"];
}
// =================================================================================

// =================================================================================
// SE OBTIENEN EL ID DE LA RATIFICACIÓN CREADA
// =================================================================================

$resultadoMostrarUltimaRatificacionCreada = obtenerLaUltimaRatificacionCreada($dbConnect);

$idRatificacion = $resultadoMostrarUltimaRatificacionCreada["idRatificacion"];

// =================================================================================
// SE REALIZA TODO EL CAGADERO DE INSERTALE LA RATIFICACION AL USUARIO
// =================================================================================

$indice_usuario_actual = 0;

// Obtener el ID del usuario actual
$idUsuarioAuxiliar = $usuarios[$indice_usuario_actual];

// Actualizar la tarea con el ID del usuario actual
$insertarRatificacionUsuarioAuxiliar = insertarRatificacionAuxiliar($dbConnect, $idUsuarioAuxiliar, $idRatificacion);

// Incrementar el índice del usuario actual
$indice_usuario_actual++;

// Verificar si se ha llegado al final del arreglo de usuarios
if ($indice_usuario_actual >= count($usuarios)) {
    // Reiniciar el índice al primer usuario
    $indice_usuario_actual = 0;
}

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


// CONSULTA PARA TRAER LOS AUXILIARES QUE NO TIENEN RATIFICACIONES ASIGNADAS
// SELECT a.idUsuarioAuxiliar, a.nombres
// FROM usuario_auxiliar a
// LEFT JOIN ratificacion r ON a.idUsuarioAuxiliar = r.idUsuarioAuxiliar
// WHERE r.idRatificacion IS NULL;


// CONSULTA PARA TRAER LOS AUXILIARES CON RATIFICACIONES ASIGNADAS
// SELECT a.idUsuarioAuxiliar, a.nombres
// FROM usuario_auxiliar a
// JOIN ratificacion r ON a.idUsuarioAuxiliar = r.idUsuarioAuxiliar;


?>