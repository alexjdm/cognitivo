<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<script src="//cdnjs.cloudflare.com/ajax/libs/atmosphere/2.1.2/atmosphere.min.js"></script>
<script src="//storage.googleapis.com/installer/khipu-1.1.js"></script>

<header class="background backgroundPurple background-image">
    <div class="container">
        <div class="row text-center no-fade" style="opacity: 1;">
            <div class="col-sm-12 text-left">
                <h2 style="font-family: 'Bariol Regular'; font-size: 16pt;">Seminario Intensivo:</h2>
                <h1 style="font-family: Dosis; margin-top: 0; margin-bottom: 15px; font-weight: normal;"><b>TEA: NUEVAS ESTRATEGIAS DE INTERVENCIÓN MULTIDISCIPLINARIA</b></h1>
                <p>Seminario para profesionales que aborda las nuevas estrategias de intervención multidisciplinarias en niños con TEA.</p>


                <h1 class="inline" style="font-family: 'Bariol Regular'; margin-bottom: 0;: ">2 x $160.000 <span class="inline tachado" style="font-size: 12pt;">$100.000 CLP c/u</span></h1>
                <p>Esta oferta termina este jueves 14 de septiembre</p>
                <button id="botonGoToInscripcion" data-id="inscripcionAutismoProblemasAlimentacion" class="btn btn-default" onclick="goToByScroll($(this).data('id'))">Inscribirse</button>
            </div>
        </div>
    </div>
</header>

<section id="inscripcion" style="padding-top:15px;">
    <div class="container">
        <div class="text-center">

            <div class="row">
                <div class="col-md-6">
                    <h1 style="font-size: 45pt;">Revive el seminario anterior realizado en abril.</h1>
                    <p>Puedes ver imágenes a través del siguiente <a href="https://www.facebook.com/media/set/?set=a.880708898798278&type=1&l=ddc237c500">link</a>.</p>
                </div>
                <div class="col-md-6">
                    <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FCognitivoCentro%2Fvideos%2F881210228748145%2F&show_text=0&width=560" width="560" height="315" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="incentives">
                        <h2>Temario</h2>
                        <p class="text-left">Día 1</p>
                        <p class="text-left">Tema 1: Integración Sensorial y Autismo: Revisión de la sintomatología a partir de la evidencia.</p>
                        <p class="text-left">Tema 2: Recursos no-verbales para desarrollar la comunicación en niños con TEA.</p>
                        <p class="text-left">Tema 3: Las Conductas Repetitivas como dificultades en la habituación y Procesamiento Sensorial en Autismo.</p>
                        <p class="text-left">Tema 4: Relación entre la Teoría de las Neuronas espejo y la comunicación.</p>
                        <p class="text-left">Día 2</p>
                        <p class="text-left">Tema 1: Construcción de herramientas clave en la comunicación oral en niños con TEA.</p>
                        <p class="text-left">Tema 2: El sentido interoceptivo y su relación con la sintomatología en niños con TEA.</p>
                        <p class="text-left">Tema 3: Los hábitos alimenticios: Modelo combinado de Motricidad Orofacial y Terapia Ocupacional.</p>
                        <p class="text-left">Tema 4: Problemas en praxis y planeamiento motor en niños con TEA: La pieza desatendida.</p>
                        <p><i>Este Programa requiere un número mínimo de matriculados para dictarse y puede sufrir cambios en la programación por razones de fuerza mayor.</i></p>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="incentives">
                        <h3>Valores</h3>
                        <p>$100.000 para profesionales.</p>
                        <p>$80.000 para estudiantes.</p>

                        <h3>Descuentos</h3>
                        <p>Profesionales 2 o más $80.000 c/u</p>
                        <p>Estudiantes 2 o más $60.000 c/u</p>

                        <h3>Formas de pago.</h3>
                        <p>Efectivo en sucursal La Florida.</p>
                        <p>Internet a través de khipu, luego de realizar tu inscripción.</p>
                        <p>Transferencia electrónica.</p>
                    </div>

                    <div class="incentives">
                        <h3>Fechas y Horarios</h3>
                        <p>5 y 6 de octubre 2018 de 9 a 17 hrs. cada día.</p>

                        <h3>Lugar</h3>
                        <!--<p>Universidad Central, Avda. Santa Isabel 1278, Santiago Centro.</p>-->
                        <p>Universidad Central</p>

                    </div>

                    <p><b>Consultas a inscripciones@cognitivo.cl</b></p>

                    <p><i>"A las personas matriculadas que se retiren de la actividad antes del 10 de octubre, se les devolverá 90% del total pagado. Antes del 24 de octubre el 50% y después de eso se devolverá solo el 10%."</i></p>
                </div>

            </div>

            <div id="inscripcionAutismoProblemasAlimentacion" class="col-sm-12">
                <h2>Inscripción</h2>
                <h5>Llena los datos para tu inscripción. Una vez inscrito recibirás un correo de confirmación.</h5>

                <form class="form-horizontal" role="form" action="curso-red-sensorial-tea-nuevas-estrategias-process/" method="post" onsubmit="document.getElementById('nombreBanco').value=document.getElementById('bankId').options[document.getElementById('bankId').selectedIndex].text;">
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