<?php
	session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta charset="utf-8">
</head>
<?php
unset($_SESSION["_FechaInicial"]);
unset($_SESSION["_FechaFinal"]);
unset($_SESSION["_NombreTecnico"]);
unset($_SESSION["_Area"]);
unset($_SESSION["_Tipo"]);
include("../Modelo/ClsConectar.php");
include("../Modelo/ClsSoportes.php");
$soporte       = new ClsSoportes();
$nombre        =$_POST['nombre'];
$fecha_inicial =$_POST['fecha'];
$fecha_final   =$_POST['fecha2'];
$area          =$_POST['area'];
$tipo          =$_POST['tipo'];
$menu2         =$_POST['menu2'];

//Cambiar el enlace 

if( $_SESSION['_Privilegio'] == 1)
  $enlace="modulo_usuario";
elseif( $_SESSION['_Privilegio'] == 2)
  $enlace="modulo_operador";
elseif( $_SESSION['_Privilegio'] == 3)
  $enlace="modulo_administrador";


//echo $menu2;
//echo $nombre;
//echo $nombre." ".$fecha_inicial." ".$fecha_final." ".$area." ".$tipo;
//Busqueda Simple
if ( $menu2 == 1) //Nombre
	echo"<script type='text/javascript'>document.location.href = '../Vista/".$enlace."/Reportes_1.php';</script>";
elseif ( $menu2 == 2) //Area
  echo"<script type='text/javascript'>document.location.href = '../Vista/".$enlace."/Reportes_5.php';</script>";
elseif ( $menu2 == 3)//Fecha
  echo"<script type='text/javascript'>document.location.href = '../Vista/".$enlace."/Reportes_2.php';</script>";
elseif ( $menu2 == 4)//Tipo Soporte
  echo"<script type='text/javascript'>document.location.href = '../Vista/".$enlace."/Reportes_3.php';</script>";
elseif ( $menu2 == 5)//Tecnico
  echo"<script type='text/javascript'>document.location.href = '../Vista/".$enlace."/Reportes_4.php';</script>";


if( $nombre != 'none' && $area == 'none' && $tipo == 'none' && $fecha_inicial == '' && $fecha_final == '')
{
//Nombre Técnico
  $_SESSION['_NombreTecnico']=$nombre; 
  echo"<script type='text/javascript'>document.location.href = '../Vista/".$enlace."/Reportes_6.php';</script>";

}
elseif( $nombre == 'none' && $area == 'none' && $tipo == 'none' && $fecha_inicial != '' && $fecha_inicial != '')
{	
//Búsqueda por fechas
//	echo $nombre." ".$area." ".$tipo." ".$fecha_inicial." ".$fecha_final;
  $_SESSION['_FechaInicial'] =$fecha_inicial;
  $_SESSION['_FechaFinal']   =$fecha_final;
	if ($fecha_final =='' || $fecha_final=='')
	{
	?>
	<script> alert("Parametros incorrectos"); </script>
    <?php
    echo '<script languaje="Javascript">location.href="../Vista/'.$enlace.'/Busqueda.php"</script>'; 
	}
	if( $fecha_inicial >= $fecha_final)
	{
		?>
		<script> alert("Parametros incorrectos"); </script>
	      <?php
    echo '<script languaje="Javascript">location.href="../Vista/'.$enlace.'/Busqueda.php"</script>'; 
	}
	elseif( $fecha_inicial <= $fecha_final)
	{
   echo"<script type='text/javascript'>document.location.href = '../Vista/".$enlace."/Reportes_7.php';</script>";

  
  }

	elseif( $fecha_inicial == $fecha_final)
	{
		?>
		<script> alert("Parametros incorrectos"); </script>
	      <?php
	echo '<script languaje="Javascript">location.href="../Vista/'.$enlace.'/Busqueda.php"</script>'; 
	}

}
else
{
  $_SESSION['_NombreTecnico'] =$nombre;
  $_SESSION['_Area']          =$area;
  $_SESSION['_Tipo']          =$tipo;
  $_SESSION['_FechaInicial']  =$fecha_inicial;
  $_SESSION['_FechaFinal']    =$fecha_final;
  echo"<script type='text/javascript'>document.location.href = '../Vista/".$enlace."/Reportes_8.php';</script>";

}/*
if($area!='none'  && $nombre=='none' && $tipo=='none' && $fecha_inicial=='' && $fecha_final=='')
{
//Búsqueda por área
	
$_SESSION['_Area']=$area;
	?>
<table width="820" align="center">
  <tr class="Estilo3">
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../../modulo_reportes/pdfphp/php-pgsql8.php?area=<?= $area;?>">Imprimir PDF</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a  href="../../modulo_reportes/pdfphp/php-excel8.php?area=<?= $area;?>">Imprimir Excel</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../Vista/Busqueda.php">Regresar</a></td>

   <tr bgcolor="#99CCFF" class="Estilism">
       <td width="126"><div align="center">Nombre</div></td>
       <td width="174"><div align="center">Area</div></td>
       <td width="118"><div align="center">Tipo Soporte</div></td>
       <td width="93"><div align="center">Fecha</div></td>
       <td width="130"><div align="center">T&eacute;cnico</div></td>
       <td width="151"><div align="center">Observaci&oacute;n</div></td>
    </tr>
      <?php 
      $soporte->asignarArea($area);
      $reg=$soporte->busqueda_areas();
      $cantidad_registros = $soporte->cantidad_busqueda_areas();
      if($cantidad_registros<=0)
      {


        echo "<script> alert('Disculpe usted no posee solicitudes para listar3'); </script>";      
        echo '<script languaje="Javascript">location.href="../Vista/Busqueda.php"</script>'; 
      }
      else 
      {
        $i=0;
        while ($i<$cantidad_registros)
        {
          
      ?>
        
     
        <tr bgcolor="#99FFFF" class="Estilo3">
          <td><div align="center"><?php echo $reg[$i]["nombre_soporte"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["area"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["tipo_soporte"];?></div></td>
          <td><div align="center"><?php echo $soporte->PostgresFecha($reg[$i]["fecha"]);?></div></td>
          <td><div align="center"><?php echo $reg[$i]["nombre_tecnico"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["observacion"];?></div></td>

      <?php
      //echo $reg->Total." ";
      //echo $total;
      $i++;
      }
    }
	  ?>
      
  </table>
<?php
}
elseif($nombre=='none' && $area=='none' && ($tipo!='none') && $fecha_inicial=='' && $fecha_final=='')
{
//Busqueda por Tipo Soporte

//	echo $nombre." ".$area." ".$tipo." ".$fecha_inicial." ".$fecha_final;


	?>
<table width="820" align="center">
  <tr class="Estilo3">
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../../modulo_reportes/pdfphp/php-pgsql9.php?tipo=<?= $tipo;?>">Imprimir PDF</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a  href="../../modulo_reportes/pdfphp/php-excel9.php?tipo=<?= $tipo;?>">Imprimir Excel</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../Vista/Busqueda.php">Regresar</a></td>
   <tr bgcolor="#99CCFF" class="Estilism">
       <td width="126"><div align="center">Nombre</div></td>
       <td width="174"><div align="center">Área</div></td>
       <td width="118"><div align="center">Tipo Soporte</div></td>
       <td width="93"><div align="center">Fecha</div></td>
       <td width="130"><div align="center">T&eacute;cnico</div></td>
       <td width="151"><div align="center">Observaci&oacute;n</div></td>
    </tr>
      <?php 
      $soporte->asignarTipoSoporte($tipo);
      $reg=$soporte->busqueda_tipo_soporte();
      $cantidad_registros = $soporte->cantidad_busqueda_tipo_soporte();
      if($cantidad_registros<=0)
      {

        echo "<script> alert('Disculpe usted no posee solicitudes para listar4'); </script>";      
        echo '<script languaje="Javascript">location.href="../Vista/Busqueda.php"</script>'; 
      }
      else 
      {
        $i=0;
        while ($i<$cantidad_registros)
        {
          
      ?>
        
     
        <tr bgcolor="#99FFFF" class="Estilo3">
          <td><div align="center"><?php echo $reg[$i]["nombre_soporte"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["area"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["tipo_soporte"];?></div></td>
          <td><div align="center"><?php echo $soporte->PostgresFecha($reg[$i]["fecha"]);?></div></td>
          <td><div align="center"><?php echo $reg[$i]["nombre_tecnico"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["observacion"];?></div></td>

      <?php
      //echo $reg->Total." ";
      //echo $total;
      $i++;
      }
    }
	  ?>
     
  </table>
<?php
}
if($nombre!='none' && $area=='none' && $tipo=='none' && $fecha_inicial=='' && $fecha_final!='')
{
	?>
<script> alert("Seleccione la fecha final"); </script>
      <?php
	echo '<script languaje="Javascript">location.href="../Vista/Busqueda.php"</script>'; 
}
if($nombre!='none' && $area=='none' && $tipo=='none' && $fecha_inicial!='' && $fecha_final=='')
{
	?>
<script> alert("Seleccione la fecha inicial"); </script>
      <?php
	echo '<script languaje="Javascript">location.href="../Vista/Busqueda.php"</script>'; 
}
if($nombre!='none' && $area=='none' && $tipo=='none' && $fecha_inicial!='' && $fecha_final!='' && $fecha_inicial>$fecha_final)
{
	?>
<script> alert("Fuera de rango"); </script>
      <?php
	echo '<script languaje="Javascript">location.href="../Vista/Busqueda.php"</script>'; 
}
if($nombre!='none' && $fecha_inicial!='' && $fecha_final!='' && $area=='none' && $tipo=='none')
{
//Búsqueda Por nombre y Fecha

	$_SESSION['_NombreTecnico']=$nombre;
	$_SESSION['_FechaInicial']=$fecha_inicial;
	$_SESSION['_FechaFinal']=$fecha_final;


	?>
<table width="820" align="center">
  <tr class="Estilo3">
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../../modulo_reportes/pdfphp/php-pgsql10.php">Imprimir PDF</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a  href="../../modulo_reportes/pdfphp/php-excel10.php?fecha_inicial=<?= $fecha_inicial;?>&fecha_final=<?= $fecha_final;?>&nombre=<?= $nombre;?>">Imprimir Excel</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../Vista/Busqueda.php">Regresar</a></td>
   <tr bgcolor="#99CCFF" class="Estilism">
       <td width="126"><div align="center">Nombre</div></td>
       <td width="174"><div align="center">Área</div></td>
       <td width="118"><div align="center">Tipo Soporte</div></td>
       <td width="93"><div align="center">Fecha</div></td>
       <td width="130"><div align="center">T&eacute;cnico</div></td>
       <td width="151"><div align="center">Observaci&oacute;n</div></td>
    </tr>
      <?php 
      $soporte->asignarNombreTecnico($nombre);
      $soporte->asignarFecha($fecha_inicial);
      $soporte->asignarFecha2($fecha_final);
      $reg=$soporte->busqueda_nombre_fecha();
      $cantidad_registros = $soporte->cantidad_nombre_fecha();
      if($cantidad_registros<=0)
      {

        echo "<script> alert('Disculpe usted no posee solicitudes para listar4'); </script>";      
        echo '<script languaje="Javascript">location.href="../Vista/Busqueda.php"</script>'; 
      }
      else 
      {
        $i=0;
        while ($i<$cantidad_registros)
        {
          
      ?>
        
     
        <tr bgcolor="#99FFFF" class="Estilo3">
          <td><div align="center"><?php echo $reg[$i]["nombre_soporte"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["area"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["tipo_soporte"];?></div></td>
          <td><div align="center"><?php echo $soporte->PostgresFecha($reg[$i]["fecha"]);?></div></td>
          <td><div align="center"><?php echo $reg[$i]["nombre_tecnico"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["observacion"];?></div></td>

      <?php
      //echo $reg->Total." ";
      //echo $total;
      $i++;
      }
    }
	  ?>
      
  </table>
<?php
}
elseif($nombre!='none' && $area!='none' && $tipo=='none' && $fecha_inicial=='' && $fecha_final=='')
{
	//echo $nombre." ".$area." ".$tipo." ".$fecha_inicial." ".$fecha_final;

//Búsqueda por nombre y área


	$_SESSION['_NombreTecnico']=$nombre;
	$_SESSION['_Area']=$area;
	?>
<table width="820" align="center">
  <tr class="Estilo3">
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../../modulo_reportes/pdfphp/php-pgsql11.php">Imprimir PDF</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a  href="../../modulo_reportes/pdfphp/php-excel11.php">Imprimir Excel</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../Vista/Busqueda.php">Regresar</a></td>
   <tr bgcolor="#99CCFF" class="Estilism">
       <td width="126"><div align="center">Nombre</div></td>
       <td width="174"><div align="center">Área</div></td>
       <td width="118"><div align="center">Tipo Soporte</div></td>
       <td width="93"><div align="center">Fecha</div></td>
       <td width="130"><div align="center">T&eacute;cnico</div></td>
       <td width="151"><div align="center">Observaci&oacute;n</div></td>
    </tr>
      <?php 
      $soporte->asignarNombreTecnico($nombre);
      $soporte->asignarArea($area);
      $reg=$soporte->busqueda_nombre_area();
      $cantidad_registros = $soporte->cantidad_nombre_area();
     if($cantidad_registros<=0)
      {

        echo "<script> alert('Disculpe usted no posee solicitudes para listar5'); </script>";      
        echo '<script languaje="Javascript">location.href="../Vista/Busqueda.php"</script>'; 
      }
      else 
      {
        $i=0;
        while ($i<$cantidad_registros)
        {
          
      ?>
        
     
        <tr bgcolor="#99FFFF" class="Estilo3">
          <td><div align="center"><?php echo $reg[$i]["nombre_soporte"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["area"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["tipo_soporte"];?></div></td>
          <td><div align="center"><?php echo $soporte->PostgresFecha($reg[$i]["fecha"]);?></div></td>
          <td><div align="center"><?php echo $reg[$i]["nombre_tecnico"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["observacion"];?></div></td>

      <?php
      //echo $reg->Total." ";
      //echo $total;
      $i++;
      }
    }
	  ?>
     
  </table>
<?php
}

elseif($nombre!='none' && $fecha_inicial=='' && $fecha_final=='' && $area=='none' && $tipo!='none')
{
//Búsqueda por nombre y Tipo soporte
//echo $nombre." ".$area." ".$tipo." ".$fecha_inicial." ".$fecha_final;

	$_SESSION['_NombreTecnico']=$nombre;
	$_SESSION['_Tipo']=$tipo;

		?>
<table width="820" align="center">
  <tr class="Estilo3">
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../../modulo_reportes/pdfphp/php-pgsql12.php">Imprimir PDF</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a  href="../../modulo_reportes/pdfphp/php-excel12.php">Imprimir Excel</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../Vista/Busqueda.php">Regresar</a></td>
   <tr bgcolor="#99CCFF" class="Estilism">
       <td width="126"><div align="center">Nombre</div></td>
       <td width="174"><div align="center">Área</div></td>
       <td width="118"><div align="center">Tipo Soporte</div></td>
       <td width="93"><div align="center">Fecha</div></td>
       <td width="130"><div align="center">T&eacute;cnico</div></td>
       <td width="151"><div align="center">Observaci&oacute;n</div></td>
    </tr>
      <?php 
      $soporte->asignarNombreTecnico($nombre);
      $soporte->asignarTipoSoporte($tipo);
      $reg=$soporte->busqueda_nombre_tipo();
      $cantidad_registros = $soporte->cantidad_nombre_tipo();
     if($cantidad_registros<=0)
      {

        echo "<script> alert('Disculpe usted no posee solicitudes para listar6'); </script>";      
        echo '<script languaje="Javascript">location.href="../Vista/Busqueda.php"</script>'; 
      }
      else 
      {
        $i=0;
        while ($i<$cantidad_registros)
        {
          
      ?>
        
     
        <tr bgcolor="#99FFFF" class="Estilo3">
          <td><div align="center"><?php echo $reg[$i]["nombre_soporte"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["area"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["tipo_soporte"];?></div></td>
          <td><div align="center"><?php echo $soporte->PostgresFecha($reg[$i]["fecha"]);?></div></td>
          <td><div align="center"><?php echo $reg[$i]["nombre_tecnico"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["observacion"];?></div></td>

      <?php
      //echo $reg->Total." ";
      //echo $total;
      $i++;
      }
    }
 
	  ?>      
  </table>
<?php
}
if($nombre!='none' && $fecha_inicial!='' && $fecha_inicial!='' && $area!='none' && $tipo=='none')
{
//Busqueda por nombre, fecha y area
//echo $nombre." ".$area." ".$tipo." ".$fecha_inicial." ".$fecha_final;
 $_SESSION['_NombreTecnico']=$nombre;
 $_SESSION['_Area']=$area;
	$_SESSION['_FechaInicial']=$fecha_inicial;
	$_SESSION['_FechaFinal']=$fecha_final;


		?>
<table width="820" align="center">
  <tr class="Estilo3">
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../../modulo_reportes/pdfphp/php-pgsql13.php">Imprimir PDF</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a  href="../../modulo_reportes/pdfphp/php-excel13.php">Imprimir Excel</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../Vista/Busqueda.php">Regresar</a></td>
   <tr bgcolor="#99CCFF" class="Estilism">
       <td width="126"><div align="center">Nombre</div></td>
       <td width="174"><div align="center">Área</div></td>
       <td width="118"><div align="center">Tipo Soporte</div></td>
       <td width="93"><div align="center">Fecha</div></td>
       <td width="130"><div align="center">T&eacute;cnico</div></td>
       <td width="151"><div align="center">Observaci&oacute;n</div></td>
    </tr>
      <?php 
      $soporte->asignarNombreTecnico($nombre);
      $soporte->asignarArea($area);
      $soporte->asignarFecha($fecha_inicial);
      $soporte->asignarFecha2($fecha_final);

      $reg=$soporte->busqueda_nombre_area_fechas();
      $cantidad_registros = $soporte->cantidad_nombre_area_fechas();
     if($cantidad_registros<=0)
      {

        echo "<script> alert('Disculpe usted no posee solicitudes para listar7'); </script>";      
        echo '<script languaje="Javascript">location.href="../Vista/Busqueda.php"</script>'; 
      }
      else 
      {
        $i=0;
        while ($i<$cantidad_registros)
        {
          
      ?>
        
     
        <tr bgcolor="#99FFFF" class="Estilo3">
          <td><div align="center"><?php echo $reg[$i]["nombre_soporte"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["area"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["tipo_soporte"];?></div></td>
          <td><div align="center"><?php echo $soporte->PostgresFecha($reg[$i]["fecha"]);?></div></td>
          <td><div align="center"><?php echo $reg[$i]["nombre_tecnico"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["observacion"];?></div></td>

      <?php
      //echo $reg->Total." ";
      //echo $total;
      $i++;
      }
    }
	  ?>
     
  </table>
<?php
}
elseif($nombre!='none' && $fecha_inicial!='' && $fecha_inicial!=''  && $tipo!='none' && $area=='none' && $tipo!='none' && $nombre!='none')
{
//Busqueda por nombre, fecha y Tipo Soporte
//echo $nombre." ".$area." ".$tipo." ".$fecha_inicial." ".$fecha_final." Aqui";
	$_SESSION['_NombreTecnico']=$nombre;
	$_SESSION['_Tipo']=$tipo;
	$_SESSION['_FechaInicial']=$fecha_inicial;
	$_SESSION['_FechaFinal']=$fecha_final;


		?>
<table width="820" align="center">
  <tr class="Estilo3">
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../../modulo_reportes/pdfphp/php-pgsql14.php">Imprimir PDF</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a  href="../../modulo_reportes/pdfphp/php-excel14.php">Imprimir Excel</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../Vista/Busqueda.php">Regresar</a></td>
   <tr bgcolor="#99CCFF" class="Estilism">
       <td width="126"><div align="center">Nombre</div></td>
       <td width="174"><div align="center">Área</div></td>
       <td width="118"><div align="center">Tipo Soporte</div></td>
       <td width="93"><div align="center">Fecha</div></td>
       <td width="130"><div align="center">T&eacute;cnico</div></td>
       <td width="151"><div align="center">Observaci&oacute;n</div></td>
    </tr>
      <?php 
      $soporte->asignarNombreTecnico($nombre);
      $soporte->asignarTipoSoporte($tipo);
      $soporte->asignarFecha($fecha_inicial);
      $soporte->asignarFecha2($fecha_final);

      $reg=$soporte->busqueda_nombre_tipo_fechas();
      $cantidad_registros = $soporte->cantidad_nombre_tipo_fechas();
     if($cantidad_registros<=0)
      {

        echo "<script> alert('Disculpe usted no posee solicitudes para listar8'); </script>";      
        echo '<script languaje="Javascript">location.href="../Vista/Busqueda.php"</script>'; 
      }
      else 
      {
        $i=0;
        while ($i<$cantidad_registros)
        {
          
      ?>
        
     
        <tr bgcolor="#99FFFF" class="Estilo3">
          <td><div align="center"><?php echo $reg[$i]["nombre_soporte"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["area"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["tipo_soporte"];?></div></td>
          <td><div align="center"><?php echo $soporte->PostgresFecha($reg[$i]["fecha"]);?></div></td>
          <td><div align="center"><?php echo $reg[$i]["nombre_tecnico"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["observacion"];?></div></td>

      <?php
      //echo $reg->Total." ";
      //echo $total;
      $i++;
      }
    }
	  ?>
      
  </table>
<?php
}
elseif($nombre!='none' && $fecha_final!='' && $fecha_inicial!='' && $area!='none' && $tipo!='none')
{
//Busqueda por nombre, fecha, area y Tipo soporte
//echo $nombre." ".$area." ".$tipo." ".$fecha_inicial." ".$fecha_final." aca estoy!!!";
	$_SESSION['_NombreTecnico']=$nombre;
	$_SESSION['_Area']=$area;
	$_SESSION['_Tipo']=$tipo;
	$_SESSION['_FechaInicial']=$fecha_inicial;
	$_SESSION['_FechaFinal']=$fecha_final;

			?>
<table width="820" align="center">
  <tr class="Estilo3">
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../../modulo_reportes/pdfphp/php-pgsql15.php">Imprimir PDF</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a  href="../../modulo_reportes/pdfphp/php-excel15.php">Imprimir Excel</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../Vista/Busqueda.php">Regresar</a></td>
   <tr bgcolor="#99CCFF" class="Estilism">
       <td width="126"><div align="center">Nombre</div></td>
       <td width="174"><div align="center">Área</div></td>
       <td width="118"><div align="center">Tipo Soporte</div></td>
       <td width="93"><div align="center">Fecha</div></td>
       <td width="130"><div align="center">T&eacute;cnico</div></td>
       <td width="151"><div align="center">Observaci&oacute;n</div></td>
    </tr>
      <?php 
      $soporte->asignarNombreTecnico($nombre);
      $soporte->asignarTipoSoporte($tipo);
      $soporte->asignarArea($area);
      $soporte->asignarFecha($fecha_inicial);
      $soporte->asignarFecha2($fecha_final);

      $reg=$soporte->busqueda_nombre_tipo_fechas_area();
      $cantidad_registros = $soporte->cantidad_nombre_tipo_fechas_area();
     if($cantidad_registros<=0)
      {

        echo "<script> alert('Disculpe usted no posee solicitudes para listar9'); </script>";      
        echo '<script languaje="Javascript">location.href="../Vista/Busqueda.php"</script>'; 
      }
      else 
      {
        $i=0;
        while ($i<$cantidad_registros)
        {
          
      ?>
        
     
        <tr bgcolor="#99FFFF" class="Estilo3">
          <td><div align="center"><?php echo $reg[$i]["nombre_soporte"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["area"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["tipo_soporte"];?></div></td>
          <td><div align="center"><?php echo $soporte->PostgresFecha($reg[$i]["fecha"]);?></div></td>
          <td><div align="center"><?php echo $reg[$i]["nombre_tecnico"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["observacion"];?></div></td>

      <?php
      //echo $reg->Total." ";
      //echo $total;
      $i++;
      }
    }
	  ?>
      
  </table>
<?php
}
elseif($nombre!='none' && $fecha_inicial=='' && $fecha_final=='' && $area!='none' && $tipo!='none' && $nombre!='none' && $area!='none')
{
//Busqueda por nombre, area y Tipo soporte}
//echo $nombre." ".$area." ".$tipo." ".$fecha_inicial." ".$fecha_final." Aqui";

	$_SESSION['_NombreTecnico']=$nombre;
	$_SESSION['_Area']=$area;
	$_SESSION['_Tipo']=$tipo;

		?>
<table width="820" align="center">
  <tr class="Estilo3">
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../../modulo_reportes/pdfphp/php-pgsql16.php">Imprimir PDF</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a  href="../../modulo_reportes/pdfphp/php-excel16.php">Imprimir Excel</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../Vista/Busqueda.php">Regresar</a></td>
   <tr bgcolor="#99CCFF" class="Estilism">
       <td width="126"><div align="center">Nombre</div></td>
       <td width="174"><div align="center">Área</div></td>
       <td width="118"><div align="center">Tipo Soporte</div></td>
       <td width="93"><div align="center">Fecha</div></td>
       <td width="130"><div align="center">T&eacute;cnico</div></td>
       <td width="151"><div align="center">Observaci&oacute;n</div></td>
    </tr>
      <?php  
      $soporte->asignarNombreTecnico($nombre);
      $soporte->asignarTipoSoporte($tipo);
      $soporte->asignarArea($area);


      $reg=$soporte->busqueda_nombre_tipo_area();
      $cantidad_registros = $soporte->cantidad_nombre_tipo_area();
     if($cantidad_registros<=0)
      {

        echo "<script> alert('Disculpe usted no posee solicitudes para listar10'); </script>";      
        echo '<script languaje="Javascript">location.href="../Vista/Busqueda.php"</script>'; 
      }
      else 
      {
        $i=0;
        while ($i<$cantidad_registros)
        {
          
      ?>
        
     
        <tr bgcolor="#99FFFF" class="Estilo3">
          <td><div align="center"><?php echo $reg[$i]["nombre_soporte"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["area"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["tipo_soporte"];?></div></td>
          <td><div align="center"><?php echo $soporte->PostgresFecha($reg[$i]["fecha"]);?></div></td>
          <td><div align="center"><?php echo $reg[$i]["nombre_tecnico"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["observacion"];?></div></td>

      <?php
      //echo $reg->Total." ";
      //echo $total;
      $i++;
      }
    }
	  ?>
      
  </table>
<?php
}

elseif($nombre=='none' && $fecha_final!='' && $fecha_inicial!='' && $area!='none' && $tipo=='none')
{
//Búsqueda por Fecha y área
//echo $nombre." ".$area." ".$tipo." ".$fecha_inicial." ".$fecha_final." Aqui";
	$_SESSION['_Area']=$area;
	$_SESSION['_FechaInicial']=$fecha_inicial;
	$_SESSION['_FechaFinal']=$fecha_final;



		?>
<table width="820" align="center">
  <tr class="Estilo3">
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../../modulo_reportes/pdfphp/php-pgsql18.php">Imprimir PDF</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a  href="../../modulo_reportes/pdfphp/php-excel18.php">Imprimir Excel</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../Vista/Busqueda.php">Regresar</a></td>
   <tr bgcolor="#99CCFF" class="Estilism">
       <td width="126"><div align="center">Nombre</div></td>
       <td width="174"><div align="center">Área</div></td>
       <td width="118"><div align="center">Tipo Soporte</div></td>
       <td width="93"><div align="center">Fecha</div></td>
       <td width="130"><div align="center">T&eacute;cnico</div></td>
       <td width="151"><div align="center">Observaci&oacute;n</div></td>
    </tr>
      <?php 

      $soporte->asignarArea($area);
      $soporte->asignarFecha($fecha_inicial);
      $soporte->asignarFecha2($fecha_final);

      $reg=$soporte->busqueda_fechas_area();
      $cantidad_registros = $soporte->cantidad_fechas_area();
     if($cantidad_registros<=0)
      {

        echo "<script> alert('Disculpe usted no posee solicitudes para listar11'); </script>";      
        echo '<script languaje="Javascript">location.href="../Vista/Busqueda.php"</script>'; 
      }
      else 
      {
        $i=0;
        while ($i<$cantidad_registros)
        {
          
      ?>
        
     
        <tr bgcolor="#99FFFF" class="Estilo3">
          <td><div align="center"><?php echo $reg[$i]["nombre_soporte"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["area"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["tipo_soporte"];?></div></td>
          <td><div align="center"><?php echo $soporte->PostgresFecha($reg[$i]["fecha"]);?></div></td>
          <td><div align="center"><?php echo $reg[$i]["nombre_tecnico"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["observacion"];?></div></td>

      <?php
      //echo $reg->Total." ";
      //echo $total;
      $i++;
      }
    }
	  ?>
  </table>
<?php
}
elseif($fecha_inicial!='' && $fecha_inicial!='' && $fecha_inicial!='' && $fecha_final!='' && $tipo!='none' && $nombre=='none' && $area=='none' && $tipo!='none')
{
//Búsqueda por Fecha y Tipo soporte
//echo $nombre." ".$area." ".$tipo." ".$fecha_inicial." ".$fecha_final." Aqui2";


	$_SESSION['_Tipo']=$tipo;
	$_SESSION['_FechaInicial']=$fecha_inicial;
	$_SESSION['_FechaFinal']=$fecha_final;

		?>
<table width="820" align="center">
  <tr class="Estilo3">
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../../modulo_reportes/pdfphp/php-pgsql19.php">Imprimir PDF</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a  href="../../modulo_reportes/pdfphp/php-excel19.php">Imprimir Excel</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../Vista/Busqueda.php">Regresar</a></td>
   <tr bgcolor="#99CCFF" class="Estilism">
       <td width="126"><div align="center">Nombre</div></td>
       <td width="174"><div align="center">Área</div></td>
       <td width="118"><div align="center">Tipo Soporte</div></td>
       <td width="93"><div align="center">Fecha</div></td>
       <td width="130"><div align="center">T&eacute;cnico</div></td>
       <td width="151"><div align="center">Observaci&oacute;n</div></td>
    </tr>
      <?php 
      $soporte->asignarTipoSoporte($tipo);
      $soporte->asignarFecha($fecha_inicial);
      $soporte->asignarFecha2($fecha_final);

      $reg=$soporte->busqueda_tipo_fechas();
      $cantidad_registros = $soporte->cantidad_tipo_fechas();
     if($cantidad_registros<=0)
      {

        echo "<script> alert('Disculpe usted no posee solicitudes para listar12'); </script>";      
        echo '<script languaje="Javascript">location.href="../Vista/Busqueda.php"</script>'; 
      }
      else 
      {
        $i=0;
        while ($i<$cantidad_registros)
        {
          
      ?>
        
     
        <tr bgcolor="#99FFFF" class="Estilo3">
          <td><div align="center"><?php echo $reg[$i]["nombre_soporte"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["area"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["tipo_soporte"];?></div></td>
          <td><div align="center"><?php echo $soporte->PostgresFecha($reg[$i]["fecha"]);?></div></td>
          <td><div align="center"><?php echo $reg[$i]["nombre_tecnico"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["observacion"];?></div></td>

      <?php
      //echo $reg->Total." ";
      //echo $total;
      $i++;
      }
    }
	  ?>
  </table>
<?php
}
elseif($nombre=='none' && $fecha_inicial!='' && $fecha_inicial!='' && $area!='none' && $tipo!='none' &&  $area!='none' && $fecha_final!='' and $fecha_inicial!='' && $tipo!='none')
{
//	echo $nombre." ".$area." ".$tipo." ".$fecha_inicial." ".$fecha_final." Aqui3";
//Busqueda por Fecha, área y Tipo soporte
	$_SESSION['_Area']=$area;
	$_SESSION['_Tipo']=$tipo;
	$_SESSION['_FechaInicial']=$fecha_inicial;
	$_SESSION['_FechaFinal']=$fecha_final;

		?>
<table width="820" align="center">
  <tr class="Estilo3">
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../../modulo_reportes/pdfphp/php-pgsql20.php">Imprimir PDF</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a  href="../../modulo_reportes/pdfphp/php-excel20.php">Imprimir Excel</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../Vista/Busqueda.php">Regresar</a></td>
   <tr bgcolor="#99CCFF" class="Estilism">
       <td width="126"><div align="center">Nombre</div></td>
       <td width="174"><div align="center">Área</div></td>
       <td width="118"><div align="center">Tipo Soporte</div></td>
       <td width="93"><div align="center">Fecha</div></td>
       <td width="130"><div align="center">T&eacute;cnico</div></td>
       <td width="151"><div align="center">Observaci&oacute;n</div></td>
    </tr>
      <?php 
      $soporte->asignarTipoSoporte($tipo);
      $soporte->asignarArea($area);
      $soporte->asignarFecha($fecha_inicial);
      $soporte->asignarFecha2($fecha_final);

      $reg=$soporte->busqueda_tipo_fechas_area();
      $cantidad_registros = $soporte->cantidad_tipo_fechas_area();
     if($cantidad_registros<=0)
      {

        echo "<script> alert('Disculpe usted no posee solicitudes para listar12'); </script>";      
        echo '<script languaje="Javascript">location.href="../Vista/Busqueda.php"</script>'; 
      }
      else 
      {
        $i=0;
        while ($i<$cantidad_registros)
        {
          
      ?>
        
     
        <tr bgcolor="#99FFFF" class="Estilo3">
          <td><div align="center"><?php echo $reg[$i]["nombre_soporte"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["area"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["tipo_soporte"];?></div></td>
          <td><div align="center"><?php echo $soporte->PostgresFecha($reg[$i]["fecha"]);?></div></td>
          <td><div align="center"><?php echo $reg[$i]["nombre_tecnico"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["observacion"];?></div></td>

      <?php
      //echo $reg->Total." ";
      //echo $total;
      $i++;
      }
    }
	  ?>
  </table>
<?php
}
elseif($nombre=='none' && $fecha_inicial=='' && $fecha_final=='' && $area!='none' && $tipo!='none' && $area!='none' && $tipo!='none')
{
//Búsqueda por área y tipo soporte
//	echo $nombre." ".$area." ".$tipo." ".$fecha_inicial." ".$fecha_final." Aqui3";
	$_SESSION['_Area']=$area;
	$_SESSION['_Tipo']=$tipo;

		?>
<table width="820" align="center">
  <tr class="Estilo3">
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../../modulo_reportes/pdfphp/php-pgsql21.php">Imprimir PDF</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a  href="../../modulo_reportes/pdfphp/php-excel21.php">Imprimir Excel</a></td>
        <td colspan="2" bgcolor="#FFFFFF" align="center"><a href="../Vista/Busqueda.php">Regresar</a></td>
   <tr bgcolor="#99CCFF" class="Estilism">
       <td width="126"><div align="center">Nombre</div></td>
       <td width="174"><div align="center">Área</div></td>
       <td width="118"><div align="center">Tipo Soporte</div></td>
       <td width="93"><div align="center">Fecha</div></td>
       <td width="130"><div align="center">T&eacute;cnico</div></td>
       <td width="151"><div align="center">Observaci&oacute;n</div></td>
    </tr>
      <?php 
      $soporte->asignarTipoSoporte($tipo);
      $soporte->asignarArea($area);


      $reg=$soporte->busqueda_tipo_area();
      $cantidad_registros = $soporte->cantidad_tipo_area();
     if($cantidad_registros<=0)
      {

        echo "<script> alert('Disculpe usted no posee solicitudes para listar13'); </script>";      
        echo '<script languaje="Javascript">location.href="../Vista/Busqueda.php"</script>'; 
      }
      else 
      {
        $i=0;
        while ($i<$cantidad_registros)
        {
          
      ?>
        
     
        <tr bgcolor="#99FFFF" class="Estilo3">
          <td><div align="center"><?php echo $reg[$i]["nombre_soporte"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["area"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["tipo_soporte"];?></div></td>
          <td><div align="center"><?php echo $soporte->PostgresFecha($reg[$i]["fecha"]);?></div></td>
          <td><div align="center"><?php echo $reg[$i]["nombre_tecnico"];?></div></td>
          <td><div align="center"><?php echo $reg[$i]["observacion"];?></div></td>

      <?php
      //echo $reg->Total." ";
      //echo $total;
      $i++;
      }
    }
	  ?>
  </table>
<?php
}

elseif($nombre=='none' && $fecha_inicial=='' && $fecha_final=='' && $area=='none' && $tipo=='none')
{
	?> <script> alert("Disculpe, Escoja una opción para la búsqueda por favor verifique"); </script> <?php
	echo '<script languaje="Javascript">location.href="../Vista/index.php"</script>'; //MENSAJE DE COMPROBACION;
}
/**/
?>
</html>
