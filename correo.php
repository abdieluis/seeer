<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
require_once ("utilidades/funciones_utilidades.php");
require_once ("db_functions/db_commited_rolledback.php");

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    // DATOS POR POST
    $correoEmpleado = $_POST['correoEmpleado'];
    $correoPatron   = $_POST['correoPatron'];
    // $nombre         = $_POST['nombre'];

    if(!isset($backendIncluido)){
        $dbConnect            = "";
        $ejecutarDb           = true;
        $arrayResultados      = array();
        $objetoRespuesta      = array();
        $codigo               = '';
        $mensaje              = '';
        $fechaOper            = date('Y/m/d');
        $horaOper             = date('H:s:i');
    }



    //Server settings
    $mail->SMTPDebug = 0;                                //Enable verbose debug output
    $mail->isSMTP();                                     //Send using SMTP
    $mail->Host       = 'mail.cclmichoacan.gob.mx';      //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                            //Enable SMTP authentication
    $mail->Username   = 'ratificaciones@cclmichoacan.gob.mx'; //SMTP username
    $mail->Password   = 'PC7hPW+H[y2i';                  //SMTP password
    $mail->SMTPSecure = 'ssl';                           //SSL SI TIENE CANDADITO O SI NO LO TIENE TLS
    $mail->Port       = 465;                             //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ratificaciones@cclmichoacan.gob.mx', 'CCL');
    $mail->addAddress($correoEmpleado);
    $mail->addAddress($correoPatron);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'CENTRO DE CONCILIACIÓN LABORAL.';

    //  estructura html para el correo
    // $file = fopen("ruta del archivo", "r");
    // $str = fread($file, filesize("ruta del archivo"));
    // $str = trim($str);
    // fclose($file);

    // $mail->Body = $str;

    $mail->Body    = '<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CompobantePago</title>

        <style>
          *,
          *::before,
          *::after {
            box-sizing: border-box;
            }
            html {
                font-family: sans-serif;
                line-height: 1.15;
                -webkit-text-size-adjust: 100%;
                -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            }
            main, nav {
                display: block;
            }
            body {
                margin: 0;
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                text-align: left;
                background-color: #fff;
            }
            h1, h2, h5, h4, h5, h5 {
                margin-top: 0;
                margin-bottom: 0.5rem;
            }
            img {
                vertical-align: middle;
                border-style: none;
            }
            label {
                display: inline-block;
                margin-bottom: 0.5rem;
            }
            .container,
            .container-fluid,
            .container-sm,
            .container-md,
            .container-lg,
            .container-xl {
                width: 100%;
                padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto;
            }
            @media (min-width: 576px) {
                .container, .container-sm {
                    max-width: 540px;
                }
            }

            @media (min-width: 768px) {
                .container, .container-sm, .container-md {
                    max-width: 720px;
                }
            }

            @media (min-width: 992px) {
                .container, .container-sm, .container-md, .container-lg {
                    max-width: 960px;
                }
            }

            @media (min-width: 1200px) {
                .container, .container-sm, .container-md, .container-lg, .container-xl {
                    max-width: 1140px;
                }
            }

            .row {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin-right: -15px;
                margin-left: -15px;
            }

            .no-gutters {
                margin-right: 0;
                margin-left: 0;
            }

            .no-gutters > .col,
            .no-gutters > [class*="col-"] {
            padding-right: 0;
            padding-left: 0;
            }

            .col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col,
            .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm,
            .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md,
            .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg,
            .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl,
            .col-xl-auto {
                position: relative;
                width: 100%;
                padding-right: 15px;
                padding-left: 15px;
            }
            .col {
                -ms-flex-preferred-size: 0;
                flex-basis: 0;
                -ms-flex-positive: 1;
                flex-grow: 1;
                max-width: 100%;
            }
            .text-left {
                text-align: left !important;
            }

            .text-right {
                text-align: right !important;
            }

            .text-center {
                text-align: center !important;
            }
            .img-fluid {
                max-width: 100%;
                height: auto;
            }

            .email-head{
                background-color: #000000;
            }
            .email-body{
                background-color: #ffffff;
                padding-top: 30px;
            }
            .email-head img{
                max-width: 80%;
                max-height: 100px;
            }
            .email-footer{
                background-color: #000000;
                padding-top: 20px;
            }
            .form-container{
                padding-top: 20px;
                padding-bottom: 40px;
            }
            .confirm-button{
                border-style:solid;
                border-color:#b30000;
                background:#b30000;
                border-width:0px 0px 2px 0px;
                display:inline-block;
                border-radius:30px;
                text-decoration:none;
                -webkit-text-size-adjust:none;
                -ms-text-size-adjust:none;
                color:#FFFFFF;
                font-size:18px;
                border-style:solid;
                border-color:#b30000;
                border-width:10px 20px 10px 20px;
                display:inline-block;
                background:#b30000;
                border-radius:30px;
                font-family:arial, helvetica, sans-serif;
                font-weight:normal;
                font-style:normal;
                line-height:22px;
                width:auto;
                text-align:center;
                padding: 15px;
            }

        </style>
    </head>
    <body>
        <main>
            <div class="container" style=" max-width: 700px !important;">
                <div class="text-center email-head">
                <img src="images/logo_sin_fondo.png" class="img-fluid" alt="logo">                  
                </div>
            
                <div class="container email-body">

                    <div class="row text-left">
                        <label class="col"><h2>¡HOLA '.strtoupper($nombre).'!</h2></label>
                    </div>

                    <div class="row text-left">
                        <label class="col"><p>La promoción vigente son:</p></label>
                    </div>
                    <div class="row text-left">
                        <label class="col"><p><strong>15%</strong>En todas las telas para persianas sheer elegance, enrrollables.</p></label>
                    </div>
                    <div class="row text-left">
                        <label class="col"><p><strong>15%</strong>En piso laminado.</p></label>
                    </div>

                </div>
                <div class="email-footer">
                    <label class="col text-center" style="color: white;"><h4>PERSIDER '.date('Y').'. Todos los derechos reservados</h4></label>
                </div>

            </div>
        </main>
    </body>
</html>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $codigo = "Exito";
    $mensaje = "Muchas gracias, favor de revisar su correo.";
    $objetoRespuesta = array();

    
} catch (Exception $e) {
    // echo "Error al enviar: {$mail->ErrorInfo}";

    $codigo = "fallo";
    $mensaje = "Error al enviar: {$mail->ErrorInfo}";
    $objetoRespuesta = array();
}

if(!isset($backendIncluido)){
    $ejecutarDb = true;
    $respuesta = committedRolledbackDb($dbConnect, $arrayResultados, $ejecutarDb, $objetoRespuesta, $mensaje);
}

echo json_encode($respuesta, JSON_ERROR_UTF8);
