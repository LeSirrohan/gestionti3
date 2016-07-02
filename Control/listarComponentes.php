<?php
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);

include_once("../Modelo/ClsConectar.php");  
include_once("../Modelo/ClsComponente.php");
//print_r($_REQUEST);
//print_r($_REQUEST['order']);
$buscar            =isset($_REQUEST['search']['value']) ? $_REQUEST['search']['value']:NULL;
$dir               = isset($_REQUEST['order'][0]['dir']) ? $_REQUEST['order'][0]['dir']:NULL;
$column            = isset($_REQUEST['order'][0]['column']) ? $_REQUEST['order'][0]['column']:NULL;
//echo $dir." ".$column." ".$buscar;


$LONGITUD          = intval(isset($_REQUEST['length']) ? $_REQUEST['length']:NULL);
$LONGITUD          = $LONGITUD < 0 ? $TOTAL : $LONGITUD; 
$INICIO            = intval(isset($_REQUEST['start']) ? $_REQUEST['start']:NULL);

$componente        = new ClsComponente();
$componentes       = $componente->listarComponente();
$TOTAL             = count($componentes); 


$sEcho             = intval($_REQUEST['draw']);

$registros         = array();
$registros["data"] = array(); 

$FIN               = $INICIO + $LONGITUD;
$FIN               = $FIN > $TOTAL ? $TOTAL : $FIN;


  for($i = $INICIO; $i < $FIN; $i++) 
  {
    $id = ($i + 1);
    $registros["data"][] = array(
      $componentes[$i]['margen'],
      $componentes[$i]['nom_tramo'],
      $componentes[$i]['eje'],
      $componentes[$i]['nom_seccion'],
      $componentes[$i]['nom_estructura'],
      $componentes[$i]['componente'],
      "<a href='' ><i class='glyphicon glyphicon-remove'></i> <i class='glyphicon glyphicon-pencil'></i></a>"
    );
  }

  if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") 
  {
    $registros["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
    $registros["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
  }
  $registros["draw"]            = $sEcho;
  $registros["recordsTotal"]    = $TOTAL;
  $registros["recordsFiltered"] = $TOTAL;
  echo json_encode($registros);
?>