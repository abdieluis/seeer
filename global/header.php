<?php
require_once("../global/library.php");

$tipoUsuario = $_SESSION['idTipoUsuario'];

?>
<!DOCTYPE html>
<html>
  <head>
    <title> </title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="author" content="CCLMichoacan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />

    <!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- <script type="text/javascript" src="../js/bootstrap.js"></script> -->
    <!-- <script type="text/javascript" src="../js/bootstrap.min.js"></script> -->

    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/message_overlay.js"></script>
    <script src="../js/utilidades.js"></script>
    <script src="../js/validaciones.js"></script>
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
  <!-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> -->
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
    </style>

    
    <!-- Custom styles for this template -->
    <!-- <link href="../css/navbars.css" rel="stylesheet"> -->
  </head>
  <body>
    

    <nav class="navbar navbar-expand-lg bg-body-tertiary rounded navegacion" aria-label="Thirteenth navbar example">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuSer" aria-controls="menuSer" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-lg-flex divMenu" id="menuSer">
          <a class="navbar-brand col-lg-3 me-0" href="../forms/form_inicio.php"><img src="../images/ccl.png" style="width: 15%"></a>
          <ul class="navbar-nav col-lg-6 justify-content-lg-center">
            <li class="nav-item">
              <a class="nav-link menu" aria-current="page" href="../forms/form_inicio.php">Inicio</a>
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
                <li><a class="dropdown-item" href="#">Usuarios</a></li>
              </ul>
            </li>
            <?php } ?>
          </ul>
          <div class="d-lg-flex col-lg-3 justify-content-lg-end navCerrarSesion">
            <li class="nav-item" style="list-style: none;">
              <!-- <a class="nav-link menu" href="../"><img src="../images/cerrarsesion.png" style="width: 5%"> | Cerrar Sesion</a> -->
              <a class="nav-link menu" href="../"><i class='bx bx-exit'></i> Cerrar Sesion</a>
            </li>
          </div>
        </div>
      </div>
    </nav>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <div class="cuerpoPrincipal">
      
    