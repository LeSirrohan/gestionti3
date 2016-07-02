<?php
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);

include_once("../Modelo/ClsConectar.php");  
include_once("../Modelo/ClsTipoSoporte.php");
//print_r($_REQUEST);
//print_r($_REQUEST['order']);
$buscar            = isset ( $_REQUEST['search']['value'] ) ? $_REQUEST['search']['value'] : NULL;
$dir               = isset ( $_REQUEST['order'][0]['dir'] ) ? $_REQUEST['order'][0]['dir'] : NULL;
$column            = isset ( $_REQUEST['order'][0]['column'] ) ? $_REQUEST['order'][0]['column'] : NULL;
//echo $dir." ".$column." ".$buscar;

$soporte           = new ClsTipoSoporte();
$soportes          = $soporte -> listarTipoSoporte();
//$soportes          = $soporte -> consultarNombre();
$TOTAL_REGISTROS   = $soporte -> cantidadTipoSoportes();
$LONGITUD_LISTADO  = intval ( isset ( $_REQUEST['length'] ) ? $_REQUEST['length'] : NULL);
$LONGITUD_LISTADO  = $LONGITUD_LISTADO < 0 ? $TOTAL_REGISTROS : $LONGITUD_LISTADO; 
$INICIO_LISTADO    = intval ( isset ( $_REQUEST['start'] ) ? $_REQUEST['start'] : NULL);

$sEcho             = intval($_REQUEST['draw']);

$registros         = array();
$registros["data"] = array(); 

$FINAL             = $INICIO_LISTADO + $LONGITUD_LISTADO;
$FINAL             = $FINAL > $TOTAL_REGISTROS ? $TOTAL_REGISTROS : $FINAL;

//echo $TOTAL_REGISTROS, " ",$LONGITUD_LISTADO, " ",$INICIO_LISTADO, " ",$FINAL,"<br>";
for($i = $INICIO_LISTADO; $i < $FINAL; $i++) 
{
    $editar              = "<a href='verSoporte.php?id=".$soportes[$i]['bd_solicitud_serial']."'><i class='glyphicon glyphicon-eye-open'></i></a>";
    $eliminar            ="<a href='../../Control/tipo_soporte_delete.php?id=".$soportes[$i]['bd_tiposoporte_id']."'' ><i class='glyphicon glyphicon-remove'></i></a>";
    $id                  = ( $i + 1 );
    $registros["data"][] = array(
    $soportes[$i]['bd_tiposoporte_detalle'],$eliminar,
    " <i class           ='glyphicon glyphicon-pencil'></i></a>"
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