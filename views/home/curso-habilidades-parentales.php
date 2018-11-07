<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<script src="//cdnjs.cloudflare.com/ajax/libs/atmosphere/2.1.2/atmosphere.min.js"></script>
<script src="//storage.googleapis.com/installer/khipu-1.1.js"></script>

<header class="background backgroundPurple background-image">
    <div class="container">
        <div class="row text-center no-fade" style="opacity: 1;">
            <div class="col-sm-12 text-left">
                <h2 style="font-family: 'Bariol Regular'; font-size: 16pt;">Taller para padres:</h2>
                <h1 style="font-family: Dosis; margin-top: 0; margin-bottom: 15px; font-weight: normal;"><b>HABILIDADES PARENTALES</b></h1>
                <p>¿Cómo aplicar las habilidades parentales cuando existen conductas  difíciles de manejar?</p>


                <h1 class="inline" style="font-family: 'Bariol Regular'; margin-bottom: 0;: ">$10.000 CLP c/u</h1>
                <button id="botonGoToInscripcion" data-id="inscripcionCurso" class="btn btn-default" onclick="goToByScroll($(this).data('id'))">Inscribirse</button>
            </div>
        </div>
    </div>
</header>

<section id="inscripcion" style="padding-top:15px;">
    <div class="container">
        <div class="text-center">

            <div class="row">
                <div class="col-md-6">
                    <h1 style="font-size: 45pt; margin-top: 90px;">Revive el último taller para padres.</h1>
                </div>
                <div class="col-md-6">
                    <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FCognitivoCentro%2Fvideos%2F238158063515381%2F&show_text=0&width=560" width="560" height="315" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="incentives">
                        <h2>Temario</h2>
                        <p class="text-left">Bloque 1</p>
                        <p class="text-left">Tema 1: Introducción a la temática (definiciones y concepto de habilidades parentales y parentalidad positiva).</p>
                        <p class="text-left">Tema 2: Influencias  de las relaciones en las edades tempranas (vínculos).</p>
                        <p class="text-left">Tema 3: ¿Cuáles son las competencias parentales?.</p>
                        <p class="text-left">Tema 4: Importancia y beneficios de una parentalidad positiva.</p>
                        <p class="text-left">Bloque 2</p>
                        <p class="text-left">Tema 1: Actividad práctica (cuestionario sobre parentalidad).</p>
                        <p class="text-left">Tema 2: ¿Cómo aplicar las habilidades parentales cuando existen conductas  difíciles de manejar? (por ejemplo : pataletas).</p>
                        <p class="text-left">Tema 3: Estrategias ante situaciones de la vida cotidiana (Trabajo en grupo).</p>
                        <p><i>Este Programa requiere un número mínimo de matriculados para dictarse y puede sufrir cambios en la programación por razones de fuerza mayor.</i></p>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="incentives">
                        <h3>Valores</h3>
                        <p>$10.000</p>

                        <h3>Formas de pago.</h3>
                        <p>Efectivo en sucursal La Florida.</p>
                        <p>Internet a través de khipu, luego de realizar tu inscripción.</p>
                        <p>Transferencia electrónica.</p>
                    </div>

                    <div class="incentives">
                        <h3>Fechas y Horarios</h3>
                        <p>27 de octubre 2018 de 10 a 12 hrs.</p>

                        <h3>Lugar</h3>
                        <p>María Elvira 128, La florida.</p>
                        <p>Cognitivo</p>

                    </div>

                    <p><b>Consultas a inscripciones@cognitivo.cl</b></p>

                </div>

            </div>

            <div id="inscripcionCurso3" class="col-sm-12">
                <h2>Inscripción</h2>

                <h5>Llena los datos para tu inscripción.</h5>

                <form class="form-horizontal" role="form" action="curso-habilidades-parentales-process/" method="post" onsubmit="document.getElementById('nombreBanco').value=document.getElementById('bankId').options[document.getElementById('bankId').selectedIndex].text;">
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
<script src="https://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
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