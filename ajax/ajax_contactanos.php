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
		$nombre = $_REQUEST["nombre"];
        $mail = $_REQUEST["mail"];
        $mensaje = $_REQUEST["mensaje"];
		EnviarCorreo($nombre,$mail,$mensaje);
		break;
        default:
		$arr_respuesta = array(
			"status" => false,
			"data" => [],
			"message" => "Seleccione un metodo..."
		);
		echo json_encode($arr_respuesta);

    }      
			


function EnviarCorreo($nombre,$mail,$mensaje)
{
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