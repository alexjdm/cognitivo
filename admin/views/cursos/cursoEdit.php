<?php
include_once("helpers/CommonHelper.php");
?>

<style>
    .form-group{
        padding: 15px;
    }
</style>

<div class="modal-dialog" style="width:700px;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Editar Curso</h4>
        </div>
        <div class="modal-body" style="max-height: 600px; overflow-y: auto;">
            <input id="idCurso" value="<?php echo $curso['ID_CURSO'] ?>" type="hidden">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="nombreE">Nombre</label>
                <div class="col-sm-9">
                    <input class="form-control" id="nombreE" type="text" value="<?php echo $curso['NOMBRE_CURSO'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="fechaE">Fecha</label>
                <div class="col-sm-9">
                    <input class="form-control" id="fechaE" type="text" value="<?php echo FormatearFechaSpa($curso['FECHA_CURSO']) ?>">
                </div>
            </div>
            <br>
            <div id="messageEditCurso"></div>
        </div>

        <div class="modal-footer">
            <button type="button" id="cerrarPrincipalGrupos" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button id="saveCursoEdit" type="button" class="btn btn-primary">Guardar</button>

        </div>
    </div>
</div>

<script type="application/javascript">

    $("#fechaE").daterangepicker({
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

    $('#saveCursoEdit').click(function(){
        var e = 'ajax.php?controller=Curso&action=editCurso'; console.debug(e);
        var idCurso = $("#idCurso").val(); console.debug(idCurso);
        var nombre = $("#nombreE").val(); console.debug(nombre);
        var fecha = $("#fechaE").val(); console.debug(fecha);

        $.ajax({
            type: 'GET',
            url: e,
            data: { idCurso: idCurso, nombre: nombre, fecha: fecha },
            dataType : "json",
            beforeSend: function () {
                $('#saveCursoEdit').html("Cargando...");
            },
            success: function (data) {
                console.debug("success");
                console.debug(data);
                //var returnedData = JSON.parse(data); console.debug(returnedData);
                if(data.status == "success"){
                    $('#messageEditCurso').html('<div class="alert alert-success" role="alert"><strong>Listo! </strong>' + data.message + '</div>');
                    $('#saveCursoEdit').html('<i class="fa fa-check" aria-hidden="true"></i> Listo');
                    $('#modalPrincipal').hide();
                    window.location.href = "index.php?controller=Curso&action=index";
                }
                else{
                    $('#saveCursoEdit').html("Guardar");
                    $('#messageEditCurso').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong>' + data.message + '</div>');
                }
            },
            error: function (data) {
                console.debug("error");
                console.debug(data);
                //var returnedData = JSON.parse(data); console.debug(returnedData);
                $('#saveCursoEdit').html("Guardar");
                $('#messageEditCurso').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong>' + data.message + '</div>');
            }
        });
    });

</script>