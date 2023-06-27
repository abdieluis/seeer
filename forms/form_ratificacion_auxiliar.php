<?php
$title       = "MOVIMIENTOS | SEEER CONCILIADOR";
$needSession = true;
$home        = false;
require_once("../global/header.php");
$tipoUsuario = $_SESSION['idTipoUsuario'];
$idUsuario   = $_SESSION['idUsuario'];
?>
			<div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
				<center> <h1> <i class='bx bxs-file'></i> Ratificaciones Asignadas</h1> </center>
				<div class="table-responsive tablaResultados">
					<table id="ratificacionesAsignadas" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th class="encabezados">Fecha Creación</th>
								<th class="encabezados">Nombre Trabajador</th>
								<th class="encabezados">Nombre Patrón</th>
								<th class="encabezados">Nombre Comercial</th>
								<th class="encabezados">Estatus</th>
								<th class="encabezados">Visualizar</th>
							</tr>
						</thead>
						<tbody>
							<?php
								require_once("../db_functions/db_global.php");
								require_once("../db_functions/db_ratificacion.php");

								$dbConnect = comenzarConexion();
								$datos     = obtenerRatificacionesAsignadasAuxiliar($dbConnect, $idUsuario);

								for($i = 0; $i < count($datos); $i++){
									echo '<tr>
										<td class="resultados">'.$datos[$i]["fechaCreacion"].'</td>
										<td class="resultados">'.$datos[$i]["nombreCompletoTrabajador"].'</td>
                                        <td class="resultados">'.$datos[$i]["nombrePatron"].'</td>
										<td class="resultados">'.$datos[$i]["nombreComercial"].'</td>';
                                        if($datos[$i]["ratificado"] == 0){
                                            echo'<td class="resultados"><i class="bx bx-history" style="color:#fb0202"></i>  Pendiente</td>';
                                            echo'<td class="resultados"> <div class="operacionesTd"> <a class="opcTd" href="#" onclick="visualizarRatificacion('.$datos[$i]["idRatificacion"].')"><i class="bx bx-show-alt"></i></a></div></td>
                                            </tr>'; 
                                        }
                                        elseif($datos[$i]["ratificado"] == 1) {
                                            echo'<td class="resultados"><i class="bx bx-mail-send" style="color:#3B9500"></i> Correo enviado</td>';
                                            echo'<td class="resultados"> <div class="operacionesTd"> <a class="opcTd" href="#" onclick="mensajeRatificado()"><i class="bx bx-low-vision"></i></a></div></td>
                                            </tr>'; 
                                        }
                                        
										
								}
								cerrarConexion($dbConnect);
							?>
						</tbody>
					</table>
				</div>
			</div>
            <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded visualizarRatificacion" id="myForm"></div>
            <!-- <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded visualizarRatificacion"></div> -->
<script>

function ocultarFormulario() {

    var form = $("#myForm");

    if (form.is(":visible")) {
        // Si el formulario está visible, ocultarlo con una animación
        form.fadeOut();
    } 
    // else {
    //     // Si el formulario está oculto, mostrarlo con una animación
    //     form.fadeIn();
    // }
}

// FUNCION PARA MANDAR MENSAJE DE QUE YA ESTA ========================================================
function mensajeRatificado(){
    $(".iconoMensaje").html("<i class='bx bx-check-circle bx-tada bx-lg' style='color:#0ea202' ></i>");
    $(".textoMensaje").text("Esta ratificación ya esta agendada.");
    $("#msj").modal("toggle");
}
// ===================================================================================================
// FUNCION VISUALIZAR RATIFICACION ===================================================================
function visualizarRatificacion(idRatificacion) {

    var form = $("#myForm");
    form.fadeIn();

    idRatificacionSeleccionada = idRatificacion;

    var jsonData = {
        "idRatificacion": idRatificacionSeleccionada
    }

    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
        method:"POST",
        url:"../backend/backend_mostrar_ratificacion.php",
        data:jsonData,
        success:function(data){
            var respuesta = JSON.parse(data);

            if(respuesta["codigo"] == "fallo"){
                $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
                $(".textoMensaje").text(respuesta["mensaje"]);
                $("#msj").modal("toggle");
                closeMessageOverlay();
            }
            else if(respuesta["codigo"] == "exito"){
                var resultados = respuesta["objetoRespuesta"]["ratificacion"];

                var apellidosTrabajador         = resultados["apellidosTrabajador"];
                var calleEmpresaPatron          = resultados["calleEmpresaPatron"];
                var calleTrabajador             = resultados["calleTrabajador"];
                var coloniaEmpresaPatron        = resultados["coloniaEmpresaPatron"];
                var coloniaTrabajador           = resultados["coloniaTrabajador"];
                var cpEmpresaPatron             = resultados["cpEmpresaPatron"];
                var cpTrabajador                = resultados["cpTrabajador"];
                cuantificacion                  = resultados["cuantificacion"];
                var curpRfcPatron               = resultados["curpRfcPatron"];
                var curpTrabajador              = resultados["curpTrabajador"];
                var edadTrabajador              = resultados["edadTrabajador"];
                var eliminado                   = resultados["eliminado"];
                emailEmpresaPatron              = resultados["emailEmpresaPatron"];
                emailTrabajador                 = resultados["emailTrabajador"];
                estadoEmpresaPatron             = resultados["estadoEmpresaPatron"];
                estadoTrabajador                = resultados["estadoTrabajador"];
                var fechaCreacion               = resultados["fechaCreacion"];
                var fechaInicioLabores          = resultados["fechaInicioLabores"];
                var fechaTerminoLabores         = resultados["fechaTerminoLabores"];
                var generoTrabajador            = resultados["generoTrabajador"];
                var giroEmpresa                 = resultados["giroEmpresa"];
                var horarioLaboral              = resultados["horarioLaboral"];
                var horasLaboradas              = resultados["horasLaboradas"];
                var idRatificacion              = resultados["idRatificacion"];
                var idUsuario                   = resultados["idUsuario"];
                municipio                       = resultados["municipio"];
                municipioEmpresaPatron          = resultados["municipioEmpresaPatron"];
                var nombreComercial             = resultados["nombreComercial"];
                var nombrePatron                = resultados["nombrePatron"];
                var nombreTrabajador            = resultados["nombreTrabajador"];
                var nssTrabajador               = resultados["nssTrabajador"];
                var numeroExteriorEmpresaPatron = resultados["numeroExteriorEmpresaPatron"];
                var numeroExteriorTrabajador    = resultados["numeroExteriorTrabajador"];
                var numeroIdentificaion         = resultados["numeroIdentificaion"];
                var numeroInteriorEmpresaPatron = resultados["numeroInteriorEmpresaPatron"];
                var numeroInteriorTrabajador    = resultados["numeroInteriorTrabajador"];
                var puestoDesempeñado           = resultados["puestoDesempeñado"];
                ratificado                      = resultados["ratificado"];
                var razonSocialEmpresa          = resultados["razonSocialEmpresa"];
                var rfcTrabajador               = resultados["rfcTrabajador"];
                var sueldo                      = resultados["sueldo"];
                var telefonoEmpresaPatron       = resultados["telefonoEmpresaPatron"];
                var telefonoTrabajador          = resultados["telefonoTrabajador"];
                var tipoIdentificacion          = resultados["tipoIdentificacion"];
                var tipoSueldo                  = resultados["tipoSueldo"];

                horarioLaboral = horarioLaboral.split("-");
                horarioInicial = horarioLaboral[0];
                horarioFinal = horarioLaboral[1];

                var htmlFormRatificacionVisualizar =
                "<div class='container-fluid'>"+
                    "<div class='row'>"+
                        "<center><div class='col-md-12' style='font-weight: bold;'>DATOS DEL TRABAJADOR</div></center>"+
                        "<br><br>"+
                        "<div class='row g-3'>"+
                            "<div class='col-sm-3'>"+
                                "<label for='fechaInicioLaboralTrabajadorActualizar' class='form-label'>Fecha de Inicio Laboral</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<input type='date' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='fechaInicioLaboralTrabajadorActualizar' id='fechaInicioLaboralTrabajadorActualizar' value='"+fechaInicioLabores+"' disabled>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-3'>"+
                                "<label for='fechaFinLaboralTrabajadorActualizar' class='form-label'>Fecha de Fin Laboral</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<input type='date' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='fechaFinLaboralTrabajadorActualizar' id='fechaFinLaboralTrabajadorActualizar' value='"+fechaTerminoLabores+"' disabled>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-3'>"+
                                "<label for='nombresTrabajadorActualizar' class='form-label'>Nombres del trabajador</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bxs-edit-alt'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='nombresTrabajadorActualizar' id='nombresTrabajadorActualizar' value='"+nombreTrabajador+"' disabled>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-3'>"+
                                "<label for='apellidosTrabajadorActualizar' class='form-label'>Apellidos del trabajador</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bxs-edit-alt'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='apellidosTrabajadorActualizar' id='apellidosTrabajadorActualizar' value='"+apellidosTrabajador+"' disabled>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+
                        
                        "<div class='row g-3'>"+
                            "<div class='col-sm-4'>"+
                                "<label for='generoTrabajadorActualizar' class='form-label'>Genero del trabajador</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<label class='input-group-text' for='generoTrabajadorActualizar'><i class='bx bx-male-female'></i></label>"+
                                    "<select class='form-select formRatificacionActualizar' id='generoTrabajadorActualizar' disabled>"+
                                        "<option value='-1'>Genero</option>"+
                                        "<option value='Hombre'>Hombre</option>"+
                                        "<option value='Mujer'>Mujer</option>"+
                                    "</select>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-2'>"+
                                "<label for='edadTrabajadorActualizar' class='form-label'>Edad del trabajador</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-user-circle'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='edadTrabajadorActualizar' id='edadTrabajadorActualizar' maxlength='3' onKeypress='return soloNumeros(event);' value='"+edadTrabajador+"' disabled>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-4'>"+
                                "<label for='puestoDesempeñadoTrabajadorActualizar' class='form-label'>Puesto desempeñado</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-id-card'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='puestoDesempeñadoTrabajadorActualizar' id='puestoDesempeñadoTrabajadorActualizar' value='"+puestoDesempeñado+"' disabled>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+

                        "<div class='row g-3'>"+
                            "<div class='col-sm-3'>"+
                                "<label for='calleTrabajadorActualizar' class='form-label'>Calle</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-map-pin'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='calleTrabajadorActualizar' id='calleTrabajadorActualizar' value='"+calleTrabajador+"' disabled>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-2'>"+
                                "<label for='numeroExteriorTrabajadorActualizar' class='form-label'>Numero Exterior</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-home'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='numeroExteriorTrabajadorActualizar' id='numeroExteriorTrabajadorActualizar' maxlength='10' onKeypress='return soloNumeros(event);' value='"+numeroExteriorTrabajador+"' disabled>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-2'>"+
                                "<label for='numeroInteriorTrabajadorActualizar' class='form-label'>Numero interior</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-home'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='numeroInteriorTrabajadorActualizar' id='numeroInteriorTrabajadorActualizar' disabled value='"+numeroInteriorTrabajador+"'>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-3'>"+
                                "<label for='coloniaTrabajadorActualizar' class='form-label'>Colonia</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bxs-directions'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='coloniaTrabajadorActualizar' id='coloniaTrabajadorActualizar' value='"+coloniaTrabajador+"' disabled>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-2'>"+
                                "<label for='codigoPostalTrabajadorActualizar' class='form-label'>Codigo Postal</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-map-pin'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='codigoPostalTrabajadorActualizar' id='codigoPostalTrabajadorActualizar' maxlength='5' onKeypress='return soloNumeros(event);' value='"+cpTrabajador+"' disabled>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+

                        "<div class='row g-3'>"+
                            "<div class='col-sm-4'>"+
                                "<label for='estadoTrabajadorActualizar' class='form-label'>Estado Trabajador</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-map'></i></span>"+
                                    "<select class='form-select formRatificacionActualizar selectEstadosTrabajadorActualizar' id='estadoTrabajadorActualizar' onchange='mostrarMunicipiosTrabajadorActualizar();' disabled></select>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-4'>"+
                                "<label for='municipioTrabajadorActualizar' class='form-label'>Municipio Trabajador</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-map'></i></span>"+
                                    "<select class='form-select formRatificacionActualizar selectMunicipioTrabajador' id='municipioTrabajadorActualizar' disabled>"+
                                        "<option value='-1'>Municipio de Trabajador</option>"+
                                    "</select>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+

                        "<div class='row g-3'>"+
                            "<div class='col-sm-2'>"+
                                "<label for='curpTrabajadorActualizar' class='form-label'>CURP Trabajador</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-id-card'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='curpTrabajadorActualizar' id='curpTrabajadorActualizar' value='"+curpTrabajador+"' disabled>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-2'>"+
                                "<label for='rfcTrabajadorActualizar' class='form-label'>RFC Trabajador</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-id-card'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='rfcTrabajadorActualizar' id='rfcTrabajadorActualizar' value='"+rfcTrabajador+"' disabled>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-3'>"+
                                "<label for='nssTrabajadorActualizar' class='form-label'>NSS Trabajador</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-id-card'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='nssTrabajadorActualizar' id='nssTrabajadorActualizar' value='"+nssTrabajador+"' disabled>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-2'>"+
                                "<label for='tipoIdentificacionTrabajadorActualizar' class='form-label'>Tipo de identificación</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<label class='input-group-text' for='tipoIdentificacionTrabajadorActualizar'><i class='bx bx-dots-vertical-rounded'></i></label>"+
                                    "<select class='form-select formRatificacionActualizar' id='tipoIdentificacionTrabajadorActualizar' disabled>"+
                                        "<option value='-1'>Tipo de Identificación</option>"+
                                        "<option value='INE'>INE</option>"+
                                        "<option value='Pasaporte'>Pasaporte</option>"+
                                        "<option value='Cedúla Profesional'>Cedúla Profesional</option>"+
                                        "<option value='INAPAM'>INAPAM</option>"+
                                    "</select>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-3'>"+
                                "<label for='numeroIdentificacionTrabajadorActualizar' class='form-label'>Número de identificación del trabajador</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-id-card'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='numeroIdentificacionTrabajadorActualizar' id='numeroIdentificacionTrabajadorActualizar' value='"+numeroIdentificaion+"' disabled>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+

                        "<div class='row g-3'>"+
                            "<div class='col-sm-3'>"+
                                "<label for='emailTrabajadorActualizar' class='form-label'>Email del trabajador</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-at'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='emailTrabajadorActualizar' id='emailTrabajadorActualizar' value='"+emailTrabajador+"' disabled>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-3'>"+
                                "<label for='telefonoTrabajadorActualizar' class='form-label'>Teléfono del trabajador</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-phone'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='telefonoTrabajadorActualizar' id='telefonoTrabajadorActualizar' maxlength='10' onKeypress='return soloNumeros(event);' value='"+telefonoTrabajador+"' disabled>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-3'>"+
                                "<label for='sueldoTrabajadorActualizar' class='form-label'>Sueldo del trabajador</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-dollar-circle'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='sueldoTrabajadorActualizar' id='sueldoTrabajadorActualizar' value='"+sueldo+"' disabled>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-3'>"+
                                "<label for='tipoSueldoTrabajadorActualizar' class='form-label'>Tipo de sueldo del trabajador</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-calendar-star'></i></span>"+
                                    "<select class='form-select formRatificacionActualizar selectTipoSueldoTrabajador' id='tipoSueldoTrabajadorActualizar' disabled>"+
                                        "<option value='-1'>Selecciona el tipo de sueldo</option>"+
                                        "<option value='Diario'>Diario</option>"+
                                        "<option value='Semanal'>Semanal</option>"+
                                        "<option value='Quincenal'>Quincenal</option>"+
                                        "<option value='Mensual'>Mensual</option>"+
                                    "</select>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+

                        "<div class='row g-3'>"+
                            "<div class='col-sm-2'>"+
                                "<label for='horarioInicioTrabajadorActualizar' class='form-label'>Horario de Inicio Laboral</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<input type='time' class='form-control formRatificacionActualizar'  aria-describedby='basic-addon1' name='horarioInicioTrabajadorActualizar' id='horarioInicioTrabajadorActualizar' value='"+horarioInicial+"' disabled>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-2'>"+
                                "<label for='horarioFinTrabajadorActualizar' class='form-label'>Horario de Fin Laboral</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<input type='time' class='form-control formRatificacionActualizar'  aria-describedby='basic-addon1' name='horarioFinTrabajadorActualizar' id='horarioFinTrabajadorActualizar' value='"+horarioFinal+"' disabled>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-2'>"+
                                "<label for='horasLaboradasTrabajadorActualizar' class='form-label'>Horas Laboradas Semanal</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-time' ></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='horasLaboradasTrabajadorActualizar' id='horasLaboradasTrabajadorActualizar' value='"+horasLaboradas+"' disabled>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+

                        "<br><br>"+
                        "<center><div class='col-md-12' style='font-weight: bold;'>DATOS DE LA EMPRESA</div></center>"+
                        "<br><br>"+

                        "<div class='row g-3'>"+
                            "<div class='col-sm-4'>"+
                                "<label for='razonSocialEmpresaActualizar' class='form-label'>Razón social de la empresa</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-buildings'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='razonSocialEmpresaActualizar' id='razonSocialEmpresaActualizar' disabled value='"+razonSocialEmpresa+"'>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-4'>"+
                                "<label for='nombreComercialEmpresaActualizar' class='form-label'>Nombre Comercial</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-buildings'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='nombreComercialEmpresaActualizar' id='nombreComercialEmpresaActualizar' disabled value='"+nombreComercial+"'>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-4'>"+
                                "<label for='nombrePatronEmpresaActualizar' class='form-label'>Nombre del patrón</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-briefcase'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='nombrePatronEmpresaActualizar' id='nombrePatronEmpresaActualizar' disabled value='"+nombrePatron+"'>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+

                        "<div class='row g-3'>"+
                            "<div class='col-sm-3'>"+
                                "<label for='emailEmpresaActualizar' class='form-label'>Email de la empresa</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-at'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='emailEmpresaActualizar' id='emailEmpresaActualizar' value='"+emailEmpresaPatron+"' disabled>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-6'>"+
                                "<label for='dedicaEmpresaActualizar' class='form-label'>¿A que se dedica la empresa?</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-help-circle' ></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='dedicaEmpresaActualizar' id='dedicaEmpresaActualizar' value='"+giroEmpresa+"' disabled>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-3'>"+
                                "<label for='curpRfcEmpresaActualizar' class='form-label'>CURP o RFC del patrón</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-id-card'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='curpRfcEmpresaActualizar' id='curpRfcEmpresaActualizar' value='"+curpRfcPatron+"' disabled>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+

                        "<div class='row g-3'>"+
                            "<div class='col-sm-3'>"+
                                "<label for='calleEmpresaActualizar' class='form-label'>Calle de la empresa</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-map-pin'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='calleEmpresaActualizar' id='calleEmpresaActualizar' value='"+calleEmpresaPatron+"' disabled>"+
                                "</div>"+
                            "</div>"+

                            "<div class='col-sm-2'>"+
                                "<label for='numeroExteriorEmpresaActualizar' class='form-label'>Número exterior de la empresa</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-home'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='numeroExteriorEmpresaActualizar' id='numeroExteriorEmpresaActualizar' maxlength='10' onKeypress='return soloNumeros(event);' value='"+numeroExteriorEmpresaPatron+"' disabled>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-2'>"+
                                "<label for='numeroIneriorEmpresaActualizar' class='form-label'>Número interior de la empresa</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-home'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='numeroIneriorEmpresaActualizar' id='numeroIneriorEmpresaActualizar' disabled value='"+numeroInteriorEmpresaPatron+"'>"+
                                "</div>"+
                            "</div>"+

                            "<div class='col-sm-3'>"+
                                "<label for='coloniaEmpresaActualizar' class='form-label'>Colonia de la empresa</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bxs-directions'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='coloniaEmpresaActualizar' id='coloniaEmpresaActualizar' disabled value='"+coloniaEmpresaPatron+"'>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-2'>"+
                                "<label for='cpEmpresaActualizar' class='form-label'>Codigo postal de la empresa</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-map-pin'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='cpEmpresaActualizar' id='cpEmpresaActualizar' maxlength='5' onKeypress='return soloNumeros(event);' disabled value='"+cpEmpresaPatron+"'>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+

                        "<div class='row g-3'>"+
                            "<div class='col-sm-3'>"+
                                "<label for='estadoEmpresaActualizar' class='form-label'>Estado de la empresa</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-map'></i></span>"+
                                    "<select class='form-select formRatificacionActualizar selectEstadosEmpresa' id='estadoEmpresaActualizar' onchange='mostrarMunicipiosEmpresaActualizar();' disabled></select>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-3'>"+
                                "<label for='municipioEmpresaActualizar' class='form-label'>Municipio de la empresa</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-map'></i></span>"+
                                    "<select class='form-select formRatificacionActualizar selectMunicipioEmpresa' id='municipioEmpresaActualizar' disabled>"+
                                        "<option value='-1'>Municipio de la Empresa</option>"+
                                    "</select>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-3'>"+
                                "<label for='telefonoEmpresaActualizar' class='form-label'>Teléfono de la empresa</label>"+
                                "<div class='input-group mb-3'>"+
                                    "<span class='input-group-text' id='basic-addon1'><i class='bx bx-phone'></i></span>"+
                                    "<input type='text' class='form-control formRatificacionActualizar' aria-describedby='basic-addon1' name='telefonoEmpresaActualizar' id='telefonoEmpresaActualizar' maxlength='10' onKeypress='return soloNumeros(event);' value='"+telefonoEmpresaPatron+"' disabled>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-3'>"+
                                "<center>"+
                                    "<label for='editarForm' class='form-label'>Selecciona si deseas editar algún campo</label>"+
                                    "<div class='checkbox-lg'>"+
                                        "<input class='form-check-input' type='checkbox' id='editarForm' onchange='editarCamposFormulario(this);'>"+
                                    "</div>"+
                                "</center>"+
                            "</div>"+
                        "</div>"+

                        "<div class='row g-3'>"+
                            "<div class='col-sm-4'>"+
                                "<div class='input-group mb-3 btnArchivo'>"+
                                    "<button class='col-sm-12 cargarArchivo btnEditarForm' onClick='clickCargarArchivoCuantificacion();' hidden><i class='bx bxs-edit-alt'></i> Editar</button>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-4'>"+
                                "<div class='input-group mb-3 btnArchivo'>"+
                                    "<button class='col-sm-12 cargarArchivo' onClick='verDocCuantificacion();'><i class='bx bx-show-alt'></i> Ver Cuantificación</button>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-sm-4'>"+
                                "<div class='input-group mb-3 btnArchivo'>"+
                                    "<button class='col-sm-12 cargarArchivo' onClick='abrirAgendarRatificacion();'><i class='bx bxs-chevron-right-circle'></i> Continuar</button>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+

                        "<div class='row g-3'>"+
                            "<div class='col-sm-12'>"+
                                "<div class='input-group mb-3 btnArchivo'>"+
                                "<button class='round-button' onclick='ocultarFormulario();'><i class='bx bxs-chevron-up bx-sm'></i></button>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+
                        
                    "</div>"+
                "</div>";

                $(".visualizarRatificacion").html(htmlFormRatificacionVisualizar);

                $("#generoTrabajadorActualizar option[value='"+generoTrabajador+"'").attr("selected",true);
                $("#tipoIdentificacionTrabajadorActualizar option[value='"+tipoIdentificacion+"'").attr("selected",true);
                $("#tipoSueldoTrabajadorActualizar option[value='"+tipoSueldo+"'").attr("selected",true);

                
                mostrarEstadosTrabajadorActualizar();
                mostrarEstadosEmpresaActualizar();

                closeMessageOverlay();
            }
        }
    });

}
// ===============================================================================================

// FUNCION PARA EDITAR CAMPOS ====================================================================
function editarCamposFormulario(e){
    if ($(e).is(':checked')) {
        $(".formRatificacionActualizar").prop('disabled', false);
        $(".btnEditarForm").prop('hidden', false);
    } else {
        $(".formRatificacionActualizar").prop('disabled', true);
        $(".btnEditarForm").prop('hidden', true);
    }
}
// ===============================================================================================

// FUNCION SELECT ESTADOS ========================================================================
function mostrarEstadosTrabajadorActualizar(){
    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
        method:"POST",
        url:"../backend/backend_mostrar_estados.php",
        data:"",
        success:function(data){
            var respuesta = JSON.parse(data);
            if(respuesta["codigo"] == "fallo"){
                $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
                $(".textoMensaje").text(respuesta["mensaje"]);
                $("#msj").modal("toggle");
                closeMessageOverlay();
            }
            else if(respuesta["codigo"] == "exito"){
                var resultados = respuesta["objetoRespuesta"]["estados"];
                var opcionesEstados = "<option value='-1'>Selecciona Estado Trabajador</option>";
                for (i = 0; i < resultados.length; i++) {
                    var resultadosTotales = resultados[i];
                    var idEstado     = resultadosTotales["id"];
                    var nombreEstado = resultadosTotales["nombre"];
                    opcionesEstados += "<option value='"+idEstado+"'>"+nombreEstado+"</option>";
                }
                $(".selectEstadosTrabajadorActualizar").html(opcionesEstados);

                $("#estadoTrabajadorActualizar option:contains("+estadoTrabajador+")").attr('selected', true);
                idEstadoSeleccionadoActualizar = $("#estadoTrabajadorActualizar").val();
                
                mostrarMunicipiosTrabajadorActualizar();

                closeMessageOverlay();
            }
        }
    });
}
// ===============================================================================================

// FUNCION SELECT MUNICIPIOS =====================================================================
function mostrarMunicipiosTrabajadorActualizar(){

    var jsonData = {
        "estado": idEstadoSeleccionadoActualizar
    }
    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
        method:"POST",
        url:"../backend/backend_mostrar_municipios_estado.php",
        data:jsonData,
        success:function(data){
            var respuesta = JSON.parse(data);
            if(respuesta["codigo"] == "fallo"){
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text(respuesta["mensaje"]);
            $("#msj").modal("toggle");
            closeMessageOverlay();
            }
            else if(respuesta["codigo"] == "exito"){
                var resultados = respuesta["objetoRespuesta"]["municipios"];
                var opcionesMunicipios = "<option value='-1'>Municipio del trabajador</option>";
                for (i = 0; i < resultados.length; i++) {
                    var resultadosTotales = resultados[i];
                    // console.log(resultadosTotales);
                    var idMunicipio     = resultadosTotales["id"];
                    var nombreMunicipio = resultadosTotales["nombre"];
                    var ciudadCentro    = resultadosTotales["ciudadCentro"];
                    opcionesMunicipios += "<option value='"+idMunicipio+"' centro='"+ciudadCentro+"'>"+nombreMunicipio+"</option>";
                }
                $(".selectMunicipioTrabajador").html(opcionesMunicipios);

                $("#municipioTrabajadorActualizar option:contains("+municipio+")").attr('selected', true);

                closeMessageOverlay();
            }
        }
    });
}
// ===============================================================================================

// FUNCION SELECT ESTADOS EMPRESA=================================================================
function mostrarEstadosEmpresaActualizar(){
    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
        method:"POST",
        url:"../backend/backend_mostrar_estados.php",
        data:"",
        success:function(data){
            var respuesta = JSON.parse(data);
            if(respuesta["codigo"] == "fallo"){
                $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
                $(".textoMensaje").text(respuesta["mensaje"]);
                $("#msj").modal("toggle");
                closeMessageOverlay();
            }
            else if(respuesta["codigo"] == "exito"){
                var resultados = respuesta["objetoRespuesta"]["estados"];
                var opcionesEstados = "<option value='-1'>Selecciona Estado Empresa</option>";
                for (i = 0; i < resultados.length; i++) {
                    var resultadosTotales = resultados[i];
                    var idEstado     = resultadosTotales["id"];
                    var nombreEstado = resultadosTotales["nombre"];
                    opcionesEstados += "<option value='"+idEstado+"'>"+nombreEstado+"</option>";
                }
                $(".selectEstadosEmpresa").html(opcionesEstados);

                $("#estadoEmpresaActualizar option:contains("+estadoEmpresaPatron+")").attr('selected', true);
                idEstadoSeleccionadoActualizarPatron = $("#estadoEmpresaActualizar").val();
                
                mostrarMunicipiosEmpresaActualizar();

                closeMessageOverlay();
            }
        }
    });
}
// ===============================================================================================

// FUNCION SELECT MUNICIPIOS EMPRESA ==============================================================
function mostrarMunicipiosEmpresaActualizar(){

    var jsonData = {
        "estado": idEstadoSeleccionadoActualizarPatron
    }
    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
        method:"POST",
        url:"../backend/backend_mostrar_municipios_estado.php",
        data:jsonData,
        success:function(data){
            var respuesta = JSON.parse(data);
            if(respuesta["codigo"] == "fallo"){
                $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
                $(".textoMensaje").text(respuesta["mensaje"]);
                $("#msj").modal("toggle");
                closeMessageOverlay();
            }
            else if(respuesta["codigo"] == "exito"){
                var resultados = respuesta["objetoRespuesta"]["municipios"];
                var opcionesMunicipios = "<option value='-1'>Municipio de la Empresa</option>";
                for (i = 0; i < resultados.length; i++) {
                    var resultadosTotales = resultados[i];
                    // console.log(resultadosTotales);
                    var idMunicipio     = resultadosTotales["id"];
                    var nombreMunicipio = resultadosTotales["nombre"];
                    var ciudadCentro    = resultadosTotales["ciudadCentro"];
                    opcionesMunicipios += "<option value='"+idMunicipio+"' centro='"+ciudadCentro+"'>"+nombreMunicipio+"</option>";
                }
                $(".selectMunicipioEmpresa").html(opcionesMunicipios);

                $("#municipioEmpresaActualizar option:contains("+municipioEmpresaPatron+")").attr('selected', true);

                closeMessageOverlay();
            }
        }     
    });
}
// =================================================================================================

// FUNCION ABRIR DOCUMENTOS =========================================================================
function verDocCuantificacion(){
    window.open("../documento_cuantificacion/"+cuantificacion, "_blank");
}
// ===================================================================================================

// EVENTO READY ======================================================================================
$(document).ready(function () {
    $('#ratificacionesAsignadas').DataTable();
    idRatificacionSeleccionada = "";
    estadoEmpresaPatron        = "";
    estadoTrabajador           = "";
    municipio                  = "";
    municipioEmpresaPatron     = "";
    cuantificacion             = "";

    emailEmpresaPatron         = "";
    emailTrabajador            = "";
    ratificado                 = "";
});
// ===================================================================================================
</script>
<?php
require_once("../global/footer.php");
?>