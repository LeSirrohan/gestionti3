<?PHP
session_start();

include("../Modelo/ClsConectar.php");
include("../Modelo/ClsSoportes.php");

$id                 = $_SESSION['_Id'];
$soporte            = new ClsSoportes();
$soporte -> asignarId($id);
$reg                = $soporte -> verSoporte();
//$numtiposSoportes = $ubicacion -> numUbicaciones();

echo "<div class    ='form-group'><label class='col-sm-3 control-label'>Fecha</label><div class='col-sm-6'>".  $soporte->PostgresFecha2($reg[0]["fecha"])."</div>";

echo "</div>";
echo "<div class    ='form-group'><label class='col-sm-3 control-label'>Usuario</label><div class='col-sm-6'>". $reg[0]["nombre_soporte"]."</div>";
echo "</div>";
echo "<div class    ='form-group'><label class='col-sm-3 control-label'>Soporte</label><div class='col-sm-6'>". $reg[0]["observacion"]."</div>";

echo "</div>";
echo "<div class    ='form-group'><label class='col-sm-3 control-label'>Ubicación</label><div class='col-sm-6'>". $reg[0]["area"]."</div>";
echo "</div>";
echo "<div class    ='form-group'><label class='col-sm-3 control-label'>Tipo Soporte</label><div class='col-sm-6'>". $reg[0]["tipo_soporte"]."</div>";

echo "</div>";

$nombres            = $soporte -> consultar_nombre_tecnico();
$cantidad_tecnicos  = $soporte -> cantidad_tecnicos();


if($reg[0]["nombre_tecnico"]=="")
{
	if ($_SESSION['_Privilegio']==3) 
	{
		$tecnico="<div class='col-sm-6'><select id='select_tecnico' class='form-control'><option>Seleccione...</option>";
		$i=0;
		while ($i < $cantidad_tecnicos)
		{
			$nombre_post=$nombres[$i]["bd_solicitud_idtecnico"];
			$tecnico.="<option value='".$nombre_post."'>".$nombre_post."</option>";
			$i++;
		}		
		$tecnico.="</select></div>";
	}
	if ($_SESSION['_Privilegio']==2) 
	{
		$tecnico="<div class='col-sm-6'><select id='select_tecnico' class='form-control'><option>Seleccione...</option>";

			$tecnico.="<option value='".$_SESSION['_IdUsuario']."'>".$_SESSION['_IdUsuario']."</option>";
		
		$tecnico.="</select></div>";
	}
	else
	{
		$tecnico="SIN ASIGNAR";
	}	
}
else
{
	$tecnico=$reg[0]["nombre_tecnico"];
}
echo "<div class='form-group'><label class='col-sm-3 control-label'>Técnico</label><div class='col-sm-6'>".$tecnico."</div>";

echo "</div>";

if ($_SESSION['_Privilegio']==1) {
	$select= $reg[0]["estatus"];
echo "<div class='form-group'><label class='col-sm-3 control-label'>Estatus</label><div class='col-sm-6'>".$select."</div>";

}
elseif(($_SESSION['_Privilegio']==3 OR $_SESSION['_Privilegio']==2)  AND $reg[0]["estatus"]!= "Por Atender")
{

	$estatus            = $soporte -> listarEstatus();
	$cantidad_tecnicos  = count($estatus);
	$select="<div class='col-sm-6'><select id='estatus_soporte' class='form-control'><option>Seleccione...</option>";
		$i=0;
		while ($i < $cantidad_tecnicos)
		{
			$nombre_post=$estatus[$i]["estatus_detalle"];
			$id_post=$estatus[$i]["id_estatus"];
			$select.="<option value='".$nombre_post."'>".$nombre_post."</option>";
			$i++;
		}		
		$select.="</select></div>";
echo "<div class='form-group'><label class='col-sm-3 control-label'>Estatus</label><div class='col-sm-6'>".$select."</div>";

echo "<div class='form-group'>
		<label class='col-sm-3 control-label'>Observación</label>
		<div class='col-sm-6'><textarea  class='form-control input-large' id='observacion' rows='3'></textarea></div>
	</div>";
}

echo "</div>";

?>