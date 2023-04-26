<!-- Modal -->
<div class="modal fade" id="altaSolicitante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg

  ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">ALTA DE SOLICITANTE</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class='bx bxs-edit-alt'></i></span>
                <input type="text" class="form-control" placeholder="Nombres" aria-label="Nombres" aria-describedby="basic-addon1" name="nombresSolicitanteAlta" id="nombresSolicitanteAlta">
              </div>
            </div>
            <div class="col-md-6 ms-auto">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class='bx bxs-edit-alt'></i></span>
                <input type="text" class="form-control" placeholder="Apellidos" aria-label="Apellidos" aria-describedby="basic-addon1" name="apellidosSolicitanteAlta" id="apellidosSolicitanteAlta">
              </div>
            </div>

            <div class="col-md-6">
              <div class="input-group mb-3">
                <label class="input-group-text" for="generoSolicitanteAlta"><i class='bx bx-male-female'></i></label>
                <select class="form-select" id="generoSolicitanteAlta">
                  <option value="-1">Genero</option>
                  <option value="Hombre">Hombre</option>
                  <option value="Mujer">Mujer</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 ms-auto">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class='bx bx-user-circle'></i></span>
                <input type="text" class="form-control" placeholder="Edad" aria-label="Edad" aria-describedby="basic-addon1" name="edadSolicitanteAlta" id="edadSolicitanteAlta" maxlength="3" onKeypress="return soloNumeros(event);">
              </div>
            </div>

            <div class="col-md-6">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class='bx bx-id-card'></i></span>
                <input type="text" class="form-control" placeholder="Numero de identificacion oficial" aria-label="Numero de identificacion oficial" aria-describedby="basic-addon1" name="nroIdentificacionSolicitanteAlta" id="nroIdentificacionSolicitanteAlta">
              </div>
            </div>
            <div class="col-md-6 ms-auto">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class='bx bx-phone'></i></span>
                <input type="text" class="form-control" placeholder="Telefono" aria-label="Telefono" aria-describedby="basic-addon1" name="telefonoSolicitanteAlta" id="telefonoSolicitanteAlta" maxlength="10" onKeypress="return soloNumeros(event);">
              </div>
            </div>

            <div class="col-md-6">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class='bx bx-map'></i></span>
                <select class="form-select selectEstados" id="estadoSolicitanteAlta" onchange="mostrarMunicipios();"></select>
              </div>
            </div>
            <div class="col-md-6 ms-auto">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class='bx bx-map'></i></span>
                <select class="form-select selectMunicipios" id="municipioSolicitanteAlta" onchange="mostrarCiudadAltaSolicitante();">
                  <option value="-1">Municipio de Solicitante</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="input-group mb-3 opcionesCiudad"></div>
            </div>

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="popupBtnCancelar btnCancelarSolicitante" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="popupBtnContinuar" onclick="altaUsuarioSolicitante();">Continuar</button>
      </div>
    </div>
  </div>
</div>
<script>
  // FUNCION LIMPIAR CAMPOS =====================================================
  function limpiarCampos(){
    $("#nombresSolicitanteAlta").val("");
    $("#apellidosSolicitanteAlta").val("");
    $("#generoSolicitanteAlta").val(-1);
    $("#edadSolicitanteAlta").val("");
    $("#nroIdentificacionSolicitanteAlta").val("");
    $("#telefonoSolicitanteAlta").val("");
    $("#ciudadSolicitanteAlta").val(-1);
  }
  // ============================================================================

  // FUNCION SELECT ESTADOS =====================================================
  function mostrarEstados(){
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

          $(".selectEstados").html(opcionesEstados);
          closeMessageOverlay();
        }
      }
    });
  }
  // ============================================================================

  // FUNCION SELECT MUNICIPIOS ==================================================
  function mostrarMunicipios(){

    var idEstadoSeleccionado = $("#estadoSolicitanteAlta option:selected").val();

    var jsonData = {
      "estado": idEstadoSeleccionado
    }

    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
        method:"POST",
        url:"../backend/backend_mostrar_municipios.php",
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

  // FUNCION SELECT CIUDAD DE ALTA SOLICITANTE ==================================
  function mostrarCiudadAltaSolicitante(){

    var ciudadAltaCentro = $("#municipioSolicitanteAlta option:selected").attr("centro");

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
          "<label class='input-group-text' for='ciudadSolicitanteAlta'><i class='bx bx-map'></i></label>"+
          "<select class='form-select' id='ciudadSolicitanteAlta'>"+opcionesCiudad+"</select>";
          $(".opcionesCiudad").html(htmlSelectCiudad);

          $("#ciudadSolicitanteAlta option[value='"+ciudadAltaCentro+"'").attr("selected",true);

          closeMessageOverlay();
                
        }
      }
    });
  }
  // ============================================================================

  // FUNCION ABRIR POPUP ========================================================
  function abrirPopupAltaSolicitante(){

    limpiarCampos();

    mostrarEstados();

    $("#altaSolicitante").modal("toggle");
  }
  // ============================================================================

  // FUNCION DAR DE ALTA USUARIO SOLICITANTE ====================================
  function altaUsuarioSolicitante(){

    var nombreUsuarioSolicitante     = $("#nombresSolicitanteAlta").val();
    var apellidosUsuarioSolicitante  = $("#apellidosSolicitanteAlta").val();
    var generoSolicitante            = $("#generoSolicitanteAlta").val();
    var edadSolicitante              = $("#edadSolicitanteAlta").val();
    var nroIdentificacionSolicitante = $("#nroIdentificacionSolicitanteAlta").val();
    var telefonoSolicitante          = $("#telefonoSolicitanteAlta").val();
    var estadoSolicitante            = $("#estadoSolicitanteAlta option:selected").text();
    var municipioSolicitante         = $("#municipioSolicitanteAlta option:selected").text();
    var ciudadSolicitante            = $("#ciudadSolicitanteAlta").val();

    var idEstadoSolicitante          = $("#estadoSolicitanteAlta option:selected").val();
    var idMunicipioSolicitante       = $("#municipioSolicitanteAlta option:selected").val();

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

    showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
    $.ajax({
      method:"POST",
      url:"../backend/backend_registrar_usuario_solicitante.php",
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
          $("#msj").modal("toggle");
          closeMessageOverlay();
        }
      }
    });
  }
  // ======================================================================================
</script>
