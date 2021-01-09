<?php
    session_start();
    if(isset($_SESSION['usuario'])){
  include "Header.php";
?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Gestor de archivos</h1>
    <span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarArchivos">
      <span class="fas fa_plus-circle"></span>Agregar archivos
    </span>
    <hr>
    <div id="tablaGestor">

    </div>
  </div>
</div>

<!--Modal para agregar archivos-->

<!-- Modal -->
<div class="modal fade" id="modalAgregarArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form id="frmArchivo" enctype="multipart/form-data" method="post">
        <label>Categoria</label>
        <div class="categoriasLoad"></div>
        <label>Selecciona los eachivos</label>
        <input type="file" name="archivos" id="archivos" class="form-control">
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      <button type="button" class="btn btn-primary" id=btn-guardarArchivos>Guardar</button>
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
<div class="modal fade" id="visualizarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm modal-lg" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Archivo</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div id="archivoObtenido"></div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrarUpCat">Cerrar</button>
  </div>
</div>
</div>
</div>


<?php include "Footer.php"; ?>
<script src="../JS/Gestor.js">

</script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#tablaGestor').load("Gestor/tablaGestor.php");
      $('#categoriasLoad').load("Categorias/selectCategrias.php");

      $('#btn-guardarArchivos').click(function(){
          agregarArchivosGestor();
      });

    });
  </script>

<?php
}else{
  header("location:../Index.php");
}
 ?>
