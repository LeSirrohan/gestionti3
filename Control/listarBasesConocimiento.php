<?php
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);

include_once("../Modelo/ClsConectar.php");  
include_once("../Modelo/ClsSoportes.php");
//print_r($_REQUEST);
//print_r($_REQUEST['order']);
$buscar            = isset ( $_REQUEST['search']['value'] ) ? $_REQUEST['search']['value'] : NULL;
$dir               = isset ( $_REQUEST['order'][0]['dir']) ? $_REQUEST['order'][0]['dir'] : NULL;
$column            = isset ( $_REQUEST['order'][0]['column']) ? $_REQUEST['order'][0]['column'] : NULL;
$tipo_soporte      = isset ( $_REQUEST['tipo_soporte']) ? $_REQUEST['tipo_soporte'] : NULL;
//echo $dir." ".$column." ".$buscar, " ",$tipo_soporte;

$bc                = new ClsSoportes();  
$basesConocimiento = $bc -> asignarTipoSoporte($tipo_soporte);
$basesConocimiento = $bc -> busquedaTipoSoporte();
$TOTAL             = count($basesConocimiento); 

$LONGITUD          = intval ( isset ( $_REQUEST['length'] ) ? $_REQUEST['length'] : NULL );
$LONGITUD          = $LONGITUD < 0 ? $iTotalRecords : $LONGITUD; 
$INICIO            = intval( isset( $_REQUEST['start'] ) ? $_REQUEST['start'] : NULL );

$sEcho             = intval($_REQUEST['draw']);

$registros         = array();
$registros["data"] = array(); 

$FIN               = $INICIO + $LONGITUD;
$FIN               = $FIN > $TOTAL ? $TOTAL : $FIN;

for($i = $INICIO ; $i < $FIN ; $i++) 
{

  $registros["data"][] = array
  (
    $basesConocimiento[$i]["nombre_soporte"],
    $basesConocimiento[$i]["area"],
    $basesConocimiento[$i]["tipo_soporte"],
    $bc->PostgresFecha($basesConocimiento[$i]["fecha"]),
    $basesConocimiento[$i]["nombre_tecnico"],
    $basesConocimiento[$i]["observacion"]
  );
}

if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") 
{
  $registros["customActionStatus"]  = "OK"; // pass custom message(useful for getting status of group actions)
  $registros["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
}
$registros["draw"]            = $sEcho;
$registros["recordsTotal"]    = $TOTAL;
$registros["recordsFiltered"] = $TOTAL;
echo json_encode($registros);
?>