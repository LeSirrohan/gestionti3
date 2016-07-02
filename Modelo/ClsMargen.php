<?php
class ClsMargen extends ClsConectar
{
	function listarMargen(){
		$sql              = "select * from gen_margen";
		parent::Valores();
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);

		return $resultado;		
	}
	function numMargen(){
		$sql              = "select * from gen_margen";
		parent::Valores();
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::numColumnas($ejecutarConsulta);

		return $resultado;		
	}
}
?>