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
            <h4 class="modal-title">Detalle Inscrito</h4>
        </div>
        <div class="modal-body" style="max-height: 600px; overflow-y: auto;">
            <input id="idInscrito" value="<?php echo $inscrito['id'] ?>" type="hidden">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="nombre">Nombre</label>
                <div class="col-sm-9">
                    <?php echo $inscrito['name'] ?>
                </div>
            </div>
            <!--<div class="form-group">
                <label class="col-sm-3 control-label" for="nombre">ID Transacción</label>
                <div class="col-sm-9">
                    <?php /*echo $inscrito['id_transaccion'] */?>
                </div>
            </div>-->
            <div class="form-group">
                <label class="col-sm-3 control-label" for="pago">Pago</label>
                <div class="col-sm-3">
                    <input id="pago" type="checkbox" <?php echo ($inscrito['pagado']== 1 ? 'checked' : '');?>>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="llamado">Llamado</label>
                <div class="col-sm-3">
                    <input id="llamado" type="checkbox" <?php echo ($inscrito['llamado']== 1 ? 'checked="checked"' : '');?>>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="comentario">Comentario</label>
                <div class="col-sm-9">
                    <textarea id="comentario" style="width: 100%; resize: none;"><?php echo $inscrito['comentario'] ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="confirmacion">Envío de Mail de confirmación</label>
                <div class="col-sm-3">
                    <input id="confirmacion" type="checkbox" <?php echo (ord($inscrito['confirmacion_enviada'])== 1 ? 'checked="checked"' : '');?>>
                </div>
            </div>
            <br><br><br>
            <div id="messageEditInscrito"></div>
        </div>

        <div class="modal-footer">
            <button type="button" id="cerrarPrincipalGrupos" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button id="saveInscritoEdit" type="button" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</div>

<script type="application/javascript">

    $('#saveInscritoEdit').click(function(){
        var e = 'admin/updateinscrito/'; console.debug(e);
        var idInscrito = $("#idInscrito").val(); console.debug(idInscrito);
        var pago = $("#pago").is(':checked'); console.debug(pago);
        var llamado = $("#llamado").is(':checked'); console.debug(llamado);
        var confirmacion = $("#confirmacion").is(':checked'); console.debug(confirmacion);
        var comentario = $("#comentario").val(); console.debug(comentario);

        $.ajax({
            type: 'POST',
            url: e,
            data: { idInscrito: idInscrito, pago: pago, llamado: llamado, confirmacion: confirmacion, comentario: comentario },
            dataType : "json",
            beforeSend: function () {
                $('#saveInscritoEdit').html("Cargando...");
            },
            success: function (data) {
                console.debug("success");
                console.debug(data);
                //var returnedData = JSON.parse(data); console.debug(returnedData);
                if(data.status == "success"){
                    $('#messageEditInscrito').html('<div class="alert alert-success" role="alert"><strong>Listo! </strong>' + data.message + '</div>');
                    $('#saveInscritoEdit').html('<i class="fa fa-check" aria-hidden="true"></i> Listo');
                    //$('#modalPrincipal').hide();
                    $('#modalPrincipal').modal('hide');
                    //$('.modal-backdrop').remove();
                }
                else{
                    $('#saveInscritoEdit').html("Guardar");
                    $('#messageEditInscrito').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong>' + data.message + '</div>');
                }
            },
            error: function (data) {
                console.debug("error");
                console.debug(data);
                //var returnedData = JSON.parse(data); console.debug(returnedData);
                $('#saveInscritoEdit').html("Guardar");
                $('#messageEditInscrito').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong>' + data.message + '</div>');
            }
        });
    });

</script>