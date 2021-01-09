<?php

require_once "../../../Clases/Usuarios.php";

    $password = sha1($_POST['password']);
    $fechanacimiento = explode("-", $_POST['fechanacimiento']);
    $fechanacimiento = $fechanacimiento[2] . "-" . $fechanacimiento[1] . "-" . $fechanacimiento[0];
    $datos = array(
      "nombre" => $_POST['nombre'],
      "fechanacimiento" => $fechanacimiento,
      "email" => $_POST['email'],
      "usuario" => $_POST['usuario'],
      "password" => $password
                );

    $usuario = new Usuario();
    echo $usuario->Agregarusuario($datos);
 ?>
