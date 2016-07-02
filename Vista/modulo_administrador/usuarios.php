<?php
	session_start();
	$equipo=$_SESSION['_Equipo'];
	$registrado=$_SESSION['_Registrado'];
	include("../../Modelo/ClsConectar.php");
	include("../../Modelo/ClsSoportes.php");
	include("../../Modelo/ClsUsuarios.php");
	$soporte = new ClsSoportes();
	$Usuarios = new ClsUsuarios();


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
	  		<div class="tabbable tabbable-custom boxless tabbable-reversed">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#tab_1" data-toggle="tab">
						Agregar Usuario </a>
					</li>
					<li>
						<a href="#tab_2" data-toggle="tab">
						Listar Usuarios </a>
					</li>

				</ul>
				<div class="tab-content">
				  	<!-- begin Tab 0-->
				  	<div class="tab-pane active" id="tab_1">
				  		<!-- BEGIN SAMPLE FORM PORTLET-->
						<div class="portlet box green-jungle">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-user"></i> Agregar Usuarios
								</div>
							</div>
							<div class="portlet-body form">
								<!-- BEGIN FORM-->
								<form id="form-usuarios" action="#" class="form-horizontal">
									<div class="form-body">
										<div class="form-group">
											<label class="col-md-4 control-label">ID usuario</label>
											<div class="col-md-4">
												<input id="usuario" name="usuario" type="text" class="form-control input-circle" placeholder="Nombre">									
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-4 control-label">Nombres y Apellidos del Usuario</label>
											<div class="col-md-4">
												<input id="nombres" name="nombres" type="text" class="form-control input-circle" placeholder="Nombres y Apellidos del Usuario">									
											</div>
										</div>

										<div id="Areas">
										</div>

										<div class="form-group">
											<label class="col-md-4 control-label">Extensión Telefónica</label>
											<div class="col-md-4">
												<input id="extension" name="extension" type="text" class="form-control input-circle" placeholder="Extensión Telefónica">									
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-4 control-label">Cuenta usuario</label>
											<div class="col-md-4">
												<input id="cuenta" name="cuenta" type="text" class="form-control input-circle" placeholder="Cuenta de usurario">									
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-4 control-label">Tipo Usuario</label>
											<div class="col-md-4">
												<div class="input-password">
													<select id="tipo_usuario" name="tipo_usuario" class="form-control input-circle" placeholder="Tipo Usuario">
													<option value="1">Usuario</option>
													<option value="2">Operador</option>
													<option value="3">Administrador</option>
													

													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<button type="submit" class="btn btn-circle blue">Guardar</button>
												<button type="button" class="btn btn-circle default">Cancelar</button>
											</div>
										</div>
									</div>
								<!-- END FORM-->
							</div>
						</div>
						<!-- END SAMPLE FORM PORTLET-->
					</div>
					<!-- END Tab 0-->
					<!-- begin Tab 1-->
				  	<div class="tab-pane" id="tab_2">
				  		<!-- BEGIN SAMPLE FORM PORTLET-->
						<div class="portlet box yellow-gold">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-user"></i>Listar Usuarios
								</div>
							</div>
							<div class="portlet-body">

					<table class="table table-striped table-bordered table-hover" id="usuarios">
						<thead>
						<tr>								
							<th>
								Usuario
							</th>
							<th>
								Nombre y Apellido
							</th>
							<th>
								Área
							</th>
							<th>
								Extensión
							</th>
							<th>
								Privilegios
							</th>							
							<th>
								Cuenta
							</th>
							<th>Acciones</th>


						</tr>							
						</thead>							
					</table>
				</div>
						</div>
						<!-- END SAMPLE FORM PORTLET-->
					</div>
					<!-- END Tab 2-->
													</form>

				</div>
			</div>
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
    <script src="../../js/listarUsuarios.js"></script>
    <script src="../../js/usuarios.js"></script>

    <script src="../../js/form-samples.js"></script>
	<script>
	jQuery(document).ready(function() {       

		TableAdvanced.init();		
		//QuickSidebar.init(); // init quick sidebar
   		FormSamples.init();
   		$.get("../../Control/enlacesAdministrador.php",function(resultado){
			$("#enlaces").html(resultado);
		});
		$("#form-usuarios").submit(function(){
			//data= $(this).serialize();
			usuario      =$("#usuario").val();
			nombres      =$("#nombres").val();
			extension    =$("#extension").val();
			cuenta       =$("#cuenta").val();
			tipo_usuario =$("#tipo_usuario").val();
			areas        =$("#areas").val();

			///alert(data);
			$.get("../../Control/insertarUsuario.php",{usuario:usuario,areas:areas,nombres:nombres,extension:extension,cuenta:cuenta,tipo_usuario:tipo_usuario},function(resultado){
				if (resultado) {
					console.log("hola");
					alert("Usuario creado exitosamente");
				}
				else
				{
					alert("Ha ocurrido un error al crear el usuario");
					console.log("nada");
				}
			});
		});
	});
	</script>
  </body>
</html>