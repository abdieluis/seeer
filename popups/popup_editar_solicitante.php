<!-- Modal -->
<div class="modal fade" id="editarSolicitante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg

  ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">EDITAR DE SOLICITANTE</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row formularioEditarSolicitante"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="popupBtnCancelar btnCancelarSolicitante" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="popupBtnContinuar" onclick="actualizarUsuarioSolicitante();">Continuar</button>
      </div>
    </div>
  </div>
</div>
<script>

  // FUNCION SELECT ESTADOS =====================================================
  function mostrarEstadosEditar(){
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


          var opcionesEstados = "<option value='-1'>Selecciona Estado Solicitante</option>";

          for (i = 0; i < resultados.length; i++) {
              var resultadosTotales = resultados[i];
              var idEstado     = resultadosTotales["id"];
            var nombreEstado = resultadosTotales["nombre"];

              opcionesEstados += "<option value='"+idEstado+"'>"+nombreEstado+"</option>";
          }

          $(".selectEstadosActualizar").html(opcionesEstados);

          $("#estadoSolicitanteActualizacion option:contains("+estadoEditar+")").attr('selected', true);
          idEstadoSeleccionadoEditar = $("#estadoSolicitanteActualizacion").val();
          
          mostrarMunicipiosEditar();

          closeMessageOverlay();
        }
      }
    });
  }
  // ============================================================================

  // FUNCION SELECT MUNICIPIOS ==================================================
  function mostrarMunicipiosEditar(){
    
    var jsonData = {
      "estado": idEstadoSeleccionadoEditar
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

            var opcionesMunicipios = "<option value='-1'>Municipio de Solicitante</option>";

            for (i = 0; i < resultados.length; i++) {
                var resultadosTotales = resultados[i];
                // console.log(resultadosTotales);
                var idMunicipio     = resultadosTotales["id"];
                var nombreMunicipio = resultadosTotales["nombre"];
                var ciudadCentro    = resultadosTotales["ciudadCentro"];

                opcionesMunicipios += "<option value='"+idMunicipio+"' centro='"+ciudadCentro+"'>"+nombreMunicipio+"</option>";
            }

            $(".selectMunicipios").html(opcionesMunicipios);

            $("#municipioSolicitanteActualizacion option:contains("+municipioEditar+")").attr('selected', true);


            idCiudadSeleccionadoEditar = $("#municipioSolicitanteActualizacion option:selected").attr("centro");
            
            seleccionarCiudadEditarSolicitante(idCiudadSeleccionadoEditar);

            closeMessageOverlay();
          }
      }
    });
  }
  // ============================================================================

  // FUNCION SELECT CIUDAD DE EDITAR SOLICITANTE ==================================
  function seleccionarCiudadEditarSolicitante(idCiudadSeleccionadoEditar){

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
          // console.log(resultados);

          var opcionesCiudad = "<option value='-1'>Municipio de Registro</option>";

          for (i = 0; i < resultados.length; i++) {
            var resultadosTotales = resultados[i];
            var idCiudad = resultadosTotales["idCiudad"];
            var ciudad   = resultadosTotales["ciudad"];

            opcionesCiudad += "<option value='"+idCiudad+"'>"+ciudad+"</option>";
          }
          
          var htmlSelectCiudad =
          "<label class='input-group-text' for='ciudadSolicitanteActualizacion'><i class='bx bx-map'></i></label>"+
          "<select class='form-select' id='ciudadSolicitanteActualizacion'>"+opcionesCiudad+"</select>";
          $(".opcionesCiudad").html(htmlSelectCiudad);

          $("#ciudadSolicitanteActualizacion option[value='"+idCiudadSeleccionadoEditar+"'").attr("selected",true);

          closeMessageOverlay();
                
        }
      }
    });
  }
  // ============================================================================

  // FUNCION SELECT MUNICIPIOS ==================================================
  function mostrarMunicipiosEstadosEditar(){

    var idEstadoSeleccionado = $("#estadoSolicitanteActualizacion option:selected").val();

    var jsonData = {
      "estado": idEstadoSeleccionado
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

            var opcionesMunicipios = "<option value='-1'>Municipio de Solicitante</option>";

            for (i = 0; i < resultados.length; i++) {
                var resultadosTotales = resultados[i];
                // console.log(resultadosTotales);
                var idMunicipio     = resultadosTotales["id"];
                var nombreMunicipio = resultadosTotales["nombre"];
                var ciudadCentro    = resultadosTotales["ciudadCentro"];

                opcionesMunicipios += "<option value='"+idMunicipio+"' centro='"+ciudadCentro+"'>"+nombreMunicipio+"</option>";
            }

            $(".selectMunicipios").html(opcionesMunicipios);

            closeMessageOverlay();
          }
      }
    });
  }
  // ============================================================================

  // FUNCION SELECT CIUDAD DE EDITAR SOLICITANTE ==================================
  function mostrarCiudadEditarSolicitante(){

    var ciudadAltaCentro = $("#municipioSolicitanteActualizacion option:selected").attr("centro");

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
          // console.log(resultados);

          var opcionesCiudad = "<option value='-1'>Municipio de Registro</option>";

          for (i = 0; i < resultados.length; i++) {
            var resultadosTotales = resultados[i];
            var idCiudad = resultadosTotales["idCiudad"];
            var ciudad   = resultadosTotales["ciudad"];

            opcionesCiudad += "<option value='"+idCiudad+"'>"+ciudad+"</option>";
          }
          
          var htmlSelectCiudad =
          "<label class='input-group-text' for='ciudadSolicitanteActualizacion'><i class='bx bx-map'></i></label>"+
          "<select class='form-select' id='ciudadSolicitanteActualizacion'>"+opcionesCiudad+"</select>";
          $(".opcionesCiudad").html(htmlSelectCiudad);

          $("#ciudadSolicitanteActualizacion option[value='"+ciudadAltaCentro+"'").attr("selected",true);

          closeMessageOverlay();
                
        }
      }
    });
  }
  // ============================================================================

  // FUNCION ABRIR POPUP ========================================================
  function abrirPopupEditarSolicitante(idUsuarioSolicitante){

    idUsuarioSolicitanteEditar = idUsuarioSolicitante;

    var jsonData = {
      "idUsuarioSolicitante": idUsuarioSolicitanteEditar
    }

    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
      method:"POST",
      url:"../backend/backend_mostrar_datos_solicitante.php",
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
          var resultados = respuesta["objetoRespuesta"]["solicitante"];
          // console.log(resultados);

          var apellidos                = resultados["apellidos"];
          var edad                     = resultados["edad"];
          var eliminado                = resultados["eliminado"];
          estadoEditar                 = resultados["estado"];
          var genero                   = resultados["genero"];
          idCiudadEditar               = resultados["idCiudad"];
          var idUsuarioSolicitante     = resultados["idUsuarioSolicitante"];
          municipioEditar              = resultados["municipio"];
          var nombres                  = resultados["nombres"];
          var nroIdentificacionOficial = resultados["nroIdentificacionOficial"];
          var telefono                 = resultados["telefono"];

          var htmlFormEditarSolicitante =
          "<div class='col-md-6'>"+
            "<div class='input-group mb-3'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bxs-edit-alt'></i></span>"+
              "<input type='text' class='form-control' aria-label='Nombres' aria-describedby='basic-addon1' name='nombresSolicitanteActualizacion' id='nombresSolicitanteActualizacion' value='"+nombres+"'>"+
            "</div>"+
          "</div>"+
          "<div class='col-md-6 ms-auto'>"+
            "<div class='input-group mb-3'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bxs-edit-alt'></i></span>"+
              "<input type='text' class='form-control' aria-label='Apellidos' aria-describedby='basic-addon1' name='apellidosSolicitanteActualizacion' id='apellidosSolicitanteActualizacion' value='"+apellidos+"'>"+
            "</div>"+
          "</div>"+

          "<div class='col-md-6'>"+
            "<div class='input-group mb-3'>"+
              "<label class='input-group-text' for='generoSolicitanteActualizacion'><i class='bx bx-male-female'></i></label>"+
              "<select class='form-select' id='generoSolicitanteActualizacion'>"+
                "<option value='-1'>Genero</option>"+
                "<option value='Hombre'>Hombre</option>"+
                "<option value='Mujer'>Mujer</option>"+
              "</select>"+
            "</div>"+
          "</div>"+
          "<div class='col-md-6 ms-aut'>"+
            "<div class='input-group mb-3'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bx-user-circle'></i></span>"+
              "<input type='text' class='form-control' aria-label='Edad' aria-describedby='basic-addon1' name='edadSolicitanteActualizacion' id='edadSolicitanteActualizacion' maxlength='3' onKeypress='return soloNumeros(event);' value='"+edad+"'>"+
            "</div>"+
          "</div>"+

          "<div class='col-md-6'>"+
            "<div class='input-group mb-3'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bx-id-card'></i></span>"+
              "<input type='text' class='form-control' aria-label='Numero de identificacion oficial' aria-describedby='basic-addon1' name='nroIdentificacionSolicitanteActualizacion' id='nroIdentificacionSolicitanteActualizacion' value='"+nroIdentificacionOficial+"'>"+
            "</div>"+
          "</div>"+
          "<div class='col-md-6 ms-auto'>"+
            "<div class='input-group mb-3'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bx-phone'></i></span>"+
              "<input type='text' class='form-control' aria-label='Telefono' aria-describedby='basic-addon1' name='telefonoSolicitanteActualizacion' id='telefonoSolicitanteActualizacion' maxlength='10' onKeypress='return soloNumeros(event);' value='"+telefono+"'>"+
            "</div>"+
          "</div>"+

          "<div class='col-md-6'>"+
            "<div class='input-group mb-3'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bx-map'></i></span>"+
              "<select class='form-select selectEstadosActualizar' id='estadoSolicitanteActualizacion' onchange='mostrarMunicipiosEstadosEditar();'>"+
                "<option value='-1'>Selecciona Estado Solicitante</option>"+
              "</select>"+
            "</div>"+
          "</div>"+
          "<div class='col-md-6 ms-auto'>"+
            "<div class='input-group mb-3'>"+
              "<span class='input-group-text' id='basic-addon1'><i class='bx bx-map'></i></span>"+
              "<select class='form-select selectMunicipios' id='municipioSolicitanteActualizacion' onchange='mostrarCiudadEditarSolicitante();'>"+
                "<option value='-1'>Municipio de Solicitante</option>"+
              "</select>"+
            "</div>"+
          "</div>"+

          "<div class='col-md-6'>"+
            "<div class='input-group mb-3 opcionesCiudad'></div>"+
          "</div>";

          $(".formularioEditarSolicitante").html(htmlFormEditarSolicitante);

          $("#generoSolicitanteActualizacion option[value='"+genero+"'").attr("selected",true);

          closeMessageOverlay();
                
        }
      }
    });

    mostrarEstadosEditar();
    

    $("#editarSolicitante").modal("toggle");
  }
  // ============================================================================

  // FUNCION ACTUALIZAR USUARIO SOLICITANTE =====================================
  function actualizarUsuarioSolicitante(){

    var nombreUsuarioSolicitante     = $("#nombresSolicitanteActualizacion").val();
    var apellidosUsuarioSolicitante  = $("#apellidosSolicitanteActualizacion").val();
    var generoSolicitante            = $("#generoSolicitanteActualizacion").val();
    var edadSolicitante              = $("#edadSolicitanteActualizacion").val();
    var nroIdentificacionSolicitante = $("#nroIdentificacionSolicitanteActualizacion").val();
    var telefonoSolicitante          = $("#telefonoSolicitanteActualizacion").val();
    var estadoSolicitante            = $("#estadoSolicitanteActualizacion option:selected").text();
    var municipioSolicitante         = $("#municipioSolicitanteActualizacion option:selected").text();
    var ciudadSolicitante            = $("#ciudadSolicitanteActualizacion").val();

    var idEstadoSolicitante          = $("#estadoSolicitanteActualizacion option:selected").val();
    var idMunicipioSolicitante       = $("#municipioSolicitanteActualizacion option:selected").val();

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

    if (generoSolicitante == "-1") {
      $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
      $(".textoMensaje").text("Selecciona un género, no puede ir vacío.");
      $("#msj").modal("toggle");
      return false;
    }

    if (edadSolicitante == "") {
      $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
      $(".textoMensaje").text("La edad no puede ir vacío.");
      $("#msj").modal("toggle");
      return false;
    }

    if (nroIdentificacionSolicitante == "") {
      $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
      $(".textoMensaje").text("Ingresa el número de identificacion oficial, no puede ir vacío.");
      $("#msj").modal("toggle");
      return false;
    }

    if (telefonoSolicitante == "") {
      $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
      $(".textoMensaje").text("Ingresa un teléfono, no puede ir vacío.");
      $("#msj").modal("toggle");
      return false;
    }

    if (idEstadoSolicitante == "-1") {
      $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
      $(".textoMensaje").text("Selecciona el estado del solicitante.");
      $("#msj").modal("toggle");
      return false;
    }

    if (idMunicipioSolicitante == "-1") {
      $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
      $(".textoMensaje").text("Selecciona el municipio del solicitante.");
      $("#msj").modal("toggle");
      return false;
    }

    if (ciudadSolicitante == "-1") {
      $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
      $(".textoMensaje").text("Selecciona la ciudad donde se esta registrando al solicitante.");
      $("#msj").modal("toggle");
      return false;
    }

    var json_data = {
      "idUsuarioSolicitante": idUsuarioSolicitanteEditar,
      "nombres": nombreUsuarioSolicitante,
      "apellidos": apellidosUsuarioSolicitante,
      "genero": generoSolicitante,
      "edad": edadSolicitante,
      "nroIdentificacion": nroIdentificacionSolicitante,
      "telefono": telefonoSolicitante,
      "estado": estadoSolicitante,
      "municipio": municipioSolicitante,
      "ciudad": ciudadSolicitante
    }

    console.log(json_data);

    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
      method:"POST",
      url:"../backend/backend_editar_usuario_solicitante.php",
      data:json_data,
      success:function(data){
        var respuesta = JSON.parse(data);

        if(respuesta["codigo"] == "fallo"){
          $(".btnCancelarSolicitante").click();
          $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
          $(".textoMensaje").text(respuesta["mensaje"]);
          $("#msj").modal("toggle");
          limpiarCampos();
          closeMessageOverlay();
        }
        else if(respuesta["codigo"] == "exito"){
          limpiarCampos();
          $(".btnCancelarSolicitante").click();
          $(".iconoMensaje").html("<i class='bx bx-check-circle bx-tada bx-lg' style='color:#0ea202' ></i>");
          $(".textoMensaje").text(respuesta["mensaje"]);
          $("#msjRec").modal("toggle");
          closeMessageOverlay();
        }
      }
    });
  }
  // ======================================================================================

  // EVENTO READY ===============================================================
  $(document).ready(function () {
    idUsuarioSolicitanteEditar = "";
    estadoEditar = "";
    idCiudadEditar = "";
    municipioEditar = "";
    idEstadoSeleccionadoEditar = "";
    idCiudadSeleccionadoEditar = "";
  });
  // ============================================================================
</script>
