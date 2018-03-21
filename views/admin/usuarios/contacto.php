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
        Contactos
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Datos</a></li>
        <li class="active">Contactos</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div id="messageUser"></div>

    <!-- Default box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de Contactos</h3>
            <small style="float: right;"><i class="fa fa-user" aria-hidden="true"></i> Paciente | <i class="fa fa-user-circle-o" aria-hidden="true"></i> Apoderado</small>
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="tablaContactos" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Movil</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php $n = 1; ?>
                <?php foreach ($pacientes as $paciente): ?>
                    <tr data-id="<?php echo $paciente['ID_USUARIO'] ?>">
                        <th><?php //echo $n ?><i class="fa fa-user" aria-hidden="true"></i></th>
                        <td><?php echo utf8_encode($paciente['NOMBRE']) ?></td>
                        <td><?php echo utf8_encode($paciente['APELLIDO']) . ", " . utf8_encode($paciente['NOMBRE']) ?></td>
                        <td><?php echo utf8_encode($paciente['APELLIDO']) ?></td>
                        <td><?php echo $paciente['CORREO_ELECTRONICO'] ?></td>
                        <td><?php echo $paciente['TELEFONO1'] ?></td>
                        <td><?php echo $paciente['TELEFONO2'] ?></td>
                        <td>
                            <button data-original-title="Edit Row" class="btn btn-xs btn-default editUser">
                                <i class="fa fa-pencil"></i>
                            </button>
                            &nbsp
                            <button data-original-title="Delete" class="btn btn-xs btn-default deleteUser">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                    </tr>

                    <?php foreach ($paciente_apoderados as $paciente_apoderado): ?>
                        <?php foreach ($apoderados as $apoderado): ?>
                            <?php if($apoderado['ID_USUARIO'] == $paciente_apoderado['ID_APODERADO'] && $paciente['ID_USUARIO'] == $paciente_apoderado['ID_PACIENTE']) : ?>
                                <tr data-id="<?php echo $apoderado['ID_USUARIO'] ?>">
                                    <td><?php //echo $n ?><i class="fa fa-user-circle-o" aria-hidden="true"></i></td>
                                    <td><?php echo utf8_encode($apoderado['NOMBRE']) ?></td>
                                    <td><?php echo utf8_encode($paciente['APELLIDO']) . ", " . utf8_encode($paciente['NOMBRE']) ?></td>
                                    <td><?php echo utf8_encode($apoderado['APELLIDO']) ?></td>
                                    <td><?php echo $apoderado['CORREO_ELECTRONICO'] ?></td>
                                    <td><?php echo $apoderado['TELEFONO1'] ?></td>
                                    <td><?php echo $apoderado['TELEFONO2'] ?></td>
                                    <td>
                                        <button data-original-title="Edit Row" class="btn btn-xs btn-default editUser">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                <?php if(isSuperAdmin()) : ?>
                                        &nbsp
                                        <button data-original-title="Delete" class="btn btn-xs btn-default deleteUser">
                                            <i class="fa fa-times"></i>
                                        </button>
                                <?php endif ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>

                <?php $n++; ?>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Movil</th>
                    <th>Opciones</th>
                </tr>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
    
</section><!-- /.content -->


<script>
    $(function() {
        var table = $("#tablaContactos").DataTable({
            "columnDefs": [
                { "visible": false, "targets": 2 }
            ],
            "order": [[ 2, 'asc' ]],
            "displayLength": 25,
            "drawCallback": function ( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;

                api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                    if ( last !== group ) {
                        $(rows).eq( i ).before(
                            '<tr class="group"><td colspan="7">'+group+'</td></tr>'
                        );

                        last = group;
                    }
                } );
            }
        } );

        $("#tablaContactos").on("click", ".editUser", (function() {
            var id = $(this).closest('tr').data("id"); console.debug(id);
            ajax_loadModal($('#modalPrincipal'),
                'ajax.php?controller=User&action=userEdit',
                'GET',
                { idUsuario: id, vista: "contacto" },
                defaultMessage);
            return false;
        }));

        $("#tablaContactos").on("click", ".deleteUser" ,(function () {
            var id = $(this).closest('tr').data("id"); console.debug(id);
            showConfirmation($('#modalConfirmacion'),
            {
                title: '¿ Está seguro ?',
                message: 'Esta acción eliminará el contacto. ¿Está seguro? ',
                ok: 'Eliminar',
                cancel: 'Cancelar'
            }, function () {

                $.ajax({
                    type: 'GET',
                    url: 'ajax.php?controller=User&action=deleteUser',
                    data: { idUsuario: id },
                    beforeSend: function() {
                    },
                    success: function(data) {

                        if (data.status == 'error') {
                            $( "#messageUser" ).fadeOut( "slow", function() {
                                $('#messageUser').html('<div class="alert alert-danger" role="alert">' + data.message + '</div>');
                            });
                        } else {
                            $( "#messageUser" ).fadeOut( "slow", function() {
                                $('#messageUser').html('<div class="alert alert-success" role="alert">' + data.message + '</div>');
                            });
                            window.location.href = "index.php?controller=User&action=index";
                        }
                    },
                    error: function(data) {
                        $( "#messageUser" ).fadeOut( "slow", function() {
                            $('#messageUser').html('<div class="alert alert-danger" role="alert">' + data.message + '</div>');
                        });
                    }
                });
            });
        }));

    });
</script>