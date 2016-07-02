<?php

 class ClsClientes {


function GuardarCliente($cedula,$nombre,$apellido,$telefono,$estado)
	{
				
				$pdo=new Clsconexion_bd;
				$bd=$pdo->conexion();
		
		if ($estado=='true')
		$estado ='A';
		else 
		$estado ='I';
		
		$sql="insert into clientes (ci,nombre,apellido,telefono,estado) values ('$cedula', '$nombre', '$apellido', '$telefono', '$estado')";	  		
		

		$eject_consulta = pg_query($sql);
		$afecto=pg_affected_rows($eject_consulta);
		
		if ($afecto>0)
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

function ModificarCliente($cedula,$nombre,$apellido,$telefono,$estado)
	{
		$pdo=new Clsconexion_bd;
		$bd=$pdo->conexion();
		
		if ($estado=='true')
			$estado2 ='A';
		else 
			$estado2 ='I';
		
		$sql= "UPDATE  clientes SET  nombre = '$nombre', apellido= '$apellido' , telefono= '$telefono', estado ='$estado2'
		WHERE  ci = '$cedula'";


		$eject_consulta = pg_query($sql);
		$afecto=pg_affected_rows($eject_consulta);
		
		if ($afecto>0)
		{
		$bd=null;
		return true;
		}
		else
		{
		$bd=null;
		return false;
		}	
		//return $sql;
 
	}


	function ListarClientes()
	{
		$conexion = new Clsconexion_bd();
		$conectar = $conexion->conexion();

		$sql_consulta="SELECT  *
				FROM  clientes order by 2 ";
	
	
	$eject_consulta = pg_query($sql_consulta);	
	$conectar = null;
	
	return $eject_consulta;
	}

	


	function buscar_cliente($cedula)
	{
		$conexion = new Clsconexion_bd();
		$conectar = $conexion->conexion();

		$sql_consulta="SELECT  *
				FROM  clientes 
				WHERE  ci='$cedula'";
	
	
	$eject_consulta = pg_query($sql_consulta);	
	$conectar = null;
	$row= pg_fetch_array($eject_consulta);

	return $row;
	}
	
	
	function consultar_clientes_por_nombres($nombre, $apellido)
	{
		$conexion = new Clsconexion_bd();
		$conectar = $conexion->conexion();

		$nombre= trim(pg_escape_string(strip_tags($nombre)));
		$apellido= trim(pg_escape_string(strip_tags($apellido)));

		$sql_consulta=" select * 
		from clientes
		where (nombre LIKE '%$nombre%' and apellido LIKE '%$apellido%') order by 3,2";
		

		$eject_consulta = pg_query($sql_consulta);	
		$conectar = null;
		

		return $eject_consulta;
	
	}
	




	function existe_cliente($cedula)
	{
		$conexion = new Clsconexion_bd();
   		$conectar = $conexion->conexion();
   		$sql = "select 1
						from clientes 
						where ci='$cedula'";
			$eject_consulta = pg_query($sql);	
			$conectar = null;
			return pg_fetch_array($eject_consulta);
						
	}
	

function consultarCliente($ci)
{
$conexion = new Clsconexion_bd();
$conectar = $conexion->conexion();

$sql="select * from clientes
where ci='$ci' ";

$eject_consulta = pg_query($sql);	
$conectar = null;
return pg_fetch_array($eject_consulta);


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