<?php
class ClsDepartamento extends ClsConectar
{
	function listarDepartamento()
	{
		$sql              = "select * from sisotec_bd_area order by bd_area_detalle ASC";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);

		return $resultado;		
	}
	function numDepartamentos()
	{
		$sql              = "select * from sisotec_bd_area  order by bd_area_detalle ASC";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::numColumnas($ejecutarConsulta);

		return $resultado;		
	}
}
?>