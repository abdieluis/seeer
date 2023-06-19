<?php
require_once ("../db_functions/db_global.php");
require_once ("../db_functions/db_commited_rolledback.php");
require_once ("../utilidades/funciones_utilidades.php");
require_once ("../utilidades/subir_archivos.php");
require_once ("../db_functions/db_ratificacion.php");
require_once ("../db_functions/db_usuarios.php");
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

// $idTipoUsuario                  = 3;

$tamanio       = 300;
$ruta          = '../documento_cuantificacion/';

$extensionesValidas = array("pdf");

// print_r($_FILES);


if((isset($_FILES["cuantificacion"]))){
    // print_r("entro");
    if (($_FILES['cuantificacion']['size']) < ($tamanio * 1024)) {

        //ASIGNARLE EL NOMBRE COMERCIAL DE LA EMPRESA AL DOCUMENTO
        if (isset($nombreComercialEmpresa)) {
            $cuantificacionDoc = $nombreComercialEmpresa."_"."Cuantificacion";
            $resultado    = subirArchivo($extensionesValidas, $_FILES["cuantificacion"], $cuantificacionDoc, $ruta);
            $cuantificacionDoc = $nombreComercialEmpresa."_"."Cuantificacion.pdf";
        }

        // SE REGISTRA LA RATIFICACION A RECEPCIÓN
        // print_r("entro");

        $resultadoRatificacion  = registrarRatificacion($dbConnect, $fechaInicioLaboralTrabajador, $fechaFinLaboralTrabajador, $nombresTrabajador, 
        $apellidosTrabajador, $generoTrabajador, $edadTrabajador, $puestoDesempeñadoTrabajador, $calleTrabajador, $numeroExteriorTrabajador, 
        $numeroInteriorTrabajador, $coloniaTrabajador, $codigoPostalTrabajador, $estadoTrabajador, $municipioTrabajador, $curpTrabajador, $rfcTrabajador, 
        $nssTrabajador, $tipoIdentificacionTrabajador, $numeroIdentificacionTrabajador, $emailTrabajador, $telefonoTrabajador, $sueldoTrabajador, 
        $tipoSueldoTrabajador, $horarioTrabajador, $horasLaboradasTrabajador, $razonSocialEmpresa, $nombreComercialEmpresa, $nombrePatronEmpresa, $dedicaEmpresa, 
        $curpRfcEmpresa, $calleEmpresa, $numeroExteriorEmpresa, $numeroIneriorEmpresa, $coloniaEmpresa, $cpEmpresa, $estadoEmpresa, $municipioEmpresa, 
        $telefonoEmpresa, $emailEmpresa, $cuantificacionDoc, $fechaOper);

        $arrayResultados            = unirArrays($arrayResultados, $resultadoRatificacion);

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

        // // SE REGISTRA LA RATIFICACION PARA ASIGNARSELA DESPUES A UN AUXILIAR

        // $resultadoSolicitudes  = registrarRatificacion($dbConnect, $fechaInicioLaboralTrabajador, $fechaFinLaboralTrabajador, $nombresTrabajador, $apellidosTrabajador, $generoTrabajador, 
        // $edadTrabajador, $puestoDesempeñadoTrabajador, $calleTrabajador, $numeroExteriorTrabajador, $numeroInteriorTrabajador, $coloniaTrabajador, $codigoPostalTrabajador, $estadoTrabajador, 
        // $municipioTrabajador, $curpTrabajador, $rfcTrabajador, $nssTrabajador, $tipoIdentificacionTrabajador, $numeroIdentificacionTrabajador, $emailTrabajador, $telefonoTrabajador, 
        // $sueldoTrabajador, $tipoSueldoTrabajador, $horarioTrabajador, $horasLaboradasTrabajador, $razonSocialEmpresa, $nombreComercialEmpresa, $nombrePatronEmpresa, $dedicaEmpresa, 
        // $curpRfcEmpresa, $calleEmpresa, $numeroExteriorEmpresa, $numeroIneriorEmpresa, $coloniaEmpresa, $cpEmpresa, $estadoEmpresa, $municipioEmpresa, $telefonoEmpresa, $emailEmpresa, 
        // $cuantificacionDoc, $fechaOper);

        // $arrayResultados            = unirArrays($arrayResultados, $resultadoSolicitudes);


        // // SE PREGUNTA SI EXISTE UNA RATIFICACION CREADA
        // $resultadoMostrarSiHayRatificaciones = obtenerRatificacionesCreadas($dbConnect);

        // for ($i = 0; $i < count($resultadoMostrarSiHayRatificaciones); $i++) {
        //     $totalRatificaciones = $resultadoMostrarSiHayRatificaciones[$i]["total_ratificaciones"];
        // }

        // // print_r($totalRatificaciones);
        // // =================================================================================

        // // CONDICION PARA SABER SI NO EXISTE NINGUNA RATIFICACION CREADA O SI HAY YA CREADAS

        // if ($totalRatificaciones > 0) {

        //     //SE OBTIENEN LOS USUARIOS QUE CUENTAN CON UNA RATIFICACION
        //     $usuariosConRatificacion = array();
        //     $resultadoUsuariosConRatificacion = obtenerUsuariosConRatificacion($dbConnect);
        //     for ($i=0; $i < count($resultadoUsuariosConRatificacion) ; $i++) { 
        //         $usuariosConRatificacion[] = $resultadoUsuariosConRatificacion[$i]["idUsuario"];
        //     }
        //     // print_r($usuariosConRatificacion);

        //     $usuariosSinRatificacion = array();
        //     $resultadoUsuariosSinRatificacion = obtenerUsuariosSinRatificacion($dbConnect, $idCiudad, $idTipoUsuario);
        //     for ($i=0; $i < count($resultadoUsuariosSinRatificacion) ; $i++) { 
        //         $usuariosSinRatificacion[] = $resultadoUsuariosSinRatificacion[$i]["idUsuario"];
        //     }

        //     // SE OBTIENEN EL ID DE LA RATIFICACIÓN CREADA
        //     $resultadoMostrarUltimaRatificacionCreada = obtenerLaUltimaRatificacionCreada($dbConnect);
        //     $idRatificacion = $resultadoMostrarUltimaRatificacionCreada["idRatificacion"];

        //     // Obtener el índice del último usuario al que se le asignó una ratificación
        //     $ultimoUsuarioIndex = count($usuariosConRatificacion) - 1;

        //     if (count($usuariosSinRatificacion) > 0) {
        //         $posicionUsuario = 0;

        //         $idUsuario = $usuariosSinRatificacion[$posicionUsuario];
        //         $insertarRatificacionUsuarioAuxiliar = insertarRatificacionAuxiliar($dbConnect, $idUsuario, $idRatificacion);
        //     }
        //     // Verificar si el índice está dentro del rango del arreglo
        //     elseif ($ultimoUsuarioIndex >= 0 && $ultimoUsuarioIndex < count($usuariosConRatificacion)) {
        //         // Asignar la nueva ratificación al usuario correspondiente
        //         $idUsuario = $usuariosConRatificacion[$ultimoUsuarioIndex];
        //         $insertarRatificacionUsuarioAuxiliar = insertarRatificacionAuxiliar($dbConnect, $idUsuario, $idRatificacion);

        //         // Incrementar el índice para la siguiente asignación
        //         $ultimoUsuarioIndex++;

        //         // Verificar si se ha alcanzado el final del arreglo
        //         if ($ultimoUsuarioIndex >= count($usuariosConRatificacion)) {
        //             $ultimoUsuarioIndex = 0; // Volver al primer usuario
        //         }
        //     }
            // =================================================================================
        // }
        // else{

        //     $codigo = "fallo";
        //     $mensaje = "ERROR.";
        //     $objetoRespuesta = array();
        // }
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