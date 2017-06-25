<?php 	
	/*$nombre = $_POST['fullName'];
	$mail = $_POST['email'];
	$telefono = $_POST['telefono'];
	
	if(mail('hola@cognitivo.cl', 'Reserva ADOS', 'Nombre: ' . $nombre . ' Mail : ' . $mail . ' Teléfono : ' . $telefono))
		echo "Enviado";
	else
		echo "Ocurrió un error, por favor intente nuevamente";*/

$mail = $_POST['email'];

$headers = 'From: Cognitivo <hola@cognitivo.cl>' . PHP_EOL .
    'Reply-To: '. $mail . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();

if(mail('hola@cognitivo.cl', 'Reserva ADOS', ' Mail : ' . $mail, $headers))
    echo "Enviado";
else
    echo "Ocurrió un error, por favor intente nuevamente";