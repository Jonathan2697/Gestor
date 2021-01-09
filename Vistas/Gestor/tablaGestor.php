<?php
    session_start();
    require_one "../../Clases/Conexion.php";
    $c = new Conectar();
    $conexion = $c->conexion();
    $idUsuario =  $_SESSION['idUsuario'];
    $sql = "SELECT
                    archivos.id_archivo as idArchivo,
                    usuario.nombre as nombreUsuario,
                    categorias.nombre as categoria,
                    archivos.nombre as nombreArchivo,
                    archivos.tipo as tipoArchivo,
                    archivos.ruta as rutaArchivo,
                    archivo.fecha as fecha

                                  FROM
                                        t_archivos AS archivos
                                            INNER JOIN
                                         t_usuarios AS usuario ON archivos.id_usuario = usuario.id_usuario
                                            INNER JOIN
                                          t_categorias AS categorias ON archivos.id_categoria = categorias.id_categoria
                                          and archivos.id_usuario = '$idUsuario'";
                        $result = mysqli_query($conexion, $sql);

 ?>

<div class="row">
  <div class="col-sm-12">
    <div class="table-responsive">
      <table class="table table-hover table-dark" id="tablagestordatos">
        <thead>
          <tr>
            <th>Categoria</th>
            <th>Nombre</th>
            <th>Extensión archivo</th>
            <th>Descargar</th>
            <th>Visualizar</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <?php

              /* Arreglo de xtensiones*/

              $extensionesValidas = array('png', 'jpg', 'pdf', 'mp3' 'mp4');

              while ($mostrar = mysql_fetch_array($result)) {
                $rutaDescarga = "../Archivos".$idUsuario. "/" .$mostrar['nombreArchivo'];
                $idArchivo = $mostrar ['idArchivo'];
           ?>
          <tr>
            <th><?php echo $mostrar ['categoria']; ?></th>
            <th><?php echo $mostrar ['nombreArchivo']; ?></th>
            <th><?php echo $mostrar ['tipoArchivo']; ?></th>
            <th>
              <a href="<?php echo $rutaDescarga; ?>" download="<?php echo $nombreArchivo; ?>" class="btn btn-success btn-sm"><span class="fas fa-download"></span></a>
            </th>
            <td>
                <?php
                    for ($i=0; $i < count($extensionesValidas); $i++) {
                        if ($extensionesValidas[$i] == $mostrar['tipoArchivo']) {
                 ?>
                    <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#visualizarArchivo" onclick="obtenerArchivoPorId('<?php echo $idArchivo; ?>')">
                      <span class="fas fa-eye"></span>
                    </span>
                <?php
                        }
                      }
                 ?>
            </td>
            <td>
              <span class="btn btn-danger btn-sm" onclick="eliminarArchivo (<?php echo $idArchivo ?>)"></span>
              <span class="fas fa-trash-alt"></span>
            </td>
          </tr>
          <?php
            }
           ?>
        </tbody>
      </table>

    </div>

  </div>

</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#tablagestordatos').DataTable();
  });
</script>
