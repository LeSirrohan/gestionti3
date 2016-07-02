<?php
session_start();
include ("../../../Modelo/ClsConectar.php");
include ("../../../Modelo/ClsSoportes.php");

$soporte = new ClsSoportes();



$nombreXLS = date("d-m-Y_his");

	header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");  
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
	header ("Cache-Control: no-cache, must-revalidate");  
	header ("Pragma: no-cache");  
	header ("Content-type: application/vnd.ms-excel");
	header ("Content-Disposition: attachment; filename=GestionTI_".$nombreXLS.".xls");

echo '<table width="820" align="center" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
	   <tr class="Estilism">
    	   <td width="126" bgcolor="#99CCFF"><div align="center">Nombre</div></td>
	       <td width="174" bgcolor="#99CCFF"><div align="center">&Aacute;rea</div></td>
    	   <td width="118" bgcolor="#99CCFF"><div align="center">Tipo Soporte</div></td>
		   <td width="93" bgcolor="#99CCFF"><div align="center">Fecha</div></td>
		   <td width="130" bgcolor="#99CCFF"><div align="center">T&eacute;cnico</div></td>
		   <td width="151" bgcolor="#99CCFF" align="center"><div align="center">Observaci&oacute;n</div></td>
		</tr>';
  $reg=$soporte->consultar_nombre();
  $cantidad_registros = $soporte->cantidad_soportes_nombres();
 if($cantidad_registros<=0)
{

echo "<script> alert('No hay nombres seleccionados'); </script>";      
echo '<script languaje="Javascript">location.href="../Vista/Busqueda.php"</script>'; 
}
else
{
	 $i=0;
    while ($i<$cantidad_registros)
    {
	    echo '<tr class="Estilo3">';
		echo '<td bgcolor="#99FFFF"><div align="center">'.utf8_decode($reg[$i]["nombre_soporte"]).'</div></td>';
		echo '<td bgcolor="#99FFFF"><div align="center">'.utf8_decode($reg[$i]["area"]).'</div></td>';
		echo '<td bgcolor="#99FFFF"><div align="center">'.utf8_decode($reg[$i]["tipo_soporte"]).'</div></td>';
		echo '<td bgcolor="#99FFFF"><div align="center">'.$reg[$i]["fecha"].'</div></td>';
	    echo '<td bgcolor="#99FFFF"><div align="center">'.utf8_decode($reg[$i]["nombre_tecnico"]).'</div></td>';
	    echo '<td bgcolor="#99FFFF"><div align="center">'.utf8_decode($reg[$i]["observacion"]).'</div></td>';
		echo '</tr>';
		  //echo $reg->Total." ";
		  //echo $total;
		$i++;
	}
}
  //    */
	echo '</table>';

?>

