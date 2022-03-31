<?php
$destino = 'arroyoalejandra97@gmail.com';
$nombre = 'alejandra';
$asunto = 'pruebas';
$mensaje = 'hola bb';
$email = 'prueba@gmail.com';

$header = "Enviado desde la pagina ";
$mensajecompleto = $mensaje. "Atentamente".$nombre;

mail($destino,$asunto,$mensajecompleto,$header);
echo "hola";

?>