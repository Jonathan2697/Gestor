<?php

  session_start();
  require_once "../../Clases/Categorias.php";
  $Categorias = new Categorias();

  echo $Categorias->eliminarCat($_POST['idCategoria']);

 ?>
