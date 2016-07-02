<?PHP
include("../Modelo/ClsConectar.php");
include("../Modelo/ClsUsuarios.php");

$id= $_REQUEST['id'];
$usuarios = new ClsUsuarios();
$usuario = $usuarios -> listarUsuarios();


echo "<option value='0'>Seleccione</option>";
for($i=0;$i<count($usuario);$i++){
	echo "<option value='".$usuario[$i]["bd_usuario_id"]."'>".$usuario[$i]["bd_usuario_id"]."</option>";

}


?>