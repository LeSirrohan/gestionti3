<?PHP
session_start();

include("../Modelo/ClsConectar.php");
include("../Modelo/ClsUbicacion.php");

$id          = $_SESSION['_Id'];
$ubicacion   = new ClsUbicacion();
$ubicacion -> asignarUbicacion($id);
$ubicaciones = $ubicacion -> verUbicacion();
print_r($ubicaciones);
//$numtiposSoportes = $ubicacion -> numUbicaciones();
echo $ubicaciones[0]["ubicacion_detalle"];

?>