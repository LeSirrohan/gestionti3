<?PHP
include("../Modelo/ClsConectar.php");
include("../Modelo/ClsDepartamento.php");

$departamento    = new ClsDepartamento();
$departamentos   = $departamento -> listarDepartamento();
$CANTIDAD_DEPARTAMENTOS = $departamento -> numDepartamentos();
for ($i = 0; $i < $CANTIDAD_DEPARTAMENTOS; $i++){
	echo "<option value='".$departamentos[$i]["bd_area_id"]."'>".$departamentos[$i]["bd_area_detalle"]."</option>";

}

?>