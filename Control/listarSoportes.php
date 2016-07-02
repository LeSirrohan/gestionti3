<?php
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);

include_once("../Modelo/ClsConectar.php");  
include_once("../Modelo/ClsSoportes.php");
//print_r($_REQUEST);
//print_r($_REQUEST['order']);
$buscar            = isset ( $_REQUEST['search']['value'] ) ? $_REQUEST['search']['value'] : NULL;
$dir               = isset ( $_REQUEST['order'][0]['dir'] ) ? $_REQUEST['order'][0]['dir'] : NULL;
$column            = isset ( $_REQUEST['order'][0]['column'] ) ? $_REQUEST['order'][0]['column'] : NULL;
//echo $dir." ".$column." ".$buscar;

$soporte           = new ClsSoportes();

$soportes          = $soporte -> listarSoportes();
//print_r($soportes);
$TOTAL_REGISTROS   = $soporte -> cantListarSoportes();
$LONGITUD_LISTADO  = intval ( isset ( $_REQUEST['length'] ) ? $_REQUEST['length'] : NULL);
$LONGITUD_LISTADO  = $LONGITUD_LISTADO < 0 ? $TOTAL_REGISTROS : $LONGITUD_LISTADO; 
$INICIO_LISTADO    = intval ( isset ( $_REQUEST['start'] ) ? $_REQUEST['start'] : NULL);

$sEcho             = intval($_REQUEST['draw']);

$registros         = array();
$registros["data"] = array(); 

$FINAL             = $INICIO_LISTADO + $LONGITUD_LISTADO;
$FINAL             = $FINAL > $TOTAL_REGISTROS ? $TOTAL_REGISTROS : $FINAL;

for($i = $INICIO_LISTADO; $i < $FINAL; $i++) 
{
  $editar =  "<a href='verSoporte.php?id=". $soportes[$i]['bd_solicitud_serial'] ."'><i class='glyphicon glyphicon-eye-open'></i></a>";
  $eliminar = "<a href='../../Control/eliminarSoporte.php?id=". $soportes[$i]['bd_solicitud_serial'] ."'><i class='glyphicon glyphicon-remove'></i></a>";
  $id = ( $i + 1 );
  $registros["data"][] = array(
    $soportes[$i]['bd_solicitud_serial'],
    $soportes[$i]['bd_solicitud_idusuario'],
    $soportes[$i]['bd_solicitud_observacion_solicitud'],
    $soportes[$i]['bd_solicitud_estatus'],
    $soporte->PostgresFecha($soportes[$i]['bd_solicitud_fecha_solicitud']),
    $soportes[$i]['bd_solicitud_idtecnico'],
    $editar,
    $eliminar
  );
}

if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") 
{
  $registros["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
  $registros["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
}
$registros["draw"]            = $sEcho;
$registros["recordsTotal"]    = $TOTAL_REGISTROS;
$registros["recordsFiltered"] = $TOTAL_REGISTROS;
echo json_encode($registros);
?>