<?php
    $title       = "RATIFICACIONES | SEEER CONCILIADOR";
    $needSession = true;
    $home        = false;
    require_once("../global/header.php");
    $tipoUsuario = $_SESSION['idTipoUsuario'];
    $idUsuario   = $_SESSION['idUsuario'];
    $idCiudad   = $_SESSION['idCiudad'];
?>
			<div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                <center> <h1> <i class='bx bxs-file'></i> Asignar Ratificación</h1> </center>
				<div class="container-fluid">
                    <div class="row">
                        <center><div class="col-md-12" style="font-weight: bold;">DATOS DEL USUARIO</div></center>
                        <br><br>

                        <div class="row g-3">
                            <div class="col-sm-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class='bx bxs-file'></i></span>
                                    <select class="form-select selectRatificaciones" id="ratificacionesSinAsignar" onchange="mostrarAuxiliaresDisponibles();"></select>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class='bx bx-id-card'></i></span>
                                    <select class="form-select selectAuxiliares" id="auxiliaresDisponibles" onchange="mostrarUsuarioConciliadorAsignado();">
                                        <option value="-1">Selecciona El Auxiliar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control conciliadorAuxiliar" placeholder="Conciliador" disabled>
                            </div>
                            <div class="col-sm">
                            <div class="col-sm-12 btnAlta">
                                <button type="button" class="col-sm-6" onclick="asignarRatificacionUsuarioAuxiliar();"><i class='bx bx-plus'></i> Asignar</button>
                            </div>
                            </div>
                        </div>

                    </div>
                </div>
			</div>
<script>
// FUNCION TRAER USUARIOS AUXILIARES =================================================================
function mostrarAuxiliaresDisponibles() {

    var idCiudad = <?=$idCiudad?>;

    var jsonData = {
        "idCiudad": idCiudad
    }

    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
        method:"POST",
        url:"../backend/backend_mostrar_usuario_auxiliar.php",
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
                var resultados = respuesta["objetoRespuesta"]["usuario_auxiliar"];

                var opcionesAuxiliares = "<option value='-1'>Selecciona El Auxiliar</option>";

                for (i = 0; i < resultados.length; i++) {
                    var resultadosTotales = resultados[i];

                    var idUsuario            = resultadosTotales["idUsuarioAuxiliar"];
                    var nombres              = resultadosTotales["nombres"];
                    var apellidos            = resultadosTotales["apellidos"];
                    var idUsuarioConciliador = resultadosTotales["idUsuarioConciliador"];

                    opcionesAuxiliares += "<option value='"+idUsuario+"' idUsuarioConciliador="+idUsuarioConciliador+">"+nombres+" "+apellidos+"</option>";
                }

                $(".selectAuxiliares").html(opcionesAuxiliares);
                closeMessageOverlay();
            }
        }
    });
}
// ===================================================================================================

// FUNCION TRAER RATIFICACIONES QUE NO HAN SIDO ASIGNADAS AUN ========================================
function mostrarRatificacionesSinAsignar() {
    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
        method:"POST",
        url:"../backend/backend_mostrar_ratificaciones_sin_asignar.php",
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
                var resultados = respuesta["objetoRespuesta"]["ratificaciones"];
                // console.log(resultados);

                var opcionesRatificacion = "<option value='-1'>Selecciona La Ratificación</option>";

                for (i = 0; i < resultados.length; i++) {
                    var resultadosTotales = resultados[i];

                    var apellidosTrabajador = resultadosTotales["apellidosTrabajador"];
                    var idRatificacion = resultadosTotales["idRatificacion"];
                    var nombreComercial = resultadosTotales["nombreComercial"];
                    var nombrePatron = resultadosTotales["nombrePatron"];
                    var nombreTrabajador = resultadosTotales["nombreTrabajador"];
                    var razonSocialEmpresa = resultadosTotales["razonSocialEmpresa"];

                    opcionesRatificacion += "<option value='"+idRatificacion+"'>Ratificación "+nombreTrabajador+" "+apellidosTrabajador+"</option>";
                }

                $(".selectRatificaciones").html(opcionesRatificacion);
                closeMessageOverlay();
            }
        }
    });
}
// ===================================================================================================

// FUNCION TRAER USUARIO CONCILIADORES ================================================================
function mostrarUsuarioConciliadorAsignado() {

    var idConciliador = $("#auxiliaresDisponibles option:selected").attr("idUsuarioConciliador");
        
    var jsonData = {
        "idConciliador": idConciliador
    }
    
    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
        method:"POST",
        url:"../backend/backend_mostrar_conciliador_asignado.php",
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
                var resultados = respuesta["objetoRespuesta"]["usuarioConciliador"];
                
                var idUsuarioConciliador = resultados["idUsuarioConciliador"];
                var nombres              = resultados["nombres"];
                var apellidos            = resultados["apellidos"];

                $(".conciliadorAuxiliar").val(nombres+" "+apellidos);
                closeMessageOverlay();
            }
        }
    });
}
// ===================================================================================================

// FUNCION ASIGNAR RATIFICACION AUXILIAR =============================================================
function asignarRatificacionUsuarioAuxiliar(){

    var ratificaciones = $("#ratificacionesSinAsignar option:selected").val();
    var auxiliares     = $("#auxiliaresDisponibles option:selected").val();

    if (ratificaciones == "-1") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("Selecciona la ratificación por asignar.");
        $("#msj").modal("toggle");
        return false;
    }

    if (auxiliares == "-1") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("Selecciona el auxiliar para asignar.");
        $("#msj").modal("toggle");
        return false;
    }

    var json_data = {
        "idUsuario": auxiliares,
        "idRatificacion": ratificaciones
    }

        console.log(json_data);

    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
        method:"POST",
        url:"../backend/backend_asignar_ratificacion_auxiliar.php",
        data:json_data,
        success:function(data){
            var respuesta = JSON.parse(data);

            if(respuesta["codigo"] == "fallo"){
                $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
                $(".textoMensaje").text(respuesta["mensaje"]);
                $("#msj").modal("toggle");
                closeMessageOverlay();
            }
            else if(respuesta["codigo"] == "exito"){
                $(".iconoMensaje").html("<i class='bx bx-check-circle bx-tada bx-lg' style='color:#0ea202' ></i>");
                $(".textoMensaje").text(respuesta["mensaje"]);
                $("#msjRec").modal("toggle");
                closeMessageOverlay();
            }
        }
    });
}
// ======================================================================================

// EVENTO READY ======================================================================================
$(document).ready(function () {
    mostrarRatificacionesSinAsignar();
});
// ===================================================================================================
</script>
<?php
require_once("../global/footer.php");
?>