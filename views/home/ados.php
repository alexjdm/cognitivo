<header class="background ados-image background-purple">
    <div class="container">
        <div class="row no-fade ados-banner">
            <div class="col-sm-7">
                <h1 style="font-family: Bariol, Helvetica; margin: 10px 0; font-size:48px; color: #e75d5d">¿Cómo saber si mi hijo tiene transtorno del espectro autista?</h1>
                <h3 style="font-family: Bariol, Helvetica; margin-top: 5px; font-size:20px; color: #e75d5d">En Cognitivo realizamos la evaluación ADOS 2 que permite resolver esta duda.</h3>

                <div class="form-new" style="margin: 20px;">
                    <div class="col-md-12"><p style="color: #e75d5d;">Deseo que me contacten para realizar una reserva.</p></div>
                    <form id="contactForm" method="post" class="form-horizontal">
                        <div class="col-md-4 col-xs-12">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo" style="display:inline; width:90%;"/>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresa tu teléfono" style="display:inline; width:90%;"/>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <button type="submit" class="btn btn-primary" id="myButtonSend" style="float: left;">Enviar</button>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <div id="messages"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-5">&nbsp;</div>
        </div>
    </div>
</header>

<section id="blog">
    <div class="container">
        <div class="row no-fade">

            <div class="col-sm-4 txt-center">
                <a target="_blank" href="https://goo.gl/maps/8VaVFkhMHDK2"><i class="fa fa-3x fa-map-marker" aria-hidden="true"></i></a>
                <h3>¿Dónde?</h3>
                <p>En nuestro centro ubicado en Canela Alta 2803, Puente Alto.</p>
            </div>
            <div class="col-sm-4 txt-center">
                <i class="fa fa-3x fa-clock-o" aria-hidden="true" style="color: #e03131;"></i>
                <h3>Horarios</h3>
                <p>Lunes a Sábados.</p>
            </div>
            <div class="col-sm-4 txt-center">
                <i class="fa fa-3x fa-money" aria-hidden="true" style="color: #e03131;"></i>
                <h3 >Valores</h3>
                <p>Tres sesiones de $30.000 cada una.</p>
            </div>
        </div>
        <div class="row no-fade" style="margin-top:40px;">
            <div class="col-sm-12">
                <article class="post">
                    <h1 class="entry-title">Escala de Observación para el Diagnóstico del Autismo</h1>

                    <div class="entry-content">
                        <p style="text-align: justify">La <strong>Escala de Observación para el Diagnóstico del Autismo - 2 (ADOS-2)</strong> permite la evaluación estandarizada y semiestructurada de la comunicación, la interacción social, el juego o el uso imaginativo de los materiales y las conductas restrictivas y repetitivas en niños, jóvenes y adultos en los que se sospecha que existe un <strong>trastorno del espectro autista</strong> (TEA). Su predecesor, el ADOS, es considerado un instrumento de referencia para la evaluación observacional y el diagnóstico del TEA</p>
                        <p style="text-align: justify">El ADOS-2 está compuesto por <strong>cinco módulos</strong>, que permiten evaluar desde <strong>niños de 12 meses hasta adultos</strong>. Cada módulo ofrece distintas actividades estandarizadas diseñadas para provocar comportamientos que están directamente relacionados con el diagnóstico de los trastornos del espectro autista en distintos niveles de desarrollo y edades cronológicas. Los <strong>protocolos</strong> guían al examinador en la aplicación de las actividades, la codificación de las conductas observadas y la puntuación de los algoritmos.</p>
                    </div>
                </article>
            </div>

        </div>
    </div>
</section>


<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
<script>

    $(function () {

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
                type: "post",
                placeType: 'json',
                url: 'contact/ados/',
                beforeSend: function () {
                    $("#messages").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                    $("#messages").html(response);
                    //setTimeout(closeModal, '2000');
                }
            });
        });
    });

</script>