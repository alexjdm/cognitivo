<style>
    .form-group{
        padding: 15px;
    }
</style>

<div class="modal-dialog" style="width:700px;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Nueva Sesión</h4>
        </div>
        <div class="modal-body" style="max-height: 600px; overflow-y: auto;">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="nombre">Fecha</label>
                <div class="col-sm-9">
                    <input class="form-control" id="fecha" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="idPaciente">Paciente</label>
                <div class="col-sm-9">
                    <select class="form-control" id="idPaciente">
                        <?php foreach ($pacientes as $paciente): ?>
                            <option id="<?php echo $paciente['ID_USUARIO'] ?>"><?php echo utf8_encode($paciente['NOMBRE']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="idProfesional">Profesional</label>
                <div class="col-sm-9">
                    <select class="form-control" id="idProfesional">
                        <?php foreach ($profesionales as $profesional): ?>
                            <option id="<?php echo $profesional['ID_USUARIO'] ?>"><?php echo utf8_encode($profesional['NOMBRE']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="numeroSesion">Número Sesión</label>
                <div class="col-sm-9">
                    <input class="form-control" id="numeroSesion" type="text" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="comentario">Comentario</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="comentario" rows="4" cols="50" style="resize: none;"></textarea>
                </div>
            </div>
            <br>
            <div id="messageNewSesion" style="margin-top: 75px;"></div>
        </div>

        <div class="modal-footer">
            <button type="button" id="cerrarPrincipalGrupos" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button id="newSesionBtn" class="btn btn-primary pull-right" type="submit">Agregar</button>
        </div>
    </div>
</div>


<script type="application/javascript">

    $(document).ready(function() {
        RecalcularNumeroSesion();
    });

    $("#fecha").val(moment().format('DD-MM-YYYY'));

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

    $('#newSesionBtn').click(function(){
        var e = 'ajax.php?controller=User&action=createNewSesion'; //console.debug(e);

        var idSesion = $("#idSesion").val();
        var fecha = $("#fecha").val();
        var idPaciente = $("#idPaciente").children(":selected").attr("id");
        var idProfesional = $("#idProfesional").children(":selected").attr("id");
        var numeroSesion = $("#numeroSesion").val();
        var comentario = $("#comentario").val();

        if(fecha == '' || idPaciente == '' || idProfesional == '' || numeroSesion == '' || comentario == '')
        {
            $('#messageNewSesion').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong> Debes rellenar todos los campos </div>');
        }
        else
        {
            $.ajax({
                type: 'GET',
                url: e,
                data: { fecha: fecha, idPaciente:idPaciente, idProfesional: idProfesional, numeroSesion: numeroSesion, comentario: comentario },
                dataType : "json",
                beforeSend: function () {
                    $('#newSesionBtn').html("Cargando...");
                },
                success: function (data) {
                    //console.debug(data);
                    //var returnedData = JSON.parse(data); console.debug(returnedData);
                    if(data.status == "success"){
                        $('#saveSesionEdit').html('<i class="fa fa-check" aria-hidden="true"></i> Listo');
                        $('#modalPrincipal').hide();
                        $('#messageNewSesion').hide();
                        window.location.href = "index.php?controller=User&action=sesiones";
                    }
                    else{
                        $('#newSesionBtn').html("Agregar");
                        $('#messageNewSesion').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong>' + data.message + '</div>');
                    }
                    return false;
                },
                error: function (data) {
                    //console.debug(data);
                    //var returnedData = JSON.parse(data); console.debug(returnedData);
                    $('#newSesionBtn').html("Agregar");
                    $('#messageNewSesion').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong>' + data.message + '</div>');
                    return false;
                }
            });
        }

        return false;
    });

    $("#idPaciente").change(function() {
        RecalcularNumeroSesion();
    });

    $("#idProfesional").change(function() {
        RecalcularNumeroSesion();
    });

    $("#cleanDataSesionBtn").click(function() {
        $(this).closest('form').find("input[type=text], input[type=email]").val("");
        return false;
    });

    function RecalcularNumeroSesion(){

        var idPaciente = $("#idPaciente").children(":selected").attr("id");
        var idProfesional = $("#idProfesional").children(":selected").attr("id");

        $.ajax({
            type: 'GET',
            url: 'ajax.php?controller=User&action=recalcularNumeroSesion',
            data: { idPaciente:idPaciente, idProfesional: idProfesional},
            dataType: 'text',
            success: function (data) {
                //console.debug("Recalcular Numero Sesion Success");
                //console.debug(data);
                var returnedData = JSON.parse(data); //console.debug(returnedData.message);
                $('#numeroSesion').val(returnedData.message);
                return false;
            },
            error: function (data) {
                return false;
            }
        });

    }

</script>