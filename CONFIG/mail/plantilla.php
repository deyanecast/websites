<?php


function mail_constructor($nombre,$mail,$mensaje){
	$title = 'Nuevo mensaje de : '.$nombre.'('.$mail.')';
 	return $salida = '
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ASMS</title>
		<style>
			 body{
				 font-family: Arial, sans-serif;
				 font-size: 14px;
				 color: #585858;
			 }
		</style>
  </head>
<body style="margin: 0; padding: 0;">
<br>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td>
			<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
				<tr>		
					<td align="center" bgcolor="#F9F9F9" style="padding: 10px 0 10px 0; border: 1px solid transparent;border-radius: 4px;border-color: #EDEDED;">
						<img src="fectumgroup.com/assets.1.2.1/img/logo.png" width="30%">
					</td>
				</tr>
				<tr>		
					<td align="center" bgcolor="#ffffff" style="padding: 10px 30px 10px 30px;">
					
						<h2>'.$title.'</h2>
					</td>
				</tr>
				<tr>		
					<td bgcolor="#ffffff" style="padding: 10px 30px 10px 30px;">
						
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td align="justify">
									<hr>
									<p>'.$mensaje.'</p>
								</td>
							</tr>	
						</table>
						
					</td>
				</tr>
				
				<tr>
					<td align = "center"  bgcolor="#777777">
						<p style="font-size: 18px; font-weight: bold; color: #fff;">Copyright © 2022. </p>
						<p style="color: #fff;">FECTUM GROUP</p>
					</td>
				</tr>
			</table>
	
		</td> 
	</tr>
</table>
 <br>
</body>
</html>
	';
//    echo $salida;
}

	
//echo mail_constructor($subject, $texto);
?>
