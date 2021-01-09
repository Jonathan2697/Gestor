<?php

  session_start();

  require_once "../../Clases/Categorias.php";
  $cCategorias = new Categorias();

  $datos = array(
              "idUsuario" => $_SESSION['idUsuario'],
              "categoria" => $_POST['categoria']
                );

    echo $Categorias->AgregarCat($datos);

 ?>
