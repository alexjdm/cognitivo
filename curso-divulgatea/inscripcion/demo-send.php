<?php
	include('khipu-lib.php');
	require ('../../Connections/conex.php');

	if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
		header('Location: index.php?invalid=true');
		return;
	}

	date_default_timezone_set("America/Santiago");
	function sanear_string($string) { 
		$string = trim($string); 
		$string = str_replace( array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $string ); 
		$string = str_replace( array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $string ); 
		$string = str_replace( array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $string ); 
		$string = str_replace( array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $string ); 
		$string = str_replace( array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $string ); 
		$string = str_replace( array('ñ', 'Ñ', 'ç', 'Ç'), array('n', 'N', 'c', 'C',), $string ); 
		//Esta parte se encarga de eliminar cualquier caracter extraño 
		$string = str_replace( array("\\", "¨", "º", "-", "~", "#", "@", "|", "!", "\"", "·", "$", "%", "&", "/", "(", ")", "?", "'", "¡", "¿", "[", "^", "`", "]", "+", "}", "{", "¨", "´", ">“, “< ", ";", ",", ":", "."), '', $string ); 
		return $string; 
	} 

	$name		= sanear_string($_POST['name']);
	$rut		= $_POST['rut'];
	$email 		= $_POST['email'];
	$phone 		= $_POST['phone'];
	$ocupacion 	= $_POST['ocupacion'];
	$carrera 	= $_POST['carrera'];
	$id_transaccion 	= rand(10000, 99999);

	//$fechaPromocion = new DateTime('15-07-2016');
    $fechaPromocion = new DateTime('2016-07-15');
	$segundos = strtotime($fechaPromocion) - strtotime('now');
	$diferencia_dias = intval($segundos/60/60/24);

	//if($diferencia_dias > 0){
		$precio		= 75000;
		if($ocupacion == 2){
			$precio	= 65000;
		}
//	} else {
//		$precio		= 75000;
//		if($ocupacion == 2){
//			$precio	= 65000;
//		}
//	}

	$insertSQL = 'INSERT INTO `inscritos`(`name`, `rut`, `email`, `phone`, `ocupacion`, `carrera`, `pagado`, `banco`, `precio`, `fecha`, `llamado`, `comentario`, `id_transaccion`, `ID_CURSO`)
				VALUES ("'.$name.'", "'.$rut.'", "'.$email.'", "'.$phone.'", "'.$ocupacion.'", "'.$carrera.'", "0", "'.$_REQUEST['nombreBanco'].'", "'.$precio.'", now(), "0", "'.$diferencia_dias.'", "'.$id_transaccion.'", "2")';
	$result = mysql_query($insertSQL, $conex) or die(mysql_error());

	$json = khipu_get_new_payment($_REQUEST['email'], $_REQUEST['bankId'], $precio, $id_transaccion);
	header('Location: process.php?data=' . urlencode($json)
			.'&name='. urlencode($_REQUEST['name']) 
			.'&rut='. urlencode($_REQUEST['rut']) 
			.'&email='. urlencode($_REQUEST['email']) 
			.'&phone='. urlencode($_REQUEST['phone'])
			.'&ocupacion='. urlencode($ocupacion)
			.'&carrera='. urlencode($carrera)
			.'&nombreBanco='. urlencode($_REQUEST['nombreBanco'])
			.'&precio='. urlencode($precio)
			);
