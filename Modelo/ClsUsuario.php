<?php

 class ClsUsuario 
 {
	function guardarUsuario($cedula,$estado,$tipo,$login,$contraseña,$nombres,$apellidos,$correo, $fecha_nac)
	{
				
		$pdo=new Clsconexion_bd;
		$bd=$pdo->conexion();
		
		if ($estado=='true')
		$estado ='A';
		else 
		$estado ='I';
		
		$sql="insert into usuarios (ci,login,contraseña,tipo,estatus,nombres,apellidos,correo,fecha_nac) values ('$cedula', '$login', '$contraseña', '$tipo', '$estado', '$nombres', '$apellidos', '$correo', '$fecha_nac')";	  		
		

		$eject_consulta = $bd->exec($sql);
		
		if ($eject_consulta>0)
		{
		
		$bd=null;
		return true;
		}
		else
		{
		$bd=null;
		return false;
		}


	}

	function modificarUsuario ($cedula,$estado,$tipo,$login,$contraseña,$nombres,$apellidos,$correo,$fecha_nac)
	{
		$pdo=new Clsconexion_bd;
		$bd=$pdo->conexion();
		
		if ($estado=='true')
			$estado2 ='A';
		else 
			$estado2 ='I';
		
		$sql= "UPDATE  usuarios SET  login = '$login', contraseña= '$contraseña' , tipo= '$tipo', estatus ='$estado2', nombres='$nombres', apellidos='$apellidos', correo='$correo', fecha_nac='$fecha_nac'
		WHERE  ci = '$cedula'";


		$eject_consulta = $bd->exec($sql);
		
		if ($eject_consulta>0)
		{
		$bd=null;
		return true;
		}
		else
		{
		$bd=null;
		return false;
		}	
 
	}




	
	function buscar_grupo_usuario($cedula)
	{
		$conexion = new Clsconexion_bd();
		$conectar = $conexion->conexion();

	/*	$sql_consulta="SELECT grupos.descripcion 
							FROM usuarios inner join grupos on grupos.tipo=usuarios.tipo
							WHERE usuarios.ci='$cedula'";
	
		
		$eject_consulta = pg_query($sql_consulta);

		if($row=$eject_consulta->fetch()){
			$grupo=$row['descripcion'];
			return $grupo;}
		else 
			return 0;
			
		
		
	return $cedula;*/
	$des="Administrador";
	return $des;
		 
	}

	function buscarUsuario($cedula)
	{
		$conexion = new Clsconexion_bd();
		$conectar = $conexion->conexion();

		$sql_consulta="SELECT  login, contraseña, tipo, estatus, nombres, apellidos, correo,
				fecha_nac, nivel_profesional, ciudad_origen, numero_registro_super
				FROM  usuarios 
				WHERE  ci='$cedula'";
	
	
	$eject_consulta = $conectar->query($sql_consulta);	
	$conectar = null;
	$row= $eject_consulta->fetch();

	return $row;
	}
	

	function ListarProfesoresActivos()
	{
		$conexion = new Clsconexion_bd();
		$conectar = $conexion->conexion();

		$sql_consulta="select * from usuarios where estatus='A'";
	
	
	$eject_consulta = $conectar->query($sql_consulta);	
	$conectar = null;
	

	return $eject_consulta;
	}


	function existe_usuario ($cedula)
	{
		$conexion = new Clsconexion_bd();
   		$conectar = $conexion->conexion();
   		$sql = "select count (ci)
						from usuarios 
						where ci='$cedula' and estatus = 'A'";
			$eject_consulta = $conectar->query($sql);	
			$conectar = null;
			return $eject_consulta;
						
	}
	


	function lista_grupos()
	{
		$conexion = new Clsconexion_bd();
		$conectar = $conexion->conexion();
		$sql="SELECT id,descripcion FROM grupos ORDER BY descripcion";
		$eject=$conectar->query($sql);
		$row= $eject->fetchAll();
		return $row;
	}

	function verSecciones()
	{

		$conexion = new Clsconexion_bd();
		$conectar = $conexion->conexion();
		$sql="select s.grado,s.seccion, s.id_profesor, u.nombres, u.apellidos 
		from seccion as s inner join usuarios as u on u.ci=s.id_profesor 
		order by 1,2";
			$eject_consulta = $conectar->query($sql);	
			$conectar = null;
			return $eject_consulta;
	}

	function listarPorfesores()
	{
		$conexion = new Clsconexion_bd();
		$conectar = $conexion->conexion();
		$sql="select nombres, apellidos, ci
		from usuarios
		where estatus ='A'
		order by 2";
			$eject_consulta = $conectar->query($sql);	
			$conectar = null;
			return $eject_consulta;

	}

	function ModificarSeccion($grado, $seccion, $profesor)
	{

		$pdo=new Clsconexion_bd;
		$bd=$pdo->conexion();

		$sql="update seccion set id_profesor='$profesor' where grado = '$grado' and seccion ='$seccion'";

		$eject_consulta = $bd->exec($sql);
		
		if ($eject_consulta>0)
		{
		$bd=null;
		return true;
		}
		else
		{
		$bd=null;
		return false;
		}	
	}


	function CambiarAPostgres($fecha)
	{
	$otra_fecha= explode("/", $fecha);// en la posición 1 del arreglo se encuentra el mes en texto.. lo comparamos y cambiamos
  //$buena= $otra_fecha[0]."/".$otra_fecha[1]."/".$otra_fecha[2];// volvemos a armar la fecha

	$buena= $otra_fecha[2]."/".$otra_fecha[1]."/".$otra_fecha[0];// volvemos a armar la fecha
  	return $buena;  
	}

	function CambiarANormal($fecha)
	{
	$otra_fecha= explode("-", $fecha);// en la posición 1 del arreglo se encuentra el mes en texto.. lo comparamos y cambiamos
  //$buena= $otra_fecha[0]."/".$otra_fecha[1]."/".$otra_fecha[2];// volvemos a armar la fecha

	$buena= $otra_fecha[2]."/".$otra_fecha[1]."/".$otra_fecha[0];// volvemos a armar la fecha
  	return $buena;  
	}




	//********************************************************************************************

}// Fin de la clase

// $var=new ClsUsuario();
// $var->setCedula(16850048);
// $var2=$var->existe();
// $var->msg($var2);

?>