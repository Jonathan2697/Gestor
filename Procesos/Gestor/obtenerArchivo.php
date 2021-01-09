<?php

session_start();
require_one "../../Clases/Gestor.php";
$Gestor = new Gestor();
$idArchivo = $_POST['idArchivo'];

echo $Gestor->obtenerRutaArchivo($idArchivo);

 ?>
