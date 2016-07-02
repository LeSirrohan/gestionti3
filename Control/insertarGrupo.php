<?php
include_once("../Modelo/ClsConectar.php");  
include_once("../Modelo/ClsGrupos.php");
$nombre    = $_REQUEST['nombre'];
$grupos    = new ClsGrupos();
$grupos -> asignarNombre($nombre);
$resultado = $grupos -> insertarNombreGrupo();
echo $resultado,"<br>";


?>