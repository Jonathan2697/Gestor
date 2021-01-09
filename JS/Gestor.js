function agregarArchivosGestor(){
  var fomrData = new FormData(document.getElementById('frmArchivo'));

}
$.ajax({
  url:"../Procesos/Gestor/guardarArchivos.php",
  type:"POST",
  datatype:"html",
  data:FormData,
  cache:false,
  contentType: false,
  processData:false,
  success:function(respuesta){
    respuesta =respuesta.trim();

    if (respuesta == 1) {
      $('#frmArchivo')[0].reset();
      $('#tablaGestorArchivos').load("Gestor/tablaGestor.php");
      swal(":D", "Agregado con exito!", "success");
    }else {
      swal(":/", "Error al querer agregar", "error");
    }
  }
});

function eliminarArchivo(idArchivo){
  swal({
    title: "Estas deacuerdo de querer eliminar el archivo??",
    text: "Una vez eliminado, no podras recuperarlo!!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      $.ajax({
        type: "POST",
        data:"idArchivo=" + idArchivo,
        url:"../Procesos/Gestor/eliminarArchivo.php",
        success:function(respuesta){
          respuesta = respuesta.trim();
          if (respuesta == 1) {
            $('#tablaGestorArchivos').load("Gestor/tablaGestor.php");
            swal("Se elimino correctamente!!",{
              icon: "success",
            });
          }else {
            swal("Error al querer eliminar!!", {
              icon:"error",
            });
          }
        }
      });
    }
  });
}


function obtenerArchivoPorId(idArchivo){
  $.ajax({
    type:"POST",
    data:FormData,
    url:"../Procesos/Gestor/ontenerArchivos.php",
    success:function(respuesta){
      $('#archivoObtenido').html(respuesta);
    }
  });
}
