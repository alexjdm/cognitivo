<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/atmosphere/2.1.2/atmosphere.min.js"></script>
<script src="//storage.googleapis.com/installer/khipu-1.1.js"></script>

<header class="background background3 background-image">
    <div class="container">
        <div class="row text-center no-fade" style="opacity: 1;">
            <div class="col-sm-12">
                <h1>Curso "TEA y Manejo de conductas complejas"</h1>
            </div>
        </div>
    </div>
</header>

<section id="inscripcion" style="padding-top:5px;">
    <div class="container">
        <div class="text-center">

            <div class="row">
                <div class="col-md-12" style="padding-top: 30px;">
                    <p>Participa en nuestro curso para padres sobre TEA y el manejo de conductas complejas.</p>
                    <p>El curso será dictado por Macarena Zaror, Psicóloga de nuestro centro especialista en TEA.</p>
                </div>
            </div>

            <div class="row">

                <div class="col-sm-7">
                    <h2>Temario</h2>

                    <div class="col-sm-5">
                        <div class="list-group" id="myList" role="tablist" style="margin: 30px 0;">
                            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#home" role="tab">¿Qué es el TEA?</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#profile" role="tab">Tipos de Terapia</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#messages" role="tab">Manejo de síntomas complejos</a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                Derribando mitos <br>
                                Causas <br>
                                Principales características <br>
                                Detección temprana e intervención <br>
                                La intervención desde un enfoque multidiciplinario <br>
                                El rol de la psicología en las intervenciones
                            </div>
                            <div class="tab-pane" id="profile" role="tabpanel">
                                Floortime, PECS, TEACHH, ABA, etc. <br>
                                ¿Qué son? ¿En qué se basan? ¿Cuándo aplicar? <br>
                                Importancia de la Familia en las intervenciones
                            </div>
                            <div class="tab-pane" id="messages" role="tabpanel">
                                Problemas de conducta <br>
                                Conductas autoestimulatorias <br>
                                Ecolalia y comportamientos estereotipados <br>
                                Dificultades en la autonomía <br>
                                Cambios e imprevistos
                            </div>
                        </div>
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

                <form class="form-horizontal" role="form" action="curso-tea-manejo-conductas-complejas-process/" method="post" onsubmit="document.getElementById('nombreBanco').value=document.getElementById('bankId').options[document.getElementById('bankId').selectedIndex].text;">
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

</script>