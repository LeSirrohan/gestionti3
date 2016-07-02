<?php
class ClsEje extends ClsConectar
{
	private $margen,$tramo,$estructura;
	function AsignarValorMargen($valor)
	{
		$this->margen = $valor;
	}
	function AsignarValorTramo($valor)
	{
		$this->tramo = $valor;
	}	
	function AsignarValorEstructura($valor)
	{
		$this->estructura = $valor;
	}
	function listarEjes()
	{
		$sql                 = "select a.id_componente, a.componente, c.id_estructura, c.nom_estructura, d.eje as nom_ejes
		from gen_componente a, gen_tramo b, gen_estructura c, gen_eje d
		where a.idtramo      =b.id_tramo and a.idestructura=c.id_estructura and d.id=a.idejeinicio 
		AND a.margen         ='".$this->margen."' and b.nom_tramo='".$this->tramo."' 
		and c.nom_estructura ='".$this->estructura."'
		GROUP BY a.id_componente, a.componente, c.id_estructura, c.nom_estructura, nom_ejes";
		parent::Valores();
		$ejecutarConsulta    = parent::ejecutarConsultar($sql);
		$resultado           = parent::obtenerTodo($ejecutarConsulta);

		return $resultado;		
	}
	function listarEjesConsulta()
	{
		$sql                 = "select a.id_componente, a.componente, c.id_estructura, c.nom_estructura, d.eje as nom_ejes
		from gen_componente a, gen_tramo b, gen_estructura c, gen_eje d
		where a.idtramo      =b.id_tramo and a.idestructura=c.id_estructura and d.id=a.idejeinicio 
		AND a.margen         ='".$this->margen."' and b.nom_tramo='".$this->tramo."' 
		and c.nom_estructura ='".$this->estructura."'
		GROUP BY a.id_componente, a.componente, c.id_estructura, c.nom_estructura, nom_ejes";


		return $sql;		
	}
	function numrUbicaciones()
	{
		$sql              = "select * from gen_margen";
		parent::Valores();
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::numColumnas($ejecutarConsulta);

		return $resultado;		
	}
}
?>