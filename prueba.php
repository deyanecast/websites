<?php
ob_start();
header("Cache-control: private, no-cache");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Pragma: no-cache");
header("Cache: no-cahce");
ini_set('max_execution_time', 90000);
ini_set("memory_limit", -1);
require_once('CONFIG/mailchimp/src/Mandrill.php');

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
    $apikey = '510b81a3686ca86741d227cf5e3c6672-us14'; //aquí debes indicar tu api key de mandrill
	$mandrill = new Mandrill($apikey);
    $mensaje = "hola";
    $asunto = "prueba";
    $to_email= "arroyoalejandra97@gmail.com";
	$message = new stdClass();
	$message->html = $mensaje;
	$message->text = $mensaje;
	$message->subject = $asunto;
	$message->from_email = "arroyoalejandra97@gmail.com";//Email del remitente
	$message->from_name  = "Sr. Código";//Nombre del remitente
	$message->to = array( array( "email" => $to_email ) );
	$message->track_opens = true;
 
	$response = $mandrill->messages->send($message);
}
?>