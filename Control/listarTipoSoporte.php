<?PHP
include("../Modelo/ClsConectar.php");
include("../Modelo/ClsTipoSoporte.php");

$tipoSoporte = new ClsTipoSoporte();
$tiposSoportes = $tipoSoporte -> listarTipoSoporte();
$numtiposSoportes = $tipoSoporte -> numTipoSoporte();
echo "<option value=''>Seleccione...</option>";
for($i=0;$i<count($tiposSoportes);$i++){
	echo "<option value='".$tiposSoportes[$i]["bd_tiposoporte_id"]."'>".$tiposSoportes[$i]["bd_tiposoporte_detalle"]."</option>";

}

?>