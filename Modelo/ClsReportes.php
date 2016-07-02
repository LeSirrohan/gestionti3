<?php

 class ClsReportes extends ClsSoportes {



 	function cantidad_tecnicos()
	{
		$sql="SELECT bd_solicitud_idtecnico FROM sisotec_bd_solicitud WHERE bd_solicitud_idtecnico<>'' GROUP BY bd_solicitud_idtecnico";
		$resultado=parent::ejecutarConsultar($sql);

		return parent::numColumnas($resultado);
	}
	function verSoporte()
 	{
		$sql="SELECT a.bd_solicitud_serial as num_soporte, 
		b.bd_usuario_nombre as nombre_soporte, 
		c.bd_area_detalle as area, 
		bd_tiposoporte_detalle as tipo_soporte,
		a.bd_solicitud_fecha_solicitud as fecha, 
		a.bd_solicitud_idtecnico  as nombre_tecnico,
		a.bd_solicitud_observacion_solicitud as observacion
		from sisotec_bd_solicitud as a,sisotec_bd_usuario as b, sisotec_bd_area as c, sisotec_bd_tiposoporte as d
		where a.bd_solicitud_idusuario=b.bd_usuario_id AND b.bd_usuario_departamento= c.bd_area_idt AND d.bd_tiposoporte_idt=a.bd_solicitud_tiposoporte 
		AND a.bd_solicitud_serial='".$this->id."'";
		$ejecutar=parent::ejecutarConsultar($sql);
		$registros = parent::obtenerTodo($ejecutar);
		if($registros[0]["num_soporte"])
 		{
 			return $registros;
 		}
 		else
 		{

 			return false;
 		}
 	}
	function consultar_nombre()
 	{
		$sql="SELECT a.bd_solicitud_serial as num_soporte, b.bd_usuario_nombre as nombre_soporte, c.bd_area_detalle as area, bd_tiposoporte_detalle as tipo_soporte,
		a.bd_solicitud_fecha_solicitud as fecha, a.bd_solicitud_idtecnico  as nombre_tecnico, a.bd_solicitud_observacion_solicitud as observacion
		from sisotec_bd_solicitud as a,sisotec_bd_usuario as b, sisotec_bd_area as c, sisotec_bd_tiposoporte as d
		where a.bd_solicitud_idusuario=b.bd_usuario_id AND b.bd_usuario_departamento= c.bd_area_idt AND d.bd_tiposoporte_idt=a.bd_solicitud_tiposoporte 
		order by bd_usuario_nombre";
		$ejecutar=parent::ejecutarConsultar($sql);
		$registros = parent::obtenerTodo($ejecutar);
		if($registros[0]["num_soporte"])
 		{
 			return $registros;
 		}
 		else
 		{

 			return false;
 		}
 	}
 	function cantidad_soportes_nombres()
	{
		$sql="SELECT a.bd_solicitud_serial as num_soporte, b.bd_usuario_nombre as nombre_soporte, c.bd_area_detalle as area, bd_tiposoporte_detalle as tipo_soporte,
		a.bd_solicitud_fecha_solicitud as fecha, a.bd_solicitud_idtecnico  as nombre_tecnico, a.bd_solicitud_observacion_solicitud as observacion
		from sisotec_bd_solicitud as a,sisotec_bd_usuario as b, sisotec_bd_area as c, sisotec_bd_tiposoporte as d
		where a.bd_solicitud_idusuario=b.bd_usuario_id AND b.bd_usuario_departamento= c.bd_area_idt AND d.bd_tiposoporte_idt=a.bd_solicitud_tiposoporte 
		order by bd_usuario_nombre";
		$resultado=parent::ejecutarConsultar($sql);
		
		return parent::numColumnas($resultado);
	}
	function consultar_areas()
 	{
		$sql="SELECT a.bd_solicitud_serial as num_soporte, b.bd_usuario_nombre as nombre_soporte, c.bd_area_detalle as area, bd_tiposoporte_detalle as tipo_soporte,
		a.bd_solicitud_fecha_solicitud as fecha, a.bd_solicitud_idtecnico  as nombre_tecnico, a.bd_solicitud_observacion_solicitud as observacion
		from sisotec_bd_solicitud as a,sisotec_bd_usuario as b, sisotec_bd_area as c, sisotec_bd_tiposoporte as d
		where a.bd_solicitud_idusuario=b.bd_usuario_id AND b.bd_usuario_departamento= c.bd_area_idt AND d.bd_tiposoporte_idt=a.bd_solicitud_tiposoporte 
		order by bd_area_detalle";
		$ejecutar=parent::ejecutarConsultar($sql);
		$registros = parent::obtenerTodo($ejecutar);
		if($registros[0]["num_soporte"])
 		{
 			return $registros;
 		}
 		else
 		{

 			return false;
 		}
 	}

 	function cantidad_soportes_areas()
	{
		$sql="SELECT a.bd_solicitud_serial as num_soporte, b.bd_usuario_nombre as nombre_soporte, c.bd_area_detalle as area, bd_tiposoporte_detalle as tipo_soporte,
		a.bd_solicitud_fecha_solicitud as fecha, a.bd_solicitud_idtecnico  as nombre_tecnico, a.bd_solicitud_observacion_solicitud as observacion
		from sisotec_bd_solicitud as a,sisotec_bd_usuario as b, sisotec_bd_area as c, sisotec_bd_tiposoporte as d
		where a.bd_solicitud_idusuario=b.bd_usuario_id AND b.bd_usuario_departamento= c.bd_area_idt AND d.bd_tiposoporte_idt=a.bd_solicitud_tiposoporte 
		order by bd_area_detalle";
		$resultado=parent::ejecutarConsultar($sql);
		
		return parent::numColumnas($resultado);
	}	
	function consultar_fechas()
 	{
		$sql="SELECT a.bd_solicitud_serial as num_soporte, b.bd_usuario_nombre as nombre_soporte, c.bd_area_detalle as area, bd_tiposoporte_detalle as tipo_soporte,
		a.bd_solicitud_fecha_solicitud as fecha, a.bd_solicitud_idtecnico  as nombre_tecnico, a.bd_solicitud_observacion_solicitud as observacion
		from sisotec_bd_solicitud as a,sisotec_bd_usuario as b, sisotec_bd_area as c, sisotec_bd_tiposoporte as d
		where a.bd_solicitud_idusuario=b.bd_usuario_id AND b.bd_usuario_departamento= c.bd_area_idt AND d.bd_tiposoporte_idt=a.bd_solicitud_tiposoporte 
		order by bd_solicitud_fecha_solicitud";
		$ejecutar=parent::ejecutarConsultar($sql);
		$registros = parent::obtenerTodo($ejecutar);
		if($registros[0]["num_soporte"])
 		{
 			return $registros;
 		}
 		else
 		{

 			return false;
 		}
 	}
 	function cantidad_soportes_fechas()
	{
		$sql="SELECT a.bd_solicitud_serial as num_soporte, b.bd_usuario_nombre as nombre_soporte, c.bd_area_detalle as area, bd_tiposoporte_detalle as tipo_soporte,
		a.bd_solicitud_fecha_solicitud as fecha, a.bd_solicitud_idtecnico  as nombre_tecnico, a.bd_solicitud_observacion_solicitud as observacion
		from sisotec_bd_solicitud as a,sisotec_bd_usuario as b, sisotec_bd_area as c, sisotec_bd_tiposoporte as d
		where a.bd_solicitud_idusuario=b.bd_usuario_id AND b.bd_usuario_departamento= c.bd_area_idt AND d.bd_tiposoporte_idt=a.bd_solicitud_tiposoporte 
		order by bd_solicitud_fecha_solicitud";
		$resultado=parent::ejecutarConsultar($sql);
		
		return parent::numColumnas($resultado);
	}
	function consultar_tiposoporte()
 	{
		$sql="SELECT a.bd_solicitud_serial as num_soporte, b.bd_usuario_nombre as nombre_soporte, c.bd_area_detalle as area, bd_tiposoporte_detalle as tipo_soporte,
		a.bd_solicitud_fecha_solicitud as fecha, a.bd_solicitud_idtecnico  as nombre_tecnico, a.bd_solicitud_observacion_solicitud as observacion
		from sisotec_bd_solicitud as a,sisotec_bd_usuario as b, sisotec_bd_area as c, sisotec_bd_tiposoporte as d
		where a.bd_solicitud_idusuario=b.bd_usuario_id AND b.bd_usuario_departamento= c.bd_area_idt AND d.bd_tiposoporte_idt=a.bd_solicitud_tiposoporte 
		order by bd_tiposoporte_detalle";
		$ejecutar=parent::ejecutarConsultar($sql);
		$registros = parent::obtenerTodo($ejecutar);
		if($registros[0]["num_soporte"])
 		{
 			return $registros;
 		}
 		else
 		{

 			return false;
 		}
 	}
 	function cantidad_soportes_tiposoporte()
	{
		$sql="SELECT a.bd_solicitud_serial as num_soporte, b.bd_usuario_nombre as nombre_soporte, c.bd_area_detalle as area, bd_tiposoporte_detalle as tipo_soporte,
		a.bd_solicitud_fecha_solicitud as fecha, a.bd_solicitud_idtecnico  as nombre_tecnico, a.bd_solicitud_observacion_solicitud as observacion
		from sisotec_bd_solicitud as a,sisotec_bd_usuario as b, sisotec_bd_area as c, sisotec_bd_tiposoporte as d
		where a.bd_solicitud_idusuario=b.bd_usuario_id AND b.bd_usuario_departamento= c.bd_area_idt AND d.bd_tiposoporte_idt=a.bd_solicitud_tiposoporte 
		order by bd_tiposoporte_detalle";
		$resultado=parent::ejecutarConsultar($sql);
		
		return parent::numColumnas($resultado);
	}
	function consultar_tecnico()
 	{
		$sql="SELECT a.bd_solicitud_serial as num_soporte, b.bd_usuario_nombre as nombre_soporte, c.bd_area_detalle as area, bd_tiposoporte_detalle as tipo_soporte,
		a.bd_solicitud_fecha_solicitud as fecha, a.bd_solicitud_idtecnico  as nombre_tecnico, a.bd_solicitud_observacion_solicitud as observacion
		from sisotec_bd_solicitud as a,sisotec_bd_usuario as b, sisotec_bd_area as c, sisotec_bd_tiposoporte as d
		where a.bd_solicitud_idusuario=b.bd_usuario_id AND b.bd_usuario_departamento= c.bd_area_idt AND d.bd_tiposoporte_idt=a.bd_solicitud_tiposoporte 
		order by bd_solicitud_idtecnico";
		$ejecutar=parent::ejecutarConsultar($sql);
		$registros = parent::obtenerTodo($ejecutar);
		if($registros[0]["num_soporte"])
 		{
 			return $registros;
 		}
 		else
 		{

 			return false;
 		}
 	}
 	function cantidad_soportes_tecnico()
	{
		$sql="SELECT a.bd_solicitud_serial as num_soporte, b.bd_usuario_nombre as nombre_soporte, c.bd_area_detalle as area, bd_tiposoporte_detalle as tipo_soporte,
		a.bd_solicitud_fecha_solicitud as fecha, a.bd_solicitud_idtecnico  as nombre_tecnico, a.bd_solicitud_observacion_solicitud as observacion
		from sisotec_bd_solicitud as a,sisotec_bd_usuario as b, sisotec_bd_area as c, sisotec_bd_tiposoporte as d
		where a.bd_solicitud_idusuario=b.bd_usuario_id AND b.bd_usuario_departamento= c.bd_area_idt AND d.bd_tiposoporte_idt=a.bd_solicitud_tiposoporte 
		order by bd_solicitud_idtecnico";
		$resultado=parent::ejecutarConsultar($sql);
		
		return parent::numColumnas($resultado);
	}
	function busqueda_nombre()
 	{
		$sql="SELECT a.bd_solicitud_serial as num_soporte, b.bd_usuario_nombre as nombre_soporte, c.bd_area_detalle as area, bd_tiposoporte_detalle as tipo_soporte,
		a.bd_solicitud_fecha_solicitud as fecha, a.bd_solicitud_idtecnico  as nombre_tecnico, a.bd_solicitud_observacion_solicitud as observacion
		from sisotec_bd_solicitud as a,sisotec_bd_usuario as b, sisotec_bd_area as c, sisotec_bd_tiposoporte as d
		where a.bd_solicitud_idusuario=b.bd_usuario_id AND b.bd_usuario_departamento= c.bd_area_idt AND d.bd_tiposoporte_idt=a.bd_solicitud_tiposoporte AND bd_solicitud_idtecnico= '".$this->idtecnico."'";
		$ejecutar=parent::ejecutarConsultar($sql);
		$registros = parent::obtenerTodo($ejecutar);
		if($registros[0]["num_soporte"])
 		{
 			return $registros;
 		}
 		else
 		{

 			return false;
 		}
 	}
 	function cantidad_busqueda_nombre()
	{
		$sql="SELECT a.bd_solicitud_serial as num_soporte, b.bd_usuario_nombre as nombre_soporte, c.bd_area_detalle as area, bd_tiposoporte_detalle as tipo_soporte,
		a.bd_solicitud_fecha_solicitud as fecha, a.bd_solicitud_idtecnico  as nombre_tecnico, a.bd_solicitud_observacion_solicitud as observacion
		from sisotec_bd_solicitud as a,sisotec_bd_usuario as b, sisotec_bd_area as c, sisotec_bd_tiposoporte as d
		where a.bd_solicitud_idusuario=b.bd_usuario_id AND b.bd_usuario_departamento= c.bd_area_idt AND d.bd_tiposoporte_idt=a.bd_solicitud_tiposoporte AND bd_solicitud_idtecnico= '".$this->idtecnico."'";
		$resultado=parent::ejecutarConsultar($sql);
		
		return parent::numColumnas($resultado);
	}
	function busqueda_fechas()
	{
		$sql="SELECT a.bd_solicitud_serial as num_soporte, b.bd_usuario_nombre as nombre_soporte, c.bd_area_detalle as area, bd_tiposoporte_detalle as tipo_soporte,
		a.bd_solicitud_fecha_solicitud as fecha, a.bd_solicitud_idtecnico  as nombre_tecnico, a.bd_solicitud_observacion_solicitud as observacion
		from sisotec_bd_solicitud as a,sisotec_bd_usuario as b, sisotec_bd_area as c, sisotec_bd_tiposoporte as d
		where a.bd_solicitud_idusuario=b.bd_usuario_id AND b.bd_usuario_departamento= c.bd_area_idt AND d.bd_tiposoporte_idt=a.bd_solicitud_tiposoporte AND (bd_solicitud_fecha_solicitud BETWEEN '".$this->fecha."' AND '".$this->fecha2."')";
		$ejecutar=parent::ejecutarConsultar($sql);
		$registros = parent::obtenerTodo($ejecutar);
		if($registros[0]["num_soporte"])
 		{
 			return $registros;

 		}
 		else
 		{

 			return false;
 		}

	}
	function cantidad_busqueda_fechas()
	{
		$sql="SELECT a.bd_solicitud_serial as num_soporte, b.bd_usuario_nombre as nombre_soporte, c.bd_area_detalle as area, bd_tiposoporte_detalle as tipo_soporte,
		a.bd_solicitud_fecha_solicitud as fecha, a.bd_solicitud_idtecnico  as nombre_tecnico, a.bd_solicitud_observacion_solicitud as observacion
		from sisotec_bd_solicitud as a,sisotec_bd_usuario as b, sisotec_bd_area as c, sisotec_bd_tiposoporte as d
		where a.bd_solicitud_idusuario=b.bd_usuario_id AND b.bd_usuario_departamento= c.bd_area_idt AND d.bd_tiposoporte_idt=a.bd_solicitud_tiposoporte AND (bd_solicitud_fecha_solicitud BETWEEN '".$this->fecha."' AND '".$this->fecha2."')";
		$resultado=parent::ejecutarConsultar($sql);

		return parent::numColumnas($resultado);
	}

	//********************************************************************************************

}// Fin de la clase

// $var=new ClsUsuario();
// $var->setCedula(16850048);
// $var2=$var->existe();
// $var->msg($var2);

?>