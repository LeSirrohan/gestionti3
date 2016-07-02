<?php
include_once("../Modelo/ClsConectar.php");  
include_once("../Modelo/ClsUsuariosGrupos.php");
$nombre    = $_REQUEST['nombre'];
$id        = $_REQUEST['id'];

$grupos    = new ClsUsuariosGrupos();
$grupos -> asignarIdUsuario ( $nombre );
$grupos -> asignarIdGrupo ( $id );
$resultado = $grupos-> insertarUsuarioGrupo();
echo $resultado;


?>