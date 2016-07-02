<?php
class ClsTipoSoporte extends ClsConectar
{
	private $bd_tiposoporte_detalle,$bd_tiposoporte_id;

	public function obtenerDetalle()
	{
		return $this->bd_tiposoporte_detalle;
	}
	public function asignarDetalle($valor)
	{
		$this->bd_tiposoporte_detalle=$valor;
	}	
	public function obtenerId()
	{
		return $this->bd_tiposoporte_id;
	}
	public function asignarId($valor)
	{
		$this->bd_tiposoporte_id=$valor;

	}
	function listarTipoSoporte()
	{
		$sql              = "select * from sisotec_bd_tiposoporte order by bd_tiposoporte_detalle ASC";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);

		return $resultado;
	}
	function numTipoSoporte()
	{
		$sql              = "select * from sisotec_bd_tiposoporte order by bd_tiposoporte_detalle ASC";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::numColumnas($ejecutarConsulta);

		return $resultado;
	}
	function insertarTipoSoporte()
	{
		$sql              = "INSERT into sisotec_bd_tiposoporte (bd_tiposoporte_detalle) values ('".$this->bd_tiposoporte_detalle."')";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		if (!$resultado) {
			return 1;
		}
		else
		{
			return 0;
		}
	}
	function eliminarTipoSoporte()
	{
		$sql              ="DELETE FROM sisotec_bd_tiposoporte WHERE bd_tiposoporte_id  ='".$this->bd_tiposoporte_id."'";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;
	}
	function cantidadTipoSoportes()
 	{
		$sql              = "select * from sisotec_bd_tiposoporte order by bd_tiposoporte_detalle ASC";
		$resultado=parent::ejecutarConsultar($sql);
		return parent::numColumnas($resultado);
 	}
}
?>