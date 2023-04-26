<!-- Modal -->
<div class="modal fade" id="msjConfirmacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="iconoMensaje"></div>
        <p class="textoMensaje"></p>
      </div>
      <div class="modal-footer">

        <button type="button" class="popupBtnCancelar btnCancelarSolicitud" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="popupBtnContinuar" onclick="eliminarDatos();">Continuar</button>

      </div>
    </div>
  </div>
</div>
<script>
  // FUNCION ABRIR POPUP ========================================================
  function abrirPopupConfirmarEliminacion(idSolicitud){

    idSolicitudEliminar = idSolicitud;

    $(".iconoMensaje").html("<i class='bx bx-error-circle bx-tada bx-lg' style='color:#ffc300'  ></i>");

    $(".textoMensaje").html("¿Estas seguro de realizar esta acción?");

    $("#msjConfirmacion").modal("toggle");
  }
  // ============================================================================

  // FUNCION ELIMINAR DATOS =====================================================
  function eliminarDatos(){
    var json_data = {
        "idSolicitud":   idSolicitudEliminar
      }

    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
      method:"POST",
      url:"../backend/backend_eliminar_solicitudes.php",
      data:json_data,
      success:function(data){
        var respuesta = JSON.parse(data);

        if(respuesta["codigo"] == "fallo"){
          $(".btnCancelarSolicitud").click();
          $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
          $(".textoMensaje").text(respuesta["mensaje"]);
          $("#msj").modal("toggle");
          closeMessageOverlay();
        }
        else if(respuesta["codigo"] == "exito"){
          $(".btnCancelarSolicitud").click();
          $(".iconoMensaje").html("<i class='bx bx-check-circle bx-tada bx-lg' style='color:#0ea202' ></i>");
          $(".textoMensaje").text(respuesta["mensaje"]);
          $("#msjRec").modal("toggle");
          closeMessageOverlay();
        }
      }
    });
  }
  // ============================================================================

  // EVENTO READY ===============================================================
  $(document).ready(function () {
    idSolicitudEliminar = "";
  });
  // ============================================================================
</script>