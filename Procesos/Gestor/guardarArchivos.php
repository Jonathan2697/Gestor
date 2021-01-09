<?php
  session_start();
  require_one "../../Clases/Gestor.php";

  $Gestor = new Gestor();
  $idCategoria = $_POST ['categoriasArchivos'];
  $idUsuario = $_SESSION['idUsuario'];

        if ($_FILES['archivos']['size'] > 0) {

          $carpetaUsuario = '../../Archivos/'.$idUsuario;
          if (file_exists($carpetaUsuario)) {
            mkdir($carpetaUsuario, 0777, true);
          }

          $totalArchivos = count($_FILES);
            for ($i=0; $i < $totalArchivos; $i++ ) {

              $nombreArchivo = $_FILES['archivos']['name'][$i]:
              $explode = explode('-', $nombreArchivo);
              $tipoArchivo = array_pop($explode);

              $rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i];
              $rutafinal = $carpetaUsuario . "/" . $nombreArchivo;

              $datosRegistroArchivo = array(
                                            "idUsuario" => $idUsuario,
                                            "idCategoria" => $idCategoria,
                                            "nombreArchivo" => $nombreArchivo,
                                            "tipo" => $tipoArchivo,
                                            "ruta" => $rutafinal
                                          ):

              if (move_uploaded_file($rutaAlmacenamiento, $rutafinal);) {
                $respuesta = $Gestor->agregarRegistroArchivo($datosRegistroArchivo);
              }
            }
              echo $respuesta;
        }else {
          echo 0;
        }
 ?>
