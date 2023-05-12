<?php
function comenzarConexion(){
  ini_set('mssql.charset', 'utf-8');
  ini_set('memory_limit', '1024M');
  date_default_timezone_set('America/Mexico_City');

  $settings = parse_ini_file("../settings.ini");

  $DBName   = $settings['DBName'];
  $DBServer =  $settings['DBServer'];
  $DBUser   =  $settings['DBUser'];
  $DBPass   =  $settings['DBPass'];


  $dbConnect = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

  $dbConnect->query("SET @@session.wait_timeout = 3600;");
  if($dbConnect->connect_error){
    die('Error de conexion: ' . $dbConnect->connect_error);
  }

  $dbConnect->query("SET NAMES 'utf8'");
  $dbConnect->autocommit(FALSE);

  return $dbConnect;
}

function cerrarConexion($dbConnect){
  mysqli_close($dbConnect);
}
?>
