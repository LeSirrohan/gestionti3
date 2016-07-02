<?php
class ClsUbicacion extends ClsConectar
{
	function listarUbicaciones()
	{
		$sql              = "select * from sisotec_bd_ubicacion order by ubicacion_detalle ASC";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);

		return $resultado;		
	}
	function numrUbicaciones()
	{
		$sql              = "select * from sisotec_bd_ubicacion order by ubicacion_detalle ASC";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::numColumnas($ejecutarConsulta);

		return $resultado;		
	}
}
?>