<?php
class ClsSoportes extends ClsConectar
{
	private $id,$idusuario, $tiposoporte, $observacion_solicitud, $fecha_solicitud, $estatus, $idtecnico, $fecha_atencion, $observacion,$fecha,$fecha2,$area;
	function asignarId($valor)
	{
		$this->id=$valor;
	}
	function asignarUsuario($valor)
	{
		$this->idusuario=$valor;
	}
	function asignarArea($valor)
	{
		$this->area=$valor;
	}
	function asignarTipoSoporte($valor)
	{
		$this->tiposoporte=$valor;
	}
	function asignarObservacionSolicitud($valor)
	{
		$this->observacion_solicitud=$valor;
	}
	function asignarFechaSolicitud($valor)
	{
		$this->fecha_solicitud=$valor;
	}
	function asignarEstatus($valor)
	{
		$this->estatus=$valor;
	}
	function asignarConsulta($valor)
	{
		$this->consulta=$valor;
	}
	function asignarIdTecnico($valor)
	{
		$this->idtecnico=$valor;
	}
	function asignarFechaAtencion($valor)
	{
		$this->fecha_atencion=$valor;
	}
	function asignarObservacion($valor)
	{
		$this->observacion=$valor;
	}
	function asignarFecha($valor)
	{
		$this->fecha=$valor;
	}
	function asignarFecha2($valor)
	{
		$this->fecha2=$valor;
	}
	function obtenerId()
	{
		return $this->id;
	}
	function obtenerUsuario()
	{
		return $this->idusuario;
	}
	function obtenerArea()
	{
		return $this->area;
	}
	function obtenerTipoSoporte()
	{
		return $this->tiposoporte;
	}
	function obtenerObservacionSolicitud()
	{
		return $this->observacion_solicitud;
	}
	function obtenerFechaSolicitud()
	{
		return $this->fecha_solicitud;
	}
	function obtenerEstatus()
	{
		return $this->estatus;
	}
	function obtenerIdTecnico()
	{
		return $this->idtecnico;
	}
	function obtenerFechaAtencion()
	{
		return $this->fecha_atencion;
	}
	function obtenerObservacion()
	{
		return $this->observacion;
	}
	function ObtenerFecha()
	{
		return $this->fecha;
	}
	function consultar_nombre_tecnico()
 	{
		$sql="SELECT bd_solicitud_idtecnico FROM sisotec_bd_solicitud WHERE bd_solicitud_idtecnico<>'' GROUP BY bd_solicitud_idtecnico";
		$ejecutar=parent::ejecutarConsultar($sql);
		$registros = parent::obtenerTodo($ejecutar);
		if($registros[0]["bd_solicitud_idtecnico"])
 		{
 			return $registros;

 		}
 		else
 		{

 			return false;
 		}


 	}

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
		bd_tiposoporte_idt,
		a.bd_solicitud_fecha_solicitud as fecha, 
		a.bd_solicitud_idtecnico  as nombre_tecnico,
		a.bd_solicitud_estatus  as estatus,
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
		a.bd_solicitud_fecha_solicitud as fecha, a.bd_solicitud_idtecnico  as nombre_tecnico, a.bd_solicitud_observacion_solicitud as observacion,bd_solicitud_idusuario,bd_solicitud_estatus
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
	function busqueda_areas()
	{
		$sql="SELECT * FROM sis_soporte WHERE area like '%".$this->area."%'";
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
	function cantidad_busqueda_areas()
	{
		$sql="SELECT * FROM sis_soporte WHERE area like '%".$this->area."%'";
		$resultado=parent::ejecutarConsultar($sql);

		return parent::numColumnas($resultado);
	}
	function busqueda_tipo_soporte()
	{
		$sql="SELECT a.bd_solicitud_serial as num_soporte, b.bd_usuario_nombre as nombre_soporte, c.bd_area_detalle as area, bd_tiposoporte_detalle as tipo_soporte,
		a.bd_solicitud_fecha_solicitud as fecha, a.bd_solicitud_idtecnico  as nombre_tecnico, a.bd_solicitud_observacion_solicitud as observacion
		from sisotec_bd_solicitud as a,sisotec_bd_usuario as b, sisotec_bd_area as c, sisotec_bd_tiposoporte as d
		where a.bd_solicitud_idusuario=b.bd_usuario_id AND b.bd_usuario_departamento= c.bd_area_idt AND d.bd_tiposoporte_idt=a.bd_solicitud_tiposoporte AND bd_solicitud_tiposoporte like '%".$this->tiposoporte."%'";
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
	function cantidad_busqueda_tipo_soporte()
	{
		$sql="SELECT a.bd_solicitud_serial as num_soporte, b.bd_usuario_nombre as nombre_soporte, c.bd_area_detalle as area, bd_tiposoporte_detalle as tipo_soporte,
		a.bd_solicitud_fecha_solicitud as fecha, a.bd_solicitud_idtecnico  as nombre_tecnico, a.bd_solicitud_observacion_solicitud as observacion
		from sisotec_bd_solicitud as a,sisotec_bd_usuario as b, sisotec_bd_area as c, sisotec_bd_tiposoporte as d
		where a.bd_solicitud_idusuario=b.bd_usuario_id AND b.bd_usuario_departamento= c.bd_area_idt AND d.bd_tiposoporte_idt=a.bd_solicitud_tiposoporte AND bd_solicitud_tiposoporte like '%".$this->tiposoporte."%'";
		
		$resultado=parent::ejecutarConsultar($sql);

		return parent::numColumnas($resultado);
	}
	function busquedaTipoSoporte()
	{
		$sql="SELECT a.bd_solicitud_serial as num_soporte, b.bd_usuario_nombre as nombre_soporte, c.bd_area_detalle as area, bd_tiposoporte_detalle as tipo_soporte,
		a.bd_solicitud_fecha_solicitud as fecha, a.bd_solicitud_idtecnico  as nombre_tecnico, bd_solicitud_observacion as observacion
		from sisotec_bd_solicitud as a,sisotec_bd_usuario as b, sisotec_bd_area as c, sisotec_bd_tiposoporte as d
		where a.bd_solicitud_idusuario=b.bd_usuario_id AND b.bd_usuario_departamento= c.bd_area_idt AND d.bd_tiposoporte_idt=a.bd_solicitud_tiposoporte AND bd_solicitud_tiposoporte like '%".$this->tiposoporte."%'";
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
	function cantidadBusquedaTipoSoporte()
	{
		$sql="SELECT a.bd_solicitud_serial as num_soporte, b.bd_usuario_nombre as nombre_soporte, c.bd_area_detalle as area, bd_tiposoporte_detalle as tipo_soporte,
		a.bd_solicitud_fecha_solicitud as fecha, a.bd_solicitud_idtecnico  as nombre_tecnico, a.bd_solicitud_observacion_solicitud as observacion
		from sisotec_bd_solicitud as a,sisotec_bd_usuario as b, sisotec_bd_area as c, sisotec_bd_tiposoporte as d
		where a.bd_solicitud_idusuario=b.bd_usuario_id AND b.bd_usuario_departamento= c.bd_area_idt AND d.bd_tiposoporte_idt=a.bd_solicitud_tiposoporte AND bd_solicitud_tiposoporte like '%".$this->tiposoporte."%'";
		
		$resultado=parent::ejecutarConsultar($sql);

		return parent::numColumnas($resultado);
	}
	function busquedaGeneral()
	{
		$sql="SELECT a.bd_solicitud_serial as num_soporte, b.bd_usuario_nombre as nombre_soporte, c.bd_area_detalle as area, bd_tiposoporte_detalle as tipo_soporte,
		a.bd_solicitud_fecha_solicitud as fecha, a.bd_solicitud_idtecnico  as nombre_tecnico, bd_solicitud_observacion as observacion
		from sisotec_bd_solicitud as a,sisotec_bd_usuario as b, sisotec_bd_area as c, sisotec_bd_tiposoporte as d
		where a.bd_solicitud_idusuario=b.bd_usuario_id AND b.bd_usuario_departamento= c.bd_area_idt AND d.bd_tiposoporte_idt=a.bd_solicitud_tiposoporte ".$this->consulta;
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
	function cantidadBusquedaGeneral()
	{
		$sql="SELECT a.bd_solicitud_serial as num_soporte, b.bd_usuario_nombre as nombre_soporte, c.bd_area_detalle as area, bd_tiposoporte_detalle as tipo_soporte,
		a.bd_solicitud_fecha_solicitud as fecha, a.bd_solicitud_idtecnico  as nombre_tecnico, bd_solicitud_observacion as observacion
		from sisotec_bd_solicitud as a,sisotec_bd_usuario as b, sisotec_bd_area as c, sisotec_bd_tiposoporte as d
		where a.bd_solicitud_idusuario=b.bd_usuario_id AND b.bd_usuario_departamento= c.bd_area_idt AND d.bd_tiposoporte_idt=a.bd_solicitud_tiposoporte ".$this->consulta;
		
		$resultado=parent::ejecutarConsultar($sql);

		return parent::numColumnas($resultado);
	}
	function busqueda_nombre_fecha()
	{
		$sql="SELECT * FROM sis_soporte WHERE nombre_tecnico='".$this->nombre_tecnico."'
		 AND  (fecha BETWEEN '".$this->fecha."' AND '".$this->fecha2."')";
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
	function cantidad_nombre_fecha()
	{
		$sql="SELECT * FROM sis_soporte WHERE nombre_tecnico='".$this->nombre_tecnico."' 
		AND  (fecha BETWEEN '".$this->fecha."' AND '".$this->fecha2."')";

		$resultado=parent::ejecutarConsultar($sql);

		return parent::numColumnas($resultado);
	}
	function busqueda_nombre_area()
	{
		$sql="SELECT * FROM sis_soporte WHERE nombre_tecnico='".$this->nombre_tecnico."' 
		AND  area = '".$this->area."'
		ORDER BY fecha";
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
	function cantidad_nombre_area()
	{
		$sql="SELECT * FROM sis_soporte WHERE nombre_tecnico='".$this->nombre_tecnico."' 
		AND  area = '".$this->area."'
		ORDER BY fecha";

		$resultado=parent::ejecutarConsultar($sql);

		return parent::numColumnas($resultado);
	}
	function busqueda_nombre_tipo()
	{
		$sql="SELECT * FROM sis_soporte WHERE nombre_tecnico='".$this->nombre_tecnico."' 
		AND  tipo_soporte like '".$this->tipo_soporte."'
		ORDER BY fecha";
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
	function cantidad_nombre_tipo()
	{
		$sql="SELECT * FROM sis_soporte WHERE nombre_tecnico='".$this->nombre_tecnico."' 
		AND  tipo_soporte = '".$this->tipo_soporte."'";

		$resultado=parent::ejecutarConsultar($sql);

		return parent::numColumnas($resultado);
	}
	function busqueda_nombre_area_fechas()
	{
		$sql="SELECT * FROM sis_soporte WHERE nombre_tecnico='".$this->nombre_tecnico."'
		AND  area = '".$this->area."'
		AND  (fecha BETWEEN '".$this->fecha."' AND '".$this->fecha2."')
		ORDER BY fecha";
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
	function cantidad_nombre_area_fechas()
	{
		$sql="SELECT * FROM sis_soporte WHERE nombre_tecnico='".$this->nombre_tecnico."'
		AND  area like '".$this->area."'
		AND  (fecha BETWEEN '".$this->fecha."' AND '".$this->fecha2."')";
		$resultado=parent::ejecutarConsultar($sql);

		return parent::numColumnas($resultado);
	}
	function busqueda_nombre_tipo_fechas_area()
	{
		$sql="SELECT * FROM sis_soporte WHERE nombre_tecnico='".$this->nombre_tecnico."'
		AND  tipo_soporte = '".$this->tipo_soporte."'
		AND  area = '".$this->area."'
		AND  (fecha BETWEEN '".$this->fecha."' AND '".$this->fecha2."')
		ORDER BY fecha";
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
	function cantidad_nombre_tipo_fechas_area()
	{
		$sql="SELECT * FROM sis_soporte WHERE nombre_tecnico='".$this->nombre_tecnico."'
		AND  tipo_soporte = '".$this->tipo_soporte."'
		AND  area = '".$this->area."'
		AND  (fecha BETWEEN '".$this->fecha."' AND '".$this->fecha2."')
		ORDER BY fecha";
		$resultado=parent::ejecutarConsultar($sql);

		return parent::numColumnas($resultado);
	}

	function busqueda_nombre_tipo_area()
	{
		$sql="SELECT * FROM sis_soporte WHERE nombre_tecnico='".$this->nombre_tecnico."'
		AND  tipo_soporte = '".$this->tipo_soporte."'
		AND  area = '".$this->area."'
		ORDER BY fecha";
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
	function cantidad_nombre_tipo_area()
	{
		$sql="SELECT * FROM sis_soporte WHERE nombre_tecnico='".$this->nombre_tecnico."'
		AND  tipo_soporte = '".$this->tipo_soporte."'
		AND  area = '".$this->area."'";
		$resultado=parent::ejecutarConsultar($sql);

		return parent::numColumnas($resultado);
	}
	function busqueda_fechas_area()
	{
		$sql="SELECT * FROM sis_soporte WHERE 
		area = '".$this->area."'
		AND  (fecha BETWEEN '".$this->fecha."' AND '".$this->fecha2."')
		ORDER BY fecha";
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
	function cantidad_fechas_area()
	{
		$sql="SELECT * FROM sis_soporte WHERE 
		area = '".$this->area."'
		AND  (fecha BETWEEN '".$this->fecha."' AND '".$this->fecha2."')
		ORDER BY fecha";
		$resultado=parent::ejecutarConsultar($sql);

		return parent::numColumnas($resultado);
	}
	function busqueda_tipo_fechas()
	{
		$sql="SELECT * FROM sis_soporte WHERE  tipo_soporte = '".$this->tipo_soporte."'
		AND  (fecha BETWEEN '".$this->fecha."' AND '".$this->fecha2."')
		ORDER BY fecha";
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
	function cantidad_tipo_fechas()
	{
		$sql="SELECT * FROM sis_soporte WHERE  tipo_soporte = '".$this->tipo_soporte."'
		AND  (fecha BETWEEN '".$this->fecha."' AND '".$this->fecha2."')
		ORDER BY fecha";
		$resultado=parent::ejecutarConsultar($sql);

		return parent::numColumnas($resultado);
	}

	function busqueda_tipo_area()
	{
		$sql="SELECT * FROM sis_soporte WHERE tipo_soporte = '".$this->tipo_soporte."'
		AND  area = '".$this->area."'
		ORDER BY fecha";
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
	function cantidad_tipo_area()
	{
		$sql="SELECT * FROM sis_soporte WHERE  tipo_soporte = '".$this->tipo_soporte."'
		AND  area = '".$this->area."'";
		$resultado=parent::ejecutarConsultar($sql);

		return parent::numColumnas($resultado);
	}
	function hora_local($zona_horaria = 0)
	{
		if ($zona_horaria > -12.1 and $zona_horaria < 12.1)
		{
			$hora_local = time() + ($zona_horaria * 3600);
			return $hora_local;
		}
		return 'error';
	}
	function listarSoportes()
	{
		$sql                       = "SELECT *
		FROM sisotec_bd_solicitud
		WHERE bd_solicitud_estatus = 'Por Atender' or bd_solicitud_estatus = 'En Proceso'
		ORDER BY bd_solicitud_serial ASC";
		$ejecutarConsulta          = parent::ejecutarConsultar($sql);
		$resultado                 = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;
	}
	function cantListarSoportes()
	{
		
		$sql                       = "SELECT *
		FROM sisotec_bd_solicitud
		WHERE bd_solicitud_estatus = 'Por Atender' or bd_solicitud_estatus = 'En Proceso'
		ORDER BY bd_solicitud_serial ASC";
		$ejecutarConsulta          = parent::ejecutarConsultar($sql);

		return parent::numColumnas($ejecutarConsulta);
	}
	function listarEstatus()
	{
		$sql                       = "SELECT *
		FROM sisotec_bd_estatus
		ORDER BY id_estatus ASC";
		$ejecutarConsulta          = parent::ejecutarConsultar($sql);
		$resultado                 = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;
	}
	function ingresarSoporte(){
//ingresar por tecnicos: soportes por atender y soportes atendidos
		$sql              ="INSERT into sisotec_bd_solicitud (bd_solicitud_idusuario,bd_solicitud_tiposoporte,bd_solicitud_observacion_solicitud,bd_solicitud_fecha_solicitud,bd_solicitud_estatus)
		values ('".$this->idusuario."','".$this->tiposoporte."','".$this->observacion_solicitud."','".$this->fecha."','Por Atender')";	
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;
	}
	function asignarTecnicoSoporte(){

		$sql              ="UPDATE sisotec_bd_solicitud 
							SET bd_solicitud_idtecnico='".$this->idtecnico."',
								bd_solicitud_estatus='En Proceso'
							WHERE bd_solicitud_serial ='".$this->id."'";
						
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;
	}	
	function cambiarEstatus(){

		$sql              ="UPDATE sisotec_bd_solicitud 
							SET bd_solicitud_estatus='".$this->estatus."',
								bd_solicitud_observacion='".$this->observacion."'
							WHERE bd_solicitud_serial ='".$this->id."'";
						
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;
	}	
	function eliminarSoporte(){

		$sql="DELETE FROM sisotec_bd_solicitud WHERE bd_solicitud_serial  ='".$this->id."'";
		$ejecutarConsulta = parent::ejecutarConsultar($sql);
		$resultado        = parent::obtenerTodo($ejecutarConsulta);
		return $resultado;
	}
	function modificarSoporte(){}
}

?>