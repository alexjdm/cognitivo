<style>
    .form-group{
        padding: 15px;
    }
</style>

<div class="modal-dialog" style="width:700px;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Editar Sesion</h4>
        </div>
        <div class="modal-body" style="max-height: 600px; overflow-y: auto;">
            <input id="idSesion" value="<?php echo $sesion['ID_SESION'] ?>" type="hidden">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="nombre">Fecha</label>
                <div class="col-sm-9">
                    <input class="form-control" id="fecha" type="text" value="<?php echo FormatearFechaSpa($sesion['FECHA']) ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="apellido">Paciente</label>
                <div class="col-sm-9">
                    <select class="form-control" id="idPaciente">
                    <?php foreach ($pacientes as $paciente): ?>
                        <option id="<?php echo $paciente['ID_USUARIO'] ?>" <?php if($paciente['ID_USUARIO'] == $sesion['ID_PACIENTE']) { echo "selected"; } ?>><?php echo utf8_encode($paciente['NOMBRE']) ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="apellido">Profesional</label>
                <div class="col-sm-9">
                    <select class="form-control" id="idProfesional">
                    <?php foreach ($profesionales as $profesional): ?>
                        <option id="<?php echo $profesional['ID_USUARIO'] ?>" <?php if($profesional['ID_USUARIO'] == $sesion['ID_PROFESIONAL']) { echo "selected"; } ?>><?php echo utf8_encode($profesional['NOMBRE']) ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="numeroSesion">Número Sesión</label>
                <div class="col-sm-9">
                    <input class="form-control" id="numeroSesion" type="text" value="<?php echo $sesion['NUMERO_SESION'] ?>">
                </div>
            </div>
            <div class="form-group" style="height: 110px">
                <label class="col-sm-3 control-label" for="comentario">Comentario</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="comentario" rows="4" cols="50" style="resize: none;"><?php echo trim($sesion['COMENTARIO']) ?></textarea>
                    <!--<input class="form-control" id="comentario" type="text" value="<?php echo trim($sesion['COMENTARIO']) ?>">-->
                </div>
            </div>
            <br>
            <div id="messageEditSesion"></div>
        </div>

        <div class="modal-footer">
            <button type="button" id="cerrarPrincipalGrupos" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button id="saveSesionEdit" type="button" class="btn btn-primary" id="submit">Guardar</button>
        </div>
    </div>
</div>

<script type="application/javascript">

    $('#saveSesionEdit').click(function(){
        var e = 'ajax.php?controller=User&action=editSesion';
        var idSesion = $("#idSesion").val();
        var fecha = $("#fecha").val();
        var idPaciente = $("#idPaciente").children(":selected").attr("id");
        var idProfesional = $("#idProfesional").children(":selected").attr("id");
        var numeroSesion = $("#numeroSesion").val();
        var comentario = $("#comentario").val();

        $.ajax({
            type: 'GET',
            url: e,
            data: { idSesion: idSesion, fecha: fecha, idPaciente:idPaciente, idProfesional: idProfesional, numeroSesion: numeroSesion, comentario: comentario },
            dataType : "json",
            beforeSend: function () {
                $('#saveSesionEdit').html("Cargando...");
            },
            success: function (data) {
                console.debug("success");
                console.debug(data);
                //var returnedData = JSON.parse(data); console.debug(returnedData);
                if(data.status == "success"){
                    console.debug("Login ok");
                    $('#messageEditSesion').html('<div class="alert alert-success" role="alert"><strong>Listo! </strong>' + data.message + '</div>');
                    $('#saveSesionEdit').html('<i class="fa fa-check" aria-hidden="true"></i> Listo');
                    $('#modalPrincipal').hide();
                    window.location.href = "index.php?controller=User&action=sesiones";
                }
                else{
                    console.debug("Login fail");
                    $('#saveSesionEdit').html("Login");
                    $('#messageEditSesion').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong>' + data.message + '</div>');
                }
            },
            error: function (data) {
                console.debug("error");
                console.debug(data);
                //var returnedData = JSON.parse(data); console.debug(returnedData);
                $('#saveSesionEdit').html("Guardar");
                $('#messageEditSesion').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong>' + data.message + '</div>');
            }
        });
    });

</script>