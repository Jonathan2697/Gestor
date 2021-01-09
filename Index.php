<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="CSS/Login.css">
    <link rel="stylesheet" type="text/css" href="Librerias/Bootstrap4/bootstrap.min.css">
  </head>
  <body>
    <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="Img/carpeta.png" id="icon" alt="User Icon" />
      <h1>Gestor de archivos</h1>
    </div>

    <!-- Login Form -->
    <form method="post" id="fmrLogin" onsubmit="return logear()">
      <input type="text" id="logean" class="fadeIn second" name="logean" placeholder="Usuario" required="">
      <input type="password" id="password" class="fadeIn third" name="pass" placeholder="Contraseña" required="">
      <input type="submit" class="fadeIn fourth" value="Entrar">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="Registros.php">Crear Registro</a>
    </div>

  </div>
</div>
<script src="Librerias/sweetalert.min.js"></script>
<script src="Librerias/jquery-3.5.1.min.js"></script>

  <script type="text/javascript">
    function logear(){
      $.ajax({
        type: "POST",
        data:$("#fmrLogin").serialize(),
        url:"Procesos/Usuario/Login/Login.php",
        success:function(respuesta){
          alert(respuesta);
          respuesta = respuesta.trim();
          if (respuesta == 1) {
            window.location = "Vistas/Inicio.php"
          }else {
            swal("XX", "Error al entrar!", "error");
          }
        }
      });
      return false;
    }

  </script>

</body>
</html>
