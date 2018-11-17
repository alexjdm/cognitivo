<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/atmosphere/2.1.2/atmosphere.min.js"></script>
<script src="//storage.googleapis.com/installer/khipu-1.1.js"></script>

<header class="background background3 background-image">
    <div class="container">
        <div class="row text-center no-fade" style="opacity: 1;">
            <div class="col-sm-12">
                <h1>Taller "Manejo de conductas inapropiadas"</h1>
            </div>
        </div>
    </div>
</header>

<section id="inscripcion" style="padding-top:5px;">
    <div class="container">
        <div class="text-center">

            <div class="row">
                <div class="col-md-12" style="padding-top: 30px;">
                    <img src="dist/images/Curso11.png" width="20%">
                    <p>Participa en nuestro taller para padres sobre conductas inapropiadas y comportamientos disruptivos de nuestros niños.</p>
                    <p>El taller entrega una guía en torno a las conductas disruptivas o inapropiadas, cuáles son sus causas, algunos métodos de evaluación de la conducta, sus funciones y estrategias para abordarlas.</p>
                </div>
            </div>

            <div class="row">

                <div class="col-sm-7">

                    <div class="col-md-12">
                        <h2>Temario</h2>
                        <p>Pronto estará disponible.</p>
                        <!--<p>Integración Sensorial, sus sistemas y perfiles sensoriales</p>
                        <p>Características de la intervención</p>
                        <p>Integración Sensorial en TEA</p>
                        <p>Contextualizando la problemática…</p>
                        <p>Alimentación como hito del desarrollo</p>
                        <p>Sensorialidad Oral: motricidad y lenguaje</p>
                        <p>Estrategias de manejo en el hogar</p>-->
                    </div>

                    <div class="col-md-12">
                        <h2>Valores</h2>

                        <p>$10.000 por persona.</p>
                    </div>

                </div>

                <div class="col-sm-5">
                    <h2>Lugar</h2>
                    <p>Cognitivo - María Elvira 128, La Florida</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3326.2123166896654!2d-70.60423868479889!3d-33.52186508075349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662d06199aa5d29%3A0x21a770ed85d345ee!2sMar%C3%ADa+Elvira+128%2C+La+Florida%2C+Regi%C3%B3n+Metropolitana!5e0!3m2!1ses!2scl!4v1520573848456" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

            </div>

            <div class="col-sm-12">
                <h2>Inscripción</h2>

                <h5>Llena los datos para tu inscripción.</h5>

                <form class="form-horizontal" role="form" action="taller-manejo-conductas-inapropiadas-process/" method="post" onsubmit="document.getElementById('nombreBanco').value=document.getElementById('bankId').options[document.getElementById('bankId').selectedIndex].text;">
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
                                <input type="phone" class="form-control" id="phone" name="phone" placeholder="Ingresa tu número con 9 digitos">
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

</script>