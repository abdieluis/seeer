<?php
/*
************************************************************************************************************************
INDICE FUNCIONES
obtenerDatosCiudad($dbConnect)

************************************************************************************************************************
*/

function obtenerDatosCiudad($dbConnect){
    $respuesta = array();
    $query = 'SELECT * FROM ciudad';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }

    return $respuesta;
}


?>