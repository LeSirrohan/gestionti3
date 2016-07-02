<?PHP
include("../Modelo/ClsConectar.php");
include("../Modelo/ClsEstructura.php");

$componente = new ClsEstructura();
$componente -> Valores();
$margen = $_GET['margen'];
$tramo = $_GET['tramo'];
$estructura = $_GET['estructura'];
$componente ->AsignarValorMargen($margen);
$componente ->AsignarValorTramo($tramo);
$componente ->AsignarValorEstructura($estructura);
$componentes = $componente -> listarEstructura();
//$numtiposSoportes = $ubicacion -> numUbicaciones();
echo "
<div class='form-group'>
					    <label class='col-sm-4 control-label'>Estructura</label>
						    <div class='col-sm-3'>
						    <select name='componente' id='componente'  class='form-control input-medium'>";
for($i=0;$i<count($estructuras);$i++){
	echo "<option value='".$componentes[$i]["nom_estructura"]."'>".$componentes[$i]["nom_estructura"]."</option>";

}
echo "</select>
</div></div>";

?>