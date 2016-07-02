<?PHP
include("../Modelo/ClsConectar.php");
include("../Modelo/ClsUbicacion.php");

$ubicacion = new ClsUbicacion();
$ubicaciones = $ubicacion -> listarUbicaciones();
//$numtiposSoportes = $ubicacion -> numUbicaciones();
for($i=0;$i<count($ubicaciones);$i++){
	echo "<option value='".$ubicaciones[$i]["id_ubicacion"]."'>".$ubicaciones[$i]["ubicacion_detalle"]."</option>";

}

?>