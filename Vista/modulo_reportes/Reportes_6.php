<?php
	session_start();

?><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="estilos.css" rel="stylesheet" type="text/css" />
<table width="820" align="center">
   <tr bgcolor="#99CCFF" class="Estilism">
       <td width="126"><div align="center">Nombre</div></td>
       <td width="174"><div align="center">Área</div></td>
       <td width="118"><div align="center">Tipo Soporte</div></td>
       <td width="93"><div align="center">Fecha</div></td>
       <td width="130"><div align="center">T&eacute;cnico</div></td>
       <td width="151"><div align="center">Observaci&oacute;n</div></td>
    </tr>
      <?php 
include ("../../Clases/conectar.php");
$conectar = new conectar();


$nombrecons=$_SESSION['_Nombre']." ".$_SESSION['_Apellido'];
$sql="SELECT * FROM sis_soporte WHERE nombre_tecnico='$nombrecons'";
$con=pg_query($sql);

if(pg_num_rows($con)<=0)
{
	?>
<script> alert("Disculpe usted no posee solicitudes para listar"); </script>
      <?php
	echo '<script languaje="Javascript">location.href="MensajeIndex.html"</script>'; 
}
if (pg_num_rows( $con) >0)
{
while ($reg=pg_fetch_object($con))
{?>
      
   
      <tr bgcolor="#99FFFF" class="Estilo3">
        <td><div align="center"><?php echo $reg->nombre_soporte;?></div></td>
        <td><div align="center"><?php echo $reg->area;?></div></td>
        <td><div align="center"><?php echo $reg->tipo_soporte;?></div></td>
        <td><div align="center"><?php echo $reg->fecha;?></div></td>
        <td><div align="center"><?php echo $reg->nombre_tecnico;?></div></td>
        <td><div align="center"><?php echo $reg->observacion;?></div></td>

    <?php 
	  //echo $reg->Total." ";
	  //echo $total;
	  }} 
	  ?>
  <tr class="Estilo3">
        <td colspan="3" bgcolor="#FFFFFF" align="center"><a href="../../modulo_reportes/pdfphp/php-mysql2.php">Imprimir</a></td>
        <td colspan="3" bgcolor="#FFFFFF" align="center"><a href="../Vista/Busqueda.php">Regresar</a></td>
      
  </table>
