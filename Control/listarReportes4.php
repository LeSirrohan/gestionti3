<?php
  error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);

  include_once("../Modelo/ClsConectar.php");  
  include_once("../Modelo/ClsSoportes.php");
  //print_r($_REQUEST);
  //print_r($_REQUEST['order']);
  $buscar=isset($_REQUEST['search']['value']) ? $_REQUEST['search']['value']:NULL;
  $dir = isset($_REQUEST['order'][0]['dir']) ? $_REQUEST['order'][0]['dir']:NULL;
  $column = isset($_REQUEST['order'][0]['column']) ? $_REQUEST['order'][0]['column']:NULL;
  //echo $dir." ".$column." ".$buscar;

  $soporte = new ClsSoportes();

 
  $reg = $soporte->consultar_tecnico();
  $iTotalRecords = $soporte->cantidad_soportes_tecnico();
  $iDisplayLength = intval(isset($_REQUEST['length']) ? $_REQUEST['length']:NULL);
  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
  $iDisplayStart = intval(isset($_REQUEST['start']) ? $_REQUEST['start']:NULL);

  $sEcho = intval($_REQUEST['draw']);

  $records = array();
  $records["data"] = array(); 

  $end = $iDisplayStart + $iDisplayLength;
  $end = $end > $iTotalRecords ? $iTotalRecords : $end;

  for($i = $iDisplayStart; $i < $end; $i++) {

    $records["data"][] = array(
        $reg[$i]["nombre_soporte"],
        $reg[$i]["area"],
        $reg[$i]["tipo_soporte"],
        $soporte->PostgresFecha($reg[$i]["fecha"]),
        $reg[$i]["nombre_tecnico"],
        $reg[$i]["observacion"]
      );

  }

  if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
    $records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
    $records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
  }
  $records["draw"] = $sEcho;
  $records["recordsTotal"] = $iTotalRecords;
  $records["recordsFiltered"] = $iTotalRecords;
  echo json_encode($records);
?>