<?php
require_once("../global/library.php");
$tipoUsuario = $_SESSION['idTipoUsuario'];
$idUsuario   = $_SESSION['idUsuario'];
// print_r($idUsuario);

require_once("../popups/popup_cerrar_sesion.php");

  $title          = 'CCLMichoacán';
  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="author" content="CCLMichoacan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <title><?=$title?></title>
    <link rel="icon" href="../images/ser.png">

    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- <script type="text/javascript" src="js/bootstrap.js"></script> -->
    <!-- <script type="text/javascript" src="js/bootstrap.min.js"></script> -->

    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/message_overlay.js"></script>
    <script src="../js/utilidades.js"></script>
    <script src="../js/validaciones.js"></script>
    <script src="../js/md5.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <!-- Se adjuntan los CDNS para la tabla paginada de resultados -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
    <!-- ========================================================= -->

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- <script src="assets/dist/js/bootstrap.bundle.min.js"></script> -->
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }
      .bd-mode-toggle {
        z-index: 1500;
      }

      /* estilos en el menu icono campanita */
      .notification-icon {
          position: relative;
          width: 30px;
          height: 30px;
          background-color: #512D36; /* Cambia el color de fondo según tus necesidades */
          border-radius: 50%;
          color: #fff;
      }

      .notification-icon .iconoCampana{
        padding: 7px;
      }

      .notification-count {
          position: absolute;
          top: -5px;
          right: -5px;
          width: 15px;
          height: 15px;
          background-color: #512D36; /* Cambia el color de fondo según tus necesidades */
          border-radius: 50%;
          font-size: 10px;
          color: #fff; /* Cambia el color del texto según tus necesidades */
          display: flex;
          align-items: center;
          justify-content: center;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <!-- <link href="css/navbars.css" rel="stylesheet"> -->
  </head>
  <body>
    

    <nav class="navbar navbar-expand-lg bg-body-tertiary rounded navegacion" aria-label="Thirteenth navbar example">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuSer" aria-controls="menuSer" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-lg-flex divMenu" id="menuSer">
          <a class="navbar-brand col-lg-3 me-0" href="./"><img src="../images/ccl.png" style="width: 18%; padding: 3%"></a>
          <ul class="navbar-nav col-lg-6 justify-content-lg-center">
            <li class="nav-item">
              <a class="nav-link menu" aria-current="page" href="../forms/">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link menu" href="../forms/form_solicitantes.php">Buscar Solicitante</a>
            </li>
            <li class="nav-item">
              <a class="nav-link menu" href="../forms/form_movimientos.php">Movimientos</a>
            </li>
            <?php if ($tipoUsuario == 1) { ?>
              <li class="nav-item dropdown">
                <a class="nav-link menu dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Administrador</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../forms/form_usuarios.php">Usuarios</a></li>
                </ul>
              </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link menu" href="#" onclick="abrirPopupCambiarContrasenia(<?=$idUsuario?>);">Cambiar contraseña</a>
            </li>
            <?php if ($tipoUsuario == 3) { ?>
              <li class="nav-item">
                <a class="nav-link menu" href="../forms/form_ratificacion_auxiliar.php"><div class="notification-icon" id="notificationIcon"><i class='bx bx-bell iconoCampana'></i></div></a>
                
              </li>
            <?php } ?>
            <?php if ($tipoUsuario == 4) { ?>
              <li class="nav-item">
                <a class="nav-link menu" href="../forms/form_ratificacion_asignar.php">Ratificaciones</a>
              </li>
            <?php } ?>
          </ul>
          <div class="d-lg-flex col-lg-3 justify-content-lg-end navCerrarSesion">
            <li class="nav-item" style="list-style: none;">
              <a class="nav-link menu" href="#" onclick="abrirPopupCerrarSesion();"><i class="bx bx-exit"></i> Cerrar Sesion</a>
            </li>
          </div>
        </div>
      </div>
    </nav>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // EVENTO READY FUNCION PARA TRAER LAS RATIFICACIONES DEL USUARIO AUXILIAR QUE INICIO SESIÓN =========
      $(document).ready(function () {
        var notificationIcon = document.getElementById('notificationIcon');

        var idUsuarioSeeer = <?=$idUsuario?>;
      
        var json_data = {
            "idUsuario": idUsuarioSeeer
        }

        showMessageOverlay("CARGANDO...", "../images/cargando.gif", "200", "200", "sending");
        $.ajax({
            method:"POST",
            url:"../backend/backend_mostrar_ratificaciones_asignadas_usuario.php",
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
                  // Aquí obtienes el número de notificaciones asignadas
                    var resultado = respuesta["objetoRespuesta"]["ratificacionAsignada"];// Reemplaza con el número de ratificaciones asignadas
                    var numRatificaciones = resultado["total_ratificaciones"];

                    if (numRatificaciones > 0) {
                      var notificationCount = document.createElement('div');
                      notificationCount.classList.add('notification-count');
                      notificationCount.innerText = numRatificaciones;

                      notificationIcon.appendChild(notificationCount);
                    }

                    closeMessageOverlay();
                }
            }
        });
      });
      // ===================================================================================================

    </script>


    <div class="cuerpoPrincipal">