<?PHP
include("../Modelo/ClsConectar.php");
include("../Modelo/ClsMargen.php");

$AreasExternas = new ClsMargen();
$AreasExternas -> Valores();
$margen = $AreasExternas -> listarMargen();
//$numtiposSoportes = $ubicacion -> numUbicaciones();
echo "
<div class='form-group'>
					    <label class='col-sm-4 control-label'>Areas Externas</label>
						    <div class='col-sm-3'><label>Margen</label>
						    <select name='margen' id='margen'  class='input-small'>";
for($i=0;$i<count($margen);$i++){
	echo "<option value='".$margen[$i]["id_margen"]."'>".$margen[$i]["nom_margen"]."</option>";

}
echo "</select>"

?>