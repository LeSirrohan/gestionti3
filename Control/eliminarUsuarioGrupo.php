<?php
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);

include_once("../Modelo/ClsConectar.php");  
include_once("../Modelo/ClsUsuariosGrupos.php");
$id        = $_REQUEST['id'];
$grupo     = new ClsUsuariosGrupos();
$grupo -> asignarId($id);

$resultado = $grupo -> eliminarUsuarioGrupo();
if( !$resultado )
{
	echo "<script>alert('Usuario eliminado del Grupo exitosamente');
	location.href='../Vista/Modulo_Administrador/grupos.php'</script>";
}
else
{
	echo "<script>alert('Hubo un error al eliminar un usuario del grupo');
	location.href='../Vista/Modulo_Administrador/grupos.php'</script>";			
}
//echo $resultado;

?>