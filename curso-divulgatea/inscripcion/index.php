<?php include('khipu-lib.php'); ?>
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
	<!--[if lt IE 9]
	<script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
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
					<h2>Inscripción</h2>
					<h5>Llena los datos para tu inscripción.</h5>

					<form class="form-horizontal" role="form" action="process.php" method="post" onsubmit="document.getElementById('nombreBanco').value=document.getElementById('bankId').options[document.getElementById('bankId').selectedIndex].text;">
						<div class="col-sm-6">
							<div class="form-group <?php echo $_REQUEST['invalid'] ? 'has-error' : ''; ?>">
								<label for="name" class="col-sm-4 control-label">Nombre completo</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="name" name="name"  placeholder="Ingresa tu nombre completo">
								</div>
							</div>
							<div class="form-group <?php echo $_REQUEST['invalid'] ? 'has-error' : ''; ?>">
								<label for="rut" class="col-sm-4 control-label">Rut</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="rut" name="rut" placeholder="12345678-9">
								</div>
							</div>
							<div class="form-group <?php echo $_REQUEST['invalid'] ? 'has-error' : ''; ?>">
								<label for="email" class="col-sm-4 control-label">Email</label>
								<div class="col-sm-8">
									<input type="email" class="form-control" id="email" name="email" placeholder="mi@correo.cl">
								</div>
							</div>
							<div class="form-group <?php echo $_REQUEST['invalid'] ? 'has-error' : ''; ?>">
								<label for="phone" class="col-sm-4 control-label">Tel&eacute;fono</label>
								<div class="col-sm-8">
									<input type="phone" class="form-control" id="phone" name="phone" placeholder="Ingresa tu número con 8 digitos">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group <?php echo $_REQUEST['invalid'] ? 'has-error' : ''; ?>">
								<label for="email" class="col-sm-4 control-label">Ocupaci&oacute;n</label>
								<div class="col-sm-8" >
									<select id="ocupacion" name="ocupacion" class="form-control">
										<option value="1" selected>Profesional</option>
										<option value="2" >Estudiante</option>
									</select>
								</div>
							</div>
							<div class="form-group <?php echo $_REQUEST['invalid'] ? 'has-error' : ''; ?>">
								<label for="carrera" class="col-sm-4 control-label">Carrera</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="carrera" name="carrera">
								</div>
							</div>
							<div class="form-group">
								<label for="bankId" class="col-sm-4 control-label">Elige tu banco</label>
								<div class="col-sm-8">
									<select name="bankId" class="form-control" id="bankId">
										<?php
										$banks = khipu_get_banks();
										foreach ($banks as $bank) {
											echo "<option value=\"" . $bank['id'] . "\">" . $bank['name'] . "</option>";
										}
										?>
									</select>
								</div>
							</div>

						</div>
						<div class="col-md-12">
							<div class="form-group">
								<center>
									<button type="submit" class="btn btn-primary">Revisar datos y pagar</button>
								</center>
							</div>
						</div>
						<input type="hidden" name="nombreBanco" id="nombreBanco" value="" />
					</form>

				</div>
			</div>
		</div>
	</section>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/docs.min.js"></script>

</body>

</html>