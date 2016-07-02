<?php
include_once("../Modelo/ClsConectar.php");  
include_once("../Modelo/ClsUsuarios.php");

$usuario      = isset ( $_REQUEST['usuario']) ? $_REQUEST['usuario'] : NULL;
$areas        = isset ( $_REQUEST['areas']) ? $_REQUEST['areas'] : NULL;
$cuenta       = isset ( $_REQUEST['cuenta']) ? $_REQUEST['cuenta'] : NULL;
$extension    = isset ( $_REQUEST['extension']) ? $_REQUEST['extension'] : NULL;
$nombres      = isset ( $_REQUEST['nombres']) ? $_REQUEST['nombres'] : NULL;
$tipo_usuario = isset ( $_REQUEST['tipo_usuario']) ? $_REQUEST['tipo_usuario'] : NULL;

//echo $usuario, " ",$areas, " " , $cuenta, " ",$extension, " " , $nombres, " ",$tipo_usuario, "<br>";

$usuarios    = new ClsUsuarios();
$usuarios -> asignarIdUsuario ( $usuario );
$usuarios -> asignarDepartamento ( $areas );
$usuarios -> asignarCuenta ( $cuenta );
$usuarios -> asignarPrivilegios ( $tipo_usuario );
$usuarios -> asignarExtension ( $extension );
$usuarios -> asignarNombre ( $nombres );
$resultado    = $usuarios -> insertarUsuarios();
echo $resultado;


?>