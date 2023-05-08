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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

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

	<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

</head>
<body>
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
                window.location = ("forms/form_inicio.php");
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