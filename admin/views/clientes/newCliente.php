<?php
/**
 * Created by PhpStorm.
 * User: alexj
 * Date: 03-04-2016
 * Time: 23:50
 */

//Inicio de variables de sesión
if (!isset($_SESSION)) {
    @session_start();
}

?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Clientes
        <!--<small>Optional description</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Datos</a></li>
        <li class="active">Nuevo Cliente</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Nuevo Cliente</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="nombre">Nombre *</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="nombre" type="text" placeholder="Nombre">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="apellido">Apellido *</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="apellido" type="text" placeholder="Apellido">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="email">Email *</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="email" type="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="telefono">Teléfono</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="telefono" type="text" placeholder="Teléfono">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="empresa">Empresa</label>
                    <div class="col-sm-10">
                        <select id="empresa" name="empresa" class="form-control">
                            <?php foreach($empresas as $empresa): ?>
                                <option id="<?php echo $empresa['ID_EMPRESA'] ?>"><?php echo $empresa['NOMBRE_EMPRESA'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div id="messageNewCliente" style="margin: 20px;"></div>

            </div><!-- /.box-body -->
            <div class="box-footer">
                <button id="cleanDataClienteBtn" class="btn btn-default" type="submit">Limpiar</button>
                <button id="newClienteBtn" class="btn btn-info pull-right" type="submit">Agregar</button>
            </div><!-- /.box-footer -->
        </form>
    </div>

</section><!-- /.content -->

<script type="application/javascript">

    $('#newClienteBtn').click(function(){
        var e = 'ajax.php?controller=Cliente&action=createNewCliente'; console.debug(e);

        var nombre = $("#nombre").val(); console.debug(nombre);
        var apellido = $("#apellido").val(); console.debug(apellido);
        var email = $("#email").val(); console.debug(email);
        var telefono = $("#telefono").val();
        var idEmpresa = $("#empresa").children(":selected").attr("id");

        if(nombre == '' || apellido == '' || email == '')
        {
            $('#messageNewCliente').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong> Debes rellenar los campos requeridos </div>');
        }
        else
        {
            $.ajax({
                type: 'GET',
                url: e,
                data: { nombre: nombre, apellido:apellido, email: email, telefono: telefono, idEmpresa: idEmpresa },
                dataType : "json",
                beforeSend: function () {
                    $('#newClienteBtn').html("Cargando...");
                },
                success: function (data) {
                    console.debug(data);
                    //var returnedData = JSON.parse(data); console.debug(returnedData);
                    if(data.status == "success"){
                        $('#messageNewCliente').html('<div class="alert alert-success" role="alert"><strong>Listo! </strong>' + data.message + '</div>');
                        $('#newClienteBtn').html('Agregar');
                    }
                    else{
                        $('#newClienteBtn').html("Agregar");
                        $('#messageNewCliente').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong>' + data.message + '</div>');
                    }
                    return false;
                },
                error: function (data) {
                    console.debug(data);
                    //var returnedData = JSON.parse(data); console.debug(returnedData);
                    $('#newClienteBtn').html("Agregar");
                    $('#messageNewCliente').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong>' + data.message + '</div>');
                    return false;
                }
            });
        }

        return false;
    });

    $("#cleanDataClienteBtn").click(function() {
        $(this).closest('form').find("input[type=text], input[type=email]").val("");
        return false;
    });

</script>