<?php
class ClsUsuariosGrupos extends ClsConectar
{
	private $id,$id_grupo,$id_usuario;
	public function asignarIdUsuario($valor)
	{	
		$this->id_usuario = $valor;
	}
	public function asignarIdGrupo($valor)
	{	
		$this->id_grupo = $valor;
	}
	public function asignarId($valor)
	{	
		$this->id = $valor;
	}
	public function obtenerId()
	{	
		return $id->id;
	}
	public function obtenerIdUsuario()
	{	
		return $this->id_usuario;
	}
	public function obtenerIdGrupo()
	{	
		return $this->id_grupo;
	}	
	public function insertarUsuarioGrupo()
	{
		$sql              = "INSERT into sisotec_bd_usuarios_grupos (id_usuario,id_grupos) values
	 ('".$this->id_usuario."','".$this->id_grupo."')";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;	
	}
	public function eliminarUsuarioGrupo()
	{
		$sql              = "DELETE from sisotec_bd_usuarios_grupos WHERE id='".$this->id."'";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;	
	}	
	function numUsuariosGrupos(){
		$sql              = "	SELECT *
								FROM sisotec_bd_usuarios_grupos as a, sisotec_bd_usuario as b, sisotec_bd_grupos as c 
								WHERE a.id_grupos=c.id_grupo AND a.id_usuario=bd_usuario_id AND a.id_grupos='".$this->id_grupo."'";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::numColumnas($ejecutarConsulta);
		return $resultado;		
	}
	function listarUsuariosGrupos(){
		$sql              = "	SELECT * 
								FROM sisotec_bd_usuarios_grupos as a, sisotec_bd_usuario as b, sisotec_bd_grupos as c 
								WHERE a.id_grupos=c.id_grupo AND a.id_usuario=bd_usuario_id AND a.id_grupos='".$this->id_grupo."'";
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