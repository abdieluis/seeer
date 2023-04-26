<?php
/*
************************************************************************************************************************
INDICE FUNCIONES
inciarSesionUsuario($dbConnect, $campo, $valor, $contrasena
registrarUsuario($conn,$password,$nombres,$apellidos,$telefono,$email,$fechaAlta,$idUsuarioCategoria)
obtenerDatosUsuario($dbConnect, $campo, $valor)
actualizarDatosUsuario($dbConnect, $nombres, $apellidos, $telefono, $email, $idUsuario)
eliminarUsuario($dbConnect, $estatus, $idUsuario)
cambioContrasenia($dbConnect,$password,$idUsuario)
************************************************************************************************************************
*/


function inciarSesionUsuario($dbConnect, $campo, $valor, $contrasena){
    $fila = array();
    $query = 'SELECT * FROM usuarios WHERE '.$campo.' = ? AND password = ? AND eliminado = 0';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('ss', $valor, $contrasena);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $fila = $resultado->fetch_assoc();

    return $fila;
}

function registrarUsuario($dbConnect, $nombres, $apellidos, $idUsuarioCategoria, $usuario, $password){
    $query = 'INSERT INTO usuarios (nombres, apellidos, idUsuarioCategoria, usuario, password)
    VALUES (?,?,?,?,?)';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('ssiss', $nombres, $apellidos, $idUsuarioCategoria, $usuario, $password);
    
    return array(array($stmt->execute()), $stmt->insert_id);
}

function obtenerDatosUsuarioCategoria($dbConnect){
    $respuesta = array();
    $query = 'SELECT * FROM usuario_categoria';
    $stmt = $dbConnect->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($respuesta, $fila);
    }

    return $respuesta;
}

function obtenerDatosUsuario($dbConnect){
    $respuesta = array();
    $query = 'SELECT usu.idUsuario, usu.usuario, usu.nombres, usu.apellidos, usca.usuarioCategoria, usu.eliminado FROM usuarios usu INNER JOIN usuario_categoria usca WHERE usu.idUsuarioCategoria = usca.idUsuarioCategoria';
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


function obtenerDatosLogMovimiento($dbConnect, $campo, $valor){
  $fila = array();
  $query = 'SELECT usu.nombres, usu.apellidos, ci.ciudad FROM usuarios usu INNER JOIN ciudad ci WHERE ci.idCiudad = usu.idCiudad AND '.$campo.' = ?';
  $stmt = $dbConnect->prepare($query);
  $stmt->bind_param('s', $valor);
  $stmt->execute();
  $resultado = $stmt->get_result();
  $fila = $resultado->fetch_assoc();
  return $fila;
}

function eliminarUsuario($dbConnect, $estatus, $idUsuario){
    $query = 'UPDATE usuarios SET eliminado = ? WHERE idUsuario = ?';
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('ii', $estatus, $idUsuario);
    return array($stmt->execute());
}

function cambioContrasenia($dbConnect, $password, $idUsuario){
    $query = "UPDATE usuarios SET password = ? WHERE idUsuario = ? ";
    $stmt = $dbConnect->prepare($query);
    $stmt->bind_param('si', $password, $idUsuario);
    return array($stmt->execute());
    
}

?>