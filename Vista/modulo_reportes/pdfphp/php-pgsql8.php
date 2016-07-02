<?php
session_start();

require_once('class.ezpdf.php');
$pdf = new Cezpdf('a4');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);
include ("../../../Modelo/ClsConectar.php");
include ("../../../Modelo/ClsSoportes.php");
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);
$soporte            = new ClsSoportes();
  $fecha_inicial =$_SESSION['_FechaInicial'];
  $fecha_final   =$_SESSION['_FechaFinal'];
  $nombre        = $_SESSION['_NombreTecnico'];
  $area          =$_SESSION['_Area'];
  $tipo          = $_SESSION['_Tipo'];
  

  if ($nombre!='none') {
    $consulta      =" AND a.bd_solicitud_idtecnico= '".$nombre."'";
  }
  if ($area!='none') {
    $consulta      .=" AND c.bd_area_idt= '".$area."'";
  }
  if ($tipo!='none') {
    $consulta      .=" AND d.bd_tiposoporte_idt= '".$tipo."'";
  }
  if ($fecha_inicial!='' && $fecha_inicial!='') {
    $consulta      .=" AND (a.bd_solicitud_fecha_solicitud BETWEEN '".$fecha_inicial."' AND '".$fecha_final."')";
  }


  $soporte->asignarConsulta($consulta);

$reg                = $soporte->busquedaGeneral();
$cantidad_registros = $soporte->cantidadBusquedaGeneral();
echo $cantidad_registros;

if($cantidad_registros<=0)
{
  echo "<script> alert('Disculpe usted no posee solicitudes para listar'); </script>";      
  echo '<script languaje="Javascript">location.href="../../modulo_administrador/Reportes_8.php"</script>'; 
}
else 
{

	$ixx = 0;
	while($ixx<$cantidad_registros) { 
		
		//$data[]                    = array_merge($reg, array('num_soporte'=>$ixx));
		$reg[$ixx]["nombre_soporte"] = utf8_decode($reg[$ixx]["nombre_soporte"]);
		$reg[$ixx]["tipo_soporte"]   = utf8_decode($reg[$ixx]["tipo_soporte"]);
		$reg[$ixx]["area"]           = utf8_decode($reg[$ixx]["area"]);
		$reg[$ixx]["nombre_tecnico"] = utf8_decode($reg[$ixx]["nombre_tecnico"]);
		$reg[$ixx]["observacion"]    = utf8_decode($reg[$ixx]["observacion"]);
		$ixx = $ixx+1;
	}
	$titles = array(
		'num_soporte'    =>'<b>Num</b>',				
		'nombre_soporte' =>'<b>Nombre</b>',				
		'fecha'          =>'<b>Fecha</b>',				
		'tipo_soporte'   =>'<b>Tipo Soporte</b>',				
		'area'           =>'<b>Area </b>',				
		'nombre_tecnico' =>'<b>Tecnico</b>',				
		'observacion'    =>'<b>Observacion</b>'
	);
	$options = array(
		'shadeCol'     =>array(0.9,0.9,0.9),
		'xOrientation' =>'center',
		'width'        =>550,
		'cols'         =>array	(
			'num_soporte'     =>array('width'=>35)
			,'nombre_soporte' =>array('width'=>70)
			,'fecha'          =>array('width'=>65)
			,'tipo_soporte'   =>array('width'=>80)
			,'area'           =>array('width'=>105)
			,'nombre_tecnico' =>array('width'=>80)
			,'observacion'    =>array('width'=>115)
			)
	);
	//$txttit = "<b>Reportes</b>\n";

	//$pdf->ezText($txttit, 12);
	//$pdf->ezImage("odebrecht.jpg", 0, 210, 'none', 'left');

	$pdf->ezTable($reg, $titles, '', $options);
	$pdf->ezText("\n\n\n", 10);
	$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
	//$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
	$pdf->ezStream();
}
?>