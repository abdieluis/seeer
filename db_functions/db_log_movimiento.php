<?php
/*
************************************************************************************************************************
INDICE FUNCIONES

************************************************************************************************************************
*/

function registrarLogMovimientos($dbConnect, $fechaOper, $horaOper, $idUsuario, $idUsuarioSolicitante, $ciudadUsuario, $areaMovimiento, $detalleMovimientos){
    $query = 'INSERT INTO log_movimientos (fecha, hora, idUsuario, idUsuarioSolicitante, ciudad, area, detalleMovimiento)
    VALUES (?,?,?,?,?,?,?)';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('ssiisss', $fechaOper, $horaOper, $idUsuario, $idUsuarioSolicitante, $ciudadUsuario, $areaMovimiento, $detalleMovimientos);
    
    return array(array($stmt->execute()), $stmt->insert_id);
}

?>