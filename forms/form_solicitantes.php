<?php
require_once("../global/header.php");
$tipoUsuario = $_SESSION['idTipoUsuario'];
$idUsuario   = $_SESSION['idUsuario'];
?>
      <center>
        <div class="col-sm-3 btnAlta">
          <button type="button" class="col-sm-6" onclick="abrirPopupAltaSolicitante();"><i class='bx bx-user-plus'></i> Solicitante</button>
        </div>
      </center>
      
      <div class="table-responsive tablaResultados">
        <table id="usuariosSolicitantes" class="table table-striped" style="width:100%">
          <thead>
              <tr>
                  <th class="encabezados">Nombres</th>
                  <th class="encabezados">Apellidos</th>
                  <th class="encabezados">Género</th>
                  <th class="encabezados">Edad</th>
                  <th class="encabezados">NroIdentificación</th>
                  <th class="encabezados">Teléfono</th>
                  <th class="encabezados">Ciudad Registro</th>
                  <th class="encabezados">Estatus</th>
                  <th class="encabezados">Operación</th>
              </tr>
          </thead>
          <tbody>
            <?php
            require_once("../db_functions/db_global.php");
            require_once("../db_functions/db_usuarios_solicitante.php");

            $dbConnect = comenzarConexion();
            $datos     = obtenerDatosUsuarioSolicitante($dbConnect);

            for($i = 0; $i < count($datos); $i++){
              echo '<tr>
                  <td class="resultados">'.$datos[$i]["nombres"].'</td>
                  <td class="resultados">'.$datos[$i]["apellidos"].'</td>
                  <td class="resultados">'.$datos[$i]["genero"].'</td>
                  <td class="resultados">'.$datos[$i]["edad"].'</td>
                  <td class="resultados">'.$datos[$i]["nroIdentificacionOficial"].'</td>
                  <td class="resultados">'.$datos[$i]["telefono"].'</td>
                  <td class="resultados">'.$datos[$i]["ciudad"].'</td>';

                  if($datos[$i]["eliminado"] == 0){
                    echo'<td class="resultados"><i class="bx bx-check-circle"></i>Activo</td>';

                  }
                  elseif($datos[$i]["eliminado"] == 1) {
                    echo'<td class="resultados"><i class="bx bxs-x-circle"></i>Eliminado</td>';
                  }
                  
                  echo '<td class="resultados"> <div class="operacionesTd"> <a href="#" onclick="abrirPopupRegistroMovimientoSolicitante('.$datos[$i]["idUsuarioSolicitante"].')"><i class="bx bxs-cog"></i></a> </div> </td>
                </tr>'; 
            }
            cerrarConexion($dbConnect);
            
            ?>
          </tbody>
        </table>
      </div>

<script>
// EVENTO READY ======================================================================================
$(document).ready(function () {
    $('#usuariosSolicitantes').DataTable();
    idUsuarioSolicitanteGlobal = "";
    idUsuarioSesion = <?=$idUsuario?>;
});
// ===================================================================================================
</script>

<?php
require_once("../global/footer.php");
?>