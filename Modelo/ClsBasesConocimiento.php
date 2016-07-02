<?php
class ClsBasesConocimiento extends ClsConectar 
{
	private $bd_tiposoporte_detalle,$bd_tiposoporte_id;

	public function obtenerIdSoporte()
	{
		return $this->bd_tiposoporte_id;
	}
	public function asignarIdSoporte($valor)
	{
		$this->bd_tiposoporte_id=$valor;

	}
	function buscarBaseConocimiento()
	{
		$sql              = "select * from sisotec_bd_tiposoporte where bd_tiposoporte_id=".$this->bd_tiposoporte_id." order by bd_tiposoporte_detalle ASC";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);

		return $resultado;		
	}
}
?>