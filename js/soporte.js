$(document).ready(function(){
	//listarArea();
	listarTipoSoporte();
	mostrarUbicacion();	
});
function listarArea()
{
	$.get("../../Control/listarArea.php",function(departamento)
	{
		$("#departamento").append(departamento);
	});
}
function listarTipoSoporte()
{	
	$.get("../../Control/listarTipoSoporte.php",function(tiposoporte)
	{
		$("#tiposoporte").append(tiposoporte);
	});
}
function mostrarUbicacion()
{
	$.get("../../Control/mostrarUbicacion.php",function(ubicacion){
		$("#ubicacion").append(ubicacion);

		$("#ubicacion").click(function(){
			var ubicacion = $("#ubicacion").val();
			if (ubicacion == '1')
			{
				mostrarArea(ubicacion);
			}
			else
			{
				if (ubicacion == '2')
				{
					mostrarAreasExternas(ubicacion);
				}
			}
		});

	});
}
function mostrarArea(ubicacion)
{
	$.get("../../Control/mostrarArea.php", function(resultado)
	{
		$('#Areas').empty();
		$('#Areas').append(resultado);			
	});//fin del get
}
function mostrarAreasExternas(ubicacion)
{
	$.get("../../Control/mostrarAreasExternas.php", function(resultado)
	{
		$('#Areas').empty();
		$('#Areas').append(resultado);
		$("#margen").on('click',function(){mostarTramo();});	


	});//fin del get
}
function mostarTramo()
{
	margen=$("select#margen").val();
	$.get("../../Control/mostrarTramo.php",{margen:margen}, function(resultado)
	{
		$('#tramos').empty();

		$('#tramos').append(resultado);	
		$("#tramo").change(function(){mostrarEstructura();});	
	
	});//fin del get
}
function mostrarEstructura()
{
	margen=$("select#margen").val();
	tramo=$("select#tramo").val();
	$.get("../../Control/mostrarEstructura.php",{margen:margen,tramo:tramo}, function(resultado)
	{
		$('#estructuras').empty();
		
		$('#estructuras').append(resultado);	
		$("#estructura").change(function(){mostrarEje();});	
	
	});//fin del get
}
function mostrarEje()
{
	margen=$("select#margen").val();
	tramo=$("select#tramo").val();
	estructura=$("select#estructura").val();
	$.get("../../Control/mostrarEje.php",{margen:margen,tramo:tramo,estructura:estructura}, function(resultado)
	{
		$('#ejes').empty();
		
		$('#ejes').append(resultado);		
	});//fin del get
}
function mostrarComponente()
{
	margen=$("select#margen").val();
	tramo=$("select#tramo").val();
	estructura=$("select#estructura").val();
	eje=$("select#eje").val();
	$.get("../../Control/mostrarComponente.php",{margen:margen,tramo:tramo,estructura:estructura,eje:eje}, function(resultado)
	{
		$('#componentes').empty();
		
		$('#componentes').append(resultado);		
	});//fin del get
}