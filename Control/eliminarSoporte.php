<?php
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);

include_once ("../Modelo/ClsConectar.php");  
include_once ("../Modelo/ClsSoportes.php");
$id        = $_REQUEST['id'];
$soportes  = new ClsSoportes();
$soportes -> asignarId($id);

$resultado = $soportes -> eliminarSoporte();
if( !$resultado )
{
	echo "<script>alert('Soporte eliminado exitosamente');
	location.href='../Vista/Modulo_Administrador/listar_solicitudes.php'</script>";
}
else
{
	echo "<script>alert('Hubo un error al procesar su solicitud');
	location.href='../Vista/Modulo_Administrador/listar_solicitudes.php'</script>";			
}
//echo $resultado;

?>