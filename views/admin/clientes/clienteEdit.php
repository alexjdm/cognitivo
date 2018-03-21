<style>
    .form-group{
        padding: 15px;
    }
</style>

<div class="modal-dialog" style="width:700px;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Editar Cliente</h4>
        </div>
        <div class="modal-body" style="max-height: 600px; overflow-y: auto;">
            <input id="idCliente" value="<?php echo $cliente['ID_CLIENTE'] ?>" type="hidden">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="nombre">Nombre</label>
                <div class="col-sm-9">
                    <input class="form-control" id="nombre" type="text" value="<?php echo $cliente['NOMBRE_CLIENTE'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="apellido">Apellido</label>
                <div class="col-sm-9">
                    <input class="form-control" id="apellido" type="text" value="<?php echo $cliente['APELLIDO_CLIENTE'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="email">Email</label>
                <div class="col-sm-9">
                    <input class="form-control" id="email" type="email" value="<?php echo $cliente['CORREO_ELECTRONICO'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="telefono">Teléfono</label>
                <div class="col-sm-9">
                    <input class="form-control" id="telefono" type="text" value="<?php echo $cliente['TELEFONO'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="empresa">Empresa</label>
                <div class="col-sm-9">
                    <select id="empresa" name="empresa" class="form-control">
                        <?php foreach($empresas as $empresa): ?>
                            <option id="<?php echo $empresa['ID_EMPRESA'] ?>" <?php if($empresa['ID_EMPRESA'] == $cliente['ID_EMPRESA']){ echo "selected"; } ?>><?php echo $empresa['NOMBRE_EMPRESA'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <br>
            <div id="messageEditCliente"></div>
        </div>

        <div class="modal-footer">
            <button type="button" id="cerrarPrincipalGrupos" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button id="saveClienteEdit" type="button" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</div>

<script type="application/javascript">

    $('#saveClienteEdit').click(function(){
        var e = 'ajax.php?controller=Cliente&action=editCliente';
        var idCliente = $("#idCliente").val();
        var nombre = $("#nombre").val(); console.debug(nombre);
        var apellido = $("#apellido").val(); console.debug(apellido);
        var email = $("#email").val(); console.debug(email);
        var telefono = $("#telefono").val();
        var idEmpresa = $("#empresa").children(":selected").attr("id");

        $.ajax({
            type: 'GET',
            url: e,
            data: { idCliente: idCliente, nombre: nombre, apellido:apellido, email: email, telefono: telefono, idEmpresa: idEmpresa },
            dataType : "json",
            beforeSend: function () {
                $('#saveClienteEdit').html("Cargando...");
            },
            success: function (data) {
                console.debug("success");
                console.debug(data);
                //var returnedData = JSON.parse(data); console.debug(returnedData);
                if(data.status == "success"){
                    console.debug("Login ok");
                    $('#messageEditCliente').html('<div class="alert alert-success" role="alert"><strong>Listo! </strong>' + data.message + '</div>');
                    $('#saveClienteEdit').html('<i class="fa fa-check" aria-hidden="true"></i> Listo');
                    $('#modalPrincipal').hide();
                    window.location.href = "index.php?controller=Cliente&action=index";
                }
                else{
                    console.debug("Login fail");
                    $('#saveClienteEdit').html("Login");
                    $('#messageEditCliente').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong>' + data.message + '</div>');
                }
            },
            error: function (data) {
                console.debug("error");
                console.debug(data);
                //var returnedData = JSON.parse(data); console.debug(returnedData);
                $('#saveClienteEdit').html("Login");
                $('#messageEditCliente').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong>' + data.message + '</div>');
            }
        });
    });

</script>