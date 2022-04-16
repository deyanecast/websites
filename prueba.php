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
	$mail = "hola@gmail.com";
	$mailadmin = "arroyoalejandra97@gmail.com";
	$nombre = "alejandra";
	// Instancia el API KEY de Mandrill
	$mandrill = new Mandrill('8907b85c1d1b98ecda4941b3b18fa6bc-us14');
	//--
	// Create the email and send the message
	$to = array(
		array(
			'email' => "$mail",
			'name' => "$nombre",
			'type' => 'to'
		)
	);
	//////////////////////// CREDENCIALES DE CLIENTE
	
	/////////////_________ Correo a admin
	$subject = "Tu Password";
	$cuerpo = "Has recibido un nuevo mensaje desde el Sistema  <br>"."Aqui estan los detalles:<br><br>Estimado(a) <br> <br>E-mail: <br>Usuario: <br>Password: <br><br>Que pases un feliz dia!!!";
	$html = mail_constructor($subject, $cuerpo);
	try{
		$message = array(
			'subject' => $subject,
			'html' => $html,
			'from_email' => 'noreply@ayd.com.gt',
			'from_name' => ' Business',
			'to' => $to
		);
		//print_r($message);
		//echo "<br>";
		$result = $mandrill->messages->send($message);
		$arr_respuesta = array(
			"status" => true,
			"data" => [],
			"message" => "Su solicitud esta siendo procesada, en unos minutos recibira un e-mail con su Usuario y Contraseña al correo registrado..."
		);
		echo json_encode($arr_respuesta);
		return;

	} catch(Mandrill_Error $e) {
		//echo "<br>";
		//print_r($e);
		$arr_respuesta = array(
			"status" => false,
			"data" => [],
			"message" => "Su mensaje no ha podido ser entregado en este momento, lo sentimos..."
		);
		echo json_encode($arr_respuesta);
		return;
	}


}
?>