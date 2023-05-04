<!-- Modal -->
<div class="modal fade" id="editarSolicitud" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg

  ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">EDITAR DATOS DE SOLICITUD</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row formEditarSolicitud"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="popupBtnCancelar btnCancelarSolicitudEditar" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="popupBtnContinuar" onclick="actualizarMovimientosSolicitante();">Continuar</button>
      </div>
    </div>
  </div>
</div>
<script>
  // FUNCION ABRIR POPUP ========================================================
  function abrirPopupEditarDatosSolicitud(idSolicitud){

    idSolicitudEditar = idSolicitud;
    
    var json_data = {
      "idSolicitud": idSolicitudEditar
    }

    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
      method:"POST",
      url:"../backend/backend_mostrar_solicitud_seleccionada.php",
      data:json_data,
      success:function(data){
        var respuesta = JSON.parse(data);
        console.log(respuesta);

        if(respuesta["codigo"] == "fallo"){
          $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
          $(".textoMensaje").text(respuesta["mensaje"]);
          $("#msj").modal("toggle");
          closeMessageOverlay();
        }
        else if(respuesta["codigo"] == "exito"){
          var resultados = respuesta["objetoRespuesta"]["solicitudSeleccionada"];

          // console.log(resultados);

          var apellidosSolicitante      = resultados["apellidosSolicitante"];
          var auxiliarAsignado          = resultados["auxiliarAsignado"];
          var edad                      = resultados["edad"];
          var eliminado                 = resultados["eliminado"];
          var fecha                     = resultados["fecha"];
          var generoSolicitante         = resultados["generoSolicitante"];
          var idSolicitud               = resultados["idSolicitud"];
          var idUsuarioSolicitante      = resultados["idUsuarioSolicitante"];
          var motivoSolicitud           = resultados["motivoSolicitud"];
          var nombreSolicitante         = resultados["nombreSolicitante"];
          var nroIdentificacionOficial  = resultados["nroIdentificacionOficial"];
          var observaciones             = resultados["observaciones"];

          var htmlFormularioSolicitudes =
          "<div class='col-md-6'>"+
            "<div class='input-group mb-3'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bxs-edit-alt'></i></span>"+
              "<input type='text' class='form-control' aria-describedby='basic-addon1' name='nombresSolicitanteActualizarMovimiento' id='nombresSolicitanteActualizarMovimiento' value='"+nombreSolicitante+"'>"+
            "</div>"+
          "</div>"+
          "<div class='col-md-6 ms-auto'>"+
            "<div class='input-group mb-3'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bxs-edit-alt'></i></span>"+
              "<input type='text' class='form-control' aria-describedby='basic-addon1' name='apellidosSolicitanteActualizarMovimiento' id='apellidosSolicitanteActualizarMovimiento' value='"+apellidosSolicitante+"'>"+
            "</div>"+
          "</div>"+

          "<div class='col-md-6'>"+
            "<div class='input-group mb-3'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bxs-user-check'></i></span>"+
              "<input type='text' class='form-control' placeholder='Auxiliar Asignado' aria-label='Auxiliar Asignado' aria-describedby='basic-addon1' name='auxiliarAsignadoActualizarMovimiento' id='auxiliarAsignadoActualizarMovimiento' value='"+auxiliarAsignado+"'>"+
            "</div>"+
          "</div>"+
          "<div class='col-md-6 ms-auto'>"+
            "<div class='input-group mb-3'>"+
              "<label class='input-group-text' for='generoSolicitanteActualizarMovimiento'><i class='bx bx-male-female'></i></label>"+
              "<select class='form-select' id='generoSolicitanteActualizarMovimiento'>"+
                "<option value='-1'>Genero</option>"+
                "<option value='Hombre'>Hombre</option>"+
                "<option value='Mujer'>Mujer</option>"+
              "</select>"+
            "</div>"+
          "</div>"+

          "<div class='col-md-6'>"+
            "<div class='input-group mb-3'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bx-id-card'></i></span>"+
              "<input type='text' class='form-control' aria-describedby='basic-addon1' name='nroIdentificacionSolicitanteActualizarMovimiento' id='nroIdentificacionSolicitanteActualizarMovimiento' value='"+nroIdentificacionOficial+"'>"+
            "</div>"+
          "</div>"+
          "<div class='col-md-6 ms-auto'>"+
            "<div class='input-group mb-3'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bx-user-circle'></i></span>"+
              "<input type='text' class='form-control' aria-describedby='basic-addon1' name='edadSolicitanteActualizarMovimiento' id='edadSolicitanteActualizarMovimiento' maxlength='3' onKeypress='return soloNumeros(event);' value='"+edad+"'>"+
            "</div>"+
          "</div>"+

          "<div class='col-md-12'>"+
            "<div class='input-group mb-3'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bx-message-rounded-error'></i></span>"+
              "<input type='text' class='form-control' placeholder='Motivo Solicitud' aria-label='Motivo Solicitud' aria-describedby='basic-addon1' name='motivoSolicitudActualizarMovimiento' id='motivoSolicitudActualizarMovimiento' value='"+motivoSolicitud+"'>"+
            "</div>"+
          "</div>"+

          "<div class='col-md-12'>"+
            "<div class='input-group mb-3'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bx-message-rounded-detail'></i></span>"+
              "<textarea class='form-control' name='observacionesActualizarMovimiento' id='observacionesActualizarMovimiento' placeholder='Observaciones' aria-label='Observaciones' rows='4'>"+observaciones+"</textarea>"+
            "</div>"+
          "</div>";

          $(".formEditarSolicitud").html(htmlFormularioSolicitudes);

          $("#generoSolicitanteActualizarMovimiento option[value='"+generoSolicitante+"'").attr("selected",true);

          closeMessageOverlay();
        }
      }
    });

    $("#editarSolicitud").modal("toggle");
  }
  // ============================================================================

  // FUNCION ACTUALIZAR DATOS SOLICITUD =========================================
  function actualizarMovimientosSolicitante(){

    var nombreUsuarioSolicitante     = $("#nombresSolicitanteActualizarMovimiento").val();
    var apellidosUsuarioSolicitante  = $("#apellidosSolicitanteActualizarMovimiento").val();
    var auxiliarAsignadoSolicitante  = $("#auxiliarAsignadoActualizarMovimiento").val();
    var generoSolicitante            = $("#generoSolicitanteActualizarMovimiento").val();
    var nroIdentificacionSolicitante = $("#nroIdentificacionSolicitanteActualizarMovimiento").val();
    var edadSolicitante              = $("#edadSolicitanteActualizarMovimiento").val();
    var motivoSolicitudSolicitante   = $("#motivoSolicitudActualizarMovimiento").val();
    var observacionesSolicitante     = $("#observacionesActualizarMovimiento").val();

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
      "idSolicitud": idSolicitudEditar,
      "nombreSolicitante": nombreUsuarioSolicitante,
      "apellidosSolicitante": apellidosUsuarioSolicitante,
      "auxiliarAsignado": auxiliarAsignadoSolicitante,
      "generoSolicitante": generoSolicitante,
      "nroIdentificacionOficial": nroIdentificacionSolicitante,
      "edadSolicitante": edadSolicitante,      
      "motivoSolicitud": motivoSolicitudSolicitante,
      "observaciones": observacionesSolicitante
    }

    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
      method:"POST",
      url:"../backend/backend_editar_solicitudes.php",
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

  // EVENTO READY ===============================================================
  $(document).ready(function () {
    idSolicitudEditar = "";
  });
  // ============================================================================
</script>
<?php
require_once("../global/footer.php");
?>