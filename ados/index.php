<?php
require_once('../includes/base.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Certificación en Evaluación Clínica ADOS-2 para el diagnóstico de Autismo.">
		<meta name="author" content="Ion Group">
		<meta name="keywords" content="ADOS-2,Examen ADOS-2,Evaluación Clínica ADOS-2,Test ADOS-2, Autismo, TEA">
		<title>Cognitivo | ADOS-2</title>
		<!--<link rel="shortcut icon" href="images/favicon.png">-->
		<link rel="icon" href="../favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="../images/favicon.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="../images/favicon-114.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="../images/favicon-72.png" />

		<!-- Bootstrap -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="../css/style.css" rel="stylesheet">

		<!-- Superslides CSS -->
		<link href="../css/superslides.css" rel="stylesheet">

		<!-- Owl Carousel stylesheet -->
		<link href="../css/owl.carousel.css" rel="stylesheet">

		<!-- Owl Carousel Default Theme -->
		<link href="../css/owl.theme.css" rel="stylesheet">

		<!-- Fancybox -->
		<link href="../css/jquery.fancybox.css" rel="stylesheet">

		<!-- Google Fonts -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800|Pacifico" rel="stylesheet">

		<!-- Font Awesome Icons -->
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.2/css/font-awesome.css" rel="stylesheet">

		<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
        <script src="../js/html5shiv.js"></script>
        <script src="../js/respond.min.js"></script>
        <![endif]-->
		
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-69480528-1', 'auto');
		  ga('send', 'pageview');

		</script>

	</head>
	<body data-spy="scroll" data-target=".navbar-collapse">

		<!-- ========== MENU START ========== -->

		<?php getNavBar2(); ?>

		<!-- ========== MENU END ========== -->

		<!-- ========== HEADER START ========== -->

		<header class="background background3 background-image">
			<div class="container">
				<div class="row text-center no-fade">
					<div class="col-sm-12">
						<h1>Evaluación Clínica ADOS-2</h1>
					</div>
				</div>
			</div>
		</header>

		<!-- ========== HEADER END ========== -->

		<!-- ========== BLOG START ========== -->

		<section id="blog">
			<div class="container">
				<div class="row no-fade">

					<!-- Post Start -->
					<div class="col-sm-8">
					<article class="post">
						<h1 class="entry-title">Escala de Observación para el Diagnóstico del Autismo</h1>

						<div class="entry-content">
							<p style="text-align: justify">La <strong>Escala de Observación para el Diagnóstico del Autismo - 2 (ADOS-2)</strong> permite la evaluación estandarizada y semiestructurada de la comunicación, la interacción social, el juego o el uso imaginativo de los materiales y las conductas restrictivas y repetitivas en niños, jóvenes y adultos en los que se sospecha que existe un <strong>trastorno del espectro autista</strong> (TEA). Su predecesor, el ADOS, es considerado un instrumento de referencia para la evaluación observacional y el diagnóstico del TEA</p>
							<p style="text-align: justify">El ADOS-2 está compuesto por <strong>cinco módulos</strong>, que permiten evaluar desde <strong>niños de 12 meses hasta adultos</strong>. Cada módulo ofrece distintas actividades estandarizadas diseñadas para provocar comportamientos que están directamente relacionados con el diagnóstico de los trastornos del espectro autista en distintos niveles de desarrollo y edades cronológicas. Los <strong>protocolos</strong> guían al examinador en la aplicación de las actividades, la codificación de las conductas observadas y la puntuación de los algoritmos.</p>
						</div>
					</article>
					<!-- Post End -->

					</div>
					<!-- Posts End -->

					<!-- Sidebar Start -->
					<aside class="col-sm-4">
						<h5><i class="fa fa-file-text fa-lg"></i>Horas</h5>
						<ul class="submenu">							
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="buttonReservar">Reservar</button>

							<div class="post-thumb" style="margin-top: 20px;">
								<img src="../images/examen-ados-2.jpg" alt="Examen ADOS-2" title="Test ADOS-2" class="img-responsive" />
							</div>

							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
							  <div class="modal-dialog" role="document">
								<div class="modal-content">
									<form id="contactForm" method="post" class="form-horizontal">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="exampleModalLabel">Reserva</h4>
										</div>
								  		<div class="modal-body">
											<p>Deseo que me contacten para realizar una reserva.</p>

											<div class="form-group">
												<label class="col-md-3 control-label">Nombre</label>
												<div class="col-md-6">
													<input type="text" class="form-control" id="fullName" name="fullName" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label">Email</label>
												<div class="col-md-6">
													<input type="email" class="form-control" id="email" name="email" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label">Teléfono</label>
												<div class="col-md-6">
													<input type="text" class="form-control" id="telefono" name="telefono" />
												</div>
											</div>
											<!-- #messages is where the messages are placed inside -->
											<div class="form-group">
												<div class="col-md-9 col-md-offset-3">
													<div id="messages"></div>
												</div>
											</div>

										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary" id="myButtonSend">Enviar</button>
										</div>
									</form>
								</div>
							  </div>
							</div>
						</ul>
						<hr>
					</aside>
					<!-- Sidebar End -->

				</div>
			</div>
		</section>

		<!-- ========== BLOG END ========== -->

		<!-- ========== FOOTER START ========== -->

		<?php getFooter(); ?>

		<!-- ========== FOOTER END ========== -->

		<!-- Modernizr Plugin -->
		<script src="../js/modernizr.custom.97074.js"></script>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="../js/jquery-1.10.2.min.js"></script>

		<!-- Bootstrap Plugins -->
		<script src="../js/bootstrap.min.js"></script>

		<!-- Retina Plugin -->
		<script src="../js/retina-1.1.0.min.js"></script>

		<!-- Superslides Plugin -->
		<script src="../js/jquery.easing.1.3.js"></script>
		<script src="../js/jquery.animate-enhanced.min.js"></script>
		<script src="../js/jquery.superslides.js"></script>

		<!-- Owl Carousel Plugin -->
		<script src="../js/owl.carousel.js"></script>

		<!-- Direction-aware Hover Effect Plugin -->
		<script src="../js/jquery.hoverdir.js"></script>

		<!-- Fancybox Plugin -->
		<script src="../js/jquery.fancybox.js"></script>

		<!-- jQuery Settings -->
		<script src="../js/settings.js"></script>
		
		<!--<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>-->
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
		
		<script>
			$('#exampleModal').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) // Button that triggered the modal
			  //var recipient = button.data('whatever') // Extract info from data-* attributes
			  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			  var modal = $(this)
			  //modal.find('.modal-title').text('New message to ' + recipient)
			  //modal.find('.modal-body input').val(recipient)
			})	
			
			$(document).ready(function() {
				$('#contactForm').bootstrapValidator({
					container: '#messages',
					feedbackIcons: {
						valid: 'glyphicon glyphicon-ok',
						invalid: 'glyphicon glyphicon-remove',
						validating: 'glyphicon glyphicon-refresh'
					},
					fields: {
						fullName: {
							validators: {
								notEmpty: {
									message: 'El nombre no puede ser vacío.'
								}
							}
						},
						email: {
							validators: {
								notEmpty: {
									message: 'El email es necesario y no puede estar vacío.'
								},
								emailAddress: {
									message: 'El email no es válido.'
								}
							}
						},
						telefono: {
							validators: {
								notEmpty: {
									message: 'El número de teléfono es necesario y no puede estar vacío.'
								},
								stringLength: {
									min: 8,
									max: 100,
									message: 'El número de teléfono debe tener mínimo 8 digitos.'
								}
							}
						}
					}
				}).on('success.form.bv', function(e) {
						// Prevenimos la ejecución del form por defecto 
						e.preventDefault();
						// Obtenemos la instancia del form
						var $form = $(e.target);
						// obtenemos la instancia del validador
						//var bv = $form.place('bootstrapValidator');
						$.ajax({
							data: $form.serialize(),
							type: "POST",
							placeType: 'json',
							url: 'reservaAdos.php',
							beforeSend: function () {
								$("#messages").html("Procesando, espere por favor...");
							},
							success:  function (response) {
								$("#messages").html(response);
								setTimeout(closeModal, '2000');
							}
						});
					});
			});
			function closeModal() {
				$('#exampleModal').modal('hide');
			}
		</script>

		<meta itemprop="url" content="http://www.cognitivo.cl/"></span>

	</body>
</html>