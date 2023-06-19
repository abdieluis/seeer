<!-- Modal -->
<div class="modal fade" id="agendarRatificacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">DISPONIBILIDAD RATIFICACIÓN</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <center><div class="col-md-12" style="font-weight: bold;">SELECCIONA LA FECHA Y HORA PARA CELEBRAR LA RATIFICACIÓN.</div></center>
                        <br><br>
                        <div class="col-md-6">
                            <label for='fechaDisponibleRatificacion' class='form-label'>Fecha Disponible</label>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" aria-describedby="basic-addon1" name="fechaDisponibleRatificacion" id="fechaDisponibleRatificacion">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <label for='fechaDisponibleRatificacion' class='form-label'>Hora Disponible</label>
                            <div class="input-group mb-3">
                                <input type="time" class="form-control" aria-describedby="basic-addon1" name="horaDisponibleRatificacion" id="horaDisponibleRatificacion">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <center>
                                <!-- <label class='form-label'>Correo Patrón</label> -->
                                <!-- <div class="input-group mb-3"> -->
                                <p class="fw-bold correoPatron"></p>
                                <!-- </div> -->
                            </center>
                        </div>
                        <div class="col-md-6">
                            <center>
                                <!-- <label class='form-label'>Correo Trabajador</label> -->
                                <!-- <div class="input-group mb-3"> -->
                                <p class="fw-bold correoTrabajador"></p>
                                <!-- </div> -->
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="popupBtnCancelar btnAgendar" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="popupBtnContinuar" onclick="continuarProcesoConfirmacion();">Continuar</button>
            </div>
        </div>
    </div>
</div>
<script>
// FUNCION ABRIR POPUP ========================================================
function abrirAgendarRatificacion(){
    $(".correoPatron").html("Email-Patrón: "+emailEmpresaPatron);
    $(".correoTrabajador").html("Email-Trabajador: "+emailTrabajador);

    $("#agendarRatificacion").modal("toggle");
}
// ============================================================================

// FUNCION PARA MANDAR CORREOS DE CONFIRMACIÓN =======================================================
function continuarProcesoConfirmacion(){
    var fechaDisponibleRatificacion = $("#fechaDisponibleRatificacion").val();
    var horaDisponibleRatificacion = $("#horaDisponibleRatificacion").val();

    var jsonData = {
        "correoEmpleado": emailTrabajador,
        "correoPatron":   emailEmpresaPatron,
        "fecha":          fechaDisponibleRatificacion,
        "hora":           horaDisponibleRatificacion
    }
    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
        method:"POST",
        url:"../correo.php",
        data:jsonData,
        success:function(data){
            var respuesta = JSON.parse(data);
            if(respuesta["codigo"] == "fallo"){
                $(".btnAgendar").click();
                $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
                $(".textoMensaje").text(respuesta["mensaje"]);
                $("#msj").modal("toggle");
                closeMessageOverlay();
            }
            else if(respuesta["codigo"] == "exito"){
                $(".btnAgendar").click();

                var jsonData = {
                    "ratificado":     ratificado,
                    "idRatificacion": idRatificacionSeleccionada
                }
                
                $.ajax({
                    method:"POST",
                    url:"../backend/backend_quitar_ratificacion_completada.php",
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
    
                            $(".iconoMensaje").html("<i class='bx bx-check-circle bx-tada bx-lg' style='color:#0ea202' ></i>");
                            $(".textoMensaje").text(respuesta["mensaje"]);
                            $("#msjRec").modal("toggle");
                            closeMessageOverlay();
                        }
                    }     
                });
            }
        }     
    });
}
// ===================================================================================================

</script>