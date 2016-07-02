<?PHP
include("../Modelo/ClsConectar.php");
include("../Modelo/ClsEje.php");

$eje = new ClsEje();
$eje -> Valores();
$margen = $_GET['margen'];
$tramo = $_GET['tramo'];
$estructura = $_GET['estructura'];
$eje ->AsignarValorMargen($margen);
$eje ->AsignarValorTramo($tramo);
$eje ->AsignarValorEstructura($estructura);
$ejes = $eje -> listarEjes();

///echo $eje->listarEjesConsulta();
//$numtiposSoportes = $ubicacion -> numUbicaciones();
echo "
<div class='form-group'>
					    <label class='col-sm-4 control-label'>Eje</label>
						    <div class='col-sm-3'>
						    <select name='eje' id='eje'  class='form-control input-medium'>";
for($i=0;$i<count($ejes);$i++){
	echo "<option value='".$ejes[$i]["nom_ejes"]."'>".$ejes[$i]["nom_ejes"]."</option>";

}
echo "</select>
</div></div>";

?>