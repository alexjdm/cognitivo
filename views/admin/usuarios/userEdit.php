<style>
    .form-group{
        padding: 15px;
    }
</style>

<div class="modal-dialog" style="width:700px;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Editar Usuario</h4>
        </div>
        <div class="modal-body" style="max-height: 600px; overflow-y: auto;">
            <input id="idUsuario" value="<?php echo $usuario['ID_USUARIO'] ?>" type="hidden">
            <input id="vista" value="<?php echo $vista ?>" type="hidden">

            <?php if($vista == "profesionales") : ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="idEspecialidad">Especialidad</label>
                    <div class="col-sm-9">
                        <select id="idEspecialidad" class="form-control">
                            <?php foreach ($especialidades as $especialidad): ?>
                                <option value="<?php echo $especialidad['ID_ESPECIALIDAD'] ?>" <?php if($especialidad['ID_ESPECIALIDAD'] == $usuario['ID_ESPECIALIDAD']) { echo "selected"; } ?>><?php echo $especialidad['NOMBRE'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="nombre">Nombre</label>
                <div class="col-sm-9">
                    <input class="form-control" id="nombre" type="text" value="<?php echo utf8_encode($usuario['NOMBRE']) ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="apellido">Apellido</label>
                <div class="col-sm-9">
                    <input class="form-control" id="apellido" type="text" value="<?php echo utf8_encode($usuario['APELLIDO']) ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="fecha">Fecha Nacimiento</label>
                <div class="col-sm-9">
                    <input class="form-control" id="fecha" type="text" value="<?php echo $usuario['FECHA_NACIMIENTO'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="email">Email</label>
                <div class="col-sm-9">
                    <input class="form-control" id="email" type="email" value="<?php echo $usuario['CORREO_ELECTRONICO'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="password">Contraseña</label>
                <div class="col-sm-9">
                    <a id="changePassword" class="btn btn-danger">Cambiar Contraseña</a>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="telefono1">Telefono 1</label>
                <div class="col-sm-9">
                    <input class="form-control" id="telefono1" type="text" value="<?php echo utf8_encode($usuario['TELEFONO1']) ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="telefono2">Telefono 2</label>
                <div class="col-sm-9">
                    <input class="form-control" id="telefono2" type="text" value="<?php echo utf8_encode($usuario['TELEFONO2']) ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="direccion">Dirección</label>
                <div class="col-sm-9">
                    <input class="form-control" id="direccion" type="text" value="<?php echo utf8_encode($usuario['DIRECCION']) ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="perfil">Perfil</label>
                <div class="col-sm-9">
                    <select id="perfil" class="form-control">
                        <option value="1" <?php if($usuario['ID_PERFIL'] == 1) { echo "selected"; } ?> >Paciente</option>
                        <option value="2" <?php if($usuario['ID_PERFIL'] == 2) { echo "selected"; } ?> >Apoderado</option>
                        <option value="3" <?php if($usuario['ID_PERFIL'] == 3) { echo "selected"; } ?> >Profesional</option>
                    </select>
                </div>
            </div>
            <br>
            <div id="messageEditUser"></div>
        </div>

        <div class="modal-footer">
            <button type="button" id="cerrarPrincipalGrupos" class="btn btn-default" data-dismiss="modal">Cerrar</button>

            <!--<?php if ($usuario['HABILITADO'] == 1) { ?>
                <button type="button" class="btn btn-primary" id="toggleDesactivar">Desactivar</button>
            <?php } else if ($usuario['HABILITADO'] == 0) { ?>
                <button type="button" class="btn btn-primary" id="toggleActivar">Activar</button>
            <?php } ?>-->

            <button id="saveUserEdit" type="button" class="btn btn-primary">Guardar</button>

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

    $('#saveUserEdit').click(function(){
        var e = 'index.php?controller=admin&action=editUser';
        var idUsuario = $("#idUsuario").val();
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var idEspecialidad = $("#idEspecialidad").val();
        var fecha = $("#fecha").val();
        if(fecha === "")
            fecha = null;
        var email = $("#email").val();
        var telefono1 = $("#telefono1").val();
        var telefono2 = $("#telefono2").val();
        var direccion = $("#direccion").val();
        var perfil = $("#perfil").val();

        var vista = $("#vista").val(); //console.debug(vista);

        var dataSend = {
            idUsuario: idUsuario,
            nombre: nombre,
            apellido:apellido,
            idEspecialidad:idEspecialidad,
            fecha: fecha,
            email: email,
            telefono1: telefono1,
            telefono2: telefono2,
            direccion: direccion,
            perfil: perfil
        };
        //console.debug(dataSend);

        $.ajax({
            type: 'GET',
            url: e,
            data: dataSend,
            dataType : "json",
            beforeSend: function () {
                $('#saveUserEdit').html("Cargando...");
            },
            success: function (data) {
                console.debug("success");
                console.debug(data);
                //var returnedData = JSON.parse(data); console.debug(returnedData);
                if(data.status === "success"){
                    console.debug("Login ok");
                    $('#messageEditUser').html('<div class="alert alert-success" role="alert"><strong>Listo! </strong>' + data.message + '</div>');
                    $('#saveUserEdit').html('<i class="fa fa-check" aria-hidden="true"></i> Listo');
                    $('#modalPrincipal').hide();

                    window.location.href = "index.php?controller=admin&action=" + vista;
                }
                else{
                    console.debug("Edit fail");
                    $('#saveUserEdit').html("Guardar");
                    $('#messageEditUser').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong>' + data.message + '</div>');
                }
            },
            error: function (data) {
                console.debug("error");
                console.debug(data);
                //var returnedData = JSON.parse(data); console.debug(returnedData);
                $('#saveUserEdit').html("Guardar");
                $('#messageEditUser').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong>' + data.message + '</div>');
            }
        });
    });

    $('#changePassword').click(function(){
        var url = 'index.php?controller=admin&action=passwordUser'; console.debug(url);
        var idUsuario = $("#idUsuario").val(); console.debug(idUsuario);
        var data = { idUsuario:idUsuario };
        modal = $("#modalSubmodal");
        ajax_loadModal(modal, url, 'GET', data);
    });

</script>