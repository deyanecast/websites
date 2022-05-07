<?php
ob_start();
header("Cache-control: private, no-cache");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Pragma: no-cache");
header("Cache: no-cahce");
ini_set('max_execution_time', 90000);
ini_set("memory_limit", -1);

include_once('../CONFIG/mail/plantilla.php');

$request = $_REQUEST["request"]; 
switch($request){
	case "grabar":
		$nombre = $_REQUEST["nombre"];
        $mail = $_REQUEST["mail"];
        $mensaje = $_REQUEST["mensaje"];
        $telefono = $_REQUEST["telefono"];
		EnviarCorreo($nombre,$mail,$mensaje,$telefono);
		break;
        default:
		$arr_respuesta = array(
			"status" => false,
			"data" => [],
			"message" => "Seleccione un metodo..."
		);
		echo json_encode($arr_respuesta);

    }      
			


function EnviarCorreo($nombre,$mail,$mensaje,$telefono)
{
    $to = "arroyoalejandra97@gmail.com,deyanecast@gmail.com";
    $subject = "Fectum Group: Nuevo mensaje";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $message = mail_constructor($nombre,$mail,$mensaje);
    mail($to, $subject, $message, $headers);
    $enviar = 1;
    if($enviar == 1)
    {
        $arr_respuesta = array(
            "status" => true,
            "data" => [],
            "message" => " $nombre, tu mensaje fue enviado exitosamente al administrador...!"
        );
        echo json_encode($arr_respuesta);
        return;
    }
    else
    {
        $arr_respuesta = array(
            "status" => false,
            "data" => [],
            "message" => "Error en el envio de correos..."
        );
        echo json_encode($arr_respuesta);
        return;
    }
	
}
	
?>