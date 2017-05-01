<?php 	
	$nombre = $_POST['fullName'];
	$mail = $_POST['email'];
	$telefono = $_POST['telefono'];
	
	if(mail('hola@cognitivo.cl', 'Reserva ADOS', 'Nombre: ' . $nombre . ' Mail : ' . $mail . ' Teléfono : ' . $telefono))
		echo "Enviado";
	else
		echo "Ocurrió un error, por favor intente nuevamente";
?>