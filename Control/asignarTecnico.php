<?php
include_once("../Modelo/ClsConectar.php");  
include_once("../Modelo/ClsSoportes.php");
$id_soporte = $_REQUEST['id_soporte'];
$tecnico    = $_REQUEST['tecnico'];
$soportes   = new ClsSoportes();
$soportes->asignarIdTecnico($tecnico);
$soportes->asignarId($id_soporte);
$resultado  = $soportes->asignarTecnicoSoporte();
//echo $resultado;

?>