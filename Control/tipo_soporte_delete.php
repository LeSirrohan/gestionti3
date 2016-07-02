<?php 


include("../Modelo/ClsConectar.php");
include("../Modelo/ClsTipoSoporte.php");

$id   = empty( $_GET['id'] ) ? '' : $_GET['id'];
$soportes  = new ClsTipoSoporte();
$soportes->asignarId($id);
$resultado = $soportes -> eliminarTipoSoporte();
	if(!$resultado)
	{
		echo "<script>alert('Tipo de Soporte eliminado exitosamente');
		location.href='../Vista/Modulo_Administrador/tipos_soportes.php'</script>";
	}
	else
	{
		echo "<script>alert('Hubo un error al procesar su solicitud');
		location.href='../Vista/Modulo_Administrador/tipos_soportes.php'</script>";			
	}



 ?>
