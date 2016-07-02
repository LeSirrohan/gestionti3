<?PHP
include("../Modelo/ClsConectar.php");
include("../Modelo/ClsTramo.php");

$tramo = new ClsTramo();
$tramo -> Valores();
$margen = $_GET['margen'];
$tramo ->AsignarValorMargen($margen);
$tramo = $tramo -> listarTramo();
//$numtiposSoportes = $ubicacion -> numUbicaciones();
echo "
<div class='form-group'>
					    <label class='col-sm-4 control-label'>Tramo</label>
						    <div class='col-sm-3'>
						    <select name='tramo' id='tramo'  class='form-control input-medium'>";
for($i=0;$i<count($tramo);$i++){
	echo "<option value='".$tramo[$i]["nom_tramo"]."'>".$tramo[$i]["nom_tramo"]."</option>";

}
echo "</select>
</div></div>";
echo "<div id= 'estructuras'></div>";

?>