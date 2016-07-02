<?php
	session_start();
//error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);

	$equipo=$_SESSION['_Equipo'];
	$id=$_GET['id'];
	$_SESSION['_Id']=$id;
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
	<link href="../../css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="../../css/layout.css" rel="stylesheet" type="text/css"/>
	<link id="style_color" href="../../css/darkblue.css" rel="stylesheet" type="text/css"/>
	<link href="../../css/custom.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">

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
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-cogs"></i> Soporte Técnico
					</div>
					<div class="actions">
						<a class="btn btn-sm blue"  href="listar_solicitudes.php">
							<i class="fa fa-arrow-left"></i>
							 Regresar
						</a>
					</div>				
				</div>
				<div class="portlet-body form">
					
					<form id="verSoporte" class="form-horizontal form-bordered" >
	<input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>"></input>
	<input type="hidden" name="privilegio" id="privilegio" value="<?php echo $_SESSION['_Privilegio']; ?>"></input>
					  
					  <div id="Areas">
					  </div>
					  <div id="boton_agregar">
						  <div class="form-group">
						    <div class="col-sm-offset-3 col-sm-10">
						      <button type="submit" class="btn blue">Asignar Técnico</button>
						      <button class="btn btn-default" id="boton_cancelar">Cancelar</button>
						    </div>
						  </div>
					  </div>
					  <div id="boton_estatus">
					  					  	
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-10">
							  <button type="submit"  id="boton_cancelar_enviar" class="btn blue">Cambiar estatus</button>
							  <button class="btn btn-default" id="boton_cancelar_estatus">Cancelar</button>
							</div>
						</div>
					  </div>
					</form>


				</div>
			</div>
			<!-- END SAMPLE FORM PORTLET-->


		</div>
	  </div>
	</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../js/verSoporte.js"></script>

  </body>
</html>