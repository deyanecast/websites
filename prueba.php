<?php
$destino = 'arroyoalejandra97@gmail.com';
$nombre = 'alejandra';
$asunto = 'pruebas';
$mensaje = 'hola bb';
$email = 'prueba@gmail.com';

$header = "Enviado desde la pagina ";
$mensajecompleto = $mensaje. "Atentamente".$nombre;

mail($destino,$asunto,$mensajecompleto,$header);
echo "<script>alert('correo enviado')</script>";
echo "<script>setTimeout(\"location.href='index.html'\",1000)</script>";
?>