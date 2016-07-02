<?php
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);

include_once("../Modelo/ClsConectar.php");  
include_once("../Modelo/ClsGrupos.php");
$id        = $_REQUEST['id'];
$grupos    = new ClsGrupos();
$grupos -> asignarIdGrupo($id);

$resultado = $grupos -> eliminarNombreGrupo();
if( !$resultado )
{
	echo "<script>alert('Grupo eliminado exitosamente');
	location.href='../Vista/Modulo_Administrador/grupos.php'</script>";
}
else
{
	echo "<script>alert('Hubo un error al procesar su solicitud');
	location.href='../Vista/Modulo_Administrador/grupos.php'</script>";			
}
//echo $resultado;

?>