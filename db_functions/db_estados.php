<?php
/*
************************************************************************************************************************
INDICE FUNCIONES
inciarSesionUsuario($dbConnect, $campo, $valor, $contrasena
registrarUsuario($conn,$password,$nombres,$apellidos,$telefono,$email,$fechaAlta,$idUsuarioCategoria)
obtenerDatosUsuario($dbConnect, $campo, $valor)

************************************************************************************************************************
*/

function obtenerEstados($dbConnect){
    $respuesta = array();
    $query = 'SELECT * FROM estados';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }

    return $respuesta;
}

function obtenerDatosUsuarioSeleccionado($dbConnect, $campo, $valor){
  $fila = array();
  $query = 'SELECT usu.idUsuario, usu.usuario, usu.password, usu.nombres, usu.apellidos, usca.idUsuarioCategoria, usca.usuarioCategoria, usu.eliminado FROM usuarios usu INNER JOIN usuario_categoria usca WHERE usu.idUsuarioCategoria = usca.idUsuarioCategoria AND '.$campo.' = ?';
  $stmt = $dbConnect->prepare($query);
  $stmt->bind_param('s', $valor);
  $stmt->execute();
  $resultado = $stmt->get_result();
  $fila = $resultado->fetch_assoc();
  return $fila;
}


?>