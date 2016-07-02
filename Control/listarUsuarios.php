<?php
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);

include_once("../Modelo/ClsConectar.php");  
include_once("../Modelo/ClsUsuarios.php");
//print_r($_REQUEST);
//print_r($_REQUEST['order']);
$buscar = isset ( $_REQUEST['search']['value'] ) ? $_REQUEST['search']['value'] : NULL;
$dir    = isset ( $_REQUEST['order'][0]['dir'] ) ? $_REQUEST['order'][0]['dir'] : NULL;
$column = isset ( $_REQUEST['order'][0]['column'] ) ? $_REQUEST['order'][0]['column'] : NULL;
//echo $dir." ".$column." ".$buscar;

$usuarios = new ClsUsuarios();

if($buscar=='')
{ 
  $usuarios = $usuarios->listarUsuarios();
  $TOTAL    = count($usuarios); 
}
else
{
  $usuarios->asignarIdUsuario($buscar);
  $usuarios = $usuarios->buscarUsuario($buscar);
  $TOTAL    = count($usuarios);
}
//echo $usuarios;
$LONGITUD          = intval (isset ($_REQUEST['length']) ? $_REQUEST['length'] : NULL);
$LONGITUD          = $LONGITUD < 0 ? $TOTAL : $LONGITUD; 
$INICIO            = intval ( isset ( $_REQUEST['start']) ? $_REQUEST['start'] : NULL);

$sEcho             = intval ( $_REQUEST['draw'] );

$registros         = array();
$registros["data"] = array(); 

$FIN               = $INICIO + $LONGITUD;
$FIN               = $FIN > $TOTAL ? $TOTAL : $FIN;


for($i = $INICIO; $i < $FIN; $i++) 
{
  $ids =  "<a href='editar_usuario.php?id=".$usuarios[$i]['bd_usuario_id']."'><i class='glyphicon glyphicon-pencil'></i></a>&nbsp;<a href='../../Control/eliminarUsuario.php?id=".$usuarios[$i]['bd_usuario_id']."'><i class='glyphicon glyphicon-remove'></i></a>";
  if( $usuarios[$i]['bd_usuario_privilegio'] == 1)
    $privilegio = "Usuario";
  elseif ( $usuarios[$i]['bd_usuario_privilegio'] == 2) 
  {
    $privilegio = "Técnico";
  }
  elseif ( $usuarios[$i]['bd_usuario_privilegio'] == 3) 
  {
    $privilegio = "Administrador";
  }
  $id = ($i + 1);
  $registros["data"][] = array(
    $usuarios[$i]['bd_usuario_id'],
    $usuarios[$i]['bd_usuario_nombre'],      
    $usuarios[$i]['bd_area_detalle'],
    $usuarios[$i]['bd_usuario_extension'],
    $privilegio,
    $usuarios[$i]['bd_usuario_cuenta'],
    $ids
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