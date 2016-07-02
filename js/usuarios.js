$(document).ready(function(){
	//listarArea();
	mostrarArea();
});
function mostrarArea()
{
	$.get("../../Control/mostrarAreas.php", function(resultado)
	{
		$('#Areas').empty();
		$('#Areas').append(resultado);			
	});//fin del get
}
function mostrarUsuario()
{


}
function mostrarPassword()
{

}
function mostrarEmail (argument) {
	// body...
}
function mostrarTipoUsuario (argument) {
	// body...
}