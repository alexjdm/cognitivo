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
        Profesionales
        <!--<small>Optional description</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Datos</a></li>
        <li class="active">Profesionales</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div id="messageUser"></div>

    <!-- Default box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de Profesionales</h3>
            <button id="newProfesional" class="btn btn-primary" style="float: right;">Nuevo Profesional</button>
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="tablaProfesionales" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Especialidad</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php $n = 1; ?>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr data-id="<?php echo $usuario['ID_USUARIO'] ?>">
                        <th><?php echo $n ?></th>
                        <td><?php echo utf8_encode($usuario['NOMBRE']) ?></td>
                        <td><?php echo utf8_encode($usuario['APELLIDO']) ?></td>
                        <td>
                            <?php
                            foreach ($especialidades as $especialidad):
                                if($especialidad['ID_ESPECIALIDAD'] == $usuario['ESPECIALIDAD']):
                                    echo utf8_encode($especialidad['NOMBRE']);
                                    break;
                                endif;
                            endforeach;
                            ?>
                        </td>
                        <td><?php echo $usuario['CORREO_ELECTRONICO'] ?></td>
                        <td><?php echo $usuario['TELEFONO1'] ?></td>
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
                <?php $n++; ?>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Especialidad</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Opciones</th>
                </tr>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
    
</section><!-- /.content -->


<script>
    $(function() {
        var table = $("#tablaProfesionales").dataTable();

        $("#tablaProfesionales").on("click", ".editUser", (function() {
            var id = $(this).closest('tr').data("id"); console.debug(id);
            ajax_loadModal($('#modalPrincipal'),
                'ajax.php?controller=User&action=userEdit',
                'GET',
                { idUsuario: id, vista: "profesionales" },
                defaultMessage);
            return false;
        }));

        $("#tablaProfesionales").on("click", ".deleteUser" ,(function () {
            var id = $(this).closest('tr').data("id"); console.debug(id);
            showConfirmation($('#modalConfirmacion'),
            {
                title: '¿ Está seguro ?',
                message: 'Esta acción eliminará el profesional. ¿Está seguro? ',
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
                            window.location.href = "index.php?controller=User&action=profesionales";
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

        $("#newProfesional").click(function() {
            ajax_loadModal($('#modalPrincipal'),
                'ajax.php?controller=User&action=newUser',
                'GET',
                { vista: "profesionales" },
                defaultMessage);
            return false;
        });

    });
</script>