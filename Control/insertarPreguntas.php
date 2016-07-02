<?php
include_once("../Modelo/ClsConectar.php");  
include_once("../Modelo/ClsPreguntas.php");

$pregunta     = isset ( $_REQUEST['pregunta']) ? $_REQUEST['pregunta'] : NULL;
$respuesta    = isset ( $_REQUEST['respuesta']) ? $_REQUEST['respuesta'] : NULL;
$tipo_soporte = isset ( $_REQUEST['tipo_soporte']) ? $_REQUEST['tipo_soporte'] : NULL;

echo $pregunta, " ",$respuesta, " " , $tipo_soporte,"<br>";

$preguntas    = new ClsPreguntas();
$preguntas -> asignarPregunta ( $pregunta );
$preguntas -> asignarRespuesta ( $respuesta );
$preguntas -> asignarTipoSoporte ( $tipo_soporte );
$resultado    = $preguntas -> insertarPreguntas();
echo $resultado;


?>