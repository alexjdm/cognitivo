<?php
require_once('includes/base.php');
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Centro de terapia especialista en Autismo. Contamos con especialidades en Fonoaudiología, Terapia Ocupacional, Psicología y Psicopedagogía.">
		<meta name="author" content="Ion Group">
		<!--<meta name="keywords" content="Fonoaudiología,Psicología,Psicopedagogía,Terapia Ocupacional,Centro Desarrollo,Dislalia,Dislexia,Transtornos del espectro autista,Síndrome de Asperger,Logopedia,Autismo,Sindrome de Down,Educación especial,Parálisis cerebral,Rehabilitación,Puente Alto, La Florida">-->
		<meta name="keywords" content="Autismo,TEA,Fonoaudiología,Psicología,Psicopedagogía,Terapia Ocupacional">
		<title>Cognitivo | Centro de terapia especialista en Autismo</title>
		<!--<link rel="shortcut icon" href="images/favicon.png">-->
		<link rel="icon" href="favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="images/favicon.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="images/favicon-114.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="images/favicon-72.png" />

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="css/style.css" rel="stylesheet">

		<!-- Superslides CSS -->
		<link href="css/superslides.css" rel="stylesheet">

		<!-- Owl Carousel stylesheet -->
		<link href="css/owl.carousel.css" rel="stylesheet">

		<!-- Owl Carousel Default Theme -->
		<link href="css/owl.theme.css" rel="stylesheet">

		<!-- Fancybox -->
		<link href="css/jquery.fancybox.css" rel="stylesheet">

		<!-- Google Fonts -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800|Pacifico" rel="stylesheet">

		<!-- Font Awesome Icons -->
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.2/css/font-awesome.css" rel="stylesheet">

		<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
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

		<a id="home"></a>

		<!-- ========== BANNER START ========== -->
		<span itemscope itemtype="http://schema.org/LocalBusiness">
		<div id="slides">
			<div class="slides-container">
				<!--
				<img src="images/curso1.png" alt="Curso DivulgaTEA" />
				<img src="images/curso1.png" alt="Curso DivulgaTEA" />
				-->
				<img src="images/bg1.png" alt="Progresa experimentando." title="Terapia" />
				<img src="images/bg2.png" alt="Expresa tus sentimientos." title="Autismo" />
			</div>
			<div class="tint">
				<div class="welcome text-center">
					<h1>Centro de terapia</h1>
					<p>Contamos profesionales especializadas en TEA</p>
					<i class="fa fa-angle-down"></i>
					<!--<br>-->
					<!--<br><br><br><br><br>-->
					<!--<h1>Curso Divulga TEA</h1>
					<p>Parque Gabriela, Puente Alto</p>
					<p>19-20 de agosto 2016</p>
					<i class="fa fa-angle-down"></i>
					<br>
					<a href="divulgatea/" type="button" class="btn btn-primary btn-lg">Contenido del Curso</a>-->
					<!--<br>
					<i class="fa fa-angle-down"></i>
					<br>-->
					<!--<button type="button" class="btn btn-info" id="myBtn" data-toggle="modal" data-target="#myModal">Inscripción</button> -->
					<!-- <button type="button" class="btn btn-info" id="myBtn" data-toggle="modal">Inscripción</button> -->
				</div>
			</div>
		</div>

		<!-- ========== BANNER END ========== -->

		<!-- ========== MENU START ========== -->

		<?php getNavBar(); ?>

		<!-- ========== MENU END ========== -->

		<!-- ========== ROOMS START ========== -->

 		<div id="rooms">
			<div class="container text-center">
				<div class="row no-fade">
					<div class="col-sm-4">
						<div class="box background background1">
							<h3>Terapia Ocupacional</h3>
							<p>Intervención a nivel volicional en valores, necesidades y causalidad personal, componente habituación de rutinas, hábitos y roles, Desempeño de habilidades Cognitivas, Psicomotoras, Sensoriales y de Comunicación e Interacción.</p>
						</div>
						<div class="icon img-circle">
							<img src="images/icono-yoga.png" alt="Ícono de Terapia Ocupacional" />
						</div>
						<div class="arrow background background1"></div>
					</div>
					<div class="col-sm-4">
						<div class="box background background2">
							<h3>Fonoaudiología</h3>
							<p> Evaluación, diagnóstico, tratamiento y estimulación de: Lenguaje Infantil y Adulto, Voz, Estimulación Temprana, Audición, Habla y Motricidad Orofacial.</p>
							<p style="margin: 0 0 20px;">&nbsp;</p>
						</div>
						<div class="icon img-circle">
							<img src="images/icono-fonoaudiologia.png" alt="Ícono de fonoaudiología" />
						</div>
						<div class="arrow background background2"></div>
					</div>
					<div class="col-sm-4">
						<div class="box background background3">
							<h3>Psicología y Psicopedagogía</h3>
							<p>Disfunción familiar, Proceso divorcio padres, maternidad, Psicoterapia individual.Habilidades Sociales. Terapias Familiares. Habilidades parentales. Procesos Cognitivos; Áreas Instrumentales; Procesos Psicoafectivos.</p>
						</div>
						<div class="icon img-circle">
							<img src="images/icono-psicologia.png" alt="Ícono de Psicología y Psicopedagogía" />
						</div>
						<div class="arrow background background3"></div>
					</div>
				</div>
			</div>
		</div>

		<!-- ========== ROOMS END ========== -->

		<!-- ========== STAFF START ========== -->

		<section id="staff">
			<div class="container text-center">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h2>Tratamiento Integral Terapéutico</h2>
						<h5>ESTAMOS PARA AYUDARTE</h5>
						<p>Cognitivo es un Centro de terapéutico integral donde trabajamos enfocados en la multidisciplina. Nos especializamos en niños y adolecentes con <b>Transtornos Generalizados del Desarrollo (TGD) del Espectro Autista (TEA)</b> así como otros transtornos no includos en dicho grupo.</p>
						<p>Contamos con Fonoaudiologas, Terapistas Ocupacionales, Psicologas, Psicopedagogas y Educadoras diferenciales especializadas en el area infanto juvenil.</p>
					</div>
				</div>

			</div>
		</section>

		<!-- ========== STAFF END ========== -->

		<!-- ========== MISSION START ========== -->

		<section class="background background1 background-image" id="mission">
			<div class="container">
				<div class="row text-center">
					<div class="col-sm-12">
						<h2>Nuestra Misión</h2>
						<h5>CUÁL ES NUESTRO OBJETIVO</h5>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<p>Ser un Centro Modelo a nivel comunal en la prestación de servicios de Diagnóstico, Intervención y Asesoría, con una amplia cobertura interdisciplinaria a través de profesionales especializados y destacados. </p>
					</div>
					<div class="col-sm-6">
						<p>Nuestros profesionales se caracterizan  por su calidad humana, su continua búsqueda hacia el crecimiento continuo y el uso de nuevas e innovadoras modalidades de atención que permite el desarrollo de habilidades de nuestros pacientes.  </p>
					</div>
				</div>
				<div class="row text-center">
					<div class="col-sm-12">
						<p>&nbsp;</p>
						<p><a id="btnAnimado" href="#contact" class="btn btn-lg btn-transparent">CONTÁCTANOS PARA MÁS INFORMACIÓN</a></p>
					</div>
				</div>
			</div>
		</section>

		<!-- ========== MISSION END ========== -->

		<!-- ========== ACTIVITIES START ========== -->

		<section id="activities">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h2 class="text-center">Talleres</h2>
						<h5 class="text-center">Interesantes</h5>

						<!-- Tabs Start -->
						<ul class="nav nav-tabs text-center">
							<li class="active"><a href="#Educativas" data-toggle="tab">INSTITUCIONES EDUCATIVAS</a></li>
							<li><a href="#Learn" data-toggle="tab">ESTIMULACIÓN TEMPRANA</a></li>
							<li><a href="#Parentales" data-toggle="tab">HABILIDADES PARENTALES</a></li>
							<!-- <li><a href="#Music" data-toggle="tab">MÚSICA</a></li>
							<li><a href="#Sport" data-toggle="tab">DEPORTE</a></li> -->
						</ul>

						<div class="tab-content">
							<div class="tab-pane fade in active" id="Educativas">
								<div class="col-sm-4">
									<p><img src="images/talleres-a-colegio.jpg" alt="Talleres para colegios" title="Convenios con colegios" class="img-responsive" /></p>
								</div>
								<div class="col-sm-8">
									<h2>Contamos con <b>convenios con colegios</b> para realizar terapia a niños con necesidades.</h2>
									<p>Nuestro servicio a instituciones educativas tiene como objetivo lograr desarrollar el máximo potencial de cada niño derivado, obteniendo esto a partir de una exhaustiva evaluación y seguimiento de cada caso.</p>
								</div>
							</div>
							<div class="tab-pane fade" id="Learn">
								<div class="col-sm-4">
									<p><img src="images/estimulacion-temprana.jpg" alt="Taller de Estimulación Temprana" title="Estimulacion temprana" class="img-responsive" /></p>
								</div>
								<div class="col-sm-8">
									<p>La estimulación temprana ayuda a fortalecer el cuerpo y a desarrollar las emociones y la inteligencia de tu hijo o hija. Integra estas actividades a su juego diario. Abrázale, felicítale, sonríele, háblale y dile lo mucho que lo quieres, así, contribuirás a su desarrollo pleno y al cuidado de su salud</p>
									<!-- <p>Sed vel consectetur nisl. Proin tincidunt massa non faucibus mollis. Cras sapien lectus, pharetra quis tortor sed, varius scelerisque lectus. Ut ornare sem non mauris mollis cursus. Ut mattis nisl pretium, aliquam eros vitae, rhoncus odio. Mauris at molestie augue. Nam quam dolor, volutpat in metus placerat, vehicula feugiat felis. Ut posuere libero vitae aliquam vehicula. Duis lacinia risus a tortor tempus, eget dapibus leo egestas.</p> -->
								</div>
							</div>
							<div class="tab-pane fade" id="Parentales">
								<div class="col-sm-4">
									<p><img src="images/habilidades-parentales.jpg" alt="Taller de Habilidades Parentales" title="Habilidades parentales" class="img-responsive" /></p>
								</div>
								<div class="col-sm-8">
									<p>La relación entre padres e hijos tiene una gran influencia en la mayoría de los aspectos del desarrollo del niño. Cuando las habilidades y comportamientos de crianza del niño son óptimos, tienen un efecto positivo en la autoestima del niño, sus resultados en la escuela, su desarrollo cognitivo y su comportamiento.</p>
									<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam auctor cursus purus pulvinar blandit. Phasellus accumsan tempus condimentum. Vivamus non euismod tellus. In quis augue ac eros feugiat dictum et non elit. Nunc ac consectetur lacus. Pellentesque euismod egestas urna, a eleifend massa gravida eu. Cras mattis, augue ac ultrices pretium, felis libero ultrices neque, faucibus condimentum nunc mauris ac sapien. Nulla neque nisl, rutrum id semper a, ullamcorper eget justo. Nam et enim eu lectus molestie commodo. Aliquam consectetur nisi ut consequat iaculis.</p> -->
								</div>
							</div>
							<!--<div class="tab-pane fade" id="Music">
								<div class="col-sm-4">
									<p><img src="http://placehold.it/350x220" alt="" class="img-responsive" /></p>
								</div>
								<div class="col-sm-8">
									<p>Duis pretium sit amet tortor eu imperdiet. Ut egestas in purus ut vehicula. Quisque dolor tellus, faucibus aliquam tempor eget, eleifend nec mi. Proin lacus mauris, iaculis eget orci in, consequat blandit est. Sed porta sagittis justo quis pretium. Aliquam massa sapien, sodales quis dignissim eu, congue quis nunc. Nulla cursus tempor nibh, volutpat mattis orci venenatis non. In hac habitasse platea dictumst. Suspendisse accumsan urna ut convallis hendrerit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam gravida mollis egestas. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam auctor cursus purus pulvinar blandit. Phasellus accumsan tempus condimentum. Vivamus non euismod tellus. In quis augue ac eros feugiat dictum et non elit. Nunc ac consectetur lacus. Pellentesque euismod egestas urna, a eleifend massa gravida eu. Cras mattis, augue ac ultrices pretium, felis libero ultrices neque, faucibus condimentum nunc mauris ac sapien. Nulla neque nisl, rutrum id semper a, ullamcorper eget justo. Nam et enim eu lectus molestie commodo. Aliquam consectetur nisi ut consequat iaculis.</p>
								</div>
							</div>
							<div class="tab-pane fade" id="Sport">
								<div class="col-sm-4">
									<p><img src="http://placehold.it/350x220" alt="" class="img-responsive" /></p>
								</div>
								<div class="col-sm-8">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam auctor cursus purus pulvinar blandit. Phasellus accumsan tempus condimentum. Vivamus non euismod tellus. In quis augue ac eros feugiat dictum et non elit. Nunc ac consectetur lacus. Pellentesque euismod egestas urna, a eleifend massa gravida eu. Cras mattis, augue ac ultrices pretium, felis libero ultrices neque, faucibus condimentum nunc mauris ac sapien. Nulla neque nisl, rutrum id semper a, ullamcorper eget justo. Nam et enim eu lectus molestie commodo. Aliquam consectetur nisi ut consequat iaculis.</p>
									<p>Duis pretium sit amet tortor eu imperdiet. Ut egestas in purus ut vehicula. Quisque dolor tellus, faucibus aliquam tempor eget, eleifend nec mi. Proin lacus mauris, iaculis eget orci in, consequat blandit est. Sed porta sagittis justo quis pretium. Aliquam massa sapien, sodales quis dignissim eu, congue quis nunc. Nulla cursus tempor nibh, volutpat mattis orci venenatis non. In hac habitasse platea dictumst. Suspendisse accumsan urna ut convallis hendrerit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam gravida mollis egestas. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
								</div>
							</div>-->
						</div>
						<!-- Tabs End -->
					</div>
				</div>
			</div>
		</section>

		<!-- ========== ACTIVITIES END ========== -->

		<!-- ========== TESTIMONIALS START ========== -->
		<!--
		<section class="background background2 background-image" id="testimonials">
			<div class="container">
				<div class="row text-center">
					<div class="col-sm-12">
						<h2>Testimonials</h2>
						<h5>WHAT PARENTS SAY ABOUT US</h5>
					</div>
				</div>
				<div class="row text-center">
					<div class="col-sm-12 owl-carousel">
						<div>
							<div class="item">
								<blockquote>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec feugiat diam tellus, sit amet imperdiet ipsum adipiscing et. Ut lacinia eget velit vitae eleifend. Nam mi nibh, sollicitudin eget metus ullamcorper, commodo fermentum justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed diam est, facilisis id ullamcorper vel, sodales in dui. Nam dapibus vel augue eget sodales. Aenean congue ante sed velit aliquam euismod. Nam rhoncus volutpat risus. Fusce eget pulvinar quam. Cras faucibus elit id nibh dignissim malesuada lacinia eget velit vitae eleifend.
									<small>Frank &amp; Marry Jones</small>
								</blockquote>
							</div>
						</div>
						<div>
							<div class="item">
								<blockquote>
									Integer congue libero sed tempor egestas. Pellentesque sit amet tellus at mi semper tincidunt eget et dui. Aenean vel leo hendrerit, fermentum sem non, ornare ante. Sed mattis dolor blandit risus commodo egestas quis sit amet neque. Mauris fermentum mi a luctus euismod. Fusce scelerisque, libero congue sollicitudin iaculis, lectus quam ultricies magna, quis tempus tortor justo a odio. Proin quis sollicitudin ipsum. Integer tellus neque, bibendum at molestie vel, molestie pulvinar neque.
									<small>John &amp; Clare O'Connor</small>
								</blockquote>
							</div>
						</div>
						<div>
							<div class="item">
								<blockquote>
									Duis dapibus, mi a tincidunt elementum, nulla orci sagittis diam, sit amet auctor mi tellus non lorem. Vivamus at condimentum ligula. Sed placerat gravida lacinia. Proin rutrum turpis dui, sit amet pharetra ligula rutrum eget. Praesent non rhoncus velit. Vivamus dignissim turpis quam, sed mollis orci aliquet ornare. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed urna elit, mollis auctor scelerisque vel, ullamcorper eu lectus. Curabitur tristique metus massa, luctus condimentum felis egestas eu. Praesent blandit cursus metus, vitae blandit quam tincidunt et.
									<small>Mark &amp; Jane Sloan</small>
								</blockquote>
							</div>
						</div>
						<div>
							<div class="item">
								<blockquote>
									Morbi convallis ante in est accumsan, vel accumsan nibh mattis. Fusce quis erat ac justo hendrerit adipiscing id in massa. Nullam rhoncus pulvinar blandit. Vivamus dapibus facilisis mattis. Quisque tempus est fringilla semper ultricies. Sed magna elit, mattis sit amet ullamcorper vel, fringilla id tortor. Ut vehicula, ante a viverra ultricies, velit nulla aliquet mi, in congue enim diam fringilla lacus. Donec luctus viverra urna. In feugiat id lectus quis sodales. Donec sem urna, sagittis vitae nisl non, condimentum congue nulla. Phasellus scelerisque, dolor sit amet pulvinar hendrerit, mi leo ornare ligula, non viverra dolor nulla vitae leo. Donec ac leo nec urna vulputate condimentum.
									<small>Chris &amp; Julia Smith</small>
								</blockquote>
							</div>
						</div>
					</div>
				</div>
				<div class="row text-center">
					<div class="col-sm-12">
						<p>&nbsp;</p>
						<p><a href="#contact" class="btn btn-lg btn-transparent">JOIN US TODAY</a></p>
					</div>
				</div>
			</div>
		</section>
		-->
		<!-- ========== TESTIMONIALS END ========== -->

		<!-- ========== GALLERY START ========== -->
		
		<section id="gallery">
			<div class="container">
				<div class="row text-center">
					<div class="col-sm-12">
						<h2>Espacios terapéuticos</h2>
						<h5>A través de nuestro equipo multidisciplinario se incluyen terapias individuales y grupales. Buscamos desarrollar lo corporal, lo simbólico, lo expresivo y también lo constructivo.</h5>
						<ul class="gallery">
							<li class="col-sm-3 col-xs-6">
								<a href="images/centro/Cognitivo Espacios terapéuticos (2).jpg" class="fancybox" data-fancybox-group="group" title="">
									<img src="images/centro/Cognitivo Espacios terapéuticos kids (2).jpg" alt="Centro Cognitivo Espacios terapéuticos" title="Espacios terapéuticos" class="img-responsive" />
									<div><i class="fa fa-search fa-3x"></i></div>
								</a>
							</li>
							<li class="col-sm-3 col-xs-6">
								<a href="images/centro/Cognitivo Espacios terapéuticos (4).jpg" class="fancybox" data-fancybox-group="group" title="">
									<img src="images/centro/Cognitivo Espacios terapéuticos kids (4).jpg" alt="Centro Cognitivo Espacios terapéuticos" title="Espacios terapéuticos" class="img-responsive" />
									<div><i class="fa fa-search fa-3x"></i></div>
								</a>
							</li>
							<li class="col-sm-3 col-xs-6">
								<a href="images/centro/Cognitivo Espacios terapéuticos (10).jpg" class="fancybox" data-fancybox-group="group" title="">
									<img src="images/centro/Cognitivo Espacios terapéuticos kids (10).jpg" alt="Centro Cognitivo Espacios terapéuticos" title="Espacios terapéuticos" class="img-responsive" />
									<div><i class="fa fa-search fa-3x"></i></div>
								</a>
							</li>
							<li class="col-sm-3 col-xs-6">
								<a href="images/centro/Cognitivo Espacios terapéuticos (28).jpg" class="fancybox" data-fancybox-group="group" title="">
									<img src="images/centro/Cognitivo Espacios terapéuticos kids (28).jpg" alt="Terapia Ocupacional" title="Terapia Ocupacional" class="img-responsive" />
									<div><i class="fa fa-search fa-3x"></i></div>
								</a>
							</li>
							<li class="col-sm-3 col-xs-6">
								<a href="images/centro/Cognitivo Espacios terapéuticos (30).jpg" class="fancybox" data-fancybox-group="group" title="">
									<img src="images/centro/Cognitivo Espacios terapéuticos kids (30).jpg" alt="Terapia Ocupacional" title="Terapia Ocupacional" class="img-responsive" />
									<div><i class="fa fa-search fa-3x"></i></div>
								</a>
							</li>
							<li class="col-sm-3 col-xs-6">
								<a href="images/centro/Cognitivo Espacios terapéuticos (32).jpg" class="fancybox" data-fancybox-group="group" title="">
									<img src="images/centro/Cognitivo Espacios terapéuticos kids (32).jpg" alt="Terapia Ocupacional" title="Terapia Ocupacional" class="img-responsive" />
									<div><i class="fa fa-search fa-3x"></i></div>
								</a>
							</li>
							<li class="col-sm-3 col-xs-6">
								<a href="images/centro/Cognitivo Espacios terapéuticos (46).jpg" class="fancybox" data-fancybox-group="group" title="">
									<img src="images/centro/Cognitivo Espacios terapéuticos kids (46).jpg" alt="Terapia Fonoaudiologica" title="Terapia Fonoaudiologica" class="img-responsive" />
									<div><i class="fa fa-search fa-3x"></i></div>
								</a>
							</li>
							<li class="col-sm-3 col-xs-6">
								<a href="images/centro/Cognitivo Espacios terapéuticos (50).jpg" class="fancybox" data-fancybox-group="group" title="">
									<img src="images/centro/Cognitivo Espacios terapéuticos kids (50).jpg" alt="Terapia Social" title="Terapia social" class="img-responsive" />
									<div><i class="fa fa-search fa-3x"></i></div>
								</a>
							</li>
							<li class="col-sm-3 col-xs-6">
								<a href="images/centro/Cognitivo Espacios terapéuticos (55).jpg" class="fancybox" data-fancybox-group="group" title="">
									<img src="images/centro/Cognitivo Espacios terapéuticos kids (55).jpg" alt="Terapia ocupacional" title="Terapia Ocupacional" class="img-responsive" />
									<div><i class="fa fa-search fa-3x"></i></div>
								</a>
							</li>
							<li class="col-sm-3 col-xs-6">
								<a href="images/centro/Cognitivo Espacios terapéuticos (59).jpg" class="fancybox" data-fancybox-group="group" title="">
									<img src="images/centro/Cognitivo Espacios terapéuticos kids (59).jpg" alt="Terapia Psicopedagogica" title="Terapia Psicopedagogica" class="img-responsive" />
									<div><i class="fa fa-search fa-3x"></i></div>
								</a>
							</li>
							<li class="col-sm-3 col-xs-6">
								<a href="images/centro/Cognitivo Espacios terapéuticos (81).jpg" class="fancybox" data-fancybox-group="group" title="">
									<img src="images/centro/Cognitivo Espacios terapéuticos kids (81).jpg" alt="Terapia Fonoaudiologica" title="Terapia Fonoaudiologica" class="img-responsive" />
									<div><i class="fa fa-search fa-2x"></i></div>
								</a>
							</li>
							<li class="col-sm-3 col-xs-6">
								<a href="images/centro/Cognitivo Espacios terapéuticos (89).jpg" class="fancybox" data-fancybox-group="group" title="">
									<img src="images/centro/Cognitivo Espacios terapéuticos kids (89).jpg" alt="Terapia Fonoaudiologica" title="Terapia Fonoaudiologica" class="img-responsive" />
									<div><i class="fa fa-search fa-2x"></i></div>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		
		<!-- ========== GALLERY END ========== -->

		<!-- ========== MEMBERSHIP START ========== -->
		
		<section class="background background3 background-image" id="membership">
			<div class="container">
				<div class="row text-center">
					<div class="col-sm-12">
						<h2>Programas Integrales</h2>
						<!-- <h5>PROGRAMAS INTEGRALES DISEÑADOS A LAS NECESIDADES ESPECÍFICAS DE CADA CASO EN PARTICULAR: (MULTIDISCIPLINARIO)</h5> -->
						<h5>Programas para niños con necesidades permanentes y/o de largo tratamiento.</h5>
					</div>
				</div>
				<div class="row text-center">
					<div class="col-sm-3">
						<ul class="price-table">
							<li class="title">PROGRAMA 1</li>
							<li class="price">$100.000</li>
							<!--<li class="period">Mensual <br> Valor 2017 $100.000</li>-->
							<li>2 sesiones semanales</li>
							<li>8 sesiones mensuales</li>
							<li>Valor por sesión $12.500</li>
							<li>Sin programa $180.000</li>
							<li>Ahorra $80.000</li>
							<li><a href="#contact" class="btn btn-success btn-lg">CONSULTA</a></li>
						</ul>
					</div>
					<div class="col-sm-3">
						<ul class="price-table">
							<li class="title">PROGRAMA 2</li>
							<li class="price">$120.000</li>
							<!--<li class="period">Mensual <br> Valor 2017 $120.000</li>-->
							<li>3 sesiones semanales</li>
							<li>12 sesiones mensuales</li>
							<li>Valor por sesión $10.000</li>
							<li>Sin programa $216.000</li>
							<li>Ahorra $96.000</li>
							<li><a href="#contact" class="btn btn-success btn-lg">CONSULTA</a></li>
						</ul>
					</div>
					<div class="col-sm-3">
						<ul class="price-table">
							<li class="title">PROGRAMA 3</li>
							<li class="price">$150.000</li>
							<!--<li class="period">Mensual <br> Valor 2017 $150.000</li>-->
							<li>4 sesiones semanales</li>
							<li>16 sesiones mensuales</li>
							<li>Valor por sesión $9.375</li>
							<li>Sin programa $288.000</li>
							<li>Ahorra $138.000</li>
							<li><a href="#contact" class="btn btn-success btn-lg">CONSULTA</a></li>
						</ul>
					</div>
					<div class="col-sm-3">
						<ul class="price-table">
							<li class="title">PROGRAMA 4</li>
							<li class="price">$190.000</li>
							<!--<li class="period">Mensual <br> Valor 2017 $190.000</li>-->
							<li>6 sesiones semanales</li>
							<li>24 sesiones mensuales</li>
							<li>Valor por sesión $7.917</li>
							<li>Sin programa $432.000</li>
							<li>Ahorra $242.000</li>
							<li><a href="#contact" class="btn btn-success btn-lg">CONSULTA</a></li>
						</ul>
					</div>
				</div>
				<div class="row text-center">
					<div class="col-sm-12">
						<h5>REEMBOLSO ISAPRES Y/O SEGUROS MÉDICOS COMPLEMENTARIOS.</h5>
					</div>
				</div>
			</div>
		</section>
		
		<!-- ========== MEMBERSHIP END ========== -->

		<!-- ========== BLOG START ========== -->

		<section id="news">
			<div class="container">
				<div class="row text-center">
					<div class="col-md-8 col-md-offset-2">
						<h2>Consejos</h2>
						<h5>NUESTRO BLOG</h5>
					</div>
				</div>
				<div class="row-margin owl-carousel">

					<div class="item">
						<div class="post">
							<h3 class="entry-title">Fenómeno Causa-Efecto al bebé</h3>
							<div class="entry-meta">
								<span class="date"><i class="fa fa-calendar"></i>Febrero 21, 2015</span>
								<span class="author"><i class="fa fa-user"></i>By admin</span>
								<!-- <span class="comments"><i class="fa fa-comment"></i><a href="post.html/#comments">5 Comments</a></span>
								<span class="entry-categories"><i class="fa fa-tag"></i>Posted in:  <a href="post.html">Business</a></span> 
								<span class="entry-tags"><i class="fa fa-tags"></i>Tags: <a href="post.html">Fonoaudiología</a>, <a href="post.html">Psicología</a></span>-->
							</div>
							<div class="post-thumb">
								<img src="images/fenomeno-causa-efecto-bebe.png" alt="Enseñar el fenómeno Causa-Efecto al bebé" title="Causa-Efecto" class="img-responsive" />
							</div>
							<div class="entry-content">
								<p>Estos ejercicios sirven para que el niño entienda la causalidad de las cosas y capte cómo ocurren y a qué se deben las situaciones que lo rodean.</p>
							</div>
							<div class="post-more">
								<a href="blog/fenomeno-causa-efecto-bebe.html" class="btn btn-primary">LEER MÁS</a>
							</div>
						</div>
					</div>

					<div class="item">
						<div class="post">
							<h2 class="entry-title">¿Cuánto tiempo se debe usar el chupete?</h2>
							<div class="entry-meta">
								<span class="date"><i class="fa fa-calendar"></i>Febrero 7, 2015</span>
								<span class="author"><i class="fa fa-user"></i>By admin</span>
								<!-- <span class="comments"><i class="fa fa-comment"></i><a href="post.html/#comments">5 Comments</a></span>
								<span class="entry-categories"><i class="fa fa-tag"></i>Posted in:  <a href="post.html">Business</a></span> 
								<span class="entry-tags"><i class="fa fa-tags"></i>Tags: <a href="post.html">Fonoaudiología</a>, <a href="post.html">Psicología</a></span>-->
							</div>
							<div class="post-thumb">
								
								<div id="banner" class="carousel slide">

									<!-- Indicators -->
									<ol class="carousel-indicators">
										<li data-target="#banner" data-slide-to="0" class="active"></li>
										<li data-target="#banner" data-slide-to="1"></li>
										<li data-target="#banner" data-slide-to="2"></li>
										<li data-target="#banner" data-slide-to="3"></li>
									</ol>

									<!-- Wrapper for slides -->
									<div class="carousel-inner">
										<div class="item active">
											<img src="images/bebe-chupete-01.png" alt="Bebé con chupete y su madre" title="" />
										</div>
										<div class="item">
											<img src="images/bebe-chupete-02.png" alt="Bebé con chupete" title="" />
										</div>
										<div class="item">
											<img src="images/bebe-chupete-03.png" alt="Bebé deja el chupete" title="" />
										</div>
									</div>

									<!-- Controls -->
									<a class="left carousel-control" href="#banner" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
									<a class="right carousel-control" href="#banner" data-slide="next"><i class="fa fa-chevron-right"></i></a>

								</div>

							</div>
							<div class="entry-content">
								<p>Las ventajas y desventajas del uso del chupete.</p>
							</div>
							<div class="post-more">
								<a href="cuanto-tiempo-uso-chupete.html" class="btn btn-primary">LEER MÁS</a>
							</div>
						</div>
					</div>
					
					<!--
					<div class="item">
						<div class="post">
							<h2 class="entry-title">Video Post</h2>
							<div class="entry-meta">
								<span class="date"><i class="fa fa-calendar"></i>December 7, 2013</span>
								<span class="author"><i class="fa fa-user"></i>By admin</span>
								<span class="comments"><i class="fa fa-comment"></i><a href="post.html/#comments">5 Comments</a></span>
								<span class="entry-categories"><i class="fa fa-tag"></i>Posted in:  <a href="post.html">Business</a></span>
								<span class="entry-tags"><i class="fa fa-tags"></i>Tags: <a href="post.html">theme</a>, <a href="post.html">marketing</a></span>
							</div>
							<div class="post-thumb">
								<video poster="http://placehold.it/1140x640" style="width: 100%; height: 100%;" width="750" height="421" controls>
									<source type="http://coffeecreamthemes.com/themes/magicreche/site/video/mp4" src="videos/trailer_iphone.m4v">
									<source type="http://coffeecreamthemes.com/themes/magicreche/site/video/ogg" src="videos/trailer_400p.ogg">
									Your browser does not support the video tag.
								</video>
							</div>
							<div class="entry-content">
								<p>Nam ac neque pulvinar, tempor nulla ac, dignissim eros. Ut leo tellus, interdum tincidunt dignissim eget, porta non turpis. Proin urna mauris, luctus ut libero nec, fermentum dictum massa. Proin purus nisi, cursus sit amet nisi ac, facilisis feugiat nulla. Pellentesque ultricies est lacus, interdum hendrerit purus lacinia quis. Cras semper pulvinar ornare. Etiam vel sapien ante. Mauris in urna magna. Sed in nibh eu dolor sodales imperdiet. Sed egestas mattis purus ut cursus.</p>
							</div>
							<div class="post-more">
								<a href="post.html" class="btn btn-primary">READ MORE</a>
							</div>
						</div>
					</div>
					

					<div class="item">
						<div class="post">
							<h2 class="entry-title">Audio Post</h2>
							<div class="entry-meta">
								<span class="date"><i class="fa fa-calendar"></i>December 7, 2013</span>
								<span class="author"><i class="fa fa-user"></i>By admin</span>
								<span class="comments"><i class="fa fa-comment"></i><a href="post.html/#comments">5 Comments</a></span>
								<span class="entry-categories"><i class="fa fa-tag"></i>Posted in:  <a href="post.html">Business</a></span>
								<span class="entry-tags"><i class="fa fa-tags"></i>Tags: <a href="post.html">theme</a>, <a href="post.html">marketing</a></span>
							</div>
							<div class="post-thumb">
								<audio style="width: 100%;" controls>
									<source src="audio/adg3com_cloudlessdays.ogg" type="audio/ogg">
									<source src="audio/adg3com_cloudlessdays.mp3" type="audio/mpeg">
									Your browser does not support the audio element.
								</audio>
							</div>
							<div class="entry-content">
								<p>Sed molestie bibendum lorem, ut semper turpis porttitor sed. Maecenas rutrum, lectus a posuere dignissim, lacus mi adipiscing lorem, a vestibulum erat eros at nisi. Duis pharetra, nibh a tempus luctus, felis lectus fringilla lorem, ac faucibus sapien lorem vel mauris. Vivamus massa nisi, interdum et neque vitae, aliquam lacinia quam. Cras at fringilla magna. Maecenas aliquam tortor purus, eu consequat quam ullamcorper id. Nunc pretium laoreet enim, ac ornare arcu suscipit vel.</p>
							</div>
							<div class="post-more">
								<a href="post.html" class="btn btn-primary">READ MORE</a>
							</div>
						</div>
					</div>
					-->
					
				</div>
				<hr>
			</div>
		</section>

		<!-- ========== BLOG END ========== -->

		<!-- ========== CONTACT START ========== -->

		<section id="contact">
			<div class="container">
				<div class="row text-center">
					<div class="col-sm-12">
						<h2>Contáctanos</h2>
						<h5>VISÍTANOS O ESCRÍBENOS</h5>

						<!-- Form Start -->
						<form role="form" name="contactform" action="process.php">
							<div class="form-group col-sm-4" id="name-group">
								<input type="text" class="form-control" id="inputName" name="inputName" placeholder="Nombre">
							</div>
							<div class="form-group col-sm-4" id="email-group">
								<input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
							</div>
							<div class="form-group col-sm-4" id="subject-group">
								<input type="text" class="form-control" id="inputSubject" name="inputSubject" placeholder="Tema">
							</div>
							<div class="form-group col-sm-12" id="message-group">
								<textarea class="form-control" id="inputMessage" name="inputMessage" rows="6" placeholder="Mensaje"></textarea>
							</div>
							<button type="submit" class="btn btn-primary btn-lg">ENVIAR</button>
						</form>
						<!-- Form End -->

						<p>&nbsp;</p>

					</div>
				</div>
			</div>
		</section>

		<!-- ========== CONTACT END ========== -->

		<!-- ========== MAP START ========== -->

		<!-- Google Map Script -->
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoRMxiPsqJ9SUuaK1KsCAjd3gqnecjlBw&amp;sensor=false"></script>
		<script type="text/javascript">
			
			function initialize() {

				// Create an array of styles.
				var styles = [
					{
						stylers: [
							{ hue: "#e75d5d" },
							{ saturation: 0 }
						]
					},{
						featureType: "road",
						elementType: "geometry",
						stylers: [
							{ lightness: 100 },
							{ visibility: "simplified" }
						]
					},{
						featureType: "road",
						elementType: "labels",
						stylers: [
							{ visibility: "off" }
						]
					}
				];

				// Create a new StyledMapType object, passing it the array of styles,
				// as well as the name to be displayed on the map type control.
				var styledMap = new google.maps.StyledMapType(styles,
				{name: "Styled Map"});


							var mapOptions = {
								zoom: 15,
								center: new google.maps.LatLng(-33.5807176, -70.557574),
				mapTypeControlOptions: {
				  mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
				}
				}
				var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

				//Associate the styled map with the MapTypeId and set it to display.
				map.mapTypes.set('map_style', styledMap);
				map.setMapTypeId('map_style');

				setMarkers(map, places);
			}

			var places = [
				['Cognitivo', -33.5836314, -70.5508148, 1],
			];

			function setMarkers(map, locations) {
				// Add markers to the map
				var image = {
					url: 'images/marker.png',
					// This marker is 40 pixels wide by 42 pixels tall.
					size: new google.maps.Size(40, 42),
					// The origin for this image is 0,0.
					origin: new google.maps.Point(0,0),
					// The anchor for this image is the base of the pin at 20,42.
					anchor: new google.maps.Point(15, 42)
				};

				for (var i = 0; i < locations.length; i++) {
					var place = locations[i];
					var myLatLng = new google.maps.LatLng(place[1], place[2]);
					var marker = new google.maps.Marker({
						position: myLatLng,
						map: map,
						icon: image,
						title: place[0],
						zIndex: place[3],
						animation: google.maps.Animation.DROP
					});

					var contentString = "Some content";
					google.maps.event.addListener(marker, "click", function() {
						infowindow.setContent(this.html);
						infowindow.open(map, this);
					});
				}
			}

			google.maps.event.addDomListener(window, 'load', initialize);
		</script>

		<div id="map-canvas"></div>

		<!-- ========== MAP END ========== -->

		<!-- ========== FOOTER START ========== -->

		<?php getFooter(); ?>

		<!-- ========== FOOTER END ========== -->

		<!-- Modernizr Plugin -->
		<script src="js/modernizr.custom.97074.js"></script>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-1.10.2.min.js"></script>

		<!-- Bootstrap Plugins -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Retina Plugin -->
		<script src="js/retina-1.1.0.min.js"></script>

		<!-- Superslides Plugin -->
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="js/jquery.animate-enhanced.min.js"></script>
		<script src="js/jquery.superslides.js"></script>
		
		<!-- Owl Carousel Plugin -->
		<script src="js/owl.carousel.js"></script>

		<!-- Direction-aware Hover Effect Plugin -->
		<script src="js/jquery.hoverdir.js"></script>

		<!-- Fancybox Plugin -->
		<script src="js/jquery.fancybox.js"></script>

		<!-- Contact form processing plugin -->
		<script src="js/magic.js"></script>

		<!-- jQuery Settings -->
		<script src="js/settings.js"></script>
		
		<meta itemprop="url" content="http://www.cognitivo.cl/"></span>
	</body>
</html>