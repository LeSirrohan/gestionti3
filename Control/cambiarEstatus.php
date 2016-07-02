<?php
include_once("../Modelo/ClsConectar.php");  
include_once("../Modelo/ClsSoportes.php");
$estatus_soporte = $_REQUEST['estatus_soporte'];
$id_soporte    = $_REQUEST['id_soporte'];
$observacion    = $_REQUEST['observacion'];
echo $estatus_soporte," ",$id_soporte," ",$observacion," <br>";

$soportes   = new ClsSoportes();
$soportes->asignarEstatus($estatus_soporte);
$soportes->asignarId($id_soporte);
$soportes->asignarObservacion($observacion);
$resultado  = $soportes->cambiarEstatus();
echo $resultado;

?>