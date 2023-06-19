<!-- Modal -->
<div class="modal fade" id="altaRatificacionRatificacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <label for='horarioInicioTrabajadorAltaRecepcion' class='form-label'>Fecha de Inicio Laboral</label>
                            <div class="input-group mb-3">
                                <!-- <span class="input-group-text" id="basic-addon1"><i class='bx bx-calendar-check'></i></span> -->
                                <input type='date' class='form-control' aria-describedby='basic-addon1' name='fechaInicioLaboralTrabajadorRecepcionAltaRecepcion' id='fechaInicioLaboralTrabajadorRecepcionAltaRecepcion'>
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <label for='horarioInicioTrabajadorAltaRecepcion' class='form-label'>Fecha de Fin Laboral</label>
                            <div class="input-group mb-3">
                                <!-- <span class="input-group-text" id="basic-addon1"><i class='bx bx-calendar-x' ></i></span> -->
                                <input type='date' class='form-control' aria-describedby='basic-addon1' name='fechaFinLaboralTrabajadorRecepcionAltaRecepcion' id='fechaFinLaboralTrabajadorRecepcionAltaRecepcion'>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bxs-edit-alt'></i></span>
                                <input type="text" class="form-control" placeholder="Nombres del Trabajador" aria-label="Nombres del Trabajador" aria-describedby="basic-addon1" name="nombresTrabajadorRecepcionAltaRecepcion" id="nombresTrabajadorRecepcionAltaRecepcion">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bxs-edit-alt'></i></span>
                                <input type="text" class="form-control" placeholder="Apellidos del Trabajador" aria-label="Apellidos del Trabajador" aria-describedby="basic-addon1" name="apellidosTrabajadorRecepcionAltaRecepcion" id="apellidosTrabajadorRecepcionAltaRecepcion">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="generoTrabajadorRecepcionAltaRecepcion"><i class='bx bx-male-female'></i></label>
                                <select class="form-select" id="generoTrabajadorRecepcionAltaRecepcion">
                                    <option value="-1">Genero</option>
                                    <option value="Hombre">Hombre</option>
                                    <option value="Mujer">Mujer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-user-circle'></i></span>
                                <input type="text" class="form-control" placeholder="Edad Trabajador" aria-label="Edad Trabajador" aria-describedby="basic-addon1" name="edadTrabajadorRecepcionAltaRecepcion" id="edadTrabajadorRecepcionAltaRecepcion" maxlength="3" onKeypress="return soloNumeros(event);">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-id-card'></i></span>
                                <input type="text" class="form-control" placeholder="Puesto Desempeñado" aria-label="Puesto Desempeñado" aria-describedby="basic-addon1" name="puestoDesempeñadoTrabajadorRecepcionAltaRecepcion" id="puestoDesempeñadoTrabajadorRecepcionAltaRecepcion">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-map-pin'></i></span>
                                <input type="text" class="form-control" placeholder="Calle" aria-label="Calle" aria-describedby="basic-addon1" name="calleTrabajadorRecepcionAltaRecepcion" id="calleTrabajadorRecepcionAltaRecepcion">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-home'></i></span>
                                <input type="text" class="form-control" placeholder="Número Exterior" aria-label="Número Exterior" aria-describedby="basic-addon1" name="numeroExteriorTrabajadorRecepcionAltaRecepcion" id="numeroExteriorTrabajadorRecepcionAltaRecepcion" maxlength="10" onKeypress="return soloNumeros(event);">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-home'></i></span>
                                <input type="text" class="form-control" placeholder="Número Interior" aria-label="Número Interior" aria-describedby="basic-addon1" name="numeroInteriorTrabajadorRecepcionAltaRecepcion" id="numeroInteriorTrabajadorRecepcionAltaRecepcion">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bxs-directions'></i></span>
                                <input type="text" class="form-control" placeholder="Colonia" aria-label="Colonia" aria-describedby="basic-addon1" name="coloniaTrabajadorRecepcionAltaRecepcion" id="coloniaTrabajadorRecepcionAltaRecepcion">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-map-pin'></i></span>
                                <input type="text" class="form-control" placeholder="Código Postal" aria-label="Código Postal" aria-describedby="basic-addon1" name="codigoPostalTrabajadorRecepcionAltaRecepcion" id="codigoPostalTrabajadorRecepcionAltaRecepcion" maxlength="5" onKeypress="return soloNumeros(event);">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-map'></i></span>
                                <select class="form-select selectEstadosTrabajador" id="estadoTrabajadorRecepcionAltaRecepcion" onchange="mostrarMunicipiosTrabajadorRecepcion();"></select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-map'></i></span>
                                <select class="form-select selectMunicipioTrabajadorRecepcion" id="municipioTrabajadorRecepcionAltaRecepcion">
                                    <option value="-1">Municipio de Trabajador</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-id-card'></i></span>
                                <input type="text" class="form-control" placeholder="Curp Trabajador" aria-label="Curp Trabajador" aria-describedby="basic-addon1" name="curpTrabajadorRecepcionAltaRecepcion" id="curpTrabajadorRecepcionAltaRecepcion">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-id-card'></i></span>
                                <input type="text" class="form-control" placeholder="RFC Trabajador" aria-label="RFC Trabajador" aria-describedby="basic-addon1" name="rfcTrabajadorRecepcionAltaRecepcion" id="rfcTrabajadorRecepcionAltaRecepcion">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-id-card'></i></span>
                                <input type="text" class="form-control" placeholder="NSS Trabajador" aria-label="NSS Trabajador" aria-describedby="basic-addon1" name="nssTrabajadorRecepcionAltaRecepcion" id="nssTrabajadorRecepcionAltaRecepcion">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="tipoIdentificacionTrabajadorRecepcionAltaRecepcion"><i class='bx bx-dots-vertical-rounded'></i></label>
                                <select class="form-select" id="tipoIdentificacionTrabajadorRecepcionAltaRecepcion">
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
                                <input type="text" class="form-control" placeholder="Número de identificación" aria-label="Número de identificación" aria-describedby="basic-addon1" name="numeroIdentificacionTrabajadorRecepcionAltaRecepcion" id="numeroIdentificacionTrabajadorRecepcionAltaRecepcion">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-at'></i></span>
                                <input type="text" class="form-control" placeholder="Email Trabajador" aria-label="Email Trabajador" aria-describedby="basic-addon1" name="emailTrabajadorRecepcionAltaRecepcion" id="emailTrabajadorRecepcionAltaRecepcion">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-phone'></i></span>
                                <input type="text" class="form-control" placeholder="Telefono Trabajador" aria-label="Telefono Trabajador" aria-describedby="basic-addon1" name="telefonoTrabajadorRecepcionAltaRecepcion" id="telefonoTrabajadorRecepcionAltaRecepcion" maxlength="10" onKeypress="return soloNumeros(event);">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-dollar-circle'></i></span>
                                <input type="text" class="form-control" placeholder="Sueldo Trabajador" aria-label="Sueldo Trabajador" aria-describedby="basic-addon1" name="sueldoTrabajadorRecepcionAltaRecepcion" id="sueldoTrabajadorRecepcionAltaRecepcion">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-calendar-star'></i></span>
                                <select class="form-select selectTipoSueldoTrabajadorRecepcion" id="tipoSueldoTrabajadorRecepcionAltaRecepcion">
                                    <option value="-1">Selecciona el tipo de sueldo</option>
                                    <option value="Diario">Diario</option>
                                    <option value="Semanal">Semanal</option>
                                    <option value="Quincenal">Quincenal</option>
                                    <option value="Mensual">Mensual</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for='horarioInicioTrabajadorAltaRecepcion' class='form-label'>Horario de Inicio Laboral</label>
                            <div class="input-group mb-3">
                                <!-- <span class="input-group-text" id="basic-addon1"><i class='bx bx-dollar-circle'></i></span> -->
                                <input type="time" class="form-control"  aria-describedby="basic-addon1" name="horarioInicioTrabajadorAltaRecepcion" id="horarioInicioTrabajadorAltaRecepcion">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for='horarioFinTrabajadorAltaRecepcion' class='form-label'>Horario de Fin Laboral</label>
                            <div class="input-group mb-3">
                                <!-- <span class="input-group-text" id="basic-addon1"><i class='bx bx-dollar-circle'></i></span> -->
                                <input type="time" class="form-control"  aria-describedby="basic-addon1" name="horarioFinTrabajadorAltaRecepcion" id="horarioFinTrabajadorAltaRecepcion">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for='horasLaboradasTrabajadorRecepcionAltaRecepcion' class='form-label'>Horas Laboradas Semanal</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-time' ></i></span>
                                <input type="text" class="form-control" aria-describedby="basic-addon1" name="horasLaboradasTrabajadorRecepcionAltaRecepcion" id="horasLaboradasTrabajadorRecepcionAltaRecepcion" disabled>
                            </div>
                        </div>
                        <br><br>
                        <center><div class="col-md-12" style="font-weight: bold;">DATOS DE LA EMPRESA</div></center>
                        <br><br>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-buildings'></i></span>
                                <input type="text" class="form-control" placeholder="Razón Social de la Empresa" aria-label="Razón Social de la Empresa" aria-describedby="basic-addon1" name="razonSocialEmpresaRecepcionAltaRecepcion" id="razonSocialEmpresaRecepcionAltaRecepcion">
                            </div>
                        </div>
                        <div class="col-md-6 auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-buildings'></i></span>
                                <input type="text" class="form-control" placeholder="Nombre Comercial" aria-label="Nombre Comercial" aria-describedby="basic-addon1" name="nombreComercialEmpresaRecepcionAltaRecepcion" id="nombreComercialEmpresaRecepcionAltaRecepcion">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-briefcase'></i></span>
                                <input type="text" class="form-control" placeholder="Nombre del Patrón" aria-label="Nombre del Patrón" aria-describedby="basic-addon1" name="nombrePatronEmpresaRecepcionAltaRecepcion" id="nombrePatronEmpresaRecepcionAltaRecepcion">
                            </div>
                        </div>
                        <div class="col-md-6 auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-at'></i></span>
                                <input type="text" class="form-control" placeholder="Email Empresa" aria-label="Email Empresa" aria-describedby="basic-addon1" name="emailEmpresaAltaRecepcion" id="emailEmpresaAltaRecepcion">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-help-circle' ></i></span>
                                <input type="text" class="form-control" placeholder="¿A Qué Se Dedica La Empresa o Establecimiento?" aria-label="¿A Qué Se Dedica La Empresa o Establecimiento?" aria-describedby="basic-addon1" name="dedicaEmpresaRecepcionAltaRecepcion" id="dedicaEmpresaRecepcionAltaRecepcion">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-id-card'></i></span>
                                <input type="text" class="form-control" placeholder="CURP O RFC del Patrón" aria-label="CURP O RFC del Patrón" aria-describedby="basic-addon1" name="curpRfcEmpresaRecepcionAltaRecepcion" id="curpRfcEmpresaRecepcionAltaRecepcion">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-map-pin'></i></span>
                                <input type="text" class="form-control" placeholder="Calle Empresa" aria-label="Calle Empresa" aria-describedby="basic-addon1" name="calleEmpresaRecepcionAltaRecepcion" id="calleEmpresaRecepcionAltaRecepcion">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-home'></i></span>
                                <input type="text" class="form-control" placeholder="Número Exterior Empresa" aria-label="Número Exterior" aria-describedby="basic-addon1" name="numeroExteriorEmpresaRecepcionAltaRecepcion" id="numeroExteriorEmpresaRecepcionAltaRecepcion" maxlength="10" onKeypress="return soloNumeros(event);">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-home'></i></span>
                                <input type="text" class="form-control" placeholder="Número Interior Empresa" aria-label="Número Interior Empresa" aria-describedby="basic-addon1" name="numeroIneriorEmpresaRecepcionAltaRecepcion" id="numeroIneriorEmpresaRecepcionAltaRecepcion">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bxs-directions'></i></span>
                                <input type="text" class="form-control" placeholder="Colonia Empresa" aria-label="Colonia" aria-describedby="basic-addon1" name="coloniaEmpresaRecepcionAltaRecepcion" id="coloniaEmpresaRecepcionAltaRecepcion">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-map-pin'></i></span>
                                <input type="text" class="form-control" placeholder="Código Postal Empresa" aria-label="Código Postal Empresa" aria-describedby="basic-addon1" name="cpEmpresaRecepcionAltaRecepcion" id="cpEmpresaRecepcionAltaRecepcion" maxlength="5" onKeypress="return soloNumeros(event);">
                            </div>
                        </div>

                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-map'></i></span>
                                <select class="form-select selectEstadosEmpresa" id="estadoEmpresaRecepcionAltaRecepcion" onchange="mostrarMunicipiosEmpresaRecepcion();"></select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-map'></i></span>
                                <select class="form-select selectMunicipioEmpresaRecepcion" id="municipioEmpresaRecepcionAltaRecepcion">
                                    <option value="-1">Municipio de la Empresa</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class='bx bx-phone'></i></span>
                                <input type="text" class="form-control" placeholder="Telefono Empresa" aria-label="Telefono Empresa" aria-describedby="basic-addon1" name="telefonoEmpresaRecepcionAltaRecepcion" id="telefonoEmpresaRecepcionAltaRecepcion" maxlength="10" onKeypress="return soloNumeros(event);">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <div class="input-group mb-3 btnArchivo">
                                <button class='col-sm-12 cargarArchivo' onClick='clickCargarArchivoCuantificacionRecepcion();'><i class='bx bx-import'></i> Sube la Cuantificación</button>
                            </div>
                        </div>
                        <br><br>
                        <center><div class="col-md-12" style="font-weight: bold;">ASIGNA EL AUXILIAR</div></center>
                        <br><br>
                        <div class="col-md-12">
                            <div class="input-group mb-3 opcionesAuxiliarRatificacionRecepcion"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="popupBtnCancelar btnCancelarRatificacionRecepcion" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="popupBtnContinuar" onclick="altaRatificaionRecepcion();">Continuar</button>
            </div>
        </div>
    </div>
    <form class="formularioCamposOcultos" id="formRatificacionesRecepcionAlta" enctype="multipart/form-data">

        <input type="text" name="fechaInicioLaboralTrabajadorRecepcion" id="fechaInicioLaboralTrabajadorRecepcion" />
        <input type="text" name="fechaFinLaboralTrabajadorRecepcion" id="fechaFinLaboralTrabajadorRecepcion" />
        <input type="text" name="nombresTrabajadorRecepcion" id="nombresTrabajadorRecepcion" />
        <input type="text" name="apellidosTrabajadorRecepcion" id="apellidosTrabajadorRecepcion" />
        <input type="text" name="generoTrabajadorRecepcion" id="generoTrabajadorRecepcion" />
        <input type="text" name="edadTrabajadorRecepcion" id="edadTrabajadorRecepcion"/>
        <input type="text" name="puestoDesempeñadoTrabajadorRecepcion" id="puestoDesempeñadoTrabajadorRecepcion" />
        <input type="text" name="calleTrabajadorRecepcion" id="calleTrabajadorRecepcion" />
        <input type="text" name="numeroExteriorTrabajadorRecepcion" id="numeroExteriorTrabajadorRecepcion" />
        <input type="text" name="numeroInteriorTrabajadorRecepcion" id="numeroInteriorTrabajadorRecepcion"/>

        <input type="text" name="coloniaTrabajadorRecepcion" id="coloniaTrabajadorRecepcion" />
        <input type="text" name="codigoPostalTrabajadorRecepcion" id="codigoPostalTrabajadorRecepcion" />
        <input type="text" name="estadoTrabajadorRecepcion" id="estadoTrabajadorRecepcion" />
        <input type="text" name="municipioTrabajadorRecepcion" id="municipioTrabajadorRecepcion" />
        <input type="text" name="curpTrabajadorRecepcion" id="curpTrabajadorRecepcion" />
        <input type="text" name="rfcTrabajadorRecepcion" id="rfcTrabajadorRecepcion"/>
        <input type="text" name="nssTrabajadorRecepcion" id="nssTrabajadorRecepcion" />
        <input type="text" name="tipoIdentificacionTrabajadorRecepcion" id="tipoIdentificacionTrabajadorRecepcion" />
        <input type="text" name="numeroIdentificacionTrabajadorRecepcion" id="numeroIdentificacionTrabajadorRecepcion" />
        <input type="text" name="emailTrabajadorRecepcion" id="emailTrabajadorRecepcion"/>

        <input type="text" name="telefonoTrabajadorRecepcion" id="telefonoTrabajadorRecepcion" />
        <input type="text" name="sueldoTrabajadorRecepcion" id="sueldoTrabajadorRecepcion" />
        <input type="text" name="tipoSueldoTrabajadorRecepcion" id="tipoSueldoTrabajadorRecepcion" />
        <input type="text" name="horarioTrabajadorRecepcion" id="horarioTrabajadorRecepcion" />
        <input type="text" name="horasLaboradasTrabajadorRecepcion" id="horasLaboradasTrabajadorRecepcion"/>
        <input type="text" name="razonSocialEmpresaRecepcion" id="razonSocialEmpresaRecepcion" />
        <input type="text" name="nombreComercialEmpresaRecepcion" id="nombreComercialEmpresaRecepcion" />
        <input type="text" name="nombrePatronEmpresaRecepcion" id="nombrePatronEmpresaRecepcion" />
        <input type="text" name="dedicaEmpresaRecepcion" id="dedicaEmpresaRecepcion"/>
        <input type="text" name="curpRfcEmpresaRecepcion" id="curpRfcEmpresaRecepcion" />
        
        <input type="text" name="calleEmpresaRecepcion" id="calleEmpresaRecepcion" />
        <input type="text" name="numeroExteriorEmpresaRecepcion" id="numeroExteriorEmpresaRecepcion" />
        <input type="text" name="numeroIneriorEmpresaRecepcion" id="numeroIneriorEmpresaRecepcion" />
        <input type="text" name="coloniaEmpresaRecepcion" id="coloniaEmpresaRecepcion" />
        <input type="text" name="cpEmpresaRecepcion" id="cpEmpresaRecepcion"/>
        <input type="text" name="estadoEmpresaRecepcion" id="estadoEmpresaRecepcion" />
        <input type="text" name="municipioEmpresaRecepcion" id="municipioEmpresaRecepcion" />
        <input type="text" name="telefonoEmpresaRecepcion" id="telefonoEmpresaRecepcion" />
        <input type="text" name="emailEmpresaRecepcion" id="emailEmpresaRecepcion" />
        <input type="text" name="auxiliarRatificacionRecepcion" id="auxiliarRatificacionRecepcion" />

        <input type="file" name="cuantificacionRecepcion" id="cuantificacionRecepcion" accept="application/pdf, image/*" onChange="cambioArchivoCuantificacionRecepcion();" />
    </form>
</div>
<script>
// // FUNCION LIMPIAR CAMPOS =====================================================
// function limpiarCamposRatificacion(){

//     $("#fechaInicioLaboralTrabajadorRecepcionAltaRecepcion").val("");
//     $("#fechaFinLaboralTrabajadorRecepcionAltaRecepcion").val("");
//     $("#nombresTrabajadorRecepcionAltaRecepcion").val("");
//     $("#apellidosTrabajadorRecepcionAltaRecepcion").val("");
//     $("#generoTrabajadorRecepcionAltaRecepcion").val("-1");
//     $("#edadTrabajadorRecepcionAltaRecepcion").val("");
//     $("#puestoDesempeñadoTrabajadorRecepcionAltaRecepcion").val("");
//     $("#calleTrabajadorRecepcionAltaRecepcion").val("");
//     $("#numeroExteriorTrabajadorRecepcionAltaRecepcion").val("");
//     $("#numeroInteriorTrabajadorRecepcionAltaRecepcion").val("");

//     $("#coloniaTrabajadorRecepcionAltaRecepcion").val("");
//     $("#codigoPostalTrabajadorRecepcionAltaRecepcion").val("");
//     $("#curpTrabajadorRecepcionAltaRecepcion").val("");
//     $("#rfcTrabajadorRecepcionAltaRecepcion").val("");
//     $("#nssTrabajadorRecepcionAltaRecepcion").val("");
//     $("#tipoIdentificacionTrabajadorRecepcionAltaRecepcion").val("-1");
//     $("#numeroIdentificacionTrabajadorRecepcionAltaRecepcion").val("");
//     $("#emailTrabajadorRecepcionAltaRecepcion").val("");

//     $("#telefonoTrabajadorRecepcionAltaRecepcion").val("");
//     $("#sueldoTrabajadorRecepcionAltaRecepcion").val("");
//     $("#tipoSueldoTrabajadorRecepcionAltaRecepcion").val("-1");
//     $("#horarioInicioTrabajadorAltaRecepcion").val("");
//     $("#horarioFinTrabajadorAltaRecepcion").val("");
//     $("#horasLaboradasTrabajadorRecepcionAltaRecepcion").val("");
//     $("#razonSocialEmpresaRecepcionAltaRecepcion").val("");
//     $("#nombreComercialEmpresaRecepcionAltaRecepcion").val("");
//     $("#nombrePatronEmpresaRecepcionAltaRecepcion").val("");
//     $("#dedicaEmpresaRecepcionAltaRecepcion").val("");

//     $("#curpRfcEmpresaRecepcionAltaRecepcion").val("");
//     $("#calleEmpresaRecepcionAltaRecepcion").val("");
//     $("#numeroExteriorEmpresaRecepcionAltaRecepcion").val("");
//     $("#numeroIneriorEmpresaRecepcionAltaRecepcion").val("");
//     $("#coloniaEmpresaRecepcionAltaRecepcion").val("");
//     $("#cpEmpresaRecepcionAltaRecepcion").val("");
//     $("#telefonoEmpresaRecepcionAltaRecepcion").val("");
//     $("#cuantificacionRecepcion").val("");
//     $("#emailEmpresaAltaRecepcion").val("");

//     $("#estadoTrabajadorRecepcionAltaRecepcion").val("-1");
//     $("#municipioTrabajadorRecepcionAltaRecepcion").val("-1");

//     $("#estadoEmpresaRecepcionAltaRecepcion").val("-1");
//     $("#municipioEmpresaRecepcionAltaRecepcion").val("-1");

//     $("#auxiliarRatificacionAltaRecepcion option:selected").val("-1");
// }
// // ============================================================================

//FUNCION CLIC CARGAR ARCHIVO=========================================================================
function clickCargarArchivoCuantificacionRecepcion(){
    $("#cuantificacionRecepcion").click();
}
//====================================================================================================

//FUNCION CAMBIO ARCHIVO==============================================================================
function cambioArchivoCuantificacionRecepcion(){
    $(".cargarArchivo").html("<i class='bx bx-check-square' ></i> Archivo Cargado");
}
//====================================================================================================

  // FUNCION CALCULAR HORAS =====================================================
    const inicio = document.getElementById('horarioInicioTrabajadorAltaRecepcion'),
    final = document.getElementById('horarioFinTrabajadorAltaRecepcion'),
    resultado = document.getElementById('horasLaboradasTrabajadorRecepcionAltaRecepcion');
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
    function mostrarEstadosTrabajadorRecepcion(){
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
    function mostrarMunicipiosTrabajadorRecepcion(){
        var idEstadoSeleccionado = $("#estadoTrabajadorRecepcionAltaRecepcion option:selected").val();
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
                    var opcionesMunicipios = "<option value='-1'>Municipio del trabajador</option>";
                    for (i = 0; i < resultados.length; i++) {
                        var resultadosTotales = resultados[i];
                        // console.log(resultadosTotales);
                        var idMunicipio     = resultadosTotales["id"];
                        var nombreMunicipio = resultadosTotales["nombre"];
                        var ciudadCentro    = resultadosTotales["ciudadCentro"];
                        opcionesMunicipios += "<option value='"+idMunicipio+"' centro='"+ciudadCentro+"'>"+nombreMunicipio+"</option>";
                    }
                    $(".selectMunicipioTrabajadorRecepcion").html(opcionesMunicipios);
                    closeMessageOverlay();
                }
            }
        });
    }
  // ============================================================================

   // FUNCION SELECT ESTADOS EMPRESA=====================================================
    function mostrarEstadosEmpresaRecepcion(){
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
    function mostrarMunicipiosEmpresaRecepcion(){
        var idEstadoSeleccionado = $("#estadoEmpresaRecepcionAltaRecepcion option:selected").val();
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
                    var opcionesMunicipios = "<option value='-1'>Municipio de la Empresa</option>";
                    for (i = 0; i < resultados.length; i++) {
                        var resultadosTotales = resultados[i];
                        // console.log(resultadosTotales);
                        var idMunicipio     = resultadosTotales["id"];
                        var nombreMunicipio = resultadosTotales["nombre"];
                        var ciudadCentro    = resultadosTotales["ciudadCentro"];
                        opcionesMunicipios += "<option value='"+idMunicipio+"' centro='"+ciudadCentro+"'>"+nombreMunicipio+"</option>";
                    }
                    $(".selectMunicipioEmpresaRecepcion").html(opcionesMunicipios);
                    closeMessageOverlay();
                }
            }     
        });
    }
  // ============================================================================

  // FUNCION ABRIR POPUP ========================================================
    function abrirPopupGenerarRatificacionRecepcion(idCiudad){

        // limpiarCampos();

        mostrarEstadosTrabajadorRecepcion();
        mostrarEstadosEmpresaRecepcion();


        var jsonData = {
            "idCiudad": idCiudad
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
                    console.log(resultados);

                    var opcionesAuxiliar = "<option value='-1'>Usuario Auxiliar</option>";

                    for (i = 0; i < resultados.length; i++) {
                        var resultadosTotales = resultados[i];
                        var idUsuarioAuxiliar = resultadosTotales["idUsuarioAuxiliar"];
                        var nombres           = resultadosTotales["nombres"];
                        var apellidos         = resultadosTotales["apellidos"];

                        opcionesAuxiliar += "<option value='"+idUsuarioAuxiliar+"'>"+nombres+" "+apellidos+"</option>";
                    }
                    var htmlSelectUsuarioAuxiliar =
                    "<label class='input-group-text' for='auxiliarRatificacionAltaRecepcion'><i class='bx bx-map'></i></label>"+
                    "<select class='form-select' id='auxiliarRatificacionAltaRecepcion'>"+opcionesAuxiliar+"</select>";

                    $(".opcionesAuxiliarRatificacionRecepcion").html(htmlSelectUsuarioAuxiliar);

                    closeMessageOverlay();
                }
            }
        });



        $("#altaRatificacionRatificacion").modal("toggle");
    }
  // ============================================================================

  // FUNCION DAR DE ALTA RATIFICAION USUARIO PUBLICO ============================
    function altaRatificaionRecepcion(){

        var fechaInicioLaboralTrabajadorRecepcionAltaRecepcion   = $("#fechaInicioLaboralTrabajadorRecepcionAltaRecepcion").val();
        var fechaFinLaboralTrabajadorRecepcionAltaRecepcion      = $("#fechaFinLaboralTrabajadorRecepcionAltaRecepcion").val();
        var nombresTrabajadorRecepcionAltaRecepcion              = $("#nombresTrabajadorRecepcionAltaRecepcion").val();
        var apellidosTrabajadorRecepcionAltaRecepcion            = $("#apellidosTrabajadorRecepcionAltaRecepcion").val();
        var generoTrabajadorRecepcionAltaRecepcion               = $("#generoTrabajadorRecepcionAltaRecepcion").val();
        var edadTrabajadorRecepcionAltaRecepcion                 = $("#edadTrabajadorRecepcionAltaRecepcion").val();
        var puestoDesempeñadoTrabajadorRecepcionAltaRecepcion    = $("#puestoDesempeñadoTrabajadorRecepcionAltaRecepcion").val();
        var calleTrabajadorRecepcionAltaRecepcion                = $("#calleTrabajadorRecepcionAltaRecepcion").val();
        var numeroExteriorTrabajadorRecepcionAltaRecepcion       = $("#numeroExteriorTrabajadorRecepcionAltaRecepcion").val();
        var numeroInteriorTrabajadorRecepcionAltaRecepcion       = $("#numeroInteriorTrabajadorRecepcionAltaRecepcion").val();
        var coloniaTrabajadorRecepcionAltaRecepcion              = $("#coloniaTrabajadorRecepcionAltaRecepcion").val();
        var codigoPostalTrabajadorRecepcionAltaRecepcion         = $("#codigoPostalTrabajadorRecepcionAltaRecepcion").val();
        var estadoTrabajadorRecepcionAltaRecepcion               = $("#estadoTrabajadorRecepcionAltaRecepcion option:selected").text();
        var municipioTrabajadorRecepcionAltaRecepcion            = $("#municipioTrabajadorRecepcionAltaRecepcion option:selected").text();
        var curpTrabajadorRecepcionAltaRecepcion                 = $("#curpTrabajadorRecepcionAltaRecepcion").val();
        var rfcTrabajadorRecepcionAltaRecepcion                  = $("#rfcTrabajadorRecepcionAltaRecepcion").val();
        var nssTrabajadorRecepcionAltaRecepcion                  = $("#nssTrabajadorRecepcionAltaRecepcion").val();
        var tipoIdentificacionTrabajadorRecepcionAltaRecepcion   = $("#tipoIdentificacionTrabajadorRecepcionAltaRecepcion").val();
        var numeroIdentificacionTrabajadorRecepcionAltaRecepcion = $("#numeroIdentificacionTrabajadorRecepcionAltaRecepcion").val();
        var emailTrabajadorRecepcionAltaRecepcion                = $("#emailTrabajadorRecepcionAltaRecepcion").val();
        var telefonoTrabajadorRecepcionAltaRecepcion             = $("#telefonoTrabajadorRecepcionAltaRecepcion").val();
        var sueldoTrabajadorRecepcionAltaRecepcion               = $("#sueldoTrabajadorRecepcionAltaRecepcion").val();
        var tipoSueldoTrabajadorRecepcionAltaRecepcion           = $("#tipoSueldoTrabajadorRecepcionAltaRecepcion").val();
        var horarioInicioTrabajadorAltaRecepcion                 = $("#horarioInicioTrabajadorAltaRecepcion").val();
        var horarioFinTrabajadorAltaRecepcion                    = $("#horarioFinTrabajadorAltaRecepcion").val();
        var horasLaboradasTrabajadorRecepcionAltaRecepcion       = $("#horasLaboradasTrabajadorRecepcionAltaRecepcion").val();
        var razonSocialEmpresaRecepcionAltaRecepcion             = $("#razonSocialEmpresaRecepcionAltaRecepcion").val();
        var nombreComercialEmpresaRecepcionAltaRecepcion         = $("#nombreComercialEmpresaRecepcionAltaRecepcion").val();
        var nombrePatronEmpresaRecepcionAltaRecepcion            = $("#nombrePatronEmpresaRecepcionAltaRecepcion").val();
        var dedicaEmpresaRecepcionAltaRecepcion                  = $("#dedicaEmpresaRecepcionAltaRecepcion").val();
        var curpRfcEmpresaRecepcionAltaRecepcion                 = $("#curpRfcEmpresaRecepcionAltaRecepcion").val();
        var calleEmpresaRecepcionAltaRecepcion                   = $("#calleEmpresaRecepcionAltaRecepcion").val();
        var numeroExteriorEmpresaRecepcionAltaRecepcion          = $("#numeroExteriorEmpresaRecepcionAltaRecepcion").val();
        var numeroIneriorEmpresaRecepcionAltaRecepcion           = $("#numeroIneriorEmpresaRecepcionAltaRecepcion").val();
        var coloniaEmpresaRecepcionAltaRecepcion                 = $("#coloniaEmpresaRecepcionAltaRecepcion").val();
        var cpEmpresaRecepcionAltaRecepcion                      = $("#cpEmpresaRecepcionAltaRecepcion").val();
        var estadoEmpresaRecepcionAltaRecepcion                  = $("#estadoEmpresaRecepcionAltaRecepcion option:selected").text();
        var municipioEmpresaRecepcionAltaRecepcion               = $("#municipioEmpresaRecepcionAltaRecepcion option:selected").text();
        var telefonoEmpresaRecepcionAltaRecepcion                = $("#telefonoEmpresaRecepcionAltaRecepcion").val();
        var cuantificacionAltaRecepcion                          = $("#cuantificacionRecepcion").val();
        var emailEmpresaRecepcion                                = $("#emailEmpresaAltaRecepcion").val();
        var estadoTrabajadorRecepcionAltaRecepcionSelect         = $("#estadoTrabajadorRecepcionAltaRecepcion option:selected").val();
        var municipioTrabajadorRecepcionAltaRecepcionSelect      = $("#municipioTrabajadorRecepcionAltaRecepcion option:selected").val();
        var estadoEmpresaRecepcionAltaRecepcionSelect            = $("#estadoEmpresaRecepcionAltaRecepcion option:selected").val();
        var municipioEmpresaRecepcionAltaRecepcionSelect         = $("#municipioEmpresaRecepcionAltaRecepcion option:selected").val();
        var horarioTrabajadorRecepcion                           = horarioInicioTrabajadorAltaRecepcion+"-"+horarioFinTrabajadorAltaRecepcion;
        var idUsuarioAuxiliar                                    = $("#auxiliarRatificacionAltaRecepcion option:selected").val();


        // // CONDICIONES PARA HACER OBLIGATORIOS LOS INPUT ==================================
        // if (fechaInicioLaboralTrabajadorRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Seleccione la fecha de inicio de labores.");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (fechaFinLaboralTrabajadorRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Seleccione la fecha de termino de labores.");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (nombresTrabajadorRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("El nombre del trabajador(a) no puede ir vacio.");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (apellidosTrabajadorRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Los apellidos del trabajador(a) no pueden ir vacios.");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (generoTrabajadorRecepcionAltaRecepcion == "-1") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Selecciona el genero del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (edadTrabajadorRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa la edad del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (puestoDesempeñadoTrabajadorRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa el puesto desempeñado del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (calleTrabajadorRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa la calle del domicilio del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (numeroExteriorTrabajadorRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa el numero exterior del domicilio del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // // if (numeroInteriorTrabajadorRecepcionAltaRecepcion == "") {
        // //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        // //     $(".textoMensaje").text(".");
        // //     $("#msj").modal("toggle");
        // //     return false;
        // // }

        // if (coloniaTrabajadorRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa la colonia del domicilio del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (codigoPostalTrabajadorRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa el codigo postal del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (estadoTrabajadorRecepcionAltaRecepcionSelect == "-1") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Selecciona el estado del domicilio del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (municipioTrabajadorRecepcionAltaRecepcionSelect == "-1") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Selecciona el municipio del domicilio del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (curpTrabajadorRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa la curp del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (rfcTrabajadorRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa el rfc del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (nssTrabajadorRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa el numero del seguro social del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // // if (tipoIdentificacionTrabajadorRecepcionAltaRecepcion == "-1") {
        // //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        // //     $(".textoMensaje").text("Selecciona el tipo de identificacion del trabajador(a).");
        // //     $("#msj").modal("toggle");
        // //     return false;
        // // }

        // // if (numeroIdentificacionTrabajadorRecepcionAltaRecepcion == "") {
        // //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        // //     $(".textoMensaje").text(".");
        // //     $("#msj").modal("toggle");
        // //     return false;
        // // }

        // if (emailTrabajadorRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa el email del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (telefonoTrabajadorRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa el telefono del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (sueldoTrabajadorRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa el sueldo del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (tipoSueldoTrabajadorRecepcionAltaRecepcion == "-1") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Selecciona la opcion del sueldo del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (horarioInicioTrabajadorAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa el horario de entrada del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (horarioFinTrabajadorAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa la hora de salida del trabajador(a).");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // // if (horasLaboradasTrabajadorRecepcionAltaRecepcion == "") {
        // //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        // //     $(".textoMensaje").text("Ingresa el email del trabajador(a).");
        // //     $("#msj").modal("toggle");
        // //     return false;
        // // }

        // if ((razonSocialEmpresaRecepcionAltaRecepcion == "") && (nombreComercialEmpresaRecepcionAltaRecepcion == "") && (nombrePatronEmpresaRecepcionAltaRecepcion == "")) {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa la razon social o el nombre comercial o el nombre del patron.");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // // if (nombreComercialEmpresaRecepcionAltaRecepcion == "") {
        // //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        // //     $(".textoMensaje").text("Ingresa el email del trabajador(a).");
        // //     $("#msj").modal("toggle");
        // //     return false;
        // // }

        // // if (nombrePatronEmpresaRecepcionAltaRecepcion == "") {
        // //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        // //     $(".textoMensaje").text("Ingresa el email del trabajador(a).");
        // //     $("#msj").modal("toggle");
        // //     return false;
        // // }

        // if (dedicaEmpresaRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa  a que se dedica la empresa o establecimiento.");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (curpRfcEmpresaRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa la curp o el rfc de la empresa.");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (calleEmpresaRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa la calle del domicilio de la empresa.");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (numeroExteriorEmpresaRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa el numero exterior del domicilio de la empresa.");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // // if (numeroIneriorEmpresaRecepcionAltaRecepcion == "") {
        // //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        // //     $(".textoMensaje").text("Ingresa la calle del domicilio de la empresa.");
        // //     $("#msj").modal("toggle");
        // //     return false;
        // // }

        // if (coloniaEmpresaRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa la colonia del domicilio de la empresa.");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (cpEmpresaRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa el codigo postal de la empresa.");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (municipioEmpresaRecepcionAltaRecepcionSelect == "-1") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Selecciona el estado del domicilio de la empresa.");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (municipioEmpresaRecepcionAltaRecepcionSelect == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Selecciona el municipio del domicilio de la empresa.");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (telefonoEmpresaRecepcionAltaRecepcion == "") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa el telefono de la empresa.");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (cuantificacionAltaRecepcion{
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Ingresa el archivo de la cuatificación de la empresa.");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // if (idUsuarioAuxiliar == "-1") {
        //     $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
        //     $(".textoMensaje").text("Selecciona el usuario auxiliar quien ratificara.");
        //     $("#msj").modal("toggle");
        //     return false;
        // }

        // ================================================================================

        $("#formRatificacionesRecepcionAlta #fechaInicioLaboralTrabajadorRecepcion").val(fechaInicioLaboralTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #fechaFinLaboralTrabajadorRecepcion").val(fechaFinLaboralTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #nombresTrabajadorRecepcion").val(nombresTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #apellidosTrabajadorRecepcion").val(apellidosTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #generoTrabajadorRecepcion").val(generoTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #edadTrabajadorRecepcion").val(edadTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #puestoDesempeñadoTrabajadorRecepcion").val(puestoDesempeñadoTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #calleTrabajadorRecepcion").val(calleTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #numeroExteriorTrabajadorRecepcion").val(numeroExteriorTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #numeroInteriorTrabajadorRecepcion").val(numeroInteriorTrabajadorRecepcionAltaRecepcion);

        $("#formRatificacionesRecepcionAlta #coloniaTrabajadorRecepcion").val(coloniaTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #codigoPostalTrabajadorRecepcion").val(codigoPostalTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #estadoTrabajadorRecepcion").val(estadoTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #municipioTrabajadorRecepcion").val(municipioTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #curpTrabajadorRecepcion").val(curpTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #rfcTrabajadorRecepcion").val(rfcTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #nssTrabajadorRecepcion").val(nssTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #tipoIdentificacionTrabajadorRecepcion").val(tipoIdentificacionTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #numeroIdentificacionTrabajadorRecepcion").val(numeroIdentificacionTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #emailTrabajadorRecepcion").val(emailTrabajadorRecepcionAltaRecepcion);

        $("#formRatificacionesRecepcionAlta #telefonoTrabajadorRecepcion").val(telefonoTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #sueldoTrabajadorRecepcion").val(sueldoTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #tipoSueldoTrabajadorRecepcion").val(tipoSueldoTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #horarioTrabajadorRecepcion").val(horarioTrabajadorRecepcion);
        $("#formRatificacionesRecepcionAlta #horasLaboradasTrabajadorRecepcion").val(horasLaboradasTrabajadorRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #razonSocialEmpresaRecepcion").val(razonSocialEmpresaRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #nombreComercialEmpresaRecepcion").val(nombreComercialEmpresaRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #nombrePatronEmpresaRecepcion").val(nombrePatronEmpresaRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #dedicaEmpresaRecepcion").val(dedicaEmpresaRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #curpRfcEmpresaRecepcion").val(curpRfcEmpresaRecepcionAltaRecepcion);

        $("#formRatificacionesRecepcionAlta #calleEmpresaRecepcion").val(calleEmpresaRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #numeroExteriorEmpresaRecepcion").val(numeroExteriorEmpresaRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #numeroIneriorEmpresaRecepcion").val(numeroIneriorEmpresaRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #coloniaEmpresaRecepcion").val(coloniaEmpresaRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #cpEmpresaRecepcion").val(cpEmpresaRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #estadoEmpresaRecepcion").val(estadoEmpresaRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #municipioEmpresaRecepcion").val(municipioEmpresaRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #telefonoEmpresaRecepcion").val(telefonoEmpresaRecepcionAltaRecepcion);
        $("#formRatificacionesRecepcionAlta #emailEmpresaRecepcion").val(emailEmpresaRecepcion);
        $("#formRatificacionesRecepcionAlta #auxiliarRatificacionRecepcion").val(idUsuarioAuxiliar);
        
        $("#formRatificacionesRecepcionAlta").submit();

    }
  // ======================================================================================

  //EVENTO SUBIR ARCHIVO DE PAGO===========================================================
    $("#formRatificacionesRecepcionAlta").on("submit", function(e){
        e.preventDefault();
        var formData = new FormData(document.getElementById("formRatificacionesRecepcionAlta"));
        showMessageOverlay("CREANDO...", "../images/cargando.gif", "200", "200", "sending");
        $.ajax({
            url: "../backend/backend_registrar_ratificacion_recepcion.php",
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
                    $(".btnCancelarRatificacionRecepcion").click();
                    closeMessageOverlay();
                }
                else if(resultado["codigo"] == "exito"){
                    $(".btnCancelarRatificacionRecepcion").click();
                    $(".iconoMensaje").html("<i class='bx bx-check-circle bx-tada bx-lg' style='color:#0ea202' ></i>");
                    $(".textoMensaje").text(resultado["mensaje"]);
                    $("#msjRec").modal("toggle");
                    closeMessageOverlay();
                }
            }
        });
    });
  //====================================================================================================
</script>
