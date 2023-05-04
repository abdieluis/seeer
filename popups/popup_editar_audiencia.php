<!-- Modal -->
<div class="modal fade" id="editarAudiencia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">EDITAR DATOS DE LA AUDIENCIA</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row formEditarAudiencia"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="popupBtnCancelar btnCancelarAudienciaEditar" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="popupBtnContinuar" onclick="actualizarAudienciaSolicitante();">Continuar</button>
      </div>
    </div>
  </div>
</div>
<script>
  // FUNCION ABRIR POPUP ========================================================
  function abrirPopupEditarDatosAudiencia(idAudiencia){

    idAudienciaEditar = idAudiencia;
    
    var json_data = {
      "idAudiencia": idAudienciaEditar
    }

    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
      method:"POST",
      url:"../backend/backend_mostrar_audiencia_seleccionada.php",
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
          var resultados = respuesta["objetoRespuesta"]["audienciaSeleccionada"];

          console.log(resultados);

          var apellidosSolicitante = resultados["apellidosSolicitante"];
          var conciliadorAsignado  = resultados["conciliadorAsignado"];
          var eliminado            = resultados["eliminado"];
          var fechaAudiencia       = resultados["fechaAudiencia"];
          var fechaSolicitud       = resultados["fechaSolicitud"];
          var horarioAudiencia     = resultados["horarioAudiencia"];
          var idAudiencia          = resultados["idAudiencia"];
          var idUsuarioSolicitante = resultados["idUsuarioSolicitante"];
          var nombreCitado         = resultados["nombreCitado"];
          var nombreSolicitante    = resultados["nombreSolicitante"];
          var observaciones        = resultados["observaciones"];

          var htmlFormularioAudiencias =
          "<div class='col-md-6'>"+
            "<label for='fechaSolicitudActualizarMovimiento' class='form-label'>Fecha de Solicitud</label>"+
            "<div class='input-group mb-3'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bx-calendar-star'></i></span>"+
              "<input type='date' class='form-control' aria-describedby='basic-addon1' name='fechaSolicitudActualizarMovimiento' id='fechaSolicitudActualizarMovimiento' value='"+fechaSolicitud+"'>"+
            "</div>"+
          "</div>"+
          "<div class='col-md-6 ms-auto'>"+
            "<label for='fechaAudienciaActualizarMovimiento' class='form-label'>Fecha de Audiencia</label>"+
            "<div class='input-group mb-3'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bx-calendar-star'></i></span>"+
              "<input type='date' class='form-control' aria-describedby='basic-addon1' name='fechaAudienciaActualizarMovimiento' id='fechaAudienciaActualizarMovimiento' value='"+fechaAudiencia+"'>"+
            "</div>"+
          "</div>"+
          "<div class='col-md-6'>"+
            "<label for='horarioAudienciaActualizarMovimiento' class='form-label'>Horario de Audiencia</label>"+
            "<div class='input-group mb-3'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bx-alarm-exclamation'></i></span>"+
              "<input type='time' class='form-control' aria-describedby='basic-addon1' name='horarioAudienciaActualizarMovimiento' id='horarioAudienciaActualizarMovimiento' value='"+horarioAudiencia+"'>"+
            "</div>"+
          "</div>"+

          "<div class='col-md-6 ms-auto'>"+
            "<label for='nombresSolicitanteAudienciaActualizarMovimiento' class='form-label'>Nombre Solicitante</label>"+
            "<div class='input-group mb-3'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bxs-edit-alt'></i></span>"+
              "<input type='text' class='form-control' aria-describedby='basic-addon1' name='nombresSolicitanteAudienciaActualizarMovimiento' id='nombresSolicitanteAudienciaActualizarMovimiento' value='"+nombreSolicitante+"'>"+
            "</div>"+
          "</div>"+
          "<div class='col-md-6'>"+
            "<label for='apellidosSolicitanteAudienciaActualizarMovimiento' class='form-label'>Apellidos Solicitante</label>"+
            "<div class='input-group mb-3'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bxs-edit-alt'></i></span>"+
              "<input type='text' class='form-control' aria-describedby='basic-addon1' name='apellidosSolicitanteAudienciaActualizarMovimiento' id='apellidosSolicitanteAudienciaActualizarMovimiento' value='"+apellidosSolicitante+"'>"+
            "</div>"+
          "</div>"+

          "<div class='col-md-6 ms-auto'>"+
            "<label for='nombreCitadoAudienciaActualizarMovimiento' class='form-label'>Nombres del citado</label>"+
            "<div class='input-group mb-3'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bxs-user-check'></i></span>"+
              "<input type='text' class='form-control' aria-label='Nombre Citado' aria-describedby='basic-addon1' name='nombreCitadoAudienciaActualizarMovimiento' id='nombreCitadoAudienciaActualizarMovimiento' value='"+nombreCitado+"'>"+
            "</div>"+
          "</div>"+
          "<div class='col-md-6'>"+
            "<label for='conciliadorAsignadoAudienciaActualizarMovimiento' class='form-label'>Conciliador asignado</label>"+
            "<div class='input-group mb-3 ms-auto'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bxs-user-check'></i></span>"+
              "<input type='text' class='form-control' aria-label='Auxiliar Asignado' aria-describedby='basic-addon1' name='conciliadorAsignadoAudienciaActualizarMovimiento' id='conciliadorAsignadoAudienciaActualizarMovimiento' value='"+conciliadorAsignado+"'>"+
            "</div>"+
          "</div>"+

          "<div class='col-md-12'>"+
            "<label for='observacionesAudienciaActualizarMovimiento' class='form-label'>Observaciones</label>"+
            "<div class='input-group mb-3'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bx-message-rounded-detail'></i></span>"+
              "<textarea class='form-control' name='observacionesAudienciaActualizarMovimiento' id='observacionesAudienciaActualizarMovimiento' aria-label='Observaciones' rows='4'>"+observaciones+"</textarea>"+
            "</div>"+
          "</div>";
          $(".formEditarAudiencia").html(htmlFormularioAudiencias);

          closeMessageOverlay();
        }
      }
    });

    $("#editarAudiencia").modal("toggle");
  }
  // ============================================================================

  // FUNCION ACTUALIZAR DATOS AUDIENCIA =========================================
  function actualizarAudienciaSolicitante(){

    var fechaSolicitudMovimiento         = $("#fechaSolicitudActualizarMovimiento").val();
    var fechaAudienciaMovimiento         = $("#fechaAudienciaActualizarMovimiento").val();
    var horarioAudienciaMovimiento       = $("#horarioAudienciaActualizarMovimiento").val();
    var nombreSolicitanteMovimiento      = $("#nombresSolicitanteAudienciaActualizarMovimiento").val();
    var apellidosSolicitanteMovimiento   = $("#apellidosSolicitanteAudienciaActualizarMovimiento").val();
    var nombreCitadoAudienciaMovimiento  = $("#nombreCitadoAudienciaActualizarMovimiento").val();
    var conciliadorAsignadoMovimiento    = $("#conciliadorAsignadoAudienciaActualizarMovimiento").val();
    var observacionesAudienciaMovimiento = $("#observacionesAudienciaActualizarMovimiento").val();


    if (fechaSolicitudMovimiento == "") {
      $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
      $(".textoMensaje").text("Nombre no puede ir vacío.");
      $("#msj").modal("toggle");
      return false;
    }

    if (fechaAudienciaMovimiento == "") {
      $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
      $(".textoMensaje").text("Apellidos no puede ir vacío.");
      $("#msj").modal("toggle");
      return false;
    }

    if (horarioAudienciaMovimiento == "") {
      $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
      $(".textoMensaje").text("Auxiliar Asignado no puede ir vacío.");
      $("#msj").modal("toggle");
      return false;
    }

    if (nombreSolicitanteMovimiento == "-1") {
      $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
      $(".textoMensaje").text("Genero no puede ir vacío.");
      $("#msj").modal("toggle");
      return false;
    }

    if (apellidosSolicitanteMovimiento == "") {
      $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
      $(".textoMensaje").text("Numero de Identificacion Oficial no puede ir vacío.");
      $("#msj").modal("toggle");
      return false;
    }

    if (nombreCitadoAudienciaMovimiento == "") {
      $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
      $(".textoMensaje").text("Edad no puede ir vacío.");
      $("#msj").modal("toggle");
      return false;
    }

    if (conciliadorAsignadoMovimiento == "") {
      $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
      $(".textoMensaje").text("Motivo de la Solicitud no puede ir vacío.");
      $("#msj").modal("toggle");
      return false;
    }

    var json_data = {
      "idAudiencia": idAudienciaEditar,
      "nombreSolicitante": nombreSolicitanteMovimiento,
      "apellidosSolicitante": apellidosSolicitanteMovimiento,
      "conciliadorAsignado": conciliadorAsignadoMovimiento,
      "fechaSolicitud": fechaSolicitudMovimiento,
      "fechaAudiencia": fechaAudienciaMovimiento,
      "horarioAudiencia": horarioAudienciaMovimiento,      
      "nombreCitado": nombreCitadoAudienciaMovimiento,
      "observaciones": observacionesAudienciaMovimiento
    }

    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
      method:"POST",
      url:"../backend/backend_editar_audiencia.php",
      data:json_data,
      success:function(data){
        var respuesta = JSON.parse(data);

        if(respuesta["codigo"] == "fallo"){
          $(".btnCancelarAudienciaEditar").click();
          $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
          $(".textoMensaje").text(respuesta["mensaje"]);
          $("#msj").modal("toggle");
          closeMessageOverlay();
        }
        else if(respuesta["codigo"] == "exito"){
          $(".btnCancelarAudienciaEditar").click();
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
    idAudienciaEditar = "";
  });
  // ============================================================================
</script>
<?php
require_once("../global/footer.php");
?>