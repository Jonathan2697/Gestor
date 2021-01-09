<?php
  session_start();
  require_one "../../../Clases/Usuarios.php";

  $usuario = $_POST['logean'];
  $password = sha1($_POST['pass']);

  $usuarioObj = new Usuario();

  echo $usuarioObj->logean($usuario, $password);

 ?>
