$(document).ready(function(){
    //listarArea();
             $("#boton_agregar").hide();
             $("#boton_estatus").hide();

    listarTipoSoporte();
    verSoporte();
    privilegio=$("#privilegio").val();
    //alert(privilegio);
    if (privilegio==1) {
        $.get("../../Control/enlacesUsuario.php",function(resultado){
            $("#enlaces").html(resultado);
        });
    }
    else
    {
        if (privilegio==2) 
        {
            $.get("../../Control/enlacesOperador.php",function(resultado){
            $("#enlaces").html(resultado);
            });
        }
        else
        {
            if (privilegio==3) {
                $.get("../../Control/enlacesAdministrador.php",function(resultado){
                $("#enlaces").html(resultado);

            });
            }
        }
    }
        

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
function verSoporte()
{
    $.get("../../Control/verSoporte.php",function(resultado){
        $("#Areas").html(resultado);
            $("#observacion").hide();

        $("#estatus_soporte").change(function(){
            estatus_soporte=$(this).val();
            id_soporte=$("#id").val();
            $("#boton_estatus").show();
            $("#observacion").show();
            $("#boton_cancelar_estatus").click(function(){
                  $("#boton_estatus").hide();
           
            });
            $("#boton_cancelar_enviar").on('click',function(){
                observacion=$("#observacion").val();
                $.get("../../Control/cambiarEstatus.php",{estatus_soporte:estatus_soporte,id_soporte:id_soporte,observacion:observacion},function(resultado){
                    location.href('listar_solicitudes.php');
                });
            });
        });
        $("#select_tecnico").change(function(){
            select_tecnico=$(this).val();
            id_soporte=$("#id").val();
            console.log(select_tecnico);
            $("#boton_agregar").show();
            $("#boton_cancelar").click(function(){
                  $("#boton_agregar").hide();           
            });
            $("#verSoporte").submit(function(){
               // alert(select_tecnico+" - "+id_soporte);
                $.get("../../Control/asignarTecnico.php",{tecnico:select_tecnico,id_soporte:id_soporte},function(resultado){
                    location.href('listar_solicitudes.php');
                });
            });
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