<?php

  require_once "../../Clases/Categorias.php";
  $Categorias = new Categorias();

  $datos = array(
                  "idCategoria" => $_POST['idCategoria'],
                  "categoria" => $_POST['categoriaU']
                );

  echo $Categorias->ActualizaCat($datos);

 ?>
