<!-- Modal -->
<div class="modal fade" id="registroMovimientoSolicitante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg

  ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">REGISTRO MOVIMIENTO SOLICITANTE</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <center>
              <div class="col-md-5">
                <div class="input-group mb-3">
                  <label class="input-group-text" for="selectMovimiento"><i class='bx bx-collection'></i></label>
                  <select class="form-select" id="selectMovimiento" onchange="mostrarFormularioSolicitud();">
                    <option value="-1">Selecciona Movimiento</option>
                    <option value="0">Solicitud</option>
                    <option value="1">Audiencia</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-group mb-3 fechaSolicitud"></div>
              </div>
            </center>
          </div>
        </div>
        <br><br>
        <div class="container-fluid">
          <div class="row formsMovimientosSolicitante"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="popupBtnCancelar btnCancelarSolicitanteMovimientos" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="popupBtnContinuar" onclick="altaMovimientosSolicitante();">Continuar</button>
      </div>
    </div>
  </div>
</div>
<script>
  // FUNCION LIMPIAR FORMULARIOS ================================================
  function limpiarCampos() {
    $(".formsMovimientosSolicitante").html("");
    $("#selectMovimiento").val("-1");
  }
  // ============================================================================

  // FUNCION MOSTRAR FORMULARIO SOLICITUD =======================================
  function mostrarFormularioSolicitud(){

    var movimiento = $("#selectMovimiento option:selected").val();

    var json_data = {
      "idUsuarioSolicitante": idUsuarioSolicitanteGlobal,
    }

    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
      method:"POST",
      url:"../backend/backend_mostrar_datos_solicitante_movimientos.php",
      data:json_data,
      success:function(data){
        var respuesta = JSON.parse(data);

        if(respuesta["codigo"] == "fallo"){
          $(".btnCancelarSolicitanteMovimientos").click();
          $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
          $(".textoMensaje").text(respuesta["mensaje"]);
          $("#msj").modal("toggle");
          closeMessageOverlay();
        }
        else if(respuesta["codigo"] == "exito"){
          var resultados = respuesta["objetoRespuesta"]["solicitante"];

          var idUsuarioSolicitante                = resultados["idUsuarioSolicitante"];
          var apellidosSolicitante                = resultados["apellidos"];
          var ciudadSolicitante                   = resultados["ciudad"];
          var edadSolicitante                     = resultados["edad"];
          var generoSolicitante                   = resultados["genero"];
          var nombresSolicitante                  = resultados["nombres"];
          var nroIdentificacionOficialSolicitante = resultados["nroIdentificacionOficial"];
          var telefonoSolicitante                 = resultados["telefono"];
          var eliminadoSolicitante                = resultados["eliminado"];

          if (movimiento == 0) {
            $(".formsMovimientosSolicitante").html("");
            $("#selectFechaSolicitud").val("-1");
            $(".fechaSolicitud").html("");

            var htmlFormularioSolicitudes =
            "<div class='col-md-6'>"+
              "<div class='input-group mb-3'>"+
                "<span class='input-group-text' id='basic-addon1'><i class='bx bxs-edit-alt'></i></span>"+
                "<input type='text' class='form-control' aria-describedby='basic-addon1' name='nombresSolicitanteRegistroMovimiento' id='nombresSolicitanteRegistroMovimiento' value='"+nombresSolicitante+"'>"+
              "</div>"+
            "</div>"+
            "<div class='col-md-6 ms-auto'>"+
              "<div class='input-group mb-3'>"+
                "<span class='input-group-text' id='basic-addon1'><i class='bx bxs-edit-alt'></i></span>"+
                "<input type='text' class='form-control' aria-describedby='basic-addon1' name='apellidosSolicitanteRegistroMovimiento' id='apellidosSolicitanteRegistroMovimiento' value='"+apellidosSolicitante+"'>"+
              "</div>"+
            "</div>"+

            "<div class='col-md-6'>"+
              "<div class='input-group mb-3'>"+
                "<label class='input-group-text' for='auxiliarAsignadoRegistroMovimiento'><i class='bx bx-map'></i></label>"+
                "<select class='form-select opcionesAuxiliarMovimientos' id='auxiliarAsignadoRegistroMovimiento'></select>"+
              "</div>"+
            "</div>"+
            "<div class='col-md-6 ms-auto'>"+
              "<div class='input-group mb-3'>"+
                "<label class='input-group-text' for='generoSolicitanteRegistroMovimiento'><i class='bx bx-male-female'></i></label>"+
                "<select class='form-select' id='generoSolicitanteRegistroMovimiento'>"+
                  "<option value='-1'>Genero</option>"+
                  "<option value='Hombre'>Hombre</option>"+
                  "<option value='Mujer'>Mujer</option>"+
                "</select>"+
              "</div>"+
            "</div>"+

            "<div class='col-md-6'>"+
              "<div class='input-group mb-3'>"+
                "<span class='input-group-text' id='basic-addon1'><i class='bx bx-id-card'></i></span>"+
                "<input type='text' class='form-control' aria-describedby='basic-addon1' name='nroIdentificacionSolicitanteRegistroMovimiento' id='nroIdentificacionSolicitanteRegistroMovimiento' value='"+nroIdentificacionOficialSolicitante+"'>"+
              "</div>"+
            "</div>"+
            "<div class='col-md-6 ms-auto'>"+
              "<div class='input-group mb-3'>"+
                "<span class='input-group-text' id='basic-addon1'><i class='bx bx-user-circle'></i></span>"+
                "<input type='text' class='form-control' aria-describedby='basic-addon1' name='edadSolicitanteRegistroMovimiento' id='edadSolicitanteRegistroMovimiento' maxlength='3' onKeypress='return soloNumeros(event);' value='"+edadSolicitante+"'>"+
              "</div>"+
            "</div>"+

            "<div class='col-md-12'>"+
              "<div class='input-group mb-3'>"+
                "<span class='input-group-text' id='basic-addon1'><i class='bx bx-message-rounded-error'></i></span>"+
                "<input type='text' class='form-control' placeholder='Motivo Solicitud' aria-label='Motivo Solicitud' aria-describedby='basic-addon1' name='motivoSolicitudRegistroMovimiento' id='motivoSolicitudRegistroMovimiento'>"+
              "</div>"+
            "</div>"+

            "<div class='col-md-12'>"+
              "<div class='input-group mb-3'>"+
                "<span class='input-group-text' id='basic-addon1'><i class='bx bx-message-rounded-detail'></i></span>"+
                "<textarea class='form-control' name='observacionesRegistroMovimiento' id='observacionesRegistroMovimiento' placeholder='Observaciones' aria-label='Observaciones' rows='4'></textarea>"+
              "</div>"+
            "</div>";

            $(".formsMovimientosSolicitante").html(htmlFormularioSolicitudes);

            $("#generoSolicitanteRegistroMovimiento option[value='"+generoSolicitante+"'").attr("selected",true);
            mostrarUsuarioAuxiliar();
          }
          else if (movimiento == 1) {
            $(".formsMovimientosSolicitante").html("");

            console.log(idUsuarioSolicitanteGlobal);

            var json_data = {
              "idUsuarioSolicitante": idUsuarioSolicitanteGlobal
            }

            showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
            $.ajax({
              method:"POST",
              url:"../backend/backend_mostrar_solicitudes.php",
              data:json_data,
              success:function(data){
                var respuesta = JSON.parse(data);

                if(respuesta["codigo"] == "fallo"){
                  $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
                  $(".textoMensaje").text(respuesta["mensaje"]);
                  $("#msj").modal("toggle");
                  closeMessageOverlay();
                }
                else if(respuesta["codigo"] == ""){
                  var resultados = respuesta["objetoRespuesta"]["solicitudes"];


                  var opcionesFechaSolicitud = "<option value='-1'>Seleccione la fecha de la solicitud</option>";

                  for (i = 0; i < resultados.length; i++) {
                      var resultadosTotales   = resultados[i];
                      var idSolicitud         = resultadosTotales["idSolicitud"];
                      var nombreSolicitante   = resultadosTotales["nombreSolicitante"];
                      var apellidoSolicitante = resultadosTotales["apellidoSolicitante"];
                      var fechaSolicitud      = resultadosTotales["fecha"];

                      opcionesFechaSolicitud += "<option value='"+idSolicitud+"' fecha='"+fechaSolicitud+"'>"+fechaSolicitud+"</option>";
                  }

                  var htmlSelectFechaSolicitud =

                  "<label class='input-group-text' for='selectMovimiento'><i class='bx bx-calendar-star'></i></label>"+
                  "<select class='form-select' id='selectFechaSolicitud'>"+opcionesFechaSolicitud+"</select>";

                  $(".fechaSolicitud").html(htmlSelectFechaSolicitud);

                  $('#selectFechaSolicitud').on('change', function() {
                    var idSolicitud = this.value;

                    var json_data = {
                      "idSolicitud": idSolicitud
                    }

                    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
                    $.ajax({
                      method:"POST",
                      url:"../backend/backend_mostrar_solicitud_seleccionada.php",
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
                          var resultados = respuesta["objetoRespuesta"]["solicitudSeleccionada"];

                          var htmlFormularioAudiencia =

                          "<div class='col-md-6'>"+
                            "<label for='fechaAudienciaRegistroMovimiento' class='form-label'>Fecha de Audiencia</label>"+
                            "<div class='input-group mb-3'>"+
                              "<span class='input-group-text' id='basic-addon1'><i class='bx bx-calendar-star'></i></span>"+
                              "<input type='date' class='form-control' aria-describedby='basic-addon1' name='fechaAudienciaRegistroMovimiento' id='fechaAudienciaRegistroMovimiento'>"+
                            "</div>"+
                          "</div>"+
                          "<div class='col-md-6 ms-auto'>"+
                          "<label for='horarioAudienciaRegistroMovimiento' class='form-label'>Horario de Audiencia</label>"+
                            "<div class='input-group mb-3'>"+
                              "<span class='input-group-text' id='basic-addon1'><i class='bx bx-alarm-exclamation'></i></span>"+
                              "<input type='time' class='form-control' aria-describedby='basic-addon1' name='horarioAudienciaRegistroMovimiento' id='horarioAudienciaRegistroMovimiento'>"+
                            "</div>"+
                          "</div>"+

                          "<div class='col-md-6'>"+
                            "<div class='input-group mb-3'>"+
                              "<span class='input-group-text' id='basic-addon1'><i class='bx bxs-edit-alt'></i></span>"+
                              "<input type='text' class='form-control' aria-describedby='basic-addon1' name='nombresSolicitanteAudienciaRegistroMovimiento' id='nombresSolicitanteAudienciaRegistroMovimiento' value='"+nombresSolicitante+"'>"+
                            "</div>"+
                          "</div>"+
                          "<div class='col-md-6 ms-auto'>"+
                            "<div class='input-group mb-3'>"+
                              "<span class='input-group-text' id='basic-addon1'><i class='bx bxs-edit-alt'></i></span>"+
                              "<input type='text' class='form-control' aria-describedby='basic-addon1' name='apellidosSolicitanteAudienciaRegistroMovimiento' id='apellidosSolicitanteAudienciaRegistroMovimiento' value='"+apellidosSolicitante+"'>"+
                            "</div>"+
                          "</div>"+

                          "<div class='col-md-6'>"+
                            "<div class='input-group mb-3'>"+
                              "<span class='input-group-text' id='basic-addon1'><i class='bx bxs-user-check'></i></span>"+
                              "<input type='text' class='form-control' placeholder='Nombre Citado' aria-label='Nombre Citado' aria-describedby='basic-addon1' name='nombreCitadoAudienciaRegistroMovimiento' id='nombreCitadoAudienciaRegistroMovimiento'>"+
                            "</div>"+
                          "</div>"+
                          "<div class='col-md-6 ms-auto'>"+
                            "<div class='input-group mb-3 ms-auto'>"+
                              "<span class='input-group-text' id='basic-addon1'><i class='bx bxs-user-check'></i></span>"+
                              "<input type='text' class='form-control' placeholder='Auxiliar Asignado' aria-label='Auxiliar Asignado' aria-describedby='basic-addon1' name='conciliadorAsignadoAudienciaRegistroMovimiento' id='conciliadorAsignadoAudienciaRegistroMovimiento'>"+
                            "</div>"+
                          "</div>"+

                          "<div class='col-md-12'>"+
                            "<div class='input-group mb-3'>"+
                              "<span class='input-group-text' id='basic-addon1'><i class='bx bx-message-rounded-detail'></i></span>"+
                              "<textarea class='form-control' name='observacionesAudienciaRegistroMovimiento' id='observacionesAudienciaRegistroMovimiento' placeholder='Observaciones' aria-label='Observaciones' rows='4'></textarea>"+
                            "</div>"+
                          "</div>";

                          $(".formsMovimientosSolicitante").html(htmlFormularioAudiencia);

                          closeMessageOverlay();
                        }
                      }
                    });
                  });

                  closeMessageOverlay();
                }
              }
            });
          }
          // else if (movimiento == 2) {

          //   $(".formsMovimientosSolicitante").html("");
          //   $("#selectFechaSolicitud").val("-1");
          //   $(".fechaSolicitud").html("");
          // }


          closeMessageOverlay();
        }
      }
    });
  }
  // ============================================================================

  // FUNCION ABRIR POPUP ========================================================
  function abrirPopupRegistroMovimientoSolicitante(idUsuarioSolicitante){
    idUsuarioSolicitanteGlobal = idUsuarioSolicitante;
    $(".formsMovimientosSolicitante").html("");
    $("#selectMovimiento").val("-1");
    $("#selectFechaSolicitud").val("-1");
    $(".fechaSolicitud").html("");
    $("#registroMovimientoSolicitante").modal("toggle");
  }
  // ============================================================================

  // FUNCION ABRIR POPUP ========================================================
  function mostrarUsuarioAuxiliar(){

    var jsonData = {
      "idCiudad": idCiudadSesion
    }

    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
    method:"POST",
    url:"../backend/backend_mostrar_usuario_auxiliar.php",
    data: jsonData,
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

                var opcionesAuxiliar = "<option value='-1'>Usuario Auxiliar</option>";

                for (i = 0; i < resultados.length; i++) {
                    var resultadosTotales = resultados[i];
                    var idUsuarioAuxiliar = resultadosTotales["idUsuarioAuxiliar"];
                    var nombres           = resultadosTotales["nombres"];
                    var apellidos         = resultadosTotales["apellidos"];

                    opcionesAuxiliar += "<option value='"+idUsuarioAuxiliar+"'>"+nombres+" "+apellidos+"</option>";
                }

                $(".opcionesAuxiliarMovimientos").html(opcionesAuxiliar);

                closeMessageOverlay();
            }
        }
    });
  }
  // ============================================================================


  // FUNCION MOVIMIENTOS SOLICITANTES ===========================================
  function altaMovimientosSolicitante() {
    var selectMovimiento = $("#selectMovimiento option:selected").val();

    if (selectMovimiento == 0) {

      var nombreUsuarioSolicitante     = $("#nombresSolicitanteRegistroMovimiento").val();
      var apellidosUsuarioSolicitante  = $("#apellidosSolicitanteRegistroMovimiento").val();
      var auxiliarAsignadoSolicitante  = $("#auxiliarAsignadoRegistroMovimiento").val();
      var generoSolicitante            = $("#generoSolicitanteRegistroMovimiento").val();
      var nroIdentificacionSolicitante = $("#nroIdentificacionSolicitanteRegistroMovimiento").val();
      var edadSolicitante              = $("#edadSolicitanteRegistroMovimiento").val();
      var motivoSolicitudSolicitante   = $("#motivoSolicitudRegistroMovimiento").val();
      var observacionesSolicitante     = $("#observacionesRegistroMovimiento").val();

      if (nombreUsuarioSolicitante == "") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("Nombre no puede ir vacío.");
        $("#msj").modal("toggle");
        return false;
      }

      if (apellidosUsuarioSolicitante == "") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("Apellidos no puede ir vacío.");
        $("#msj").modal("toggle");
        return false;
      }

      if (auxiliarAsignadoSolicitante == "") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("Auxiliar Asignado no puede ir vacío.");
        $("#msj").modal("toggle");
        return false;
      }

      if (generoSolicitante == "-1") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("Genero no puede ir vacío.");
        $("#msj").modal("toggle");
        return false;
      }

      if (nroIdentificacionSolicitante == "") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("Numero de Identificacion Oficial no puede ir vacío.");
        $("#msj").modal("toggle");
        return false;
      }

      if (edadSolicitante == "") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("Edad no puede ir vacío.");
        $("#msj").modal("toggle");
        return false;
      }

      if (motivoSolicitudSolicitante == "") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("Motivo de la Solicitud no puede ir vacío.");
        $("#msj").modal("toggle");
        return false;
      }

      var json_data = {
        "idUsuarioSolicitante": idUsuarioSolicitanteGlobal,
        "idUsuario": idUsuarioSesion,
        "selectMotivo": selectMovimiento,
        "nombreSolicitante": nombreUsuarioSolicitante,
        "apellidosSolicitante": apellidosUsuarioSolicitante,
        "auxiliarAsignado": auxiliarAsignadoSolicitante,
        "generoSolicitante": generoSolicitante,
        "nroIdentificacionOficial": nroIdentificacionSolicitante,
        "edadSolicitante": edadSolicitante,      
        "motivoSolicitud": motivoSolicitudSolicitante,
        "observaciones": observacionesSolicitante
        
      }

    }
    else if (selectMovimiento == 1) {
      var fechaSolicitudAudiencia       = $("#selectFechaSolicitud option:selected").attr("fecha");
      var fechaAudiencia                = $("#fechaAudienciaRegistroMovimiento").val();
      var horarioAudiencia              = $("#horarioAudienciaRegistroMovimiento").val();
      var nombreSolicitanteAudiencia    = $("#nombresSolicitanteAudienciaRegistroMovimiento").val();
      var apellidosSolicitanteAudiencia = $("#apellidosSolicitanteAudienciaRegistroMovimiento").val();
      var nombreCitadoAudiencia         = $("#nombreCitadoAudienciaRegistroMovimiento").val();
      var conciliadorAsignadoAudiencia  = $("#conciliadorAsignadoAudienciaRegistroMovimiento").val();
      var observacionesAudiencia        = $("#observacionesAudienciaRegistroMovimiento").val();

      var fechaSolicitudAudienciaSeleccionado = $("#selectFechaSolicitud option:selected").val();

      if (fechaSolicitudAudienciaSeleccionado == "-1") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("Selecciona una fecha de solicitud.");
        $("#msj").modal("toggle");
        return false;
      }

      if (fechaAudiencia == "") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("Selecciona una fecha para la audiencia.");
        $("#msj").modal("toggle");
        return false;
      }

      if (horarioAudiencia == "") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("Selecciona un horario para la audiencia.");
        $("#msj").modal("toggle");
        return false;
      }

      if (nombreSolicitanteAudiencia == "") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("El nombre del solicitante no puede ir vacío.");
        $("#msj").modal("toggle");
        return false;
      }

      if (apellidosSolicitanteAudiencia == "") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("Los apellidos del solicitante no puede ir vacío.");
        $("#msj").modal("toggle");
        return false;
      }

      if (nombreCitadoAudiencia == "") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("Escribe el nombre completo del citado, no puede ir vacío.");
        $("#msj").modal("toggle");
        return false;
      }

      if (conciliadorAsignadoAudiencia == "") {
        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        $(".textoMensaje").text("Escribe el nombre del conciliador asignado, no puede ir vacío.");
        $("#msj").modal("toggle");
        return false;
      }

      var json_data = {
        "idUsuarioSolicitante": idUsuarioSolicitanteGlobal,
        "idUsuario": idUsuarioSesion,
        "selectMotivo": selectMovimiento,
        "fechaSolicitudAudiencia": fechaSolicitudAudiencia,
        "fechaAudiencia": fechaAudiencia,
        "horarioAudiencia": horarioAudiencia,
        "nombreSolicitanteAudiencia": nombreSolicitanteAudiencia,
        "apellidosSolicitanteAudiencia": apellidosSolicitanteAudiencia,
        "nombreCitadoAudiencia": nombreCitadoAudiencia,      
        "conciliadorAsignadoAudiencia": conciliadorAsignadoAudiencia,
        "observacionesAudiencia": observacionesAudiencia
      }
    }
    else if (selectMovimiento == 2) {

    }

    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
      method:"POST",
      url:"../backend/backend_registrar_movimiento_solicitante.php",
      data:json_data,
      success:function(data){
        var respuesta = JSON.parse(data);

        if(respuesta["codigo"] == "fallo"){
          $(".btnCancelarSolicitanteMovimientos").click();
          $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
          $(".textoMensaje").text(respuesta["mensaje"]);
          $("#msj").modal("toggle");
          limpiarCampos();
          closeMessageOverlay();
        }
        else if(respuesta["codigo"] == "exito"){
          limpiarCampos();
          $(".btnCancelarSolicitanteMovimientos").click();
          $(".iconoMensaje").html("<i class='bx bx-check-circle bx-tada bx-lg' style='color:#0ea202' ></i>");
          $(".textoMensaje").text(respuesta["mensaje"]);
          $("#msj").modal("toggle");
          closeMessageOverlay();
        }
      }
    });
  }
  // ============================================================================
</script>
