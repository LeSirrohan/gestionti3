<?php
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);

include_once("../Modelo/ClsConectar.php");  
include_once("../Modelo/ClsUsuarios.php");
$id    = $_REQUEST['id'];
$usuarios = new ClsUsuarios();
$usuarios -> asignarIdUsuario($id);

$resultado = $usuarios -> eliminarUsuario();
if(!$resultado)
{
	echo "<script>alert('Usuario eliminado del sistema exitosamente');
	location.href='../Vista/Modulo_Administrador/usuarios.php'</script>";
}
else
{
	echo "<script>alert('Hubo un error al eliminar un usuario del sistema');
	location.href='../Vista/Modulo_Administrador/usuarios.php'</script>";			
}
//echo $resultado;

?>