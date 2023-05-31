<!-- Modal -->
<div class="modal fade" id="altaUsuarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">ALTA DE USUARIOS A SEEER</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <center><div class="col-md-12" style="font-weight: bold;">DATOS DEL USUARIO</div></center>
                        <br><br>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bxs-edit-alt'></i></span>
                                <input type="text" class="form-control" placeholder="Nombres del Usuario" aria-label="Nombres del Usuario" aria-describedby="basic-addon1" name="nombresUsuarioAlta" id="nombresUsuarioAlta">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bxs-edit-alt'></i></span>
                                <input type="text" class="form-control" placeholder="Apellidos del Usuario" aria-label="Apellidos del Usuario" aria-describedby="basic-addon1" name="apellidosUsuarioAlta" id="apellidosUsuarioAlta">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-user-circle'></i></span>
                                <input type="text" class="form-control" placeholder="Usuario" aria-label="Usuario" aria-describedby="basic-addon1" name="usuarioAlta" id="usuarioAlta">
                            </div>
                        </div>

                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bxs-lock'></i></span>
                                <input type="password" class="form-control" placeholder="Contraseña" aria-label="Contraseña" aria-describedby="basic-addon1" name="contrasenaUsuarioAlta" id="contrasenaUsuarioAlta">
                                <span class="input-group-text" id="basic-addon1" onclick="ocultarMostrarContrasena();" style="cursor: pointer;"><i class='bx bx-hide icon'></i></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-map'></i></span>
                                <select class="form-select selectCiudades" id="ciudadUsuarioAlta" onchange="cambiarCiudadUsuario();"></select>
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-id-card'></i></span>
                                <select class="form-select selectTiopoUsuario" id="tipoUsuarioAlta" onchange="mostrarConciliador(this);"></select>
                            </div>
                        </div>
                        <div class="col-md-6 selectConciliador"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="popupBtnCancelar btnCancelarUsuario" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="popupBtnContinuar" onclick="altaUsuario();">Continuar</button>
            </div>
        </div>
    </div>
</div>
<script>
// FUNCION ABRIR POPUP ========================================================
function abrirPopupAltaUsuarios(){

    mostrarTipoUsuario();
    mostrarCiudad();
    $("#altaUsuarios").modal("toggle");
}
// ============================================================================

// FUNCION OULTAR Y MOSTRAR CONTRASEÑA ========================================
function ocultarMostrarContrasena(){
    var cambio = document.getElementById("contrasenaUsuarioAlta");
    if(cambio.type == "password"){
        cambio.type = "text";
        $('.icon').removeClass('bx bx-hide').addClass('bx bx-show');
    }else{
        cambio.type = "password";
        $('.icon').removeClass('bx bx-show').addClass('bx bx-hide');
    }
}
// ============================================================================

// FUNCION CAMBIAR LA CIUDAD ==================================================
function cambiarCiudadUsuario(){
    $(".selectConciliador").html("");
    $("#tipoUsuarioAlta").val("-1");
}
// ============================================================================

// FUNCION SELECT TIPO USUARIO ================================================
function mostrarTipoUsuario(){
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

                $(".selectTiopoUsuario").html(opcionesUsuarios);
                closeMessageOverlay();
            }
        }
    });
}
// ============================================================================

// FUNCION MOSTRAR CONCILIDOR =================================================
function mostrarConciliador(e){
    var tipoUsurio = $(e).val();
    var idCiudadSeleccionado = $("#ciudadUsuarioAlta option:selected").val();

    if (idCiudadSeleccionado == "-1") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("Selecciona la ciudad del usuario que vas a dar de alta.");
        $("#msj").modal("toggle");
        $("#tipoUsuarioAlta").val("-1");
        return false;
    }

    var jsonData = {
        "idCiudad": idCiudadSeleccionado
    }
    
    if (tipoUsurio == 3) {
        showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
        $.ajax({
            method:"POST",
            url:"../backend/backend_mostrar_usuario_conciliador.php",
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
                    console.log(resultados);

                    var opcionesUsuariosCpnciliador = "<option value='-1'>Selecciona El Conciliador del Auxiliar</option>";

                    for (i = 0; i < resultados.length; i++) {
                        var resultadosTotales = resultados[i];
                        var idUsuarioConciliador = resultadosTotales["idUsuarioConciliador"];
                        var nombres              = resultadosTotales["nombres"];
                        var apellidos            = resultadosTotales["apellidos"];
                        
                        opcionesUsuariosCpnciliador += "<option value='"+idUsuarioConciliador+"'>"+nombres+" "+apellidos+"</option>";

                        var htmlSelectConciliadores =
                        "<div class='input-group mb-3'>"+
                            "<span class='input-group-text' id='basic-addon1'><i class='bx bx-id-card'></i></span>"+
                            "<select class='form-select' id='usuarioConciliadorAlta'>"+opcionesUsuariosCpnciliador+"</select>"+
                        "</div>";
                        $(".selectConciliador").html(htmlSelectConciliadores);
                    }
                    closeMessageOverlay();
                }
            }
        });
    }
}
// ============================================================================

// FUNCION SELECT CIUDAD ======================================================
function mostrarCiudad(){
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

                $(".selectCiudades").html(opcionesCiudad);
                closeMessageOverlay();
            }
        }
    });
}
// ============================================================================

// FUNCION DAR DE ALTA USUARIO ================================================
function altaUsuario(){

    var nombresUsuario    = $("#nombresUsuarioAlta").val();
    var apellidosUsuario  = $("#apellidosUsuarioAlta").val();
    var usuario           = $("#usuarioAlta").val();
    var contrasenaUsuario = $("#contrasenaUsuarioAlta").val();
    var tipoUsuario       = $("#tipoUsuarioAlta").val();
    var ciudadUsuario     = $("#ciudadUsuarioAlta").val();
    var conciliador       = $("#usuarioConciliadorAlta").val();

    if (nombresUsuario == "") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("Nombre no puede ir vacío.");
        $("#msj").modal("toggle");
        return false;
    }

    if (apellidosUsuario == "") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("Apellidos no puede ir vacío.");
        $("#msj").modal("toggle");
    return false;
    }

    if (usuario == "") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("Usuario no puede ir vacío.");
        $("#msj").modal("toggle");
    return false;
    }

    if (contrasenaUsuario == "") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("La contraseña no puede ir vacío.");
        $("#msj").modal("toggle");
        return false;
    }

    if (tipoUsuario == "-1") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("Selecciona un tipo de usuario.");
        $("#msj").modal("toggle");
        return false;
    }

    if (ciudadUsuario == "-1") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("Selecciona la ciudad del usuario.");
        $("#msj").modal("toggle");
        return false;
    }

    if (tipoUsuario == 3) {
        if (conciliador == "-1") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Selecciona el conciliador del usuario auxiliar.");
            $("#msj").modal("toggle");
            return false;
        }

        var json_data = {
            "nombres": nombresUsuario,
            "apellidos": apellidosUsuario,
            "usuario": usuario,
            "password": calcMD5(contrasenaUsuario),
            "tipo": tipoUsuario,
            "ciudad": ciudadUsuario,
            "idUsuarioConciliador": conciliador
        }

        
    }
    else {
        var json_data = {
            "nombres": nombresUsuario,
            "apellidos": apellidosUsuario,
            "usuario": usuario,
            "password": calcMD5(contrasenaUsuario),
            "tipo": tipoUsuario,
            "ciudad": ciudadUsuario
        }
    }

    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
        method:"POST",
        url:"../backend/backend_registrar_usuario.php",
        data:json_data,
        success:function(data){
            var respuesta = JSON.parse(data);

            if(respuesta["codigo"] == "fallo"){
                $(".btnCancelarUsuario").click();
                $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
                $(".textoMensaje").text(respuesta["mensaje"]);
                $("#msj").modal("toggle");
                closeMessageOverlay();
            }
            else if(respuesta["codigo"] == "exito"){
                $(".btnCancelarUsuario").click();
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