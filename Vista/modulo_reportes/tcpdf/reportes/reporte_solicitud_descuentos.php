<?php
/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Custom Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04

 */

require_once('../tcpdf.php');
require_once '../../lib/config.php';
require_once '../../lib/common.php';


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
	public $fechainicio, $fechafinal, $fecharegistro, $quincena, $mes, $año, $id,$seleccion;
	//Page header
	public function Header() {
		// Logo
		$Conn            =conexion();
		$var_sql         ="select * from nomempresa";
		$rs              = query($var_sql,$Conn);
		$row_rs          = fetch_array($rs);
		$var_encabezado1 =$row_rs['nom_emp'];
		$var_izquierda   ='../../imagenes/'.$row_rs[imagen_der];
		$var_derecha     ='../../imagenes/'.$row_rs[imagen_izq];
		
		$image_file      = K_PATH_IMAGES.'../../vista/Encabezado.png';
		//$this->Image($image_file, 10, 10, 190, '', 'JPG', '', '', false, 300, '', false, false, 0, false, false, false);
		//		$this->Cell(0, 20, 'HOJA N/TOTAL DE HOJAS '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->SetFont('helvetica', 8);
		$fecha           = date("d")."-".date("m")."-".date("Y");

		$membrete=" CONTRALORÍA GENERAL DE LA REPÚBLICA<BR>
					DIRECCIÓN DE MÉTODOS Y SISTEMAS DE CONTABILIDAD<BR>
					AUTORIZACIÓN DE DESCUENTOS VOLUNTARIOS<BR>
					<b>SOLICITUD DE DESCUENTOS OFICIALES</b><BR>";
        $this->Image($var_izquierda,11,11,19,19); 

		$this->MultiCell(40, $altura,"", $border="", $align='C', $fill=false, $ln=1, $x=10,$y=10, $reseth=true, $stretch=0, $ishtml=true, $autopadding=true, $maxh=0, $valign='T', $fitcell=false);
		$this->MultiCell(195, $altura,$membrete, $border="", $align='C', $fill=false, $ln=1,$x=10,$y=10,  $reseth=true, $stretch=0, $ishtml=true, $autopadding=true, $maxh=0, $valign='T', $fitcell=false);
		$this->MultiCell(40, $altura,"", $border="", $align='C', $fill=false, $ln=1, $x=245,$y=10, $reseth=true, $stretch=0, $ishtml=true, $autopadding=true, $maxh=0, $valign='T', $fitcell=false);

		$this->Ln();
		// Set font
		// Page number
		
	}

    function CambiarFecha($fecha)
	{
		if($fecha!='')
		{
		$otra_fecha= explode("-", $fecha);// en la posición 1 del arreglo se encuentra el mes en texto.. lo comparamos y cambiamos
	  //$buena= $otra_fecha[0]."/".$otra_fecha[1]."/".$otra_fecha[2];// volvemos a armar la fecha

		$buena= $otra_fecha[2]."-".$otra_fecha[1]."-".$otra_fecha[0];// volvemos a armar la fecha
	  	return $buena;
	  }
	}
	public function CuerpoTablaHtml($reg,$fecha_inicio,$fecha_fin,$fecha_registro)
	{
		$conexion=conexion();
	    if($this->getAliasNumPage() <= 1)
		{
			$Y=60;
			$this->SetTopMargin ($Y);
			$this->SetTopMargin ($Y);

		}
		else
		{
			$Y=50;
			$this->SetTopMargin($Y);
			$this->SetTopMargin ($Y);

		}

		$fill              = 1;
		$border            =0;
		$ln                =0;
		$fill              = 0;
		$align             ='C';
		$link              =0;
		$stretch           =1;
		$ignore_min_height =0;
		$calign            ='T';
		$valign            ='T';
		$height            =5.75;//alto de cada columna
		$YMax              =260;
		$altura            =7;
		        $this->SetFont('helvetica', 'B', 8);
		$this->SetTextColor(0);
		$this->SetFillColor(255, 255, 255);
		$this->SetTextColor(0,0,0);
		$this->SetDrawColor(100, 100, 100);
		$sql1              = "SELECT B.*, C.apenom,D.descrip,C.nomposicion_id,C.cedula, E.ministerio FROM mov_contraloria as A, mov_descuento AS B, nompersonal as C,nomtipos_nomina as D, parametro_inclusion as E WHERE A.id_mov_contraloria = B.id_mov_contraloria AND A.personal_id=C.personal_id AND D.codtip=C.tipnom AND A.quincena = ".$this->quincena." AND A.mes =".$this->mes." AND A.ano=".$this->ano." AND B.id_descuento_tipo='".$this->seleccion."' AND E.id_parametro_inclusion=1";

		$res1=query($sql1, $conexion);			
		$sql2 = " SELECT DISTINCT *
	              FROM mov_contraloria as A, mov_descuento AS B WHERE A.id_mov_contraloria = B.id_mov_contraloria  ";

		$res2     =query($sql2, $conexion);						
		$cabecera = array('NOMBRES Y APELLIDOS','MIN', 'PLA' , 'POS','Cédula','MONTO','DCTO');
		$cuerpo   =array($fecha,$turno);
      	if ($this->seleccion==1) {
      		$seleccion1="X";
      	}
      	elseif($this->seleccion==3) {
      		$seleccion2="X";
      	}
      	elseif($this->seleccion==5) {
      		$seleccion3="X";
      	}
      	elseif($this->seleccion==7) {
      		$seleccion4="X";
      	}
      	elseif($this->seleccion==2) {
      		$seleccion5="X";
      	}
      	elseif($this->seleccion==4) {
      		$seleccion6="X";
      	}
      	elseif($this->seleccion==6) {
      		$seleccion7="X";
      	}
      	elseif($this->seleccion==8) {
      		$seleccion8="X";
      	}
    	$row=fetch_array($res2);

		$this->Cell(190,8,  "CODGIOS DE DESCUENTO / CLAVE DE DESCUENTOS", 1, 0, 'C', 1); 	 
		$this->Ln();
		$num_headers = count($cabecera);
		$w           = array(50, 15,15,15,30,30);
		$this->Cell(5,8,  $seleccion1, 1, 0, 'C', 1); 
		$this->Cell(36,8,  "MULTAS", 1, 0, 'C', 1);
 		$this->Cell(5,8,  "", 0, 0, 'C', 1); 
		$this->Cell(5,8,  $seleccion2, 1, 0, 'C', 1); 
		$this->Cell(35,8,  "PRAA", 1, 0, 'C', 1);
 		$this->Cell(5,8,  "", 0, 0, 'C', 1); 
 		$this->Cell(5,8,  $seleccion3, 1, 0, 'C', 1); 
		$this->Cell(45,8,  "COIF", 1, 0, 'C', 1);
 		$this->Cell(5,8,  "", 0, 0, 'C', 1); 
		$this->Cell(5,8,  $seleccion4, 1, 0, 'C', 1); 
		$this->Cell(39,8,  "LEYES ESPECIALES", 1, 0, 'C', 1);
 		$this->Cell(5,8,  "", 0, 0, 'C', 1);  		
		$this->Ln();
		$this->Cell(5,8,  $seleccion5, 1, 0, 'C', 1); 
		$this->Cell(36,8,  "SIACAP", 1, 0, 'C', 1);
 		$this->Cell(5,8,  "", 0, 0, 'C', 1); 
		$this->Cell(5,8,  $seleccion6, 1, 0, 'C', 1); 
		$this->Cell(35,8,  "RECUPERACIÓN", 1, 0, 'C', 1);
 		$this->Cell(5,8,  "", 0, 0, 'C', 1); 
 		$this->Cell(5,8,  $seleccion7, 1, 0, 'C', 1); 
		$this->Cell(45,8,  "S/COL SEGURIDAD SOCIAL", 1, 0, 'C', 1);
 		$this->Cell(5,8,  "", 0, 0, 'C', 1); 
		$this->Cell(5,8,  $seleccion8, 1, 0, 'C', 1); 
		$this->Cell(39,8,  "OTRO", 1, 0, 'C', 1);
 		$this->Cell(5,8,  "", 0, 0, 'C', 1);  		
		$this->Ln(); 
		$this->Ln();
        $this->SetFont('helvetica', 'B', 8);

		for($i = 0; $i < $num_headers; ++$i) {
			$this->Cell($w[$i], 8, $cabecera[$i], 1, 0, 'C', 1);

		}
		$this->Ln();
		        $this->SetFont('helvetica', '', 8);

	    while($fila=fetch_array($res1))
	    {
			//$header = array('Fecha', 'Turno', 'Entr.','SA','EA','Sal.','Sal. DS','Desc.','Ord.','Dom','Nac','Tard.','EM','DNT','Extra','ExtraExt','ExtraNoc','NocExt');

			$this->SetFillColor(255, 255, 255);
			$this->SetTextColor(0,0,0);
			$this->SetDrawColor(100, 100, 100);
			$this->SetLineWidth(0.3);
			// Header
			$num_headers = count($header);			

			if(	$this->GetY() >172)
			{
				$this->AddPage();
			}

			$border=1;
			$ixx=0;
			if ($fila['titular_interino']=="1") {
				$titular_interino="T";
			}
			else {
				$titular_interino="I";
			}
			$this->Cell($w[$ixx++], $altura, $fila['apenom'], $border,$ln,'L',$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
			$this->Cell($w[$ixx++], $altura, $fila['ministerio'], $border,$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
			$this->Cell($w[$ixx++], $altura, $fila['descrip'], $border,$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
			$this->Cell($w[$ixx++], $altura, $fila['nomposicion_id'], $border,$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
			$this->Cell($w[$ixx++], $altura, $fila['cedula'], $border,$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
			$this->Cell($w[$ixx++], $altura, $fila['descuento_monto_pendiente'], $border,$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
			$this->Cell($w[$ixx++], $altura, $fila['descuento_porcentaje'], $border,$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);

		    $this->Ln();

         }//fin del while
	}
	public function Footer() {
		// Logo
		$this->SetY(-40);

		$this->Ln();
		$align="C";
		$this->SetFont('helvetica', '',8);

		$this->Cell(63, $altura,"Firmas", $border="LTRB",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Cell(63, $altura,"Registro de Presupuesto",  $border="LTRB",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Cell(63, $altura,"Fiscalización de Planillas", $border="LTRB",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Ln();
		$this->Cell(63, $altura,"", $border="LR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Cell(63, $altura,"",  $border="LR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Cell(63, $altura,"", $border="LR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Ln();
		$this->Cell(63, $altura,"______________________", $border="LR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Cell(63, $altura,"",  $border="LR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Cell(63, $altura,"", $border="LR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Ln();
		$this->Cell(63, $altura,"Analista de Planillas", $border="LR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Cell(63, $altura,"",  $border="LR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Cell(63, $altura,"", $border="LR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Ln();
		$this->Cell(63, $altura,"______________________", $border="LR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Cell(63, $altura,"SELLO",  $border="LR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Cell(63, $altura,"SELLO", $border="LR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Ln();
		$this->Cell(63, $altura,"Jefe de Planillas", $border="LR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Cell(63, $altura,"",  $border="LR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Cell(63, $altura,"", $border="LR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Ln();
		$this->Cell(63, $altura,"______________________", $border="LR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Cell(63, $altura,"",  $border="LR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Cell(63, $altura,"", $border="LR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Ln();
		$this->Cell(63, $altura,"General de Fiscalización", $border="LR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Cell(63, $altura,"",  $border="LR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Cell(63, $altura,"", $border="LR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);

		$this->Ln();
		$this->Cell(63, $altura,"", $border="BLR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Cell(63, $altura,"",  $border="BLR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		$this->Cell(63, $altura,"", $border="BLR",$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign);
		// Set font
		// Page number
		
	}
}//fin clase
		
		
		

// create new PDF document
$pdf                = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', true);
$reg                =$_REQUEST['reg'];
$pdf->quincena      =$_REQUEST['quincena'];
$pdf->mes           =$_REQUEST['mes'];
$pdf->ano           =$_REQUEST['ano'];
$pdf->fechainicio   =$_REQUEST['fecha_ini'];
$pdf->fechafinal    =$_REQUEST['fecha_fin'];
$pdf->fecharegistro =$_REQUEST['fecha_reg'];
$pdf->seleccion     =$_REQUEST['tipo'];

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Selectra');
$pdf->SetTitle('SOLICITUD DE DESCUENTOS');
$pdf->SetSubject('SOLICITUD DE DESCUENTOS');
$pdf->SetKeywords('TCPDF, PDF, SOLICITUD, DESCUENTOS');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(10, 10, 10,true);
$pdf->SetLeftMargin(10);
$pdf->SetHeaderMargin(10);
$pdf->SetRightMargin(10);
//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 15	);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'BI', 14);

// add a page
$pdf->AddPage('`P', 'A4');


//$pdf->ColoredTable($reg);
$pdf->CuerpoTablaHtml($reg,$fecha_inicio,$fecha_fin,$fecha_registro);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('reporte_Solicitud_Descuento.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
//$informes->desconectar_bd();