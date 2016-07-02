<?php
class ClsPreguntas extends ClsConectar
{
	private  $idFaq, $bd_faq_pregunta,  $bd_faq_respuesta ,  $bd_faq_id_tiposoporte ;
	public function asignaridFaq($idFaq)
	{	
		$this->idFaq = $idFaq;
	}
	public function asignarPregunta($Pregunta)
	{	
		$this->bd_faq_pregunta = $Pregunta;
	}
	public function asignarRespuesta($Respuesta)
	{	
		$this->bd_faq_respuesta = $Respuesta;
	}
	public function asignarTipoSoporte($TipoSoporte)
	{	
		$this->bd_faq_id_tiposoporte = $TipoSoporte;
	}	
	public function obteneridFaq()
	{	
		return $this->idFaq;
	}
	public function obtenerPregunta()
	{	
		return $this->bd_faq_pregunta;
	}
	public function obtenerRespuesta()
	{	
		return $this->bd_faq_respuesta;
	}
	public function obtenerTipoSoporte()
	{	
		return $this->bd_faq_id_tiposoporte;
	}
	public function insertarPreguntas()
	{
		$sql              = "INSERT into sisotec_bd_faq (bd_faq_pregunta,bd_faq_respuesta,bd_faq_id_tiposoporte)
		 values ('".$this->bd_faq_pregunta."','".$this->bd_faq_respuesta."','".$this->bd_faq_id_tiposoporte."')";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;	
	}
	public function eliminarPreguntas()
	{
		$sql              = "DELETE from sisotec_bd_faq WHERE idFaq=".$this->idFaq;
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;	
	}
	public function modificarPreguntas()
	{
		$sql              = "UPDATE from sisotec_bd_faq SET nombre_grupo=".$this->nombre_grupo." WHERE idFaq=".$this->idFaq;
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;	
	}		
	function listarPreguntas(){
		$sql              = "SELECT a.bd_faq_pregunta,a.bd_faq_respuesta,b.bd_tiposoporte_detalle from sisotec_bd_faq as a, sisotec_bd_tiposoporte as b where a.bd_faq_id_tiposoporte=b.bd_tiposoporte_id";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;		
	}
	
	function buscarPreguntas(){
		$sql              = "SELECT * from sisotec_bd_faq where idFaq='".$this->idFaq."'";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;		
	}	
	function numrPreguntas(){
		$sql              = "SELECT * from sisotec_bd_faq where idFaq='".$this->idFaq."'";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;			
	}
}
?>