<?php

  class Conectar{
    public function conexion(){
      $servidor = "localhost";
      $usuario = "admin";
      $password = "1234";
      $base = "Gestor";

      $conexion = mysqli_connect($servidor,
                                 $usuario,
                                 $password,
                                 $base);

      $conexion->set_charset('utf8mb4');
        return $conexion;
    }
  }

 ?>
