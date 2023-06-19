<?php
    $title = "SEEER | RATIFICACIÓN";
?>

<!DOCTYPE html>
<html lang="en">
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
    <link rel="icon" href="images/ser.png">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- <script type="text/javascript" src="js/bootstrap.js"></script> -->
    <!-- <script type="text/javascript" src="js/bootstrap.min.js"></script> -->

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/message_overlay.js"></script>
    <script src="js/utilidades.js"></script>
    <script src="js/validaciones.js"></script>
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

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
    </style>

</head>
<body>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <nav class="navbar navbar-expand-lg bg-body-tertiary rounded navegacion" aria-label="Thirteenth navbar example">
        <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuSer" aria-controls="menuSer" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-lg-flex divMenu" id="menuSer">
            <a class="navbar-brand col-lg-3 me-0" href="./"><img src="images/ccl.png" style="width: 18%; padding: 3%"></a>
            <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                <h3>CENTRO DE CONCILIACIÓN LABORAL DEL ESTADO DE MICHOACÁN</h3>
            </ul>
        </div>
        </div>
    </nav>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

    <div class="cuerpoPrincipal">
        <div class="row">
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="card divInfo">
                    <img src="images/rati.jpg" class="card-img-top" alt="CCLMorelia">
                    <div class="card-body">
                        <h5 class="card-title">Ratificaciones</h5>
                        <p class="card-text">Hola las ratificaciones aqui se realizan.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="card divInfo">
                    <img src="images/CCLMichoacan.png" class="card-img-top" alt="CCLUruapan">
                    <div class="card-body">
                        <h5 class="card-title">Centro de Conciliación Laboral del Estado de Michoacán</h5>
                        <p class="card-text">El centro es el encargado de elaborar las ratificaciones.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="card divInfo">
                    <img src="images/ratificacion.jpg" class="card-img-top" alt="CCLZamora">
                    <div class="card-body">
                        <h5 class="card-title">Celebrar las ratificaciones.</h5>
                        <p class="card-text">Terminar la relación laboral estando de acuerdo con el finiquito que la empresa da.</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card" style="background-color: #809798;">
            <center>
                <br>
                <img src="images/calendario.png" class="card-img-top" style="width: 10%">
                <div class="card-body btnAltaSolicitante">
                    <h5 class="card-title">GENERAR UNA CITA PARA LAS RATIFICACIONES</h5>
                    <p class="card-text">PARA AGENDAR UNA RATIFICACIÓN FAVOR DE DAR CLICK AL BOTÓN Y LLENAR LOS DATOS DEL FORMULARIO.</p>
                    <button type="button" class="btn-lg px-4 me-md-2 fw-bold" onclick="abrirPopupGenerarRatificacionUsuario();"><i class='bx bxs-file-plus'></i> GENERAR RATIFICAIÓN</button>
                </div>
            </center>
            
        </div>
        <br>
        <div class="row g-0 bg-body-secondary position-relative">
            <div class="col-md-3 mb-md-0 p-md-4">
                <img src="images/ser.png" class="w-50" style="width: 50%">
            </div>
            <div class="col-md-9 p-4 ps-md-0 btnAltaSolicitante">
                <h5 class="mt-0">SI ERES CCL MICHOACÁN INICIA SESIÓN EN EL BOTÓN.</h5>
                <p>LAS RATIFICACIONES GENERADAS EN EL CENTRO SON PARA CELEBRARLAS EL MISMO DÍA, INICIA SESIÓN PARA PODER REGISTRAR LOS DATOS.</p>
                <button type="button" class="btn-lg px-4 me-md-2 fw-bold" onclick="iniciarSesion();"><i class='bx bx-log-in'></i> INICIAR SESIÓN</button>
            </div>
        </div>
        <div class="my-5">
            <footer class="text-center text-lg-start text-white" style="background-color: #512d36">
                <div class="container p-4">
                <div class="row my-4">
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">

                    <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 150px; height: 150px;">
                        <img src="images/logos.png" height="50" alt=""
                            loading="lazy" />
                    </div>

                    <p class="text-center">EL CENTRO DE CONCILIACIÓN LABORAL DEL ESTADO DE MICHOACÁN ESTA TRABAJANDO PARA TRANSFORMAR LA JUSTICIA LABORAL.</p>

                    </div>

                    <div class="col-lg-1 col-md-6 mb-4 mb-md-0">
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase mb-4">UBICACIONES</h5>

                        <ul class="list-unstyled">
                            <li>
                                <p><i class='bx bx-map'></i> UBICADO EN BLVD. GARCÍA DE LEÓN 1575, CHAPULTEPEC ORIENTE, 58260 MORELIA, MICH.</p>
                            </li>
                            <li>
                                <p><i class='bx bx-map'></i> UBICADO EN NUEVO PARICUTÍN NO 308, COL. JARDINES DE SAN RAFAEL, URUAPAN MICHOACÁN C.P. 30136</p>
                            </li>
                            <li>
                                <p><i class='bx bx-map'></i> UBICADO EN JUSTO SIERRA PONIENTE NO 290, CP. COL. JARDINES DE CATEDRAL, ZAMORA, MICHOACÁN C.P. 59600.</p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-1 col-md-6 mb-4 mb-md-0"></div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <center><h5 class="text-uppercase mb-4">REDES SOCIALES</h5></center>
                        
                        <ul class="list-unstyled d-flex flex-row justify-content-center">
                            <li>
                                <a class="text-white px-2" href="https://www.facebook.com/Actitudiferente/about">
                                    <i class='bx bxl-facebook-circle'></i>
                                </a>
                            </li>
                            <li>
                                <a class="text-white px-2" href="https://www.instagram.com/conciliacionlaboralmichoacan/">
                                    <i class='bx bxl-instagram-alt' ></i>
                                </a>
                            </li>
                            <li>
                                <a class="text-white ps-2" href="https://cclmichoacan.gob.mx/">
                                    <i class='bx bx-globe'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                </div>

                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2023 Copyright: CCLMichoacán.
                </div>
            </footer>
        </div>
    </div> -->



    <nav class="navbar navbar-expand-md bg-dark sticky-top border-bottom" data-bs-theme="dark">
        <div class="container">
                <!-- <a class="navbar-brand d-md-none" href="#">
                    <svg class="bi" width="24" height="24"><use xlink:href="#aperture"/></svg>
                    Aperture
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="#offcanvas" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="#offcanvas" aria-labelledby="#offcanvasLabel">
                <!-- <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="#offcanvasLabel">Aperture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div> -->
                <div class="offcanvas-body">
                    <ul class="navbar-nav flex-grow-1 justify-content-between">
                        <li class="nav-item"></li>
                        <li class="nav-item">
                                <img src="images/ccl.png" alt="" style="width: 10%">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary">
            <div class="col-md-6 p-lg-5 mx-auto my-5">
                <h1 class="display-3 fw-bold">Centro de Conciliación Laboral de Michoacán</h1>
                <h3 class="fw-normal text-muted mb-3">Cambiando la Justicia Laboral</h3>
                <div class="d-flex gap-3 justify-content-center lead fw-normal">
                    <a class="icon-link" href="#" onclick="abrirPopupGenerarRatificacionUsuario();" style="text-decoration: none;">
                    Levantar Ratificación
                    <i class='bx bx-chevron-right'></i>
                    </a>
                    <a class="icon-link" href="login.php" style="text-decoration: none;">
                    Soy CCL
                    <i class='bx bx-chevron-right'></i>
                    </a>
                </div>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>
    </main>
    <footer class="container py-5">
        <div class="row">
            <div class="col-12 col-md">
                <img src="images/logos.png" height="100" alt="" loading="lazy" />
                <br><br>
                <small class="d-block mb-3 text-body-secondary">CCLMICHOACÁN &copy; 2021 – 2027</small>
            </div>
            <div class="col-6 col-md enlacesCcl">
                <h5>Morelia</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary text-decoration-none" href="#" onclick="mostrarMapaCentro(0)"><i class='bx bx-map'></i> UBICADO EN BLVD. GARCÍA DE LEÓN 1575, CHAPULTEPEC ORIENTE, C.P. 58260 MORELIA, MICH.</a></li>
                </ul>
            </div>
            <div class="col-6 col-md enlacesCcl">
                <h5>Uruapan</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary text-decoration-none" href="#" onclick="mostrarMapaCentro(1)"><i class='bx bx-map'></i> UBICADO EN NUEVO PARICUTÍN NO 308, COL. JARDINES DE SAN RAFAEL, C.P. 30136 URUAPAN MICHOACÁN.</a></li>
                </ul>
            </div>
            <div class="col-6 col-md enlacesCcl">
                <h5>Zamora</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary text-decoration-none" href="#" onclick="mostrarMapaCentro(2)"><i class='bx bx-map'></i> UBICADO EN JUSTO SIERRA PONIENTE NO 290, CP. COL. JARDINES DE CATEDRAL, C.P. 59600 ZAMORA, MICHOACÁN.</a></li>
                </ul>
            </div>
            <div class="col-12 col-md mapaCcls">
                
            </div>
        </div>
    </footer>



</body>
</html>
<script>
    function iniciarSesion(){
        window.location = ("login.php");
    }

    function mostrarMapaCentro(operacion){


        if (operacion == 0) {
            var htmlMapaMorelia = 
            "<h5>Mapa</h5>"+
            "<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3756.562176538719!2d-101.16616018471558!3d19.688675786739346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842d0df8d04ea13f%3A0x164b3b337d316d68!2sBlvd.%20Garc%C3%ADa%20de%20Le%C3%B3n%201575%2C%20Chapultepec%20Oriente%2C%2058260%20Morelia%2C%20Mich.!5e0!3m2!1ses-419!2smx!4v1677528472320!5m2!1ses-419!2smx' width='250' height='110' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>";
            $(".mapaCcls").html(htmlMapaMorelia);
        }
        else if (operacion == 1){
            var htmlMapaUruapan = 
            "<h5>Mapa</h5>"+
            "<iframe src='https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d235.1810782776044!2d-102.0039359371337!3d19.416844897358228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sNuevo%20Paricut%C3%ADn%20308%2C%20Uruapan%2C%20Michoac%C3%A1n!5e0!3m2!1ses-419!2smx!4v1686943334501!5m2!1ses-419!2smx' width='250' height='110' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>";
            $(".mapaCcls").html(htmlMapaUruapan);
        }
        else if (operacion == 2){
            var htmlMapaZamora = 
            "<h5>Mapa</h5>"+
            "<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d937.4035977997082!2d-102.28177407078772!3d19.98271265952557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842e88c64d2b7799%3A0x89565d90138cb0ca!2sJusto%20Sierra%20Ote.%20306%2C%20Jardines%20de%20Catedral%2C%2059670%20Zamora%20de%20Hidalgo%2C%20Mich.!5e0!3m2!1ses-419!2smx!4v1677539741033!5m2!1ses-419!2smx' width='250' height='110' style='border:0;'' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>";
            $(".mapaCcls").html(htmlMapaZamora);
        }

    }
</script>
<?php
    require_once("popups/popup_alta_ratificacion_usuario.php");
    require_once("popups/popup_mensaje.php");
    require_once("popups/popup_message_overlay.php");

?>