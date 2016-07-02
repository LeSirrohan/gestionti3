<?PHP
include("../Modelo/ClsConectar.php");
include("../Modelo/ClsGrupos.php");

$id     = $_REQUEST['id'];
$grupos = new ClsGrupos();
$grupos->asignarIdGrupo($id);
$grupo  = $grupos -> buscarGrupo();
echo $grupo[0]["nombre_grupo"];





?>