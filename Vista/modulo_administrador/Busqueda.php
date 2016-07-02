<?php
session_start();
	if (empty($_SESSION['_Nombre']))
	{
		echo '<script language="Javascript">top.location.reload()</script>';
	}
/*
    include ("../../Clases/conectar.php");
    include ("../../Clases/Soportes.php");
    include ("../../Clases/Areas.php");
    include ("../../Clases/Gerencias.php");*/


  $equipo=$_SESSION['_Equipo'];
  $registrado=$_SESSION['_Registrado'];
  include("../../Modelo/ClsConectar.php");
  include("../../Modelo/ClsSoportes.php");
  $soporte = new ClsSoportes();
 
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Soporte Técnico</title>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
  <link href="../../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
  <link href="../../css/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
  <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="../../css/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
  <link href="../../css/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME STYLES -->
  <link href="../../css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
  <link href="../../css/layout.css" rel="stylesheet" type="text/css"/>
  <link id="style_color" href="../../css/darkblue.css" rel="stylesheet" type="text/css"/>
  <link href="../../css/custom.css" rel="stylesheet" type="text/css"/>
  <!-- END THEME STYLES -->
    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
<link rel="stylesheet" type="text/css" href="../../css/clockface/css/clockface.css"/>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap-colorpicker/css/colorpicker.css"/>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

 <body>
  <div class="container">
  <div class="row">
    <div class="col-md-12"><img width="100%" src="../../imagenes/banner2.fw.png">  
    </div>
    
  </div><BR>
  <div class="row">     
      <div class="col-md-2">
        <span id="enlaces"></span>
    </div>      

      <div class="col-md-9">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <form id="form1" name="form1" method="post" action="../../Control/AnalizarBusqueda.php">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#tab_1" data-toggle="tab">
            Búsqueda </a>
          </li>
          <li>
            <a href="#tab_2" data-toggle="tab">
            Búsqueda Avanzada </a>
          </li>

        </ul>
        <div class="tab-content">
            <!-- begin Tab 0-->
            <div class="tab-pane active" id="tab_1">
            <div class="portlet box blue-hoki">
              <div class="portlet-title">
                <div class="caption">
                   <i class="fa fa-globe"> </i>Reportes
                </div>
                
              </div>
              <div class="portlet-body">

                <div class="row">
                  <div class="col-md-12 text-center"><h4>B&uacute;squeda</h4></div>
                </div>
                <div class="row">
                  <div class="col-md-12 text-center"><h5>Por favor seleccione el tipo de reporte a imprimir</h5></div>
                </div>
                  

                <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4 text-center">
                      Mostrar reporte ordenado por<br>
                        <select name="menu2" id="menu2" class="form-control">
                          <option value="none">Seleccione</option>
                          <option value="1">Nombre</option>
                          <option value="2">Area</option>
                          <option value="3">Fecha</option>
                          <option value="4">Tipo Soporte</option>
                          <option value="5">Tecnico</option>
                        </select>
                     
                  </div>
                </div>    
                <div class="row">
                  &nbsp;
                </div>  
                <div class="row">
                  <div class="col-md-12 text-center">
                     <div class="col-md-12 text-center">
                    <input type="submit" name="enviar2" id="enviar2" value="Reporte" class="btn blue-hoki" />
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <form id="form1" name="form1" method="post" action="../../Control/AnalizarBusqueda.php">

          <div class="tab-pane" id="tab_2">
            <div class="portlet box blue-hoki">
              <div class="portlet-title">
                <div class="caption">
                   <i class="fa fa-globe"> </i>Reportes
                </div>
                
              </div>
              <div class="portlet-body">

                <div class="row">
                  <div class="col-md-12 text-center"><h4>B&uacute;squeda Avanzada</h4></div>
                </div>
        
                <div class="row">
                  <div class="col-md-2">Nombre</div>
                  <div class="col-md-6">
                    <select size="1" cols="30" id="nombre" name="nombre" class="form-control">
                        <option value="none">Seleccione</option>
                        <?php

                        $soporte= new ClsSoportes();
                        $nombres=$soporte-> consultar_nombre_tecnico();
                        $cantidad_tecnicos = $soporte -> cantidad_tecnicos();
                        $i=0;
                        while ($i < $cantidad_tecnicos)
                        {
                          $nombre_post=$nombres[$i]["bd_solicitud_idtecnico"];
                        ?>
                        <option value="<?= $nombre_post ?>"><?php echo $nombre_post;?></option>
                        <?php $i++;
                        }
                        ?>
                    </select></div>
                </div>   
                <div class="row">
                  <div class="col-md-2">Desde</div>
                  <div class="col-md-6">
                    <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                      <input name="fecha" id="fecha" type="text" value="" class="form-control form-control-inline input-medium" size="16" readonly>
                      <span class="input-group-btn">
                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                      </span>

                    </div>
                    
                  </div>
                </div>   
                <div class="row">
                  <div class="col-md-2">Hasta</div>
                  <div class="col-md-6">
                    <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                      <input name="fecha2" id="fecha2" type="text" value="" class="form-control form-control-inline input-medium" size="16" readonly>
                      <span class="input-group-btn">
                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                      </span>
                    </div>

                  </div>
                </div>   
                <div class="row">
                <div class="col-md-2">Area</div>
                  <div class="col-md-6">
                    
                    <select size="1" cols="10" id="area" name="area" class="form-control">
                      <option value="none">Seleccione</option>
                      <?php
                      $i=1;

                      $sql="select *, bd_area_detalle as area
                            from sisotec_bd_area";
                      $ejecuta=pg_query($sql);
                      while ($reg = pg_fetch_object($ejecuta)){
                      ?>
                      <option value="<?= $reg->bd_area_id; ?>"><?php echo substr($reg->area,0,35);?></option>
                      <?php $i++;
                      }
                      ?>
                    </select>

                  </div>
                </div>   
                <div class="row">
                <div class="col-md-2">Tipo Soporte</div>
                  <div class="col-md-6">

                    <select size="1" cols="10" id="tipo" name="tipo" class="form-control">
                        <option value="none">Seleccione</option>
                        <?php
                        $i=1;

                        $sql="SELECT *,bd_tiposoporte_detalle as tipo_soporte
                            FROM sisotec_bd_tiposoporte ";
                        $ejecuta=pg_query($sql);
                        while ($reg = pg_fetch_object($ejecuta)){
                        ?>
                        <option value="<?= $reg->bd_tiposoporte_id;?>"><?php echo $reg->tipo_soporte;?></option>
                        <?php $i++;
                        }
                        ?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  &nbsp;
                </div>   
                <div class="row">
                  <div class="col-md-12 text-center">
                    <input type="submit" name="enviar2" id="enviar2" value="Reporte" class="btn blue-hoki" />
                  </div>
                </div>    
                  </form>
              </div>
            </div>
          </div>
            </div>
          </div>
        </div>
          <!-- END SAMPLE FORM PORTLET-->


    </div>
    </div>
  </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
  <script src="../../js/jquery/jquery.min.js" type="text/javascript"></script>
  <script src="../../js/jquery/jquery-migrate.min.js" type="text/javascript"></script>
  <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
  <script src="../../js/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
  <script src="../../js/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="../../js/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
  <script src="../../js/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
  <script src="../../js/jquery.blockui.min.js" type="text/javascript"></script>
  <script src="../../js/jquery.cokie.min.js" type="text/javascript"></script>
  <script src="../../js/uniform/jquery.uniform.min.js" type="text/javascript"></script>
  <script src="../../js/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
  <!-- END CORE PLUGINS -->
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <script type="text/javascript" src="../../js/select2/select2.min.js"></script>
  <script type="text/javascript" src="../../js/datatables/media/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../../js/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
  <script type="text/javascript" src="../../js/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
  <script type="text/javascript" src="../../js/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
  <script type="text/javascript" src="../../js/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
  <script src="../../js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="../../js/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="../../js/clockface/js/clockface.js"></script>
<script src="../../js/bootstrap-daterangepicker/moment.min.js"></script>
<script src="../../js/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="../../js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="../../js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

  <!-- END PAGE LEVEL PLUGINS -->

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/metronic.js" type="text/javascript"></script>
  <script src="../../js/layout.js" type="text/javascript"></script>
  <script src="../../js/demo.js" type="text/javascript"></script>
    <script src="../../js/listarGrupos.js"></script>
  <script>
  jQuery(document).ready(function() {       
    /*Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    Demo.init(); // init demo features*/
    TableAdvanced.init();
        $('.date-picker').datepicker({
        orientation: "left",
        language: 'es',
    autoclose: true
    }); 
        $.get("../../Control/enlacesAdministrador.php",function(resultado){
      $("#enlaces").html(resultado);

    });
  });
  </script>
  </body>
</html>
