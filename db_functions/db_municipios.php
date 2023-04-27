<?php
/*
************************************************************************************************************************
INDICE FUNCIONES
inciarSesionUsuario($dbConnect, $campo, $valor, $contrasena
registrarUsuario($conn,$password,$nombres,$apellidos,$telefono,$email,$fechaAlta,$idUsuarioCategoria)
obtenerDatosUsuario($dbConnect, $campo, $valor)

************************************************************************************************************************
*/

function obtenerMunicipiosCorrespondiente($dbConnect, $estado){
   $respuesta = array();
   $query = 'SELECT mu.id, mu.nombre, mu.ciudadCentro, mu.estado FROM estados es INNER JOIN municipios mu WHERE es.id = mu.estado AND mu.estado = ?';
   $stmt = $dbConnect->prepare($query);
   $stmt->bind_param('i', $estado); 
   $stmt->execute();
   $resultado = $stmt->get_result();
   while ($fila = $resultado->fetch_assoc()) {
      array_push($respuesta, $fila);
   }
   return $respuesta;
}

function mostrarMunicipios($dbConnect){
    $respuesta = array();
    $query = 'SELECT * FROM municipios';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }

    return $respuesta;
}

?>
