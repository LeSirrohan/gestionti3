<?php
	session_start();
//error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);

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
				</div>
				<div class="portlet-body form">
					<?php if ($registrado=='0'){
						?>  
				<form name="soporte" method="post" action="../../Control/ingresarSoporte.php" id="Form">
				<table border="0" class="tabla">
				  <tr>

				    <td width="276" align="right" class="Negrita4">Cuenta:
				      <input name="textfield" type="text" id="cuenta" size="35" /></td>
				    <input name="equipo" type="hidden" id="equipo" size="50" value=<?php echo trim($equipo);?> />    
				    <input name="registrado" type="hidden" id="registrado" size="50" value=<?php echo $registrado;?> /> 
				  </tr>
				  <tr>

				    <td align="right" valign="middle"><input name="button3" type="button" class="botones" id="button3" value="Enviar" />
				      <input name="button4" type="button" class="btnreporte" id="button4" value="Cancelar" /></td>
				  </tr>
				  
				 
				  </table>
				</form>

				<?php } else { ?>
					<form class="form-horizontal form-bordered" action="../../Control/ingresarSoporte.php">
					  <div class="form-group"></div>

					  <div class="form-group">
						    <label for="Hora" class="col-sm-4 control-label">Hora:</label>
						 	<input name="fecha" type="hidden" id="fecha" value="<?php echo gmdate('d-m-Y H:i',$soporte->hora_local(-4.5)); ?>" />    
						    <div class="col-sm-4 ">
						    <?php echo gmdate('d-m-Y H:i',$soporte->hora_local(-4.5));?>
							 
						  	</div>
					  </div>

					  <div class="form-group">
					    <label for="usuario" class="col-sm-4 control-label">Usuario</label>
					    <div class="col-sm-4">
					    	<input name="usuario" type="text"   class="form-control input-large" id="usuario" disabled="disabled" value="<?php echo $_SESSION['_Nombre'];?>" size="50"/>    
						 	<input name="equipo" type="hidden" id="equipo" value="<?php echo trim($equipo); ?>" />    
							<input name="registrado" type="hidden" id="registrado" size="50" value="<?php echo $registrado;?>" />
					  	</div>
					  </div>

					  <div class="form-group">
					    <label class="col-sm-4 control-label">Ubicacion</label>
						    <div class="col-sm-4">
						    	<select name="ubicacion" id="ubicacion"  class="form-control input-large">
					              <option value="0" selected="selected">Seleccione</option>
					            </select>
						    </div>
					  </div>
					  <div id="Areas">
					  </div>
					  <div class="form-group">
					    <label for="extension" class="col-sm-4 control-label">Nro. Extensión Telf: </label>
					    <div class="col-sm-4">
				        <input  class="form-control input-large" type="text" name="extension" id="extension"/>
				        </div>        
						 
					  </div>

					   <div class="form-group">
					    <label class="col-xs-4 control-label">Tipo Soporte</label>
					    <div class="col-xs-4">
					    	 <select name="tiposoporte" size="1" id="tiposoporte"  class="form-control input-large">
				            </select>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="observacion" class="col-sm-4 control-label">Observación </label>
					    <div class="col-sm-4">
				        	<textarea  class="form-control input-large" name="observacion" id="observacion" rows="3"></textarea>
				        </div>        
						 
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-4 col-sm-10">
					      <button type="submit" class="btn blue">Enviar</button>
					      <button type="submit" class="btn btn-default">Cancelar</button>
					    </div>
					  </div>
					  <div class="form-group"></div>
					</form>


				<?php } ?>
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
    <script src="../../js/soporte.js"></script>
    <script>
    $(document).ready(function(){
		$.get("../../Control/enlacesOperador.php",function(resultado){
			$("#enlaces").html(resultado);

		});
    });
    </script>

  </body>
</html>