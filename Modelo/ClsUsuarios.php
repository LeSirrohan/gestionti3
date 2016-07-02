<?php
class ClsUsuarios extends ClsConectar
{
	//funcion para iniciar el sistema
	private $idUsuario, $usuarioNombre, $usuarioDepartamento, $usuarioExtension, $usuarioPrivilegios, $usuarioCuenta;	
	public function asignarIdUsuario($valor)
	{
		$this->idUsuario=$valor;

	}
	public function asignarNombre($valor)
	{
		$this->usuarioNombre=$valor;

	}
	public function asignarDepartamento($valor)
	{
		$this->usuarioDepartamento=$valor;

	}
	public function asignarExtension($valor)
	{
		$this->usuarioExtension=$valor;

	}
	public function asignarPrivilegios($valor)
	{
		$this->usuarioPrivilegios=$valor;

	}
	public function asignarCuenta($valor)
	{
		$this->usuarioCuenta=$valor;

	}
	public function obtenerCuenta()
	{
		return $this->usuarioCuenta;

	}
	public function obtenerIdUsuario()
	{
		return $this->idUsuario;

	}
	public function obtenerNombre()
	{
		return $this->usuarioNombre;

	}
	public function obtenerDepartamento()
	{
		return $this->usuarioDepartamento;

	}
	public function obtenerExtension()
	{
		return $this->usuarioExtension;

	}
	public function obtenerPrivilegios()
	{
		return $this->usuarioPrivilegios;

	}
	function GetUsuario()
	{
		$sql              ="SELECT bd_usuario_id
		from sisotec_bd_usuario 
		where bd_usuario_id like '%".$idUsuario."%'";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;
	}
	public function getPassword($value='')
	{
		# code...
	}
	public function getEmail($value='')
	{
		# code...
	}
	public function getTipoUsuario($value='')
	{
		# code...
	}
	function verificarUsuario ($idUsuario){	
		$sql              ="SELECT *
		from sisotec_bd_usuario 
		where bd_usuario_id like '%".$idUsuario."%'";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;
	}		
	function buscarNumUsuarios ($idUsuario){	
		$sql              ="SELECT  count(*) 
		from sisotec_bd_usuario 
		WHERE bd_usuario_id like '%".$idUsuario."%'";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::numColumnas($ejecutarConsulta);
		return $resultado;
				
	}	
	function listarUsuarios (){	
		$sql              ="SELECT * 
		from sisotec_bd_usuario as a, sisotec_bd_area as b WHERE a.bd_usuario_departamento=b.bd_area_idt order by bd_usuario_id";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;
	}
	function buscarUsuario (){	
		$sql              ="SELECT * 
		from sisotec_bd_usuario as a, sisotec_bd_area as b WHERE a.bd_usuario_departamento=b.bd_area_idt AND bd_usuario_id like '%".$this->idUsuario."%'";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;
	}			
	function numUsuarios ()
	{	
			$sql              ="SELECT  count(*) 
			FROM sisotec_bd_usuario";
			$ejecutarConsulta = parent::ejecutarConsultar($sql);
			$resultado        = parent::numColumnas($ejecutarConsulta);
		return $resultado;
				
	}
	function insertarUsuarios(){
		$sql              ="INSERT into sisotec_bd_usuario (bd_usuario_id, bd_usuario_nombre, bd_usuario_departamento, bd_usuario_extension, bd_usuario_privilegio, bd_usuario_cuenta)
		values ('".$this->idUsuario."','".$this->usuarioNombre."','".$this->usuarioDepartamento."','".$this->usuarioExtension."','".$this->usuarioPrivilegios."','".$this->usuarioCuenta."')";	
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;
	}	
	public function eliminarUsuario()
	{
		$sql              = "DELETE from sisotec_bd_usuario WHERE bd_usuario_id='".$this->idUsuario."'";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;	
	}
	

}//fin de la clase
?>