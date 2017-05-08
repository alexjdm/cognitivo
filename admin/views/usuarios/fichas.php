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
        Pacientes
        <!--<small>Optional description</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Datos</a></li>
        <li class="active">Pacientes</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div id="messagePaciente"></div>

    <!-- Default box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de Pacientes</h3>
            <button id="nuevoPaciente" class="btn btn-primary" style="float: right;">Nuevo Paciente</button>
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="tablaPacientes" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha Nacimiento</th>
                    <th>Email</th>
                    <th>Telefono 1</th>
                    <th>Telefono 2</th>
                    <th>Dirección</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php $n = 1; ?>
                <?php foreach ($pacientes as $paciente): ?>
                    <tr data-id="<?php echo $paciente['ID_USUARIO'] ?>">
                        <th><?php echo $n ?></th>
                        <td><?php echo utf8_encode($paciente['NOMBRE']) ?></td>
                        <td><?php echo utf8_encode($paciente['APELLIDO']) ?></td>
                        <td><?php echo $paciente['FECHA_NACIMIENTO'] ?></td>
                        <td><?php echo $paciente['CORREO_ELECTRONICO'] ?></td>
                        <td><?php echo $paciente['TELEFONO1'] ?></td>
                        <td><?php echo $paciente['TELEFONO2'] ?></td>
                        <td><?php echo utf8_encode($paciente['DIRECCION']) ?></td>
                        <td>
                            <button title="Editar Paciente" class="btn btn-xs btn-default editPaciente">
                                <i class="fa fa-pencil"></i>
                            </button>
                            &nbsp
                            <button title="Agregar Apoderado" class="btn btn-xs btn-default addApoderado">
                                <i class="fa fa-user-plus"></i>
                            </button>
                            <?php if(isSuperAdmin()) : ?>
                            &nbsp
                            <button title="Eliminar" class="btn btn-xs btn-default deletePaciente">
                                <i class="fa fa-times"></i>
                            </button>
                            <?php endif ?>
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
                    <th>Fecha Nacimiento</th>
                    <th>Email</th>
                    <th>Telefono 1</th>
                    <th>Telefono 2</th>
                    <th>Dirección</th>
                    <th>Opciones</th>
                </tr>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
    
</section><!-- /.content -->


<script>
    $(function() {
        var table = $("#tablaPacientes").dataTable();

        $("#tablaPacientes").on("click", ".editPaciente", (function() {
            var id = $(this).closest('tr').data("id"); console.debug(id);
            ajax_loadModal($('#modalPrincipal'),
                'ajax.php?controller=User&action=userEdit',
                'GET',
                { vista: "fichas", idUsuario: id },
                defaultMessage);
            return false;
        }));

        $("#tablaPacientes").on("click", ".deletePaciente" ,(function () {
            var id = $(this).closest('tr').data("id"); console.debug(id);
            showConfirmation($('#modalConfirmacion'),
            {
                title: '¿ Está seguro ?',
                message: 'Esta acción eliminará al paciente. ¿Está seguro? ',
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
                            $( "#messagePaciente" ).fadeOut( "slow", function() {
                                $('#messagePaciente').html('<div class="alert alert-danger" role="alert">' + data.message + '</div>');
                            });
                        } else {
                            $( "#messagePaciente" ).fadeOut( "slow", function() {
                                $('#messagePaciente').html('<div class="alert alert-success" role="alert">' + data.message + '</div>');
                            });
                            window.location.href = "index.php?controller=User&action=index";
                        }
                    },
                    error: function(data) {
                        $( "#messagePaciente" ).fadeOut( "slow", function() {
                            $('#messagePaciente').html('<div class="alert alert-danger" role="alert">' + data.message + '</div>');
                        });
                    }
                });
            });
        }));

        $("#nuevoPaciente").click(function() {
            ajax_loadModal($('#modalPrincipal'),
                'ajax.php?controller=User&action=newUser',
                'GET',
                { vista: "fichas", addApoderado: "false" },
                defaultMessage);
            return false;
        });

        $("#tablaPacientes").on("click", ".addApoderado", (function() {
            var id = $(this).closest('tr').data("id");
            ajax_loadModal($('#modalPrincipal'),
                'ajax.php?controller=User&action=newUser',
                'GET',
                { vista: "fichas", addApoderado: "true", idPaciente: id },
                defaultMessage);
            return false;
        }));

    });
</script>