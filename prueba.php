<?php
ob_start();
header("Cache-control: private, no-cache");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Pragma: no-cache");
header("Cache: no-cahce");
ini_set('max_execution_time', 90000);
ini_set("memory_limit", -1);

$request = $_REQUEST["request"]; 
switch($request){
	case "grabar":
		$codigo = $_REQUEST["nombre"];
		enviar();
		break;
        default:
		$arr_respuesta = array(
			"status" => false,
			"data" => [],
			"message" => "Seleccione un metodo..."
		);
		echo json_encode($arr_respuesta);

    }      
			


function enviar()
{
$destino = 'arroyoalejandra97@gmail.com';
$nombre = 'alejandra';
$asunto = 'pruebas';
$mensaje = 'hola bb';
$email = 'prueba@gmail.com';

$header = "Enviado desde la pagina ";
$mensajecompleto = $mensaje. "Atentamente".$nombre;

mail($destino,$asunto,$mensajecompleto,$header);
}
?>