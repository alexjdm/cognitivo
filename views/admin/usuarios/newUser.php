<style>
    .form-group{
        padding: 15px;
    }
</style>

<div class="modal-dialog" style="width:700px;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">
                <?php
                    if($vista == "fichas" && $addApoderado == "false") { echo "Nuevo Paciente"; }
                    else if($vista == "fichas" && $addApoderado == "true"){ echo "Agregar Apoderado"; }
                    else if($vista == "profesionales") { echo "Nuevo Profesional"; }
                ?>
            </h4>
        </div>
        <div class="modal-body" style="max-height: 600px; overflow-y: auto;">

            <input type="hidden" id="idPaciente" value="<?php echo $idPaciente ?>">

            <?php if($vista == "profesionales") : ?>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="especialidad">Especialidad</label>
                <div class="col-sm-9">
                    <select id="especialidad" class="form-control">
                        <?php
                        foreach ($especialidades as $especialidad):
                            echo '<option value="' . $especialidad['ID_ESPECIALIDAD'] . '">' . utf8_encode($especialidad['NOMBRE']) . '</option>';
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <?php endif; ?>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="nombre">Nombre</label>
                <div class="col-sm-9">
                    <input class="form-control" id="nombre" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="apellido">Apellido</label>
                <div class="col-sm-9">
                    <input class="form-control" id="apellido" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="fecha">Fecha Nacimiento</label>
                <div class="col-sm-9">
                    <input class="form-control" id="fecha" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="email">Email</label>
                <div class="col-sm-9">
                    <input class="form-control" id="email" type="email">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="telefono1">Telefono 1</label>
                <div class="col-sm-9">
                    <input class="form-control" id="telefono1" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="telefono2">Telefono 2</label>
                <div class="col-sm-9">
                    <input class="form-control" id="telefono2" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="direccion">Dirección</label>
                <div class="col-sm-9">
                    <input class="form-control" id="direccion" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="perfil">Perfil</label>
                <div class="col-sm-9">
                    <select id="perfil" class="form-control">
                        <?php if($vista == "fichas" && $addApoderado == "false") : ?>
                            <option value="1" selected>Paciente</option>
                        <?php endif; ?>
                        <?php if($vista == "fichas" && $addApoderado == "true") : ?>
                            <option value="2" selected>Apoderado</option>
                        <?php endif; ?>
                        <?php if($vista == "profesionales") : ?>
                            <option value="3" selected>Profesional</option>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <br>
            <div id="messageNewUser"></div>
        </div>

        <div class="modal-footer">
            <button type="button" id="cerrarPrincipalGrupos" class="btn btn-default" data-dismiss="modal">Cerrar</button>

            <!--<?php if ($usuario['HABILITADO'] == 1) { ?>
                <button type="button" class="btn btn-primary" id="toggleDesactivar">Desactivar</button>
            <?php } else if ($usuario['HABILITADO'] == 0) { ?>
                <button type="button" class="btn btn-primary" id="toggleActivar">Activar</button>
            <?php } ?>-->

            <button id="newUserBtn" type="button" class="btn btn-primary">Guardar</button>

        </div>
    </div>
</div>

<script type="application/javascript">

    $("#fecha").daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        format: 'DD-MM-YYYY',
        locale: {
            //format: 'DD-MM-YYYY',
            applyLabel: 'Aceptar',
            fromLabel: 'Desde',
            toLabel: 'Hasta',
            customRangeLabel: 'Rango Personalizado',
            daysOfWeek: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi','Sa'],
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            firstDay: 1
        }
    });

    $('#newUserBtn').click(function(){
        var e = 'user/createnewuser/'; console.debug(e);

        var idPaciente = $("#idPaciente").val();
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var especialidad = $("#especialidad").val();
        var fecha = $("#fecha").val();
        var email = $("#email").val();
        var telefono1 = $("#telefono1").val();
        var telefono2 = $("#telefono2").val();
        var direccion = $("#direccion").val();
        var perfil = $("#perfil").val();

        if(nombre === '' || apellido === '' || email === '')
        {
            $('#messageNewUser').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong> Debes rellenar los campos requeridos </div>');
        }
        else
        {
            $.ajax({
                type: 'POST',
                url: e,
                data: { nombre: nombre, apellido:apellido, especialidad:especialidad, fecha: fecha, email: email, telefono1: telefono1, telefono2: telefono2, direccion: direccion, perfil: perfil, idPaciente: idPaciente },
                dataType : "json",
                beforeSend: function () {
                    $('#newUserBtn').html("Cargando...");
                },
                success: function (data) {
                    console.debug(data);
                    //var returnedData = JSON.parse(data); console.debug(returnedData);
                    if(data.status === "success"){
                        $('#messageNewUser').html('<div class="alert alert-success" role="alert"><strong>Listo! </strong>' + data.message + ' La contraseña del usuario es: <b>'+ data.password +'</b> (asegúrate de anotarla)</div>');
                        $('#newUserBtn').html('Agregar');
                    }
                    else {
                        $('#newUserBtn').html("Agregar");
                        $('#messageNewUser').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong>' + data.message + '</div>');
                    }
                    return false;
                },
                error: function (data) {
                    console.debug(data);
                    //var returnedData = JSON.parse(data); console.debug(returnedData);
                    $('#newUserBtn').html("Agregar");
                    $('#messageNewUser').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong>' + data.message + '</div>');
                    return false;
                }
            });
        }

        return false;
    });

    $("#cleanDataUserBtn").click(function() {
        $(this).closest('form').find("input[type=text], input[type=email]").val("");
        return false;
    });

</script>