<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="Librerias/Bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Librerias/jquery-ui-1.12.1/jquery-ui.theme.css">
    <link rel="stylesheet" type="text/css" href="Librerias/jquery-ui-1.12.1/jquery-ui.css">

  </head>
  <body>
    <div class="container">
          <h1 style="text-align: center;"> Registro de Usuario </h1>
          <hr>
          <div class="row">
            <div class="col-sm-4"></div>
              <div class="col-sm-4">
                <form id="fmrRegistro" method="post" onsubmit="return AgregarusuarioNuevo()" autocomplete="off">
                  <label>Nombre Personal</label>
                  <input type="text" name="nombre" id="nombre" class="form-control" required="">
                  <label>Fecha de nacimiento</label>
                  <input type="text" name="fechanaci" id="fechanaci" class="form-control" required="" readonly="">
                  <label>Correo Electronico</label>
                  <input type="email" name="correo" id="correo" class="form-control" required="">
                  <label>Nombre de Usuario</label>
                  <input type="text" name="usuario" id="usuario" class="form-control" required="">
                  <label>Contraseña</label>
                  <input type="password" name="contra" id="contra" class="form-control" required="">
                  <br>
                  <div class="row">
                    <div class="col-sm-6 text-left">
                      <button class="btn btn-primary">Registro</button>
                    </div>
                    <div class="col-sm-6 text-right">
                      <a href="Index.php" class="btn btn-success">Login</a>
                    </div>
                  </div>
                </form>
              <div class="col-sm-4"></div>
            </div>
        </div>
    </div>
    <script src="Librerias/jquery-3.5.1.min.js"></script>
    <script src="Librerias/jquery-ui-1.12.1/jquery-ui.js"></script>
    <script src="Librerias/sweetalert.min.js"></script>

      <script type="text/javascript">

        $(function(){
          var fechaA = new Date();
          var yyyy = fechaA.getFullYear();

          $("#fechanaci").datepicker({

              changeMonth: true,
              changeYear: true,
              yearRange: '1900:' + yyyy,
              dateFormat: "dd-mm-yy"
          });
        });

        function AgregarusuarioNuevo() {
          $.ajax({
            method: "POST",
            data: $('#fmrRegistro').serialize(),
            url: "Procesos/Usuario/Registro/Agregarusuario.php",
            success:function(respuesta){
              respuesta = respuesta.trim();

              if(respuesta == 1) {
                  $("#fmrRegistro")[0].reset();
                swal("^¬^", "Se agrego correctamente!!!", "success");
              }else if(respuesta == 2){
                swal("Usuario existente, porfavor agrega uno nuevo");
              }

            }else{
                swal("°XXX°", "No se agrego correctamente", "error");
              }
            }
          });
          return false;
        }
      </script>
  </body>
</html>
