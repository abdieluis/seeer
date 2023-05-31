<!-- Modal -->
<div class="modal fade" id="actualizarUsuarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">EDITAR USUARIOS SEEER</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <center><div class="col-md-12" style="font-weight: bold;">DATOS DEL USUARIO REGISTRADO</div></center>
                        <br><br>

                        <div class="col-md-6">
                            <label for='nroIdentificacionSolicitanteActualizarMovimiento' class='form-label'>Nombres del usuario</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bxs-edit-alt'></i></span>
                                <input type="text" class="form-control" aria-describedby="basic-addon1" name="nombresUsuarioActualizar" id="nombresUsuarioActualizar">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <label for='nroIdentificacionSolicitanteActualizarMovimiento' class='form-label'>Apellidos del usuario</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bxs-edit-alt'></i></span>
                                <input type="text" class="form-control" aria-describedby="basic-addon1" name="apellidosUsuarioActualizar" id="apellidosUsuarioActualizar">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for='nroIdentificacionSolicitanteActualizarMovimiento' class='form-label'>Usuario</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-user-circle'></i></span>
                                <input type="text" class="form-control" aria-describedby="basic-addon1" name="usuarioActualizar" id="usuarioActualizar">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for='nroIdentificacionSolicitanteActualizarMovimiento' class='form-label'>Tipo de usuario</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-id-card'></i></span>
                                <select class="form-select selectTipoUsuarioActualizar" id="tipoUsuarioActualizar"></select>
                            </div>
                        </div>

                        <div class="col-md-6 ms-auto">
                            <label for='nroIdentificacionSolicitanteActualizarMovimiento' class='form-label'>Ciudad usuario</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-map'></i></span>
                                <select class="form-select selectCiudadesActualizar" id="ciudadUsuarioActualizar"></select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="popupBtnCancelar btnCancelarUsuarioActualizar" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="popupBtnContinuar" onclick="actualizarDatosUsuario();">Continuar</button>
            </div>
        </div>
    </div>
</div>
<script>
// FUNCION ABRIR POPUP ========================================================
function abrirPopupActualizarUsuarios(idUsuario){
    mostrarTipoUsuarioActualizar();
    mostrarCiudadActualizar();

    idUsuarioSeeer = idUsuario;
    
    var json_data = {
        "idUsuario": idUsuarioSeeer
    }

    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
        method:"POST",
        url:"../backend/backend_mostrar_usuarios.php",
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
                var resultados = respuesta["objetoRespuesta"]["usuarioSeeer"];
                
                var nombres       = resultados["nombres"];
                var apellidos     = resultados["apellidos"];
                var usuario       = resultados["usuario"];
                var idTipoUsuario = resultados["idTipoUsuario"];
                var idCiudad      = resultados["idCiudad"];

                $("#nombresUsuarioActualizar").val(nombres);
                $("#apellidosUsuarioActualizar").val(apellidos);
                $("#usuarioActualizar").val(usuario);

                $("#tipoUsuarioActualizar option[value='"+idTipoUsuario+"'").attr("selected",true);
                $("#ciudadUsuarioActualizar option[value='"+idCiudad+"'").attr("selected",true);

                closeMessageOverlay();
            }
        }
    });
    $("#actualizarUsuarios").modal("toggle");
}
// ============================================================================

// FUNCION SELECT TIPO USUARIO ================================================
function mostrarTipoUsuarioActualizar(){
    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
        method:"POST",
        url:"../backend/backend_mostrar_usuario_categoria.php",
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
            var resultados = respuesta["objetoRespuesta"]["tipoUsuario"];


            var opcionesUsuarios = "<option value='-1'>Selecciona El Tipo De Usuario</option>";

            for (i = 0; i < resultados.length; i++) {
                var resultadosTotales = resultados[i];
                var idTipoUsuario = resultadosTotales["idTipoUsuario"];
                var tipoUsuario   = resultadosTotales["tipoUsuario"];

                opcionesUsuarios += "<option value='"+idTipoUsuario+"'>"+tipoUsuario+"</option>";
            }

            $(".selectTipoUsuarioActualizar").html(opcionesUsuarios);
            closeMessageOverlay();
        }
        }
    });
}
// ============================================================================

// FUNCION SELECT CIUDAD ======================================================
function mostrarCiudadActualizar(){
    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
        method:"POST",
        url:"../backend/backend_mostrar_ciudades.php",
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
            var resultados = respuesta["objetoRespuesta"]["ciudad"];


            var opcionesCiudad = "<option value='-1'>Selecciona La Ciudad</option>";

            for (i = 0; i < resultados.length; i++) {
                var resultadosTotales = resultados[i];
                var idCiudad = resultadosTotales["idCiudad"];
                var ciudad   = resultadosTotales["ciudad"];

                opcionesCiudad += "<option value='"+idCiudad+"'>"+ciudad+"</option>";
            }

            $(".selectCiudadesActualizar").html(opcionesCiudad);
            closeMessageOverlay();
        }
        }
    });
}
// ============================================================================

// FUNCION ACTUALIZAR USUARIO ================================================
function actualizarDatosUsuario(){

var nombresUsuario    = $("#nombresUsuarioActualizar").val();
var apellidosUsuario  = $("#apellidosUsuarioActualizar").val();
var usuario           = $("#usuarioActualizar").val();
var tipoUsuario       = $("#tipoUsuarioActualizar option:selected").val();
var ciudadUsuario     = $("#ciudadUsuarioActualizar option:selected").val();

var json_data = {
    "idUsuario":idUsuarioSeeer,
    "nombres": nombresUsuario,
    "apellidos": apellidosUsuario,
    "usuario": usuario,
    "tipo": tipoUsuario,
    "ciudad": ciudadUsuario
}

showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
$.ajax({
    method:"POST",
    url:"../backend/backend_editar_usuarios.php",
    data:json_data,
    success:function(data){
        var respuesta = JSON.parse(data);

        if(respuesta["codigo"] == "fallo"){
            $(".btnCancelarUsuarioActualizar").click();
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text(respuesta["mensaje"]);
            $("#msj").modal("toggle");
            closeMessageOverlay();
        }
        else if(respuesta["codigo"] == "exito"){
            $(".btnCancelarUsuarioActualizar").click();
            $(".iconoMensaje").html("<i class='bx bx-check-circle bx-tada bx-lg' style='color:#0ea202' ></i>");
            $(".textoMensaje").text(respuesta["mensaje"]);
            $("#msjRec").modal("toggle");
            closeMessageOverlay();
        }
    }
});
}
// ======================================================================================
</script>