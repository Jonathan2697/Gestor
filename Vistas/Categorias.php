<?php
    session_start();

    if (isset($SESSION['usuario'])) {
      include "Header.php";
      ?>
      <div class="jumbotron jumbotron-fluid">
              <div class="container">
                <h1 class="display-4">Categorías</h1>

                <div class="row">
                  <div class="col-sm-4">
                     <span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregaCategoria">
                       <span class="fas fa-plus-circle"></span> Agregar nueva caregoría                    </span>
                  </div>
                </div>
                <hr>
                 <div class="row">
                   <div class="col-sm-12">
                     <div class="tablaCategorias">

                     </div>

                   </div>

                 </div>
              </div>
      </div>

<!-- Modal -->
<div class="modal fade" id="modalAgregaCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar la nueva categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="fmrCategorias">
          <label>Nombre de la cantegoria</label>
          <input type="text" name="nombrecategoria" id="nombrecategoria" class="form-control">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarCategoria">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAgregaCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Actualizar categoria</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form id="fmrActualizarCat">
          <input type="text" id="id_categoria" name="id_categoria" hidden="">
          <label>Categoria</label>
          <input type="text" id="categoriaU" name="categoriaU" class="form-control">
    </form>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrarUpCat">Cerrar</button>
    <button type="button" class="btn btn-warning" id="btnActualizaCat">Actualizar</button>
  </div>
</div>
</div>
</div>

      <?php
      include "Footer.php";
      ?>
      <!-- Dependencias de categorias, todas las funciones js de categorias -->
      <script src="../JS/Categorias.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $('#tablaCategorias').load("Categorias/tablaCategorias.php");

          $('#btnGuardarCategoria').click(function(){
              AgregarCategoria();
          });

          $('#btnActualizaCat').click(function(){
              ActualizaCat();
          });
        });
      </script>
      <?php
    }else {
      header("location:../Index.php");
    }
       ?>
