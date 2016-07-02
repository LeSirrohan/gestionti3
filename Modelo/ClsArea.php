<?php
class ClsArea extends ClsConectar
{
	function listarAreas()
	{
		$sql              = "select * from sisotec_bd_area order by bd_area_detalle asc";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);

		return $resultado;		
	}
	function numrAreas()
	{
		$sql              = "select * from sisotec_bd_area order by bd_area_detalle asc";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::numColumnas($ejecutarConsulta);

		return $resultado;		
	}
}
?>