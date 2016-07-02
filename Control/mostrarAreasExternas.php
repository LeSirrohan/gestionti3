<?PHP
include("../Modelo/ClsConectar.php");
include("../Modelo/ClsMargen.php");

$AreasExternas = new ClsMargen();
$AreasExternas -> Valores();
$margen = $AreasExternas -> listarMargen();
//$numtiposSoportes = $ubicacion -> numUbicaciones();
echo "
<div class='form-group'>
					    <label class='col-sm-4 control-label'>Margen</label>
						    <div class='col-sm-3'>
						    <select name='margen' id='margen'  class='form-control input-medium'>";
for($i=0;$i<count($margen);$i++){
	echo "<option value='".$margen[$i]["nom_margen"]."'>".$margen[$i]["nom_margen"]."</option>";

}
echo "</select>
</div></div>";
echo "<div id= 'tramos'></div>";


?>