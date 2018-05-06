<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<script src="//cdnjs.cloudflare.com/ajax/libs/atmosphere/2.1.2/atmosphere.min.js"></script>
<script src="//storage.googleapis.com/installer/khipu-1.1.js"></script>

<header class="background background1 background-image">
    <div class="container">
        <div class="row text-center no-fade" style="opacity: 1;">
            <div class="col-sm-12 text-left">
                <h2 style="font-family: 'Bariol Regular'; font-size: 16pt;">Seminario Intensivo:</h2>
                <h1 style="font-family: Dosis; margin-top: 0; margin-bottom: 15px;"><b>AUTISMO Y PROBLEMAS DE ALIMENTACIÓN</b></h1>
                <p>Problemas de alimentación, Autismo, Motricidad Orofacial, Procesamiento Sensorial. Estrategias para la casa y colegio, entre otros temas.</p>


                <h1 class="inline" style="font-family: 'Bariol Regular'; margin-bottom: 0;: ">2 x $130.000 <span class="inline tachado" style="font-size: 12pt;">$80.000 CLP c/u</span></h1>
                <p>Esta oferta termina este jueves 5 de abril</p>
                <button id="botonGoToInscripcion" data-id="inscripcionAutismoProblemasAlimentacion" class="btn btn-default" onclick="goToByScroll($(this).data('id'))">Inscribirse</button>
            </div>
        </div>
    </div>
</header>

<section id="inscripcion" style="padding-top:5px;">
    <div class="container">
        <div class="text-center">

            <div class="row">
                <div class="col-md-12">

                    <img class="text-center img-principal-curso" src="dist/images/imagen-seminario1-v2.jpg">
                    <p style="padding-top: 30px;">Problemas de alimentación, Autismo, Motricidad Orofacial, Procesamiento Sensorial. Estrategias para la casa y colegio, entre otros temas.</p>
                    <p>El curso será dictado por Pedro Sanchez fundador de Red Sensorial y Catherine Fournier Magister en Motricidad Orofacial.</p>
                    <p>El curso está especialmente dirigido a: Fonoaudiología, Terapia Ocupacional, Psicología, Psicopedagogía, Kinesiología, Educación Diferencial.</p>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="incentives">
                        <h2>Temario</h2>

                        <p class="text-left">Tema 1: Evolución de las estructuras orofaciales relacionadas con la alimentación en los primeros años de vidas.</p>
                        <p class="text-left">Tema 2: La lactancia como un precursor natural de las habilidades sensoriomotrices relacionadas con la alimentación.</p>
                        <p class="text-left">Tema 3: La comunicación verbal y no verbal como un proceso paralelo al de la alimentación y la importancia de la interacción con el cuidador.</p>
                        <p class="text-left">Tema 3: Importancia de la sincronia entre la respiración y la deglución como factor clave en la alimentación.</p>
                        <p class="text-left">Tema 4: Problemas sensoriomotrices relacionados con la alimentación en niños con TEA.</p>
                        <p class="text-left">Tema 5: Factores fundamentales en el proceso de masticación y deglución en la infancia.</p>
                        <p class="text-left">Tema 6: El niño con defensividad tactil y su abordaje  en el momento de alimentación.</p>
                        <p class="text-left">Tema 7: Modelo combinado de Terapia Ocupacional y Motricidad Orofacial para abordar los problemas en la alimentación.</p>
                        <p><i>Este Programa requiere un número mínimo de matriculados para dictarse y puede sufrir cambios en la programación por razones de fuerza mayor.</i></p>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="incentives">
                        <h3>Valores</h3>
                        <p>$100.000 para profesionales.</p>
                        <p>$80.000 para estudiantes.</p>

                        <h3>Descuentos</h3>
                        <p>¡Por la semana del Autismo!</p>
                        <p>2 x $130.000</p>

                        <h3>Formas de pago.</h3>
                        <p>Efectivo en sucursal La Florida.</p>
                        <p>Internet a través de khipu, luego de realizar tu inscripción.</p>
                        <p>Transferencia electrónica.</p>
                    </div>

                    <div class="incentives">
                        <h3>Fechas y Horarios</h3>
                        <p>20 y 21 de abril 2018 de 9 a 17 hrs. cada día.</p>

                        <h3>Lugar</h3>
                        <p>Universidad Central, Avda. Santa Isabel 1278, Santiago Centro.</p>

                    </div>

                    <p><b>Consultas a inscripciones@cognitivo.cl</b></p>

                    <p><i>"A las personas matriculadas que se retiren de la actividad antes del 31 de marzo, se les devolverá 90% del total pagado. Antes del 10 de abril el 50% y después de eso se devolverá solo el 10%."</i></p>
                </div>

            </div>

            <div id="inscripcionAutismoProblemasAlimentacion" class="col-sm-12">
                <h2>Inscripción</h2>
                <h5>Llena los datos para tu inscripción. Una vez inscrito recibirás un correo de confirmación.</h5>

                <form class="form-horizontal" role="form" action="curso-dificultades-sensoriales-red-sensorial-process/" method="post" onsubmit="document.getElementById('nombreBanco').value=document.getElementById('bankId').options[document.getElementById('bankId').selectedIndex].text;">
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
                            <label for="comuna" class="col-sm-4 control-label">Comuna</label>
                            <div class="col-sm-8" >
                                <input type="text" class="form-control" id="comuna" name="comuna" placeholder="Ingresa la comuna donde vives">
                            </div>
                        </div>
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
                                <input type="text" class="form-control" id="carrera" name="carrera" placeholder="Ingresa tu carrera">
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