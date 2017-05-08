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
        Sesiones
        <!--<small>Optional description</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Datos</a></li>
        <li class="active">Sesiones</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div id="messageSesion"></div>

    <!-- Default box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de Sesiones</h3>
            <button id="newSesion" class="btn btn-primary" style="float: right;">Nueva Sesión</button>
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="tablaSesiones" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Fecha</th>
                    <th>N° Sesion</th>
                    <th>Paciente</th>
                    <th>Profesional</th>
                    <th>Comentario</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php $n = 1; ?>
                <?php foreach ($sesiones as $sesion): ?>
                    <tr data-id="<?php echo $sesion['ID_SESION'] ?>">
                        <td><?php echo $n ?></td>
                        <td><?php echo FormatearFechaSpa($sesion['FECHA']) ?></td>
                        <td><?php echo $sesion['NUMERO_SESION'] ?></td>

                        <?php foreach ($pacientes as $paciente): ?>
                            <?php if($paciente['ID_USUARIO'] == $sesion['ID_PACIENTE']) : ?>
                                    <td><?php echo utf8_encode($paciente['NOMBRE'] . " " .  $paciente['APELLIDO']) ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <?php foreach ($profesionales as $profesional): ?>
                            <?php if($profesional['ID_USUARIO'] == $sesion['ID_PROFESIONAL']) : ?>
                                <td><?php echo utf8_encode($profesional['NOMBRE'] . " " .  $profesional['APELLIDO']) ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <td><?php echo utf8_encode($sesion['COMENTARIO']) ?></td>
                        <td>
                            <button data-original-title="Edit Row" class="btn btn-xs btn-default editSesion">
                                <i class="fa fa-pencil"></i>
                            </button>
                            &nbsp
                            <button data-original-title="Delete" class="btn btn-xs btn-default deleteSesion">
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
                    <th>Fecha</th>
                    <th>N° Sesion</th>
                    <th>Paciente</th>
                    <th>Profesional</th>
                    <th>Comentario</th>
                    <th>Opciones</th>
                </tr>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
    
</section><!-- /.content -->


<script>
    $(function() {
        var table = $("#tablaSesiones").dataTable();

        $("#tablaSesiones").on("click", ".editSesion", (function() {
            var id = $(this).closest('tr').data("id");
            ajax_loadModal($('#modalPrincipal'),
                'ajax.php?controller=User&action=sesionEdit',
                'GET',
                { idSesion: id },
                defaultMessage);
            return false;
        }));

        $("#tablaSesiones").on("click", ".deleteSesion" ,(function () {
            var id = $(this).closest('tr').data("id"); console.debug(id);
            showConfirmation($('#modalConfirmacion'),
            {
                title: '¿ Está seguro ?',
                message: 'Esta acción eliminará la sesión. ¿Está seguro? ',
                ok: 'Eliminar',
                cancel: 'Cancelar'
            }, function () {

                $.ajax({
                    type: 'GET',
                    url: 'ajax.php?controller=User&action=deleteSesion',
                    data: { idUsuario: id },
                    beforeSend: function() {
                    },
                    success: function(data) {

                        if (data.status == 'error') {
                            $( "#messageSesion" ).fadeOut( "slow", function() {
                                $('#messageSesion').html('<div class="alert alert-danger" role="alert">' + data.message + '</div>');
                            });
                        } else {
                            $( "#messageSesion" ).fadeOut( "slow", function() {
                                $('#messageSesion').html('<div class="alert alert-success" role="alert">' + data.message + '</div>');
                            });
                            window.location.href = "index.php?controller=User&action=sesiones";
                        }
                    },
                    error: function(data) {
                        $( "#messageSesion" ).fadeOut( "slow", function() {
                            $('#messageSesion').html('<div class="alert alert-danger" role="alert">' + data.message + '</div>');
                        });
                    }
                });
            });
        }));

        $("#newSesion").click(function() {
            ajax_loadModal($('#modalPrincipal'),
                'ajax.php?controller=User&action=newSesion',
                'GET',
                {  },
                defaultMessage);
            return false;
        });

    });
</script>