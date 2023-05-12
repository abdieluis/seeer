<?php
$title       = "LOGIN | SEEER";
$needSession = false;
$home        = true;

require_once("popups/popup_mensaje.php");
require_once("popups/popup_message_overlay.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>

	<link rel="icon" href="images/ser.png">
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="author" content="CCLMichoacan">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
	<meta http-equiv="pragma" content="no-cache" />

	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	

    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/anime.min.js"></script>

	<script src="js/md5.js"></script>
	<script src="js/message_overlay.js"></script>
	<script src="js/utilidades.js"></script>
	<script src="js/validaciones.js"></script>

	<!-- <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script> -->

	<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
	<!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
	<!-- <link rel="stylesheet" href="css/style.css"> -->
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
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> -->
	<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css"> -->

	<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
	<!-- <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> -->
	<!-- <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script> -->
	<!-- ========================================================= -->

	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></script> -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->

	<!-- <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->

	<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
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
	<nav class="navbar navbar-expand-lg bg-body-tertiary rounded navegacion" aria-label="Thirteenth navbar example">
		<div class="container-fluid">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuSer" aria-controls="menuSer" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse d-lg-flex divMenu" id="menuSer">
			<a class="navbar-brand col-lg-3 me-0" href="./"><img src="images/ccl.png" style="width: 15%"></a>
			<ul class="navbar-nav col-lg-6 justify-content-lg-center">
				<li class="nav-item"><a class="nav-link menu" href="./"><i class='bx bx-arrow-back'></i> Regresar</a></li>
			</ul>
		</div>
		</div>
	</nav>

	<!-- <script src="assets/dist/js/bootstrap.bundle.min.js"></script> -->



	<div class="page">
	  	<div class="container">
		    <div class="left">
		      <div class="login">Inicio de sesión</div>
		      <div class="eula"><img src="images/ser.png"></div>
		    </div>
		    <div class="right">
		      <svg viewBox="0 0 320 300">
		        <defs>
		          	<linearGradient
                        inkscape:collect="always"
                        id="linearGradient"
                        x1="13"
                        y1="193.49992"
                        x2="307"
                        y2="193.49992"
                        gradientUnits="userSpaceOnUse">
		            	<stop
		                  	style="stop-color:#d3a929;"
		                  	offset="0"
		                  	id="stop876" />
		            	<stop
		                  	style="stop-color:#d3a929;"
		                  	offset="1"
		                  	id="stop878" />
		          </linearGradient>
		        </defs>
		        <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
		      </svg>
		      <div class="form">
		        <label for="usuario">USUARIO</label>
		        <input type="usuario" id="usuario">
		        <label for="password">CONTRASEÑA</label>
		        <input type="password" id="password">
		        <input type="submit" id="submit" value="ACEPTAR" onclick="iniciarSesion();">
		      </div>
		    </div>
		</div>
	</div>

</body>
</html>
<script>
	// FUNCION DE ANIMACION DEL LOGIN ============================================
	var current = null;
	document.querySelector('#usuario').addEventListener('focus', function(e) {
	  if (current) current.pause();
	  current = anime({
	    targets: 'path',
	    strokeDashoffset: {
	      value: 0,
	      duration: 700,
	      easing: 'easeOutQuart'
	    },
	    strokeDasharray: {
	      value: '240 1386',
	      duration: 700,
	      easing: 'easeOutQuart'
	    }
	  });
	});
	document.querySelector('#password').addEventListener('focus', function(e) {
	  if (current) current.pause();
	  current = anime({
	    targets: 'path',
	    strokeDashoffset: {
	      value: -336,
	      duration: 700,
	      easing: 'easeOutQuart'
	    },
	    strokeDasharray: {
	      value: '240 1386',
	      duration: 700,
	      easing: 'easeOutQuart'
	    }
	  });
	});
	document.querySelector('#submit').addEventListener('focus', function(e) {
	  if (current) current.pause();
	  current = anime({
	    targets: 'path',
	    strokeDashoffset: {
	      value: -730,
	      duration: 700,
	      easing: 'easeOutQuart'
	    },
	    strokeDasharray: {
	      value: '530 1386',
	      duration: 700,
	      easing: 'easeOutQuart'
	    }
	  });
	});
	// ===========================================================================

	// EEVENTO PARA PRESIONAR ENTER DESPUES DE LA CONTRASEÑA =====================
	$("#password").keypress(function(event) {
        if (event.keyCode === 13) {
            $("#submit").click();
        }
    });
	// =======================================================================================

	// FUNCION INICIAR SESION ====================================================
	function iniciarSesion(){

		var usuario = $("#usuario").val();
		var password = $("#password").val();

		if (usuario == "") {

			$(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
			$(".textoMensaje").text("El usuario es obligatorio.");
    		$("#msj").modal("toggle");
    		return false;
		}

		if (password == "") {
			$(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
			$(".textoMensaje").text("La contraseña es obligatorio.");
    		$("#msj").modal("toggle");
    		return false;
		}

		var json_data = {
    		"usuario": usuario,
    		"password": calcMD5(password)
    	}

    	showMessageOverlay("VALIDANDO USUARIO...", "images/cargando.gif", "200", "200", "sending");
	    $.ajax({
	      method:"POST",
	      url:"backend/backend_login.php",
	      data:json_data,
	      success:function(data){
	        var respuesta = JSON.parse(data);

	        if(respuesta["codigo"] == "fallo"){
	        	$(".textoMensaje").text(respuesta["mensaje"]);
			    $("#msj").modal("toggle");
	            $("#usuario").val("");
			    $("#password").val("");
	            closeMessageOverlay();
	        }
	        else if(respuesta["codigo"] == "exito"){
                window.location = ("forms/");
                $("#usuario").val("");
                $("#password").val("");
	            closeMessageOverlay();
	        }
	      }
	    });

	}
	// ===========================================================================


	// ICONO DE ERROR PARA MENSAJE =======================================
	// $(".iconoMensaje").html("<i class='bx bx-x-circle bx-tada bx-lg' style='color:#f90707'></i>");
	// ===================================================================

	// ICONO DE EXITO PARA MENSAJE =======================================
	// $(".iconoMensaje").html("<i class='bx bx-check-circle bx-tada bx-lg' style='color:#0ea202' ></i>");
	// ===================================================================

	// ICONO DE ALERTA PARA MENSAJE ======================================
	// $(".iconoMensaje").html("<i class='bx bx-error-circle bx-tada bx-lg' style='color:#ffc300'  ></i>");
	// ===================================================================

</script>