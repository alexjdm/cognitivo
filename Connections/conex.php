<?php
	$hostname_conex = "localhost";
	$database_conex = "cognitiv_app";
	$username_conex = "cognitiv_admin";
	$password_conex = "]g8SX#RWByKy";
	
	$conex = mysql_connect($hostname_conex, $username_conex, $password_conex)
			or die("No se pudo realizar la conexion");
	mysql_select_db($database_conex, $conex)
			or die("ERROR con la base de datos");
?>