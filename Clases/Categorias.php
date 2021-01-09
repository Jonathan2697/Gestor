<?php

  require_once "Conexion.php";
  class Categorias extends Conectar {

    public function AgregarCat($datos) {
      $conexion = Conectar::conexion();

      $sql = "INSERT INTO t_categorias (id_usuario, nombre)
                VALUES (?, ?)";
      $query = $conexion->prepare($sql);
      $query->bind_param("is", $datos['idUsuario'],
                               $datos['categoria']);
      $respuesta = $query->execute();
      $query->close();

      return $respuesta;
    }

    public function eliminarCat($idCategoria){
      $conexion = Conectar::conexion();

      $sql = "DELETE FROM t_categorias
              WHERE id_categoria = ?";

      $query = $conexion->prepare($sql);
      $query->bind_param('i, $idCategoria');
      $respuesta = $query->execute();
      $query->close();
      return $respuesta;
    }

    public function obtenerDatosCat($idCategoria){
      $conexion = Conectar::conexion();

      $sql = "SELECT id_categoria,
                      nombre
              FROM t_categorias
              WHERE id_categoria = '$idCategoria'";
      $result = mysqli_query($conexion, $sql);

      $categoria = mysqli_fetch_array($result);

      $datos = array(
              "idCategoria" => $categoria['id_categoria'],
              "nombrecategoria" => $categoria['nombre']
            );
      return $datos;
    }
    public function ActualizaCat($datos) {
      $conexion = Conectar::conexion();

      $sql = "UPDATE t_categorias
              SET nombre = ?
              WHERE id_categoria = ?";

      $query = $conexion->prepare($sql);
      $query->bind_param("si",$datos['categoria'],
                              $datos['idCategoria']);
      $respuesta = $query->execute();
      $query->close();

      return $respuesta;
    }
  }

 ?>
