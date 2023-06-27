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
require_once ("db_functions/db_global.php");

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    // DATOS POR POST
    $correoEmpleado = $_POST['correoEmpleado'];
    $correoPatron   = $_POST['correoPatron'];
    $fecha          = $_POST['fecha'];
    $hora           = $_POST['hora'];

    // $correoEmpleado = 
    // $correoPatron   = 'luisabdiel.gv@gmail.com';
    // $fecha          = '12-06-2023';
    // $hora           = '12:22 pm';

    if(!isset($backendIncluido)){
        $dbConnect            = comenzarConexion();
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
    $mail->Subject = utf8_decode('CENTRO DE CONCILIACIÓN LABORAL RATIFICACIÓN AGENDADA');

    //  estructura html para el correo
    // $file = fopen("ruta del archivo", "r");
    // $str = fread($file, filesize("ruta del archivo"));
    // $str = trim($str);
    // fclose($file);

    // $mail->Body = $str;

    $mail->Body    = '<!DOCTYPE html>
    <html>
    <head>
        <title>Plantilla de correo</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f6f6f6;
                margin: 0;
                padding: 20px;
            }
    
            .container {
                max-width: 600px;
                margin: 0 auto;
                background-color: #ffffff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }
    
            .header {
                text-align: center;
                margin-bottom: 20px;
            }
    
            .header img {
                max-width: 150px;
                margin-bottom: 10px;
            }
    
            h1 {
                color: #333333;
            }
    
            p {
                color: #000000;
                margin-bottom: 10px;
            }
            
            a {
                padding: 8px;
                text-decoration: none;
                border-radius: 5px;
            }
    
            .footer {
                background-color: #d3a929;
                padding: 20px;
                text-align: center;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <img src="https://cclmichoacan.gob.mx/images/LOGOS_circulo2.png" alt="Logo de la empresa">
                <h1>CCL Michoacán te envia los datos para tu proxima ratificación</h1>
            </div>
            <p>¡Hola!</p>
            <p>Tu proxima ratificación se celebrará el dia '.$fecha.' a las '.$hora.' en donde se te pide de favor que llegues 15 minutos antes.</p>
            <p>Descarga el documento en el siguiente botón e imprimelo.</p>
            <center><a href="http://seeerconciliador.cclmichoacan.gob.mx/pdf_correo/correo_ratificacion.php" target="_blank" rel="noopener noreferrer">Descargar</a></center>
            <br><br>
            <div class="footer">
                <p>cclmichoacán | Todos los derechos reservados</p>
            </div>
        </div>
    </body>
    </html>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    // // SE INCLUYE UN BACK
    // $backendIncluido = true;
    // require_once("backend/backend_quitar_ratificación_completada.php");
    // unset($backendIncluido);
    // $ejecutarDb = true;

    $codigo = "exito";
    $mensaje = "Los correos han sido enviados correctamente.";
    $objetoRespuesta = "";

    
} catch (Exception $e) {
    // echo "Error al enviar: {$mail->ErrorInfo}";

    $codigo = "fallo";
    $mensaje = "Error al enviar: {$mail->ErrorInfo}";
    $objetoRespuesta = "";
}

if(!isset($backendIncluido)){
    $ejecutarDb = true;
    $respuesta = committedRolledbackDb($dbConnect, $arrayResultados, $ejecutarDb, $objetoRespuesta, $mensaje);
}

echo json_encode($respuesta, JSON_ERROR_UTF8);
