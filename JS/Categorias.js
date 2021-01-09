 function AgregarCategoria(){
  var categoria = $('#nombrecategoria').val();
  if (categoria == "") {
    swal("Debes agregar una categoria");
    return false;
  }else{
    $.ajax({
      type: "POST",
      data:"categoria" + categoria,
      url:"../Procesos/Categoria/AgregarCat.php"
      success:function(respuesta){
          respuesta = respuesta.trim();
        if (respuesta == 1) {
          $('#tablaCategorias').load("Categorias/tablaCategoria.php");
          $('#nombrecategoria').val("");
          swal("m || m","Se agrego correctamente!!", "success");
        } else {
          swal(":/", "No se pudo agregar!!", "error");
        }
      }
    });
  }
}

    function eliminarCat($idCategoria){
      idCategoria = parseInt(idCategoria);
      if (idCategoria < 1) {
        swal("No tienes ningun id de categoria!!");
        return false;
      }else {
        swal({
          title: "¿Deseas eliminar esta categoria?",
          text: "Al eliminar, ya no se podra recuperar!!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              type:"POST",
              data:"idCategoria=" + idCategoria,
              url: "../Procesos/Categorias/eliminarCategoria.php",
              success:function(respuesta){
                respuesta = respuesta.trim();
              if (respuesta == 1) {
                  $('#tablaCategorias').load("Categorias/tablaCategoria.php");
                    swal("Se elimino correctamente!!", {
                      icon:"success",
                    });
                }else {
                  swal("X~X", "Hay un error en eliminar!!", "error");
                }
              }
            });
          }
        });
      }
    }

    function obtenerDatosCat(idCategoria){
      $.ajax({
        type:"POST",
        data:"idCategoria=" + idCategoria,
        url:"../Procesos/Categorias/obtenerDatosCat.php",
        success:function(respuesta){
          respuesta = jQuery.perseJSON(respuesta);

          $('#idCategoria').val(respuesta['idCategoria']);
          $('#nombrecategoria').val(respuesta['nombrecategoria']);
        }
      })
    }

    function ActualizaCat(){
      if ($('#categoriaU').val() == "") {
        swal("No hay categoria!!");
        return false;
      }else {
        $.ajax({
          type:"POST",
          data:$('#fmrActualizarCat').serealize(),
          url:"../Procesos/Categorias/ActualizaCat.php",
          success:function(respuesta){
            respuesta = respuesta.trim();

            if (respuesta == 1) {
              $('#tablaCategorias').load("Categorias/tablaCategoria.php");
              swal("B)", "Se actualizo con exito!", "success");
            }else {
              swal("XX", "Se encontro un error en actualizar!!", "error");
            }

          }
        })
      }
    }
