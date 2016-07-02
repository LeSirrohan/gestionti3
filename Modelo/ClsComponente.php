<?php
class ClsComponente extends ClsConectar
{
	private $margen,$tramo,$estructura,$por_pagina,$inicio;
	function AsignarValorMargen($valor){
		$this->margen = $valor;
	}
	function AsignarValorTramo($valor){
		$this->tramo = $valor;
	}
	function AsignarValorEstructura($valor){
		$this->estructura = $valor;
	}
	function AsignarValorPorPagina($valor){
		$this->por_pagina = $valor;
	}
	function AsignarValorInicio($valor){
		$this->inicio = $valor;
	}
	function listarComponente()
	{
			$SQL                 ="SELECT a.margen, b.nom_tramo, d.eje, c.nom_seccion,c.nom_estructura,a.componente,a.id_componente,c.id_estructura,d.id,e.id,b.id_tramo
			FROM gen_componente a, gen_tramo b, gen_estructura c, gen_eje d, gen_eje e
			WHERE a.idestructura =c.id_estructura and a.idejeinicio=d.id and a.idejefin=e.id and a.idtramo=b.id_tramo
			ORDER BY d.id,a.id_componente ASC";
			parent::Valores();
			$ejecutarConsulta    = parent::ejecutarConsultar($SQL);
			$resultado           = parent::obtenerTodo($ejecutarConsulta);

		return $resultado;	
	}

	function listarComponenteSQL()
	{
			$SQL                 ="SELECT a.margen, b.nom_tramo, d.eje, c.nom_seccion,c.nom_estructura,a.componente,a.id_componente,c.id_estructura,d.id,e.id,b.id_tramo
			FROM gen_componente a, gen_tramo b, gen_estructura c, gen_eje d, gen_eje e
			WHERE a.idestructura =c.id_estructura and a.idejeinicio=d.id and a.idejefin=e.id and a.idtramo=b.id_tramo
			ORDER BY d.id,a.id_componente ASC";
			parent::Valores();
			$ejecutarConsulta    = parent::ejecutarConsultar($SQL);
			$resultado           = parent::obtenerTodo($ejecutarConsulta);

		return $resultado;
	}
}
?>