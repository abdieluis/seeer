<?php
require_once("../global/header.php");
$tipoUsuario = $_SESSION['idTipoUsuario'];
$idUsuario   = $_SESSION['idUsuario'];
?>
			<div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
				<center> <h1> <i class='bx bxs-file'></i> Solicitudes</h1> </center>
				<div class="table-responsive tablaResultados">
			        <table id="movimientoSolicitudes" class="table table-striped" style="width:100%">
			          <thead>
			              <tr>
			                  <th class="encabezados">Fecha Solicitud</th>
			                  <th class="encabezados">Nombre Solicitante</th>
			                  <th class="encabezados">Numero de Indentificación</th>
			                  <th class="encabezados">Ciudad</th>
			                  <!-- <th class="encabezados">Estatus</th> -->
			                  <th class="encabezados">Operación</th>
			              </tr>
			          </thead>
			          <tbody>
			            <?php
			            require_once("../db_functions/db_global.php");
			            require_once("../db_functions/db_solicitud.php");

			            $dbConnect = comenzarConexion();
			            $datos     = mostrarDatosSolicitudes($dbConnect);

			            for($i = 0; $i < count($datos); $i++){
			              echo '<tr>
			                  <td class="resultados">'.$datos[$i]["fecha"].'</td>
			                  <td class="resultados">'.$datos[$i]["nombreCompletoSolicitante"].'</td>
			                  <td class="resultados">'.$datos[$i]["nroIdentificacionOficial"].'</td>
			                  <td class="resultados">'.$datos[$i]["ciudad"].'</td>
			                  
			                  <td class="resultados"> <div class="operacionesTd"> <a class="opcTd" href="#" onclick="abrirPopupConfirmarEliminacion('.$datos[$i]["idSolicitud"].', 0)"><i class="bx bxs-trash"></i></a> <a href="#" onclick="abrirPopupEditarDatosSolicitud('.$datos[$i]["idSolicitud"].')"><i class="bx bx-pencil"></i></a> </div> </td>
			                  
			                </tr>'; 
			            }

			            cerrarConexion($dbConnect);
			            
			            ?>
			          </tbody>
			        </table>
			    </div>
			</div>

			<div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
				<center> <h1> <i class='bx bxs-user-voice'></i> Audiencias</h1> </center>
				<div class="table-responsive tablaResultados">
			        <table id="movimientoAudiencias" class="table table-striped" style="width:100%">
			          <thead>
			              <tr>
			                  <th class="encabezados">Fecha Solicitud</th>
			                  <th class="encabezados">Fecha Audiencia</th>
			                  <th class="encabezados">Nombre Solicitante</th>
			                  <th class="encabezados">Conciliador Asignado</th>
			                  <th class="encabezados">Horario Audiencia</th>
			                  <th class="encabezados">Ciudad</th>
			                  <!-- <th class="encabezados">Estatus</th> -->
			                  <th class="encabezados">Operación</th>
			              </tr>
			          </thead>
			          <tbody>
			            <?php
			            require_once("../db_functions/db_global.php");
			            require_once("../db_functions/db_audiencia.php");

			            $dbConnect = comenzarConexion();
			            $datos     = mostrarDatosAudiencias($dbConnect);

			            for($i = 0; $i < count($datos); $i++){
			              echo '<tr>
			                  <td class="resultados">'.$datos[$i]["fechaSolicitud"].'</td>
			                  <td class="resultados">'.$datos[$i]["fechaAudiencia"].'</td>
			                  <td class="resultados">'.$datos[$i]["nombreCompletoSolicitante"].'</td>
			                  <td class="resultados">'.$datos[$i]["conciliadorAsignado"].'</td>
			                  <td class="resultados">'.$datos[$i]["horarioAudiencia"].'</td>
			                  <td class="resultados">'.$datos[$i]["ciudad"].'</td>
			                  
			                  <td class="resultados"> <div class="operacionesTd"> <a class="opcTd" href="#" onclick="abrirPopupConfirmarEliminacion('.$datos[$i]["idAudiencia"].', 1)"><i class="bx bxs-trash"></i></a> <a href="#" onclick="abrirPopupEditarDatosAudiencia('.$datos[$i]["idAudiencia"].')"><i class="bx bx-pencil"></i></a> </div> </td>
			                  
			                </tr>'; 
			            }

			            cerrarConexion($dbConnect);
			            
			            ?>
			          </tbody>
			        </table>
			    </div>
			</div>

			
<script>

// EVENTO READY ======================================================================================
$(document).ready(function () {
    $('#movimientoSolicitudes').DataTable();
    $('#movimientoAudiencias').DataTable();
    $('#movimientoRatificaciones').DataTable();
    idUsuarioSesion = <?=$idUsuario?>;
});
// ===================================================================================================
</script>
<?php
require_once("../global/footer.php");
?>