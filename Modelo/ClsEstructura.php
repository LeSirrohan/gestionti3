<?php
class ClsEstructura extends ClsConectar
{
	private $margen,$tramo;
	function AsignarValorMargen($valor){
		$this->margen = $valor;
	}
	function AsignarValorTramo($valor){
		$this->tramo = $valor;
	}
	function listarEstructura(){
			$sql              = "SELECT a.nom_estructura
			FROM gen_estructura as a, gen_componente as b, gen_tramo as c
			WHERE c.id_tramo  =b.idtramo and b.idestructura=a.id_estructura  
			AND c.nom_tramo   = '".$this->tramo."' and b.margen = '".$this->margen."'
			GROUP BY a.nom_estructura";
			parent::Valores();
			$ejecutarConsulta = parent::ejecutarConsultar($sql);
			$resultado        = parent::obtenerTodo($ejecutarConsulta);

		return $resultado;		
	}
	function numrUbicaciones(){
		$sql              = "select * from gen_margen";
		parent::Valores();
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::numColumnas($ejecutarConsulta);

		return $resultado;		
	}
}
?>