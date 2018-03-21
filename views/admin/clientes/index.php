<?php
/**
 * Created by PhpStorm.
 * Cliente: alexj
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
        <li class="active">Clientes</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div id="messageCliente"></div>

    <!-- Default box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de Clientes</h3>
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="tablaClientes" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Empresa</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php $n = 1; ?>
                <?php foreach ($clientes as $cliente): ?>
                    <tr data-id="<?php echo $cliente['ID_CLIENTE'] ?>">
                        <th><?php echo $n ?></th>
                        <td><?php echo $cliente['NOMBRE_CLIENTE'] ?></td>
                        <td><?php echo $cliente['APELLIDO_CLIENTE'] ?></td>
                        <td><?php echo $cliente['CORREO_ELECTRONICO'] ?></td>
                        <td><?php echo $cliente['TELEFONO'] ?></td>
                        <td><?php

                            foreach($empresas as $empresa):
                                if($empresa['ID_EMPRESA'] == $cliente['ID_EMPRESA']){
                                    echo $empresa['NOMBRE_EMPRESA'];
                                    break;
                                }
                            endforeach;

                            ?></td>
                        <td>
                            <button data-original-title="Edit Row" class="btn btn-xs btn-default editCliente">
                                <i class="fa fa-pencil"></i>
                            </button>
                            &nbsp
                            <button data-original-title="Delete" class="btn btn-xs btn-default deleteCliente">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                    </tr>
                <?php $n++; ?>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Empresa</th>
                    <th>Opciones</th>
                </tr>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
    
</section><!-- /.content -->


<script>
    $(function() {
        var table = $("#tablaClientes").dataTable();

        $("#tablaClientes").on("click", ".editCliente", (function() {
            var id = $(this).closest('tr').data("id"); console.debug(id);
            ajax_loadModal($('#modalPrincipal'),
                'ajax.php?controller=Cliente&action=clienteEdit',
                'GET',
                { idCliente: id },
                defaultMessage);
            return false;
        }));

        $("#tablaClientes").on("click", ".deleteCliente" ,(function () {
            var id = $(this).closest('tr').data("id"); console.debug(id);
            showConfirmation($('#modalConfirmacion'),
            {
                title: '¿ Está seguro ?',
                message: 'Esta acción eliminará al cliente. ¿Está seguro? ',
                ok: 'Eliminar',
                cancel: 'Cancelar'
            }, function () {

                $.ajax({
                    type: 'GET',
                    url: 'ajax.php?controller=Cliente&&action=deleteCliente',
                    data: { idcliente: id },
                    beforeSend: function() {
                    },
                    success: function(data) {

                        if (data.status == 'error') {
                            $( "#messageCliente" ).fadeOut( "slow", function() {
                                $('#messageCliente').html('<div class="alert alert-danger" role="alert">' + data.message + '</div>');
                            });
                        } else {
                            $( "#messageCliente" ).fadeOut( "slow", function() {
                                $('#messageCliente').html('<div class="alert alert-success" role="alert">' + data.message + '</div>');
                            });
                            window.location.href = "index.php?controller=Cliente&action=index";
                        }
                    },
                    error: function(data) {
                        $( "#messageCliente" ).fadeOut( "slow", function() {
                            $('#messageCliente').html('<div class="alert alert-danger" role="alert">' + data.message + '</div>');
                        });
                    }
                });
            });
        }));

    });
</script>