<?php
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);

include_once("../Modelo/ClsConectar.php");  
include_once("../Modelo/ClsGrupos.php");
//print_r($_REQUEST);
//print_r($_REQUEST['order']);
$buscar           = isset ( $_REQUEST['search']['value'] ) ? $_REQUEST['search']['value'] : NULL;
$dir              = isset ( $_REQUEST['order'][0]['dir'] ) ? $_REQUEST['order'][0]['dir'] : NULL;
$column           = isset ( $_REQUEST['order'][0]['column'] ) ? $_REQUEST['order'][0]['column'] : NULL;
//echo $dir." ".$column." ".$buscar;

$grupos           = new ClsGrupos();


$grupos           = $grupos -> listarGrupos();
$TOTAL_REGISTROS  = count ( $grupos ); 

$LONGITUD_LISTADO = intval ( isset ( $_REQUEST['length'] ) ? $_REQUEST['length']:NULL);
$LONGITUD_LISTADO = $LONGITUD_LISTADO < 0 ? $TOTAL_REGISTROS : $LONGITUD_LISTADO; 
$iDisplayStart    = intval ( isset($_REQUEST['start'] ) ? $_REQUEST['start']:NULL);

$sEcho            = intval ( $_REQUEST['draw'] );

$records          = array();
$records["data"]  = array(); 

$FINAL            = $iDisplayStart + $LONGITUD_LISTADO;
$FINAL            = $FINAL > $TOTAL_REGISTROS ? $TOTAL_REGISTROS : $FINAL;

for($i = $iDisplayStart; $i < $FINAL; $i++) 
{
  $id =  "<a href='agregar_usuario_grupo.php?id=".$grupos[$i]['id_grupo']."'><i class='fa fa-plus'></i></a>&nbsp;<a href='../../Control/eliminarGrupo.php?id=".$grupos[$i]['id_grupo']."'><i class='fa fa-minus'></i></a>";
  $records["data"][] = array(
      $grupos[$i]['nombre_grupo'],
      $id
    );

}

if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") 
{
  $records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
  $records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
}
$records["draw"]            = $sEcho;
$records["recordsTotal"]    = $TOTAL_REGISTROS;
$records["recordsFiltered"] = $TOTAL_REGISTROS;
echo json_encode($records);
?>