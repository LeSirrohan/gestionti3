<?php
class ClsTramo extends ClsConectar
{
	private $margen;
	function AsignarValorMargen($valor)
	{
		$this->margen = $valor;
	}
	function listarTramo()
	{
		$sql              = "SELECT a.nom_tramo
		FROM gen_tramo as a, gen_componente as b 
		WHERE a.id_tramo  =b.idtramo and b.margen = '".$this->margen."'
		GROUP BY a.nom_tramo";
		parent::Valores();
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);

		return $resultado;		
	}
	function numrUbicaciones()
	{
		$sql              = "SELECT * from gen_margen";
		parent::Valores();
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::numColumnas($ejecutarConsulta);

		return $resultado;		
	}
}
?>