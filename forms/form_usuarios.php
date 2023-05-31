<?php
$title       = "USUARIOS | SEEER CONCILIADOR";
$needSession = true;
$home        = false;
require_once("../global/header.php");
$tipoUsuario = $_SESSION['idTipoUsuario'];
$idUsuario   = $_SESSION['idUsuario'];
?>
			<div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                <center>
                    <div class="col-sm-3 btnAlta">
                        <button type="button" class="col-sm-6" onclick="abrirPopupAltaUsuarios();"><i class='bx bx-user-plus'></i> Usuario</button>
                    </div>
                </center>
				<div class="table-responsive tablaResultados">
					<table id="usuarios" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th class="encabezados">Nombres</th>
								<th class="encabezados">Apellidos</th>
								<th class="encabezados">Tipo de Usuario</th>
								<th class="encabezados">Ciudad</th>
								<!-- <th class="encabezados">Estatus</th> -->
								<th class="encabezados">Operación</th>
							</tr>
						</thead>
						<tbody>
							<?php
								require_once("../db_functions/db_global.php");
								require_once("../db_functions/db_usuarios.php");

								$dbConnect = comenzarConexion();
								$datos     = obtenerUsuarios($dbConnect);

								for($i = 0; $i < count($datos); $i++){
									echo '<tr>
										<td class="resultados">'.$datos[$i]["nombres"].'</td>
										<td class="resultados">'.$datos[$i]["apellidos"].'</td>
										<td class="resultados">'.$datos[$i]["tipoUsuario"].'</td>
										<td class="resultados">'.$datos[$i]["ciudad"].'</td>
										<td class="resultados">
                                            <div class="operacionesTd">
                                                <a href="#" onclick="abrirPopupConfirmarEliminacion('.$datos[$i]["idUsuario"].', 3)"><i class="bx bxs-trash"></i></a>
                                                <a href="#" onclick="abrirPopupActualizarUsuarios('.$datos[$i]["idUsuario"].')"><i class="bx bx-pencil"></i></a>
                                            </div>
                                        </td>
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
    $('#usuarios').DataTable();
    idUsuarioSesion = <?=$idUsuario?>;
});
// ===================================================================================================
</script>
<?php
require_once("../global/footer.php");
?>s