<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<script src="//cdnjs.cloudflare.com/ajax/libs/atmosphere/2.1.2/atmosphere.min.js"></script>
<script src="//storage.googleapis.com/installer/khipu-1.1.js"></script>

<header class="background background1 background-image">
    <div class="container">
        <div class="row text-center no-fade" style="opacity: 1;">
            <div class="col-sm-12 text-left">
                <h2 style="font-family: 'Bariol Regular'; font-size: 16pt;">Curso para padres:</h2>
                <h1 style="font-family: Dosis; margin-top: 0; margin-bottom: 15px;"><b>MEDIDAS PARA MITIGAR Y CONTROLAR LOS EFECTOS DE UNA INFECCIÓN RESPIRATORIA</b></h1>
                <p>Curso que entrega herramientas a los padres para poder mitigar y controlar los efectos de una enfermedad respiratoria. Inscríbete!</p>

                <h1 class="inline" style="font-family: 'Bariol Regular'; margin-bottom: 0;: ">$10.000 <span class="inline tachado" style="font-size: 12pt;">$12.000 CLP c/u</span></h1>
                <p>Esta oferta termina este jueves 30 de agosto</p>
                <button id="botonGoToInscripcion" data-id="inscripcionCurso3" class="btn btn-default" onclick="goToByScroll($(this).data('id'))">Inscribirse</button>
            </div>
        </div>
    </div>
</header>

<section id="inscripcion" style="padding-top:5px;">
    <div class="container">
        <div class="text-center">

            <div class="row">

                <div class="col-md-6">
                    <div class="incentives">
                        <h3>Temario</h3>

                        <p class="text-left">Tema 1: Conceptos básicos</p>
                        <ul>
                            <li class="text-left">Conococer elementos básicos morfofuncionales del recién nacido y niños</li>
                            <li class="text-left">Conocer agentes infeccioso y métodos de contagio en enfemermedades respiratorias agudas</li>
                        </ul>

                        <p class="text-left">Tema 2: Enfermedades respiratorias</p>
                        <ul>
                            <li class="text-left">Identificar y controlar enfermedades respiratorias agudas: Faringitis y laringitis aguda, Sindrome bronquial obstructivo, Neumonía e Influenza.</li>
                            <li class="text-left">Conocer síntomas respiratorios: ¿Cuándo debo llevar al bebé o niño al servicio de urgencia?</li>
                        </ul>
                        <p class="text-left">Tema 3: Taller práctico</p>
                        <ul>
                            <li class="text-left">Taller práctico de prevención de enfermedades respiratorias agudas</li>
                            <li class="text-left">Taller práctico de manejo en enfermedades respiratorias</li>
                        </ul>
                        <p><i>Este Programa requiere un número mínimo de matriculados para dictarse y puede sufrir cambios en la programación por razones de fuerza mayor.</i></p>
                    </div>

                    <div class="incentives">
                        <h3>Expositores</h3>
                        <p>El curso será dictado por nuestra kinesiólogo del centro.</p>

                        <h4>Francisco Marín</h4>
                        <p>Kinesiólogo, Universidad Internacional SEK. <a href="http://linkedin.com/in/francisco-marín-ormazabal-323a3ab9" target="_blank"><i class="fa fa-linkedin-square"></i></a></p>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="incentives">
                        <h3>Valores</h3>
                        <p>$12.000</p>

                        <h3>Descuentos</h3>
                        <p>¡Hasta el 30 de agosto!</p>
                        <p>$10.000</p>

                        <h3>Formas de pago.</h3>
                        <p>Efectivo en sucursal La Florida.</p>
                        <p>Internet a través de khipu, luego de realizar tu inscripción.</p>
                        <p>Transferencia electrónica.</p>
                    </div>

                    <div class="incentives">
                        <h3>Fechas y Horarios</h3>
                        <p>01 de septiembre 2018 de 10 a 12 hrs.</p>

                        <h3>Lugar</h3>
                        <p>Cognitivo La Florida. María Elvira 128, La Florida.</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3326.2123166896654!2d-70.60423868479889!3d-33.52186508075349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662d06199aa5d29%3A0x21a770ed85d345ee!2sMar%C3%ADa+Elvira+128%2C+La+Florida%2C+Regi%C3%B3n+Metropolitana!5e0!3m2!1ses!2scl!4v1520573848456" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>

                    </div>

                    <p><b>Consultas a inscripciones@cognitivo.cl</b></p>

                </div>

            </div>

            <div id="inscripcionCurso3" class="col-sm-12">
                <h2>Inscripción</h2>

                <h5>Llena los datos para tu inscripción.</h5>

                <form class="form-horizontal" role="form" action="curso-ayuda-hijos-enfermedades-respiratorias-process/" method="post" onsubmit="document.getElementById('nombreBanco').value=document.getElementById('bankId').options[document.getElementById('bankId').selectedIndex].text;">
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
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group <?php echo $_REQUEST['invalid'] ? 'has-error' : ''; ?>">
                            <label for="phone" class="col-sm-4 control-label">Tel&eacute;fono</label>
                            <div class="col-sm-8">
                                <input type="phone" class="form-control" id="phone" name="phone" placeholder="Ingresa tu número con 8 digitos">
                            </div>
                        </div>
                        <div class="form-group <?php echo $_REQUEST['invalid'] ? 'has-error' : ''; ?>">
                            <label for="comuna" class="col-sm-4 control-label">Comuna</label>
                            <div class="col-sm-8" >
                                <input type="text" class="form-control" id="comuna" name="comuna" placeholder="Ingresa la comuna donde vives">
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
                                <button type="submit" class="btn btn-primary">Continuar</button>
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
<script src="lib/khipu/js/bootstrap.min.js"></script>
<script src="lib/khipu/js/docs.min.js"></script>
<script>

    $('#myList a').on('click', function (e) {
        e.preventDefault();
        $(this).tab('show');
        $(".list-group-item").each(function (){
            $(this).removeClass('active');
        });
        $(this).addClass('active');
    })


    function goToByScroll(id){
        // Remove "link" from the ID
        //id = id.replace("link", "");
        // Scroll
        $('html,body').animate({
                scrollTop: $("#"+id).offset().top - 90},
            'slow');
    }

</script>