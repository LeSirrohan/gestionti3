<?php 


include("../Modelo/ClsConectar.php");
include("../Modelo/ClsTipoSoporte.php");

$soporte   = empty( $_GET['soporte'] ) ? '' : $_GET['soporte'];
$soportes  = new ClsTipoSoporte();
$soportes->asignarDetalle($soporte);
$resultado = $soportes -> insertarTipoSoporte();

echo $resultado;




 ?>
