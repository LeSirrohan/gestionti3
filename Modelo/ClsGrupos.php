<?php
class ClsGrupos extends ClsConectar
{
	private $id_grupo,$nombre_grupo;
	public function asignarNombre($nombre)
	{	
		$this->nombre_grupo = $nombre;
	}
	public function asignarIdGrupo($id)
	{	
		$this->id_grupo = $id;
	}
	public function obtenerNombre()
	{	
		return $this->nombre_grupo;
	}
	public function obtenerIdGrupo()
	{	
		return $this->id_grupo;
	}	
	public function insertarNombreGrupo()
	{
		$sql              = "INSERT into sisotec_bd_grupos (nombre_grupo) values ('".$this->nombre_grupo."')";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;	
	}
	public function eliminarNombreGrupo()
	{
		$sql              = "DELETE from sisotec_bd_grupos WHERE id_grupo=".$this->id_grupo;
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;	
	}
	public function modificarNombreGrupo()
	{
		$sql              = "UPDATE from sisotec_bd_grupos SET nombre_grupo=".$this->nombre_grupo." WHERE id_grupo=".$this->id_grupo;
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;	
	}		
	function listarGrupos(){
		$sql              = "SELECT * from sisotec_bd_grupos";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;		
	}
	
	function buscarGrupo(){
		$sql              = "SELECT * from sisotec_bd_grupos where id_grupo='".$this->id_grupo."'";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;		
	}	
	function numrGrupos(){
		$sql              = "SELECT * from sisotec_bd_grupos";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;			
	}
}
?>