<?PHP
include("../Modelo/ClsConectar.php");
include("../Modelo/ClsEstructura.php");

$estructura = new ClsEstructura();
$estructura -> Valores();
$margen = $_GET['margen'];
$tramo = $_GET['tramo'];
$estructura ->AsignarValorMargen($margen);
$estructura ->AsignarValorTramo($tramo);
$estructuras = $estructura -> listarEstructura();
//$numtiposSoportes = $ubicacion -> numUbicaciones();
echo "
<div class='form-group'>
					    <label class='col-sm-4 control-label'>Estructura</label>
						    <div class='col-sm-3'>
						    <select name='estructura' id='estructura'  class='form-control input-medium'>";
for($i=0;$i<count($estructuras);$i++){
	echo "<option value='".$estructuras[$i]["nom_estructura"]."'>".$estructuras[$i]["nom_estructura"]."</option>";

}
echo "</select>
</div></div>";
echo "<div id= 'ejes'></div>";

?>