<?php
include('khipu-lib.php');
require ('../../Connections/db.php');

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
$bankId 	= $_POST['bankId'];
$nombreBanco 	= $_POST['nombreBanco'];

$precio		= 75000;
if($ocupacion == 2){
	$precio	= 65000;
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = $pdo->prepare('INSERT INTO `inscritos`(`name`, `rut`, `email`, `phone`, `ocupacion`, `carrera`, `pagado`, `banco`, `precio`, `fecha`, `llamado`, `comentario`, `id_transaccion`, `ID_CURSO`) VALUES ("'.$name.'", "'.$rut.'", "'.$email.'", "'.$phone.'", "'.$ocupacion.'", "'.$carrera.'", "0", "'.$_REQUEST['nombreBanco'].'", "'.$precio.'", now(), "0", "", "'.$id_transaccion.'", "2")');
$sql->execute();

$json = khipu_get_new_payment($_REQUEST['email'], $_REQUEST['bankId'], $precio, $id_transaccion);
$data = urlencode($json);

	function getPuntosRut( $rut ){
		$rutTmp = explode( "-", $rut );
		return number_format( $rutTmp[0], 0, "", ".") . '-' . $rutTmp[1];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Centro de desarrollo integral en Puente Alto. Tenemos especialidades en Fonoaudiología, Terapia Ocupacional, Psicología y Psicopedagogía.">
	<meta name="author" content="Ion Group">
	<meta name="keywords" content="Fonoaudiología,Psicología,Psicopedagogía,Terapia Ocupacional,Centro Desarrollo,Dislalia,Dislexia,Transtornos del espectro autista,Síndrome de Asperger,Logopedia,Autismo,Sindrome de Down,Educación especial,Parálisis cerebral,Rehabilitación,Puente Alto, La Florida">
	<link rel="icon" type="image/png" href="../../images/favicon.png">

    <title>Cognitivo | Inscripción a Curso divulgaTEA.</title>

	<!-- Bootstrap core CSS -->
	<link href="../../css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="../../css/style.css" rel="stylesheet">

	<!-- Superslides CSS -->
	<link href="../../css/superslides.css" rel="stylesheet">

	<!-- Owl Carousel stylesheet -->
	<link href="../../css/owl.carousel.css" rel="stylesheet">

	<!-- Owl Carousel Default Theme -->
	<link href="../../css/owl.theme.css" rel="stylesheet">

	<!-- Fancybox -->
	<link href="../../css/jquery.fancybox.css" rel="stylesheet">

	<!-- Google Fonts -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800|Pacifico" rel="stylesheet">

	<!-- Font Awesome Icons -->
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.2/css/font-awesome.css" rel="stylesheet">

	<!-- Just for debugging purposes. Don't actually copy this line! -->
	<!--[if lt IE 9]>
	<script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/atmosphere/2.1.2/atmosphere.min.js"></script> 
	<script src="//storage.googleapis.com/installer/khipu-1.1.js"></script>

    <style>
        #pay-button {
            cursor: pointer;
        }
    </style>

</head>

<body data-spy="scroll" data-target=".navbar-collapse">

<div class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<meta itemprop="image" content="http://www.cognitivo.cl/"><img src="../../images/logo-cognitivo.png" alt="Logo Cognitivo" class="img-responsive"/></a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="../">Volver</a></li>
			</ul>
		</div>
	</div>
</div>

<section id="inscripcion" style="padding-top:5px;">
	<div class="container">
		<div class="text-center">
			<div class="col-sm-12">
				<h2>Confirmación</h2>
				<h5>Solo queda realizar el pago.</h5>
				<p>Para hacer efectiva la inscripción presiona el botón más abajo y sigue las instrucciones.</p>

				<form class="form-horizontal" role="form" method="post" onsubmit="document.getElementById('nombreBanco').value=document.getElementById('bankId').options[document.getElementById('bankId').selectedIndex].text;">

                    <center>
                        <table border="0" cellpadding="3" cellspacing="3" style="width:70%; margin-bottom:20px; margin-top:20px;">
                            <tr>
                                <td>
                                    <label for="nombre" class="col-sm-6">Nombre</label>
                                    <div class="col-sm-6">
                                        <?php echo $name ?>
                                    </div>
                                </td>
                                <td>
                                    <label for="rut" class="col-sm-6">Rut</label>
                                    <div class="col-sm-6">
                                        <?php echo $rut ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="email" class="col-sm-6">Email</label>
                                    <div class="col-sm-6">
                                        <?php echo $email ?>
                                    </div>
                                </td>
                                <td>
                                    <label for="telefono" class="col-sm-6">Celular</label>
                                    <div class="col-sm-6">
                                        <?php echo $phone ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="email" class="col-sm-6">Ocupación</label>
                                    <div class="col-sm-6">
                                        <?php if($ocupacion == 1) { echo "Profesional";  } else { echo "Estudiante"; }; ?>
                                    </div>
                                </td>
                                <td>
                                    <label for="pago" class="col-sm-6"><?php if($ocupacion == 1) { echo "Titulo";  } else { echo "Carrera"; }; ?></label>
                                    <div class="col-sm-6">
                                        <?php echo $carrera; ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="bankId" class="col-sm-6">Banco</label>
                                    <div class="col-sm-6">
                                        <?php echo $nombreBanco ?>
                                    </div>
                                </td>
                                <td>
                                    <label for="monto" class="col-sm-6">Monto</label>
                                    <div class="col-sm-6">
                                        <?php echo "$ " . number_format($precio, 0, ",", "."); ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </center>

					<div class="col-md-12">
						<div class="form-group start-khipu">
							<center>
								<img src="https://s3.amazonaws.com/static.khipu.com/buttons/2015/200x75-transparent.png" id="pay-button"/>
							</center>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</section>

<div id="khipu-chrome-extension-div"></div>
<script>
	window.onload = function () {
		KhipuLib.onLoad({
				elementId: 'pay-button',
				data: <?php echo $json ?>
			}
		)
	}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/docs.min.js"></script>

</body>

</html>