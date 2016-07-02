<?php
session_start();

include("../Modelo/ClsConectar.php");
include("../Modelo/ClsSoportes.php");

error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);

$equipo       = $_REQUEST['equipo'];
$registrado   = $_REQUEST['registrado'];
$usuario      = $_REQUEST['usuario'];
$ubicacion    = $_REQUEST['ubicacion'];
$tiposoporte  = $_REQUEST['tiposoporte'];
$extension    = $_REQUEST['extension'];
$eje          = $_REQUEST['eje'];
$observacion  = $_REQUEST['observacion'];
$departamento = $_REQUEST['departamento'];
$margen       = $_REQUEST['margen'];
$estructura   = $_REQUEST['estructura'];
$tramo        = $_REQUEST['tramo'];
$fecha        = $_REQUEST['fecha'];

if( $_SESSION['_Privilegio'] == 1)
  $enlace="modulo_usuario";
elseif( $_SESSION['_Privilegio'] == 2)
  $enlace="modulo_operador";
elseif( $_SESSION['_Privilegio'] == 3)
  $enlace="modulo_administrador";
/*
echo $equipo,"-equipo ",$registrado," ",$usuario,"-usuario ",$tiposoporte,"-tiposoporte ",$extension," ",$eje," ",$observacion,"<br>";
echo $departamento," ",$margen," ",$estructura," ",$tramo,"<br>";*/

$soporte  = new ClsSoportes();

$soporte -> asignarUsuario($equipo);
$soporte -> asignarTipoSoporte($tiposoporte);
$soporte -> asignarObservacionSolicitud($observacion);
$soporte -> asignarFechaSolicitud($fecha);
$soporte -> asignarFecha($fecha);
$soportes = $soporte -> ingresarSoporte();

  if ( !$soportes )
  {  	
  	echo "<script>
  		alert('Soporte agregado exitosamente');
  		location.href='../Vista/".$enlace."/index.php';
  		</script>";
  }
  else
  {
    echo "<script>
  		alert('No se pudo agregar su solicitud de soporte técnico');
  		location.href='../Vista/".$enlace."/index.php';
  		</script>";
  }
?>