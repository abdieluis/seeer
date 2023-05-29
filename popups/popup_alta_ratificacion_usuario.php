<!-- Modal -->
<div class="modal fade" id="altaRatificacionUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">RATIFICACIONES</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <center><div class="col-md-12" style="font-weight: bold;">DATOS DEL TRABAJADOR</div></center>
                        <br><br>
                        <div class="col-md-6">
                            <label for='horarioInicioTrabajadorAlta' class='form-label'>Fecha de Inicio Laboral</label>
                            <div class="input-group mb-3">
                                <!-- <span class="input-group-text" id="basic-addon1"><i class='bx bx-calendar-check'></i></span> -->
                                <input type='date' class='form-control' aria-describedby='basic-addon1' name='fechaInicioLaboralTrabajadorAlta' id='fechaInicioLaboralTrabajadorAlta'>
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <label for='horarioInicioTrabajadorAlta' class='form-label'>Fecha de Fin Laboral</label>
                            <div class="input-group mb-3">
                                <!-- <span class="input-group-text" id="basic-addon1"><i class='bx bx-calendar-x' ></i></span> -->
                                <input type='date' class='form-control' aria-describedby='basic-addon1' name='fechaFinLaboralTrabajadorAlta' id='fechaFinLaboralTrabajadorAlta'>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bxs-edit-alt'></i></span>
                                <input type="text" class="form-control" placeholder="Nombres del Trabajador" aria-label="Nombres del Trabajador" aria-describedby="basic-addon1" name="nombresTrabajadorAlta" id="nombresTrabajadorAlta">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bxs-edit-alt'></i></span>
                                <input type="text" class="form-control" placeholder="Apellidos del Trabajador" aria-label="Apellidos del Trabajador" aria-describedby="basic-addon1" name="apellidosTrabajadorAlta" id="apellidosTrabajadorAlta">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="generoTrabajadorAlta"><i class='bx bx-male-female'></i></label>
                                <select class="form-select" id="generoTrabajadorAlta">
                                    <option value="-1">Genero</option>
                                    <option value="Hombre">Hombre</option>
                                    <option value="Mujer">Mujer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-user-circle'></i></span>
                                <input type="text" class="form-control" placeholder="Edad Trabajador" aria-label="Edad Trabajador" aria-describedby="basic-addon1" name="edadTrabajadorAlta" id="edadTrabajadorAlta" maxlength="3" onKeypress="return soloNumeros(event);">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-id-card'></i></span>
                                <input type="text" class="form-control" placeholder="Puesto Desempeñado" aria-label="Puesto Desempeñado" aria-describedby="basic-addon1" name="puestoDesempeñadoTrabajadorAlta" id="puestoDesempeñadoTrabajadorAlta">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-map-pin'></i></span>
                                <input type="text" class="form-control" placeholder="Calle" aria-label="Calle" aria-describedby="basic-addon1" name="calleTrabajadorAlta" id="calleTrabajadorAlta">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-home'></i></span>
                                <input type="text" class="form-control" placeholder="Número Exterior" aria-label="Número Exterior" aria-describedby="basic-addon1" name="numeroExteriorTrabajadorAlta" id="numeroExteriorTrabajadorAlta" maxlength="10" onKeypress="return soloNumeros(event);">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-home'></i></span>
                                <input type="text" class="form-control" placeholder="Número Interior" aria-label="Número Interior" aria-describedby="basic-addon1" name="numeroInteriorTrabajadorAlta" id="numeroInteriorTrabajadorAlta">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bxs-directions'></i></span>
                                <input type="text" class="form-control" placeholder="Colonia" aria-label="Colonia" aria-describedby="basic-addon1" name="coloniaTrabajadorAlta" id="coloniaTrabajadorAlta">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-map-pin'></i></span>
                                <input type="text" class="form-control" placeholder="Código Postal" aria-label="Código Postal" aria-describedby="basic-addon1" name="codigoPostalTrabajadorAlta" id="codigoPostalTrabajadorAlta" maxlength="5" onKeypress="return soloNumeros(event);">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-map'></i></span>
                                <select class="form-select selectEstadosTrabajador" id="estadoTrabajadorAlta" onchange="mostrarMunicipiosTrabajador();"></select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-map'></i></span>
                                <select class="form-select selectMunicipioTrabajador" id="municipioTrabajadorAlta">
                                    <option value="-1">Municipio de Trabajador</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-id-card'></i></span>
                                <input type="text" class="form-control" placeholder="Curp Trabajador" aria-label="Curp Trabajador" aria-describedby="basic-addon1" name="curpTrabajadorAlta" id="curpTrabajadorAlta">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-id-card'></i></span>
                                <input type="text" class="form-control" placeholder="RFC Trabajador" aria-label="RFC Trabajador" aria-describedby="basic-addon1" name="rfcTrabajadorAlta" id="rfcTrabajadorAlta">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-id-card'></i></span>
                                <input type="text" class="form-control" placeholder="NSS Trabajador" aria-label="NSS Trabajador" aria-describedby="basic-addon1" name="nssTrabajadorAlta" id="nssTrabajadorAlta">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="tipoIdentificacionTrabajadorAlta"><i class='bx bx-dots-vertical-rounded'></i></label>
                                <select class="form-select" id="tipoIdentificacionTrabajadorAlta">
                                    <option value="-1">Tipo de Identificación</option>
                                    <option value="INE">INE</option>
                                    <option value="Pasaporte">Pasaporte</option>
                                    <option value="Cedúla Profesional">Cedúla Profesional</option>
                                    <option value="INAPAM">INAPAM</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-id-card'></i></span>
                                <input type="text" class="form-control" placeholder="Número de identificación" aria-label="Número de identificación" aria-describedby="basic-addon1" name="numeroIdentificacionTrabajadorAlta" id="numeroIdentificacionTrabajadorAlta">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-at'></i></span>
                                <input type="text" class="form-control" placeholder="Email Trabajador" aria-label="Email Trabajador" aria-describedby="basic-addon1" name="emailTrabajadorAlta" id="emailTrabajadorAlta">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-phone'></i></span>
                                <input type="text" class="form-control" placeholder="Telefono Trabajador" aria-label="Telefono Trabajador" aria-describedby="basic-addon1" name="telefonoTrabajadorAlta" id="telefonoTrabajadorAlta" maxlength="10" onKeypress="return soloNumeros(event);">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-dollar-circle'></i></span>
                                <input type="text" class="form-control" placeholder="Sueldo Trabajador" aria-label="Sueldo Trabajador" aria-describedby="basic-addon1" name="sueldoTrabajadorAlta" id="sueldoTrabajadorAlta">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-calendar-star'></i></span>
                                <select class="form-select selectTipoSueldoTrabajador" id="tipoSueldoTrabajadorAlta">
                                    <option value="-1">Selecciona el tipo de sueldo</option>
                                    <option value="Diario">Diario</option>
                                    <option value="Semanal">Semanal</option>
                                    <option value="Quincenal">Quincenal</option>
                                    <option value="Mensual">Mensual</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for='horarioInicioTrabajadorAlta' class='form-label'>Horario de Inicio Laboral</label>
                            <div class="input-group mb-3">
                                <!-- <span class="input-group-text" id="basic-addon1"><i class='bx bx-dollar-circle'></i></span> -->
                                <input type="time" class="form-control"  aria-describedby="basic-addon1" name="horarioInicioTrabajadorAlta" id="horarioInicioTrabajadorAlta">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for='horarioFinTrabajadorAlta' class='form-label'>Horario de Fin Laboral</label>
                            <div class="input-group mb-3">
                                <!-- <span class="input-group-text" id="basic-addon1"><i class='bx bx-dollar-circle'></i></span> -->
                                <input type="time" class="form-control"  aria-describedby="basic-addon1" name="horarioFinTrabajadorAlta" id="horarioFinTrabajadorAlta">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for='horarioFinTrabajadorAlta' class='form-label'>Horas Laboradas Semanal</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-time' ></i></span>
                                <input type="text" class="form-control" aria-describedby="basic-addon1" name="horasLaboradasTrabajadorAlta" id="horasLaboradasTrabajadorAlta" disabled>
                            </div>
                        </div>
                        <br><br>
                        <center><div class="col-md-12" style="font-weight: bold;">DATOS DE LA EMPRESA</div></center>
                        <br><br>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-buildings'></i></span>
                                <input type="text" class="form-control" placeholder="Razón Social de la Empresa" aria-label="Razón Social de la Empresa" aria-describedby="basic-addon1" name="razonSocialEmpresaAlta" id="razonSocialEmpresaAlta">
                            </div>
                        </div>
                        <div class="col-md-6 auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-buildings'></i></span>
                                <input type="text" class="form-control" placeholder="Nombre Comercial" aria-label="Nombre Comercial" aria-describedby="basic-addon1" name="nombreComercialEmpresaAlta" id="nombreComercialEmpresaAlta">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-briefcase'></i></span>
                                <input type="text" class="form-control" placeholder="Nombre del Patrón" aria-label="Nombre del Patrón" aria-describedby="basic-addon1" name="nombrePatronEmpresaAlta" id="nombrePatronEmpresaAlta">
                            </div>
                        </div>
                        <div class="col-md-6 auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-at'></i></span>
                                <input type="text" class="form-control" placeholder="Email Empresa" aria-label="Email Empresa" aria-describedby="basic-addon1" name="emailEmpresaAlta" id="emailEmpresaAlta">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-help-circle' ></i></span>
                                <input type="text" class="form-control" placeholder="¿A Qué Se Dedica La Empresa o Establecimiento?" aria-label="¿A Qué Se Dedica La Empresa o Establecimiento?" aria-describedby="basic-addon1" name="dedicaEmpresaAlta" id="dedicaEmpresaAlta">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-id-card'></i></span>
                                <input type="text" class="form-control" placeholder="CURP O RFC del Patrón" aria-label="CURP O RFC del Patrón" aria-describedby="basic-addon1" name="curpRfcEmpresaAlta" id="curpRfcEmpresaAlta">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-map-pin'></i></span>
                                <input type="text" class="form-control" placeholder="Calle Empresa" aria-label="Calle Empresa" aria-describedby="basic-addon1" name="calleEmpresaAlta" id="calleEmpresaAlta">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-home'></i></span>
                                <input type="text" class="form-control" placeholder="Número Exterior Empresa" aria-label="Número Exterior" aria-describedby="basic-addon1" name="numeroExteriorEmpresaAlta" id="numeroExteriorEmpresaAlta">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-home'></i></span>
                                <input type="text" class="form-control" placeholder="Número Interior Empresa" aria-label="Número Interior Empresa" aria-describedby="basic-addon1" name="numeroIneriorEmpresaAlta" id="numeroIneriorEmpresaAlta">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bxs-directions'></i></span>
                                <input type="text" class="form-control" placeholder="Colonia Empresa" aria-label="Colonia" aria-describedby="basic-addon1" name="coloniaEmpresaAlta" id="coloniaEmpresaAlta">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-map-pin'></i></span>
                                <input type="text" class="form-control" placeholder="Código Postal Empresa" aria-label="Código Postal Empresa" aria-describedby="basic-addon1" name="cpEmpresaAlta" id="cpEmpresaAlta">
                            </div>
                        </div>

                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-map'></i></span>
                                <select class="form-select selectEstadosEmpresa" id="estadoEmpresaAlta" onchange="mostrarMunicipiosEmpresa();"></select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-map'></i></span>
                                <select class="form-select selectMunicipioEmpresa" id="municipioEmpresaAlta">
                                    <option value="-1">Municipio de la Empresa</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-phone'></i></span>
                                <input type="text" class="form-control" placeholder="Telefono Empresa" aria-label="Telefono Empresa" aria-describedby="basic-addon1" name="telefonoEmpresaAlta" id="telefonoEmpresaAlta" maxlength="10" onKeypress="return soloNumeros(event);">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3 btnArchivo">
                                <button class='col-sm-12 cargarArchivo' onClick='clickCargarArchivoCuantificacion();'><i class='bx bx-import'></i> Sube la Cuantificación</button>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="input-group mb-3 opcionesCiudad"></div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="popupBtnCancelar btnCancelarRatificacionUsuario" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="popupBtnContinuar" onclick="altaRatificaionUsuarioPublico();">Continuar</button>
            </div>
        </div>
    </div>
    <form class="formularioCamposOcultos" id="formRatificacionesUsuarioPublicoAlta" enctype="multipart/form-data">
        <input type="text" name="fechaInicioLaboralTrabajador" id="fechaInicioLaboralTrabajador" />
        <input type="text" name="fechaFinLaboralTrabajador" id="fechaFinLaboralTrabajador" />
        <input type="text" name="nombresTrabajador" id="nombresTrabajador" />
        <input type="text" name="apellidosTrabajador" id="apellidosTrabajador" />
        <input type="text" name="generoTrabajador" id="generoTrabajador" />
        <input type="text" name="edadTrabajador" id="edadTrabajador"/>
        <input type="text" name="puestoDesempeñadoTrabajador" id="puestoDesempeñadoTrabajador" />
        <input type="text" name="calleTrabajador" id="calleTrabajador" />
        <input type="text" name="numeroExteriorTrabajador" id="numeroExteriorTrabajador" />
        <input type="text" name="numeroInteriorTrabajador" id="numeroInteriorTrabajador"/>

        <input type="text" name="coloniaTrabajador" id="coloniaTrabajador" />
        <input type="text" name="codigoPostalTrabajador" id="codigoPostalTrabajador" />
        <input type="text" name="estadoTrabajador" id="estadoTrabajador" />
        <input type="text" name="municipioTrabajador" id="municipioTrabajador" />
        <input type="text" name="curpTrabajador" id="curpTrabajador" />
        <input type="text" name="rfcTrabajador" id="rfcTrabajador"/>
        <input type="text" name="nssTrabajador" id="nssTrabajador" />
        <input type="text" name="tipoIdentificacionTrabajador" id="tipoIdentificacionTrabajador" />
        <input type="text" name="numeroIdentificacionTrabajador" id="numeroIdentificacionTrabajador" />
        <input type="text" name="emailTrabajador" id="emailTrabajador"/>

        <input type="text" name="telefonoTrabajador" id="telefonoTrabajador" />
        <input type="text" name="sueldoTrabajador" id="sueldoTrabajador" />
        <input type="text" name="tipoSueldoTrabajador" id="tipoSueldoTrabajador" />
        <input type="text" name="horarioTrabajador" id="horarioTrabajador" />
        <!-- <input type="text" name="horarioFinTrabajador" id="horarioFinTrabajador" /> -->
        <input type="text" name="horasLaboradasTrabajador" id="horasLaboradasTrabajador"/>
        <input type="text" name="razonSocialEmpresa" id="razonSocialEmpresa" />
        <input type="text" name="nombreComercialEmpresa" id="nombreComercialEmpresa" />
        <input type="text" name="nombrePatronEmpresa" id="nombrePatronEmpresa" />
        <input type="text" name="dedicaEmpresa" id="dedicaEmpresa"/>

        <input type="text" name="curpRfcEmpresa" id="curpRfcEmpresa" />
        <input type="text" name="calleEmpresa" id="calleEmpresa" />
        <input type="text" name="numeroExteriorEmpresa" id="numeroExteriorEmpresa" />
        <input type="text" name="numeroIneriorEmpresa" id="numeroIneriorEmpresa" />
        <input type="text" name="coloniaEmpresa" id="coloniaEmpresa" />
        <input type="text" name="cpEmpresa" id="cpEmpresa"/>
        <input type="text" name="estadoEmpresa" id="estadoEmpresa" />
        <input type="text" name="municipioEmpresa" id="municipioEmpresa" />
        <input type="text" name="telefonoEmpresa" id="telefonoEmpresa" />
        <input type="text" name="emailEmpresa" id="emailEmpresa" />

        <input type="file" name="cuantificacion" id="cuantificacion" accept="application/pdf, image/*" onChange="cambioArchivoCuantificacion();" />
    </form>
</div>
<script>
//   // FUNCION LIMPIAR CAMPOS =====================================================
//   function limpiarCampos(){
//     $("#nombresSolicitanteAlta").val("");
//     $("#apellidosSolicitanteAlta").val("");
//     $("#generoSolicitanteAlta").val(-1);
//     $("#edadSolicitanteAlta").val("");
//     $("#nroIdentificacionSolicitanteAlta").val("");
//     $("#telefonoSolicitanteAlta").val("");
//     $("#ciudadSolicitanteAlta").val(-1);
//   }
//   // ============================================================================

//FUNCION CLIC CARGAR ARCHIVO=========================================================================
function clickCargarArchivoCuantificacion(){
    $("#cuantificacion").click();
}
//====================================================================================================

//FUNCION CAMBIO ARCHIVO==============================================================================
function cambioArchivoCuantificacion(){
    $(".cargarArchivo").html("<i class='bx bx-check-square' ></i> Archivo Cargado");
}
//====================================================================================================

  // FUNCION CALCULAR HORAS =====================================================
    const inicio = document.getElementById('horarioInicioTrabajadorAlta'),
    final = document.getElementById('horarioFinTrabajadorAlta'),
    resultado = document.getElementById('horasLaboradasTrabajadorAlta');
    // en formato 24 hrs, ejemplo: '12:30', '03:47', '19:12'
    function horaFija(hora) {
        const dia = new Date()
        dia.setHours(...hora.split(':'), 0);
        return dia
    }
    function calculaIntervalo(horaInicio, horaFinal) {
        // console.log(horaInicio, horaFinal);
        let fechaInicio = horaFija(horaInicio),
            fechaFinal = horaFija(horaFinal)
        if (fechaFinal < fechaInicio) {
            fechaFinal.setDate(fechaFinal.getDate() + 1)
        }
        const diferencia = fechaFinal - fechaInicio,
            horas = Math.floor(diferencia / 36e5),
            minutos = Math.floor((diferencia % 36e5) / 6e4)
        var horasSemanales = horas * 7;
        var minutosSemanales = minutos * 7;
        return [horasSemanales+"horas"+" "+minutosSemanales+"minutos"]
    }
    inicio.addEventListener('change', e => resultado.value = calculaIntervalo(e.target.value, final.value))
    final.addEventListener('change', e => resultado.value = calculaIntervalo(inicio.value, e.target.value))
  // ============================================================================

  // FUNCION SELECT ESTADOS =====================================================
    function mostrarEstadosTrabajador(){
        showMessageOverlay("CARGANDO...", "images/cargando.gif", "200", "200", "sending");
        $.ajax({
            method:"POST",
            url:"backend/backend_mostrar_estados.php",
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
                    var opcionesEstados = "<option value='-1'>Selecciona Estado Trabajador</option>";
                    for (i = 0; i < resultados.length; i++) {
                        var resultadosTotales = resultados[i];
                        var idEstado     = resultadosTotales["id"];
                        var nombreEstado = resultadosTotales["nombre"];
                        opcionesEstados += "<option value='"+idEstado+"'>"+nombreEstado+"</option>";
                    }
                    $(".selectEstadosTrabajador").html(opcionesEstados);
                    closeMessageOverlay();
                }
            }
        });
    }
  // ============================================================================

  // FUNCION SELECT MUNICIPIOS ==================================================
    function mostrarMunicipiosTrabajador(){
        var idEstadoSeleccionado = $("#estadoTrabajadorAlta option:selected").val();
        var jsonData = {
            "estado": idEstadoSeleccionado
        }
        showMessageOverlay("CARGANDO...", "images/cargando.gif", "200", "200", "sending");
        $.ajax({
            method:"POST",
            url:"backend/backend_mostrar_municipios_estado.php",
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
                    var opcionesMunicipios = "<option value='-1'>Municipio del trabajador</option>";
                    for (i = 0; i < resultados.length; i++) {
                        var resultadosTotales = resultados[i];
                        // console.log(resultadosTotales);
                        var idMunicipio     = resultadosTotales["id"];
                        var nombreMunicipio = resultadosTotales["nombre"];
                        var ciudadCentro    = resultadosTotales["ciudadCentro"];
                        opcionesMunicipios += "<option value='"+idMunicipio+"' centro='"+ciudadCentro+"'>"+nombreMunicipio+"</option>";
                    }
                    $(".selectMunicipioTrabajador").html(opcionesMunicipios);
                    closeMessageOverlay();
                }
            }
        });
    }
  // ============================================================================

   // FUNCION SELECT ESTADOS EMPRESA=====================================================
    function mostrarEstadosEmpresa(){
        showMessageOverlay("CARGANDO...", "images/cargando.gif", "200", "200", "sending");
        $.ajax({
            method:"POST",
            url:"backend/backend_mostrar_estados.php",
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
                    var opcionesEstados = "<option value='-1'>Selecciona Estado Empresa</option>";
                    for (i = 0; i < resultados.length; i++) {
                        var resultadosTotales = resultados[i];
                        var idEstado     = resultadosTotales["id"];
                        var nombreEstado = resultadosTotales["nombre"];
                        opcionesEstados += "<option value='"+idEstado+"'>"+nombreEstado+"</option>";
                    }
                    $(".selectEstadosEmpresa").html(opcionesEstados);
                    closeMessageOverlay();
                }
            }
        });
    }
  // ============================================================================

  // FUNCION SELECT MUNICIPIOS EMPRESA ==========================================
    function mostrarMunicipiosEmpresa(){
        var idEstadoSeleccionado = $("#estadoEmpresaAlta option:selected").val();
        var jsonData = {
            "estado": idEstadoSeleccionado
        }
        showMessageOverlay("CARGANDO...", "images/cargando.gif", "200", "200", "sending");
        $.ajax({
            method:"POST",
            url:"backend/backend_mostrar_municipios_estado.php",
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
                    var opcionesMunicipios = "<option value='-1'>Municipio del trabajador</option>";
                    for (i = 0; i < resultados.length; i++) {
                        var resultadosTotales = resultados[i];
                        // console.log(resultadosTotales);
                        var idMunicipio     = resultadosTotales["id"];
                        var nombreMunicipio = resultadosTotales["nombre"];
                        var ciudadCentro    = resultadosTotales["ciudadCentro"];
                        opcionesMunicipios += "<option value='"+idMunicipio+"' centro='"+ciudadCentro+"'>"+nombreMunicipio+"</option>";
                    }
                    $(".selectMunicipioEmpresa").html(opcionesMunicipios);
                    closeMessageOverlay();
                }
            }     
        });
    }
  // ============================================================================

//   // FUNCION SELECT CIUDAD DE ALTA SOLICITANTE ==================================
//   function mostrarCiudadAltaSolicitante(){

//     var ciudadAltaCentro = $("#municipioSolicitanteAlta option:selected").attr("centro");

//     showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
//     $.ajax({
//       method:"POST",
//       url:"../backend/backend_mostrar_ciudades.php",
//       data:"",
//       success:function(data){
//         var respuesta = JSON.parse(data);

//         if(respuesta["codigo"] == "fallo"){
//           $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
//           $(".textoMensaje").text(respuesta["mensaje"]);
//           $("#msj").modal("toggle");
//           closeMessageOverlay();
//         }
//         else if(respuesta["codigo"] == "exito"){
//           var resultados = respuesta["objetoRespuesta"]["ciudad"];
//           // console.log(resultados);

//           var opcionesCiudad = "<option value='-1'>Municipio de Registro</option>";

//           for (i = 0; i < resultados.length; i++) {
//             var resultadosTotales = resultados[i];
//             var idCiudad = resultadosTotales["idCiudad"];
//             var ciudad   = resultadosTotales["ciudad"];

//             opcionesCiudad += "<option value='"+idCiudad+"'>"+ciudad+"</option>";
//           }
//           var htmlSelectCiudad =
//           "<label class='input-group-text' for='ciudadSolicitanteAlta'><i class='bx bx-map'></i></label>"+
//           "<select class='form-select' id='ciudadSolicitanteAlta'>"+opcionesCiudad+"</select>";
//           $(".opcionesCiudad").html(htmlSelectCiudad);

//           $("#ciudadSolicitanteAlta option[value='"+ciudadAltaCentro+"'").attr("selected",true);

//           closeMessageOverlay();
                
//         }
//       }
//     });
//   }
//   // ============================================================================

  // FUNCION ABRIR POPUP ========================================================
    function abrirPopupGenerarRatificacionUsuario(){

        // limpiarCampos();

        mostrarEstadosTrabajador();
        mostrarEstadosEmpresa();

        $("#altaRatificacionUsuario").modal("toggle");
    }
  // ============================================================================

  // FUNCION DAR DE ALTA RATIFICAION USUARIO PUBLICO ============================
    function altaRatificaionUsuarioPublico(){

        var fechaInicioLaboralTrabajadorAlta   = $("#fechaInicioLaboralTrabajadorAlta").val();
        var fechaFinLaboralTrabajadorAlta      = $("#fechaFinLaboralTrabajadorAlta").val();
        var nombresTrabajadorAlta              = $("#nombresTrabajadorAlta").val();
        var apellidosTrabajadorAlta            = $("#apellidosTrabajadorAlta").val();
        var generoTrabajadorAlta               = $("#generoTrabajadorAlta").val();
        var edadTrabajadorAlta                 = $("#edadTrabajadorAlta").val();
        var puestoDesempeñadoTrabajadorAlta    = $("#puestoDesempeñadoTrabajadorAlta").val();
        var calleTrabajadorAlta                = $("#calleTrabajadorAlta").val();
        var numeroExteriorTrabajadorAlta       = $("#numeroExteriorTrabajadorAlta").val();
        var numeroInteriorTrabajadorAlta       = $("#numeroInteriorTrabajadorAlta").val();

        var coloniaTrabajadorAlta              = $("#coloniaTrabajadorAlta").val();
        var codigoPostalTrabajadorAlta         = $("#codigoPostalTrabajadorAlta").val();
        var estadoTrabajadorAlta               = $("#estadoTrabajadorAlta option:selected").text();
        var municipioTrabajadorAlta            = $("#municipioTrabajadorAlta option:selected").text();
        var curpTrabajadorAlta                 = $("#curpTrabajadorAlta").val();
        var rfcTrabajadorAlta                  = $("#rfcTrabajadorAlta").val();
        var nssTrabajadorAlta                  = $("#nssTrabajadorAlta").val();
        var tipoIdentificacionTrabajadorAlta   = $("#tipoIdentificacionTrabajadorAlta").val();
        var numeroIdentificacionTrabajadorAlta = $("#numeroIdentificacionTrabajadorAlta").val();
        var emailTrabajadorAlta                = $("#emailTrabajadorAlta").val();

        var telefonoTrabajadorAlta             = $("#telefonoTrabajadorAlta").val();
        var sueldoTrabajadorAlta               = $("#sueldoTrabajadorAlta").val();
        var tipoSueldoTrabajadorAlta           = $("#tipoSueldoTrabajadorAlta").val();
        var horarioInicioTrabajadorAlta        = $("#horarioInicioTrabajadorAlta").val();
        var horarioFinTrabajadorAlta           = $("#horarioFinTrabajadorAlta").val();
        var horasLaboradasTrabajadorAlta       = $("#horasLaboradasTrabajadorAlta").val();
        var razonSocialEmpresaAlta             = $("#razonSocialEmpresaAlta").val();
        var nombreComercialEmpresaAlta         = $("#nombreComercialEmpresaAlta").val();
        var nombrePatronEmpresaAlta            = $("#nombrePatronEmpresaAlta").val();
        var dedicaEmpresaAlta                  = $("#dedicaEmpresaAlta").val();

        var curpRfcEmpresaAlta                 = $("#curpRfcEmpresaAlta").val();
        var calleEmpresaAlta                   = $("#calleEmpresaAlta").val();
        var numeroExteriorEmpresaAlta          = $("#numeroExteriorEmpresaAlta").val();
        var numeroIneriorEmpresaAlta           = $("#numeroIneriorEmpresaAlta").val();
        var coloniaEmpresaAlta                 = $("#coloniaEmpresaAlta").val();
        var cpEmpresaAlta                      = $("#cpEmpresaAlta").val();
        var estadoEmpresaAlta                  = $("#estadoEmpresaAlta option:selected").text();
        var municipioEmpresaAlta               = $("#municipioEmpresaAlta option:selected").text();
        var telefonoEmpresaAlta                = $("#telefonoEmpresaAlta").val();
        var cuantificacionAlta                 = $("#cuantificacionAlta").val();
        var emailEmpresa                       = $("#emailEmpresaAlta").val();

        // var estadoSolicitante            = $("#estadoSolicitanteAlta option:selected").text();
        // var municipioSolicitante         = $("#municipioSolicitanteAlta option:selected").text();

        var estadoTrabajadorAltaSelect         = $("#estadoTrabajadorAlta option:selected").val();
        var municipioTrabajadorAltaSelect      = $("#municipioTrabajadorAlta option:selected").val();

        var estadoEmpresaAltaSelect            = $("#estadoEmpresaAlta option:selected").val();
        var municipioEmpresaAltaSelect         = $("#municipioEmpresaAlta option:selected").val();

        var horarioTrabajador = horarioInicioTrabajadorAlta+"-"+horarioFinTrabajadorAlta;

        // CONDICIONES PARA HACER OBLIGATORIOS LOS INPUT ==================================
        if (fechaInicioLaboralTrabajadorAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Seleccione la fecha de inicio de labores.");
            $("#msj").modal("toggle");
            return false;
        }

        if (fechaFinLaboralTrabajadorAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Seleccione la fecha de termino de labores.");
            $("#msj").modal("toggle");
            return false;
        }

        if (nombresTrabajadorAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("El nombre del trabajador(a) no puede ir vacio.");
            $("#msj").modal("toggle");
            return false;
        }

        if (apellidosTrabajadorAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Los apellidos del trabajador(a) no pueden ir vacios.");
            $("#msj").modal("toggle");
            return false;
        }

        if (generoTrabajadorAlta == "-1") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Selecciona el genero del trabajador(a).");
            $("#msj").modal("toggle");
            return false;
        }

        if (edadTrabajadorAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa la edad del trabajador(a).");
            $("#msj").modal("toggle");
            return false;
        }

        if (puestoDesempeñadoTrabajadorAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa el puesto desempeñado del trabajador(a).");
            $("#msj").modal("toggle");
            return false;
        }

        if (calleTrabajadorAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa la calle del domicilio del trabajador(a).");
            $("#msj").modal("toggle");
            return false;
        }

        if (numeroExteriorTrabajadorAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa el numero exterior del domicilio del trabajador(a).");
            $("#msj").modal("toggle");
            return false;
        }

        // if (numeroInteriorTrabajadorAlta == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text(".");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        if (coloniaTrabajadorAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa la colonia del domicilio del trabajador(a).");
            $("#msj").modal("toggle");
            return false;
        }

        if (codigoPostalTrabajadorAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa el codigo postal del trabajador(a).");
            $("#msj").modal("toggle");
            return false;
        }

        if (estadoTrabajadorAltaSelect == "-1") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Selecciona el estado del domicilio del trabajador(a).");
            $("#msj").modal("toggle");
            return false;
        }

        if (municipioTrabajadorAltaSelect == "-1") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Selecciona el municipio del domicilio del trabajador(a).");
            $("#msj").modal("toggle");
            return false;
        }

        if (curpTrabajadorAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa la curp del trabajador(a).");
            $("#msj").modal("toggle");
            return false;
        }

        if (rfcTrabajadorAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa el rfc del trabajador(a).");
            $("#msj").modal("toggle");
            return false;
        }

        if (nssTrabajadorAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa el numero del seguro social del trabajador(a).");
            $("#msj").modal("toggle");
            return false;
        }

        // if (tipoIdentificacionTrabajadorAlta == "-1") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Selecciona el tipo de identificacion del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (numeroIdentificacionTrabajadorAlta == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text(".");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        if (emailTrabajadorAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa el email del trabajador(a).");
            $("#msj").modal("toggle");
            return false;
        }

        if (telefonoTrabajadorAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa el telefono del trabajador(a).");
            $("#msj").modal("toggle");
            return false;
        }

        if (sueldoTrabajadorAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa el sueldo del trabajador(a).");
            $("#msj").modal("toggle");
            return false;
        }

        if (tipoSueldoTrabajadorAlta == "-1") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Selecciona la opcion del sueldo del trabajador(a).");
            $("#msj").modal("toggle");
            return false;
        }

        if (horarioInicioTrabajadorAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa el horario de entrada del trabajador(a).");
            $("#msj").modal("toggle");
            return false;
        }

        if (horarioFinTrabajadorAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa la hora de salida del trabajador(a).");
            $("#msj").modal("toggle");
            return false;
        }

        // if (horasLaboradasTrabajadorAlta == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa el email del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        if ((razonSocialEmpresaAlta == "") && (nombreComercialEmpresaAlta == "") && (nombrePatronEmpresaAlta == "")) {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa la razon social o el nombre comercial o el nombre del patron.");
            $("#msj").modal("toggle");
            return false;
        }

        // if (nombreComercialEmpresaAlta == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa el email del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (nombrePatronEmpresaAlta == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa el email del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        if (dedicaEmpresaAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa  a que se dedica la empresa o establecimiento.");
            $("#msj").modal("toggle");
            return false;
        }

        if (curpRfcEmpresaAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa la curp o el rfc de la empresa.");
            $("#msj").modal("toggle");
            return false;
        }

        if (calleEmpresaAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa la calle del domicilio de la empresa.");
            $("#msj").modal("toggle");
            return false;
        }

        if (numeroExteriorEmpresaAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa el numero exterior del domicilio de la empresa.");
            $("#msj").modal("toggle");
            return false;
        }

        // if (numeroIneriorEmpresaAlta == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa la calle del domicilio de la empresa.");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        if (coloniaEmpresaAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa la colonia del domicilio de la empresa.");
            $("#msj").modal("toggle");
            return false;
        }

        if (cpEmpresaAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa el codigo postal de la empresa.");
            $("#msj").modal("toggle");
            return false;
        }

        if (municipioEmpresaAltaSelect == "-1") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Selecciona el estado del domicilio de la empresa.");
            $("#msj").modal("toggle");
            return false;
        }

        if (municipioEmpresaAltaSelect == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Selecciona el municipio del domicilio de la empresa.");
            $("#msj").modal("toggle");
            return false;
        }

        if (telefonoEmpresaAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa el telefono de la empresa.");
            $("#msj").modal("toggle");
            return false;
        }

        if (cuantificacionAlta == "") {
            $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
            $(".textoMensaje").text("Ingresa el archivo de la cuatificación de la empresa.");
            $("#msj").modal("toggle");
            return false;
        }
        // ================================================================================

        $("#formRatificacionesUsuarioPublicoAlta #fechaInicioLaboralTrabajador").val(fechaInicioLaboralTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #fechaFinLaboralTrabajador").val(fechaFinLaboralTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #nombresTrabajador").val(nombresTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #apellidosTrabajador").val(apellidosTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #generoTrabajador").val(generoTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #edadTrabajador").val(edadTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #puestoDesempeñadoTrabajador").val(puestoDesempeñadoTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #calleTrabajador").val(calleTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #numeroExteriorTrabajador").val(numeroExteriorTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #numeroInteriorTrabajador").val(numeroInteriorTrabajadorAlta);

        $("#formRatificacionesUsuarioPublicoAlta #coloniaTrabajador").val(coloniaTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #codigoPostalTrabajador").val(codigoPostalTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #estadoTrabajador").val(estadoTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #municipioTrabajador").val(municipioTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #curpTrabajador").val(curpTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #rfcTrabajador").val(rfcTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #nssTrabajador").val(nssTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #tipoIdentificacionTrabajador").val(tipoIdentificacionTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #numeroIdentificacionTrabajador").val(numeroIdentificacionTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #emailTrabajador").val(emailTrabajadorAlta);

        $("#formRatificacionesUsuarioPublicoAlta #telefonoTrabajador").val(telefonoTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #sueldoTrabajador").val(sueldoTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #tipoSueldoTrabajador").val(tipoSueldoTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #horarioTrabajador").val(horarioTrabajador);
        // $("#formRatificacionesUsuarioPublicoAlta #horarioFinTrabajador").val(horarioFinTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #horasLaboradasTrabajador").val(horasLaboradasTrabajadorAlta);
        $("#formRatificacionesUsuarioPublicoAlta #razonSocialEmpresa").val(razonSocialEmpresaAlta);
        $("#formRatificacionesUsuarioPublicoAlta #nombreComercialEmpresa").val(nombreComercialEmpresaAlta);
        $("#formRatificacionesUsuarioPublicoAlta #nombrePatronEmpresa").val(nombrePatronEmpresaAlta);
        $("#formRatificacionesUsuarioPublicoAlta #dedicaEmpresa").val(dedicaEmpresaAlta);

        $("#formRatificacionesUsuarioPublicoAlta #curpRfcEmpresa").val(curpRfcEmpresaAlta);
        $("#formRatificacionesUsuarioPublicoAlta #calleEmpresa").val(calleEmpresaAlta);
        $("#formRatificacionesUsuarioPublicoAlta #numeroExteriorEmpresa").val(numeroExteriorEmpresaAlta);
        $("#formRatificacionesUsuarioPublicoAlta #numeroIneriorEmpresa").val(numeroIneriorEmpresaAlta);
        $("#formRatificacionesUsuarioPublicoAlta #coloniaEmpresa").val(coloniaEmpresaAlta);
        $("#formRatificacionesUsuarioPublicoAlta #cpEmpresa").val(cpEmpresaAlta);
        $("#formRatificacionesUsuarioPublicoAlta #estadoEmpresa").val(estadoEmpresaAlta);
        $("#formRatificacionesUsuarioPublicoAlta #municipioEmpresa").val(municipioEmpresaAlta);
        $("#formRatificacionesUsuarioPublicoAlta #telefonoEmpresa").val(telefonoEmpresaAlta);
        $("#formRatificacionesUsuarioPublicoAlta #emailEmpresa").val(emailEmpresa);
        
        $("#formRatificacionesUsuarioPublicoAlta").submit();

    }
  // ======================================================================================

  //EVENTO SUBIR ARCHIVO DE PAGO===========================================================
    $("#formRatificacionesUsuarioPublicoAlta").on("submit", function(e){
        e.preventDefault();
        var formData = new FormData(document.getElementById("formRatificacionesUsuarioPublicoAlta"));
        showMessageOverlay("CREANDO...", "images/cargando.gif", "200", "200", "sending");
        $.ajax({
            url: "backend/backend_asignar_ratificacion_auxiliar.php",
            type: "POST",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
                var resultado = JSON.parse(data);
                if(resultado["codigo"] == "fallo"){
                    if(resultado["mensaje"] == ""){
                        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
                        $(".textoMensaje").text("ERROR.");
                    }
                    else{
                        $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
                        $(".textoMensaje").text(resultado["mensaje"]);
                    }
                    $("#msj").modal("toggle");
                    closeMessageOverlay();
                }
                else if(resultado["codigo"] == "exito"){
                    $(".btnCancelarRatificacionUsuario").click();
                    $(".iconoMensaje").html("<i class='bx bx-check-circle bx-tada bx-lg' style='color:#0ea202' ></i>");
                    $(".textoMensaje").text(respuesta["mensaje"]);
                    $("#msj").modal("toggle");
                    closeMessageOverlay();
                }
            }
        });
    });
  //====================================================================================================
</script>
