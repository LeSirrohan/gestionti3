	<?php


class ClsConectar
{
	private $driver, $host, $dbname, $port, $user, $clave,$recurso;
	function obtenerValores()
	{
		$this->driver ="pgsql";
		$this->host   ="localhost";
		$this->dbname ="sisger";
		$this->port   ="5432";
		$this->user   ="hloreto";
		$this->clave  ="Odebrecht2011";

	}
	function obtenerValores2()
	{
		$this->driver ="pgsql";
		$this->host   ="localhost";
		$this->dbname ="calidad";
		$this->port   ="5432";
		$this->user   ="hloreto";
		$this->clave  ="Odebrecht2011";

	}
	function ClsConectar()
	{
		$this->obtenerValores();
		$this->conexion = pg_connect("host='$this->host' dbname='$this->dbname' user='$this->user' password='$this->clave'");
	}
	function Valores()
	{
		$this->obtenerValores2();
		$this->conexion = pg_connect("host='$this->host' dbname='$this->dbname' user='$this->user' password='$this->clave'");
	}
	function obtenerObjetos($recurso)
	{
		return pg_fetch_object($recurso);
	}
	function asociar($recurso)
	{
		return pg_fetch_assoc($recurso);
	}
	function obtenerArray($recurso)
	{
		return pg_fetch_array($recurso);
	}
	function numColumnas($query)
	{
		return pg_num_rows($query);
	}
	function desconectarBd()
	{
		pg_close();
	}
	function ejecutarConsultar($sql)
	{
		 return pg_query($sql);
	}
	function obtenerTodo($sql)
	{
		return pg_fetch_all($sql);
	}		
	function fechaPostgres($fecha)
	{
		$otra_fecha = explode("/", $fecha);// en la posición 1 del arreglo se encuentra el mes en texto.. lo comparamos y cambiamos
		$buena      = $otra_fecha[2]."-".$otra_fecha[1]."-".$otra_fecha[0];// volvemos a armar la fecha
	  	return $buena;  
	}
	function postgresFecha($fecha)
	{
		$otra_fecha = explode("-", $fecha);// en la posición 1 del arreglo se encuentra el mes en texto.. lo comparamos y cambiamos
		$buena      =strtotime ( $fecha ) ;
		$buena      = date('d-m-Y',$buena);

	  	return $buena;  
	}
	function postgresFecha2($fecha)
	{
		$otra_fecha = explode("-", $fecha);// en la posición 1 del arreglo se encuentra el mes en texto.. lo comparamos y cambiamos
		$buena      =strtotime ( $fecha ) ;
		$buena      = date('d-m-Y h:i:s',$buena);

	  	return $buena;  
	}
}
 ?>
