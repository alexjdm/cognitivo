<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
            </div>
        </div>
    </div>
</header>

<section id="inscripcion" style="padding-top:5px;">
    <div class="container">
        <div class="text-center">
            <div class="col-sm-12">
                <h2>Confirmación</h2>
                <h5>Solo queda realizar el pago.</h5>
                <p>Para hacer efectiva la inscripción presiona el botón más abajo y sigue las instrucciones.</p>

                <form class="form-horizontal" role="form" method="post" onsubmit="document.getElementById('nombreBanco').value=document.getElementById('bankId').options[document.getElementById('bankId').selectedIndex].text;">

                    <center>
                        <table border="0" cellpadding="3" cellspacing="3" style="width:70%; margin-bottom:20px; margin-top:20px;">
                            <tr>
                                <td>
                                    <label for="nombre" class="col-sm-6">Nombre</label>
                                    <div class="col-sm-6">
                                        <?php echo $name ?>
                                    </div>
                                </td>
                                <td>
                                    <label for="rut" class="col-sm-6">Rut</label>
                                    <div class="col-sm-6">
                                        <?php echo $rut ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="email" class="col-sm-6">Email</label>
                                    <div class="col-sm-6">
                                        <?php echo $email ?>
                                    </div>
                                </td>
                                <td>
                                    <label for="telefono" class="col-sm-6">Celular</label>
                                    <div class="col-sm-6">
                                        <?php echo $phone ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="email" class="col-sm-6">Comuna</label>
                                    <div class="col-sm-6">
                                        <?php echo $comuna; ?>
                                    </div>
                                </td>
                                <td>
                                    <label for="bankId" class="col-sm-6">Banco</label>
                                    <div class="col-sm-6">
                                        <?php echo $nombreBanco ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <label for="monto" class="col-sm-6">Monto</label>
                                    <div class="col-sm-6">
                                        <?php echo "$ " . number_format($precio, 0, ",", "."); ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </center>

                    <div class="col-md-12">
                        <div class="form-group start-khipu" style="cursor: pointer;">
                            <center>
                                <img src="https://s3.amazonaws.com/static.khipu.com/buttons/2015/200x75-transparent.png" id="pay-button"/>
                            </center>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<div id="khipu-chrome-extension-div"></div>
<script>
    window.onload = function () {
        KhipuLib.onLoad({
                elementId: 'pay-button',
                data: <?php echo $json ?>
            }
        )
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="lib/khipu/js/bootstrap.min.js"></script>
<script src="lib/khipu/js/docs.min.js"></script>