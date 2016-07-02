<?php
  session_start();
  $equipo=$_SESSION['_Equipo'];
  $registrado=$_SESSION['_Registrado'];

 
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

      <div class="col-md-10">
        <!-- BEGIN SAMPLE FORM PORTLET-->
      <div class="portlet box blue-hoki">
        <div class="portlet-title">
          <div class="caption">
             <i class="fa fa-globe"> </i>Tipos de Soporte
          </div>
          <div class="actions">
            <a class="btn btn-sm blue-madison"  onclick="javascript: window.location='../modulo_reportes/pdfphp/php-pgsql.php'">
              <i class="fa fa-plus"></i>
             Imprimir PDF
            </a>
            <a class="btn btn-sm blue-madison"  onclick="javascript: window.location='../modulo_reportes/pdfphp/php-excel.php'">
              <i class="fa fa-plus"></i>
             Imprimir Excel
            </a>
            <a class="btn btn-sm blue-madison"  onclick="javascript: window.location='Busqueda.php'">             
              <i class="fa fa-plus"></i>
             Regresar
            </a>
          </div>
        </div>
        <div class="portlet-body">
          <table class="table table-striped table-bordered table-hover" id="reportes1">
          <thead>
            <tr>
              <th width="15%">Nombre</th>
              <th width="15%">Area</th>
              <th width="15%">Tipo Soporte</th>
              <th width="15%">Fecha</th>
              <th width="15%">Tecnico</th>
              <th width="15%">Observacion</th>
            </tr>
          </thead>

      
  </table>
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
  <!-- END PAGE LEVEL PLUGINS -->

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/metronic.js" type="text/javascript"></script>
  <script src="../../js/layout.js" type="text/javascript"></script>
  <script src="../../js/demo.js" type="text/javascript"></script>
    <script src="../../js/listarReportes1.js"></script>
  <script>
  jQuery(document).ready(function() {       
    /*Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    Demo.init(); // init demo features*/
    TableAdvanced.init();
$.get("../../Control/enlacesOperador.php",function(resultado){
      $("#enlaces").html(resultado);

    });
  });
  </script>
  </body>
</html>


