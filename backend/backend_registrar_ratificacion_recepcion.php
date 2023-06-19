<?php
require_once ("../db_functions/db_global.php");
require_once ("../db_functions/db_commited_rolledback.php");
require_once ("../utilidades/funciones_utilidades.php");
require_once ("../utilidades/subir_archivos.php");
require_once ("../db_functions/db_ratificacion.php");

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
$fechaInicioLaboralTrabajador   = $_POST['fechaInicioLaboralTrabajadorRecepcion'];
$fechaFinLaboralTrabajador      = $_POST['fechaFinLaboralTrabajadorRecepcion'];
$nombresTrabajador              = ucwords($_POST['nombresTrabajadorRecepcion']);
$apellidosTrabajador            = ucwords($_POST['apellidosTrabajadorRecepcion']);
$generoTrabajador               = $_POST['generoTrabajadorRecepcion'];
$edadTrabajador                 = $_POST['edadTrabajadorRecepcion'];
$puestoDesempeñadoTrabajador    = ucwords($_POST['puestoDesempeñadoTrabajadorRecepcion']); 
$calleTrabajador                = ucwords($_POST['calleTrabajadorRecepcion']);
$numeroExteriorTrabajador       = $_POST['numeroExteriorTrabajadorRecepcion'];
$numeroInteriorTrabajador       = $_POST['numeroInteriorTrabajadorRecepcion'];
$coloniaTrabajador              = ucwords($_POST['coloniaTrabajadorRecepcion']);
$codigoPostalTrabajador         = $_POST['codigoPostalTrabajadorRecepcion'];
$estadoTrabajador               = $_POST['estadoTrabajadorRecepcion'];
$municipioTrabajador            = $_POST['municipioTrabajadorRecepcion'];
$curpTrabajador                 = strtoupper($_POST['curpTrabajadorRecepcion']);
$rfcTrabajador                  = strtoupper($_POST['rfcTrabajadorRecepcion']);
$nssTrabajador                  = strtoupper($_POST['nssTrabajadorRecepcion']);
$tipoIdentificacionTrabajador   = $_POST['tipoIdentificacionTrabajadorRecepcion'];
$numeroIdentificacionTrabajador = strtoupper($_POST['numeroIdentificacionTrabajadorRecepcion']);
$emailTrabajador                = strtolower($_POST['emailTrabajadorRecepcion']);
$telefonoTrabajador             = $_POST['telefonoTrabajadorRecepcion'];
$sueldoTrabajador               = $_POST['sueldoTrabajadorRecepcion'];
$tipoSueldoTrabajador           = $_POST['tipoSueldoTrabajadorRecepcion'];
$horarioTrabajador              = $_POST['horarioTrabajadorRecepcion'];
$horasLaboradasTrabajador       = $_POST['horasLaboradasTrabajadorRecepcion'];
$razonSocialEmpresa             = ucwords($_POST['razonSocialEmpresaRecepcion']);
$nombreComercialEmpresa         = ucwords($_POST['nombreComercialEmpresaRecepcion']);
$nombrePatronEmpresa            = ucwords($_POST['nombrePatronEmpresaRecepcion']);
$dedicaEmpresa                  = ucwords($_POST['dedicaEmpresaRecepcion']);
$curpRfcEmpresa                 = strtoupper($_POST['curpRfcEmpresaRecepcion']);
$calleEmpresa                   = ucwords($_POST['calleEmpresaRecepcion']);
$numeroExteriorEmpresa          = $_POST['numeroExteriorEmpresaRecepcion'];
$numeroIneriorEmpresa           = $_POST['numeroIneriorEmpresaRecepcion'];
$coloniaEmpresa                 = ucwords($_POST['coloniaEmpresaRecepcion']);
$cpEmpresa                      = $_POST['cpEmpresaRecepcion'];
$estadoEmpresa                  = $_POST['estadoEmpresaRecepcion'];
$municipioEmpresa               = $_POST['municipioEmpresaRecepcion'];
$telefonoEmpresa                = $_POST['telefonoEmpresaRecepcion'];
$emailEmpresa                   = strtolower($_POST['emailEmpresaRecepcion']);
$idUsuarioAuxiliar              = $_POST['auxiliarRatificacionRecepcion'];


// $idTipoUsuario                  = 3;

$tamanio       = 200;
$ruta          = '../documento_cuantificacion/';

$extensionesValidas = array("pdf");


if((isset($_FILES["cuantificacionRecepcion"]))){
    if (($_FILES['cuantificacionRecepcion']['size']) < ($tamanio * 1024)) {

        //ASIGNARLE EL NOMBRE COMERCIAL DE LA EMPRESA AL DOCUMENTO
        if (isset($nombreComercialEmpresa)) {
            $cuantificacionDoc = $nombreComercialEmpresa."_"."Cuantificacion";
            $resultado    = subirArchivo($extensionesValidas, $_FILES["cuantificacionRecepcion"], $cuantificacionDoc, $ruta);
            $cuantificacionDoc = $nombreComercialEmpresa."_"."Cuantificacion.pdf";
        }

        // SE REGISTRA LA RATIFICACION A RECEPCIÓN
        // print_r("entro");

        $resultadoRatificacionRecepcion  = registrarRatificacionRecepcion($dbConnect, $idUsuarioAuxiliar, $fechaInicioLaboralTrabajador, $fechaFinLaboralTrabajador, 
        $nombresTrabajador, $apellidosTrabajador, $generoTrabajador, $edadTrabajador, $puestoDesempeñadoTrabajador, $calleTrabajador, $numeroExteriorTrabajador, 
        $numeroInteriorTrabajador, $coloniaTrabajador, $codigoPostalTrabajador, $estadoTrabajador, $municipioTrabajador, $curpTrabajador, $rfcTrabajador, 
        $nssTrabajador, $tipoIdentificacionTrabajador, $numeroIdentificacionTrabajador, $emailTrabajador, $telefonoTrabajador, $sueldoTrabajador, 
        $tipoSueldoTrabajador, $horarioTrabajador, $horasLaboradasTrabajador, $razonSocialEmpresa, $nombreComercialEmpresa, $nombrePatronEmpresa, 
        $dedicaEmpresa, $curpRfcEmpresa, $calleEmpresa, $numeroExteriorEmpresa, $numeroIneriorEmpresa, $coloniaEmpresa, $cpEmpresa, $estadoEmpresa, 
        $municipioEmpresa, $telefonoEmpresa, $emailEmpresa, $cuantificacionDoc, $fechaOper);

        $arrayResultados            = unirArrays($arrayResultados, $resultadoRatificacionRecepcion);

        if(!isset($backendIncluido)){
            $ejecutarDb = true;
            $respuesta  = committedRolledbackDb($dbConnect, $arrayResultados, $ejecutarDb, $objetoRespuesta, $mensaje);
            $codigo     = "exito";
            $mensaje    = "Registro exitoso";
            $objetoRespuesta = array();
        }else {
            $codigo   = "fallo";
            $mensaje  = "Error no se pudo registrar la ratificación";
            $objetoRespuesta = array();
        }

    }
    else{
        $codigo = "fallo";
        $mensaje = "Los documentos rebasan el tamaño maximo.";
        $objetoRespuesta = array();
    }
    
}
else{
    $codigo = "fallo";
    $mensaje = "Error ratificación no registrada.";
    $objetoRespuesta = array();
}

// =================================================================================


//***********************************************************************************************
if(!isset($backendIncluido))
    cerrarConexion($dbConnect);
//***********************************************************************************************

//***********************************************************************************************
echo json_encode(constructorRespuesta($codigo, $mensaje, $objetoRespuesta), JSON_ERROR_UTF8);
//***********************************************************************************************

?>