<?php
session_start();
$nombreHost = gethostbyaddr($_SERVER['REMOTE_ADDR']);
/*
echo "IP del equipo: ".$_SERVER['REMOTE_ADDR'];
echo "<br>Nombre del equipo: ".$nombreHost;
echo "<br>IP del servidor: ".$_SERVER['SERVER_NAME'];*/

include("../Modelo/ClsConectar.php");
include("../Modelo/ClsUsuarios.php");

$usuario = new ClsUsuarios();

$datosUsuario = $usuario -> verificarUsuario($nombreHost);
$numRegistro = $usuario -> buscarNumUsuarios($nombreHost);
if($numRegistro<1){
	echo "El usuario no pertenece al sistema";
}
else
{

	if($datosUsuario[0]["bd_usuario_privilegio"]=='1'){

	 echo " Redireccionando al usuario ";
	 $_SESSION['_Nombre']=$datosUsuario[0]["bd_usuario_nombre"];
	 $_SESSION['_IdUsuario']=$datosUsuario[0]["bd_usuario_id"];
	 $_SESSION['_Equipo']= $nombreHost;
	 $_SESSION['_Registrado']= $numRegistro;
	 $_SESSION['_Privilegio']= $datosUsuario[0]["bd_usuario_privilegio"];
	 echo "<SCRIPT language='JavaScript'> 
	 location.href='../Vista/modulo_usuario/index.php';</SCRIPT>";
	}
	elseif ($datosUsuario[0]["bd_usuario_privilegio"]=='2') {
		echo " Redireccionando al usuario ";
	 $_SESSION['_Nombre']=$datosUsuario[0]["bd_usuario_nombre"];
	 $_SESSION['_IdUsuario']=$datosUsuario[0]["bd_usuario_id"];
	 $_SESSION['_Equipo']= $nombreHost;
	 $_SESSION['_Registrado']= $numRegistro;
	 $_SESSION['_Privilegio']=$datosUsuario[0]["bd_usuario_privilegio"];
	 echo "<SCRIPT language='JavaScript'> 
	 location.href='../Vista/modulo_operador/listar_solicitudes.php';</SCRIPT>";
	}
	elseif ($datosUsuario[0]["bd_usuario_privilegio"]=='3') {
		echo " Redireccionando al usuario ";
	 $_SESSION['_Nombre']=$datosUsuario[0]["bd_usuario_nombre"];
	 $_SESSION['_IdUsuario']=$datosUsuario[0]["bd_usuario_id"];
	 $_SESSION['_Equipo']= $nombreHost;
	 $_SESSION['_Registrado']= $numRegistro;
	 $_SESSION['_Privilegio']= $datosUsuario[0]["bd_usuario_privilegio"];
	 echo "<SCRIPT language='JavaScript'> 
	 location.href='../Vista/modulo_administrador/index.php';</SCRIPT>";
	}

}
?>