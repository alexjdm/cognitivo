<?php
    //Inicio de variables de sesión
    if (!isset($_SESSION)) {
        @session_start();
    }

    include_once("helpers/CommonHelper.php");
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Inscritos <a href="<?php echo "index.php?controller=Curso&action=pagados&idCurso=" . $idCurso ?>"><small>Ir a pagados</small></a></h1>

    <ol class="breadcrumb">
        <li><a href="index.php?controller=Curso&action=index"><i class="fa fa-university" aria-hidden="true"></i> Cursos</a></li>
        <li class="active"><?php echo $curso['NOMBRE_CURSO'] ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div id="messageCurso"></div>

    <!-- Default box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de Inscritos</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <input type="hidden" id="idCurso" value="<?php echo $idCurso ?>">
            <table id="tablaInscritos" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Fecha</th>
                    <th>ID</th>
                    <th>Nombre</th>
                    <!--<th>Rut</th>-->
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Carrera</th>
                    <th>Precio</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php $n = 1; ?>
                <?php foreach ($inscritos as $inscrito): ?>
                    <tr data-id="<?php echo $inscrito['id'] ?>">
                        <th><?php echo $n ?></th>
                        <td><?php echo FormatearFechaCompletaSpa($inscrito['fecha']);?></td>
                        <td><?php echo $inscrito['id_transaccion'] ?></td>
                        <td><?php echo $inscrito['name'] ?></td>
                        <!--<td><?php echo $inscrito['rut'] ?></td>-->
                        <td><?php echo $inscrito['email'] ?></td>
                        <td><?php echo $inscrito['phone'] ?></td>
                        <td><?php echo $inscrito['carrera'] ?></td>
                        <td><?php echo FormatearMonto($inscrito['precio']) ?></td>
                        <td>
                            <button data-original-title="Details" class="btn btn-xs btn-default detalleInscrito">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </button>
                            &nbsp
                            <button data-original-title="Delete" class="btn btn-xs btn-default deleteInscrito">
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
                    <th>ID</th>
                    <th>Nombre</th>
                    <!--<th>Rut</th>-->
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Carrera</th>
                    <th>Precio</th>
                    <th>Opciones</th>
                </tr>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

</section><!-- /.content -->


<script>
    $(function() {

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

        //var table = $("#tablaInscritos").dataTable();
        var table = $("#tablaInscritos").dataTable({
            "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
            "iDisplayLength": -1
        });

        $("#tablaInscritos").on("click", ".detalleInscrito", (function() {
            var id = $(this).closest('tr').data("id"); console.debug(id);
            ajax_loadModal($('#modalPrincipal'),
                'ajax.php?controller=Curso&action=inscritoDetalle',
                'GET',
                { idInscrito: id },
                defaultMessage);
            return false;
        }));

        $("#tablaInscritos").on("click", ".deleteInscrito" ,(function () {
            var id = $(this).closest('tr').data("id"); console.debug(id);
            var idCurso = $('#idCurso').val(); console.debug(idCurso);
            showConfirmation($('#modalConfirmacion'),
            {
                title: '¿ Está seguro ?',
                message: 'Esta acción eliminará el inscrito. ¿Está seguro? ',
                ok: 'Eliminar',
                cancel: 'Cancelar'
            }, function () {

                $.ajax({
                    type: 'GET',
                    url: 'ajax.php?controller=Curso&action=deleteInscrito',
                    data: { idInscrito: id },
                    beforeSend: function() {
                    },
                    success: function(returnedData) {
                        //var returnedData = JSON.parse(data); console.debug(returnedData);
                        if (returnedData.status == 'error') {
                            $('#messageCurso').html('<div class="alert alert-danger" role="alert">' + returnedData.message + '</div>');
                        } else {
                            $('#messageCurso').html('<div class="alert alert-success" role="alert">' + returnedData.message + '</div>');
                            window.location.href = "index.php?controller=Curso&action=inscritos&idCurso="+idCurso;
                        }
                    },
                    error: function(data) {
                        var returnedData = JSON.parse(data); console.debug(returnedData);
                        $('#messageCurso').html('<div class="alert alert-danger" role="alert">' + returnedData.message + '</div>');
                    }
                });
            });
        }));

        $('#newCursoBtn').click(function(){
            var e = 'ajax.php?controller=Curso&action=createNewCurso'; console.debug(e);
            var nombre = $("#nombre").val(); console.debug(nombre);
            var fecha = $("#fecha").val(); console.debug(fecha);

            if(nombre == '' || fecha == '')
            {
                $('#messageNewCurso').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong> Debes llenar todos los campos.</div>');
            }
            else
            {
                $.ajax({
                    type: 'GET',
                    url: e,
                    data: { nombre: nombre, fecha: fecha },
                    dataType : "json",
                    beforeSend: function () {
                        $('#newCursoBtn').html("Cargando...");
                    },
                    success: function (data) {
                        console.debug("success");
                        console.debug(data);
                        //var returnedData = JSON.parse(data); console.debug(returnedData);
                        if(data.status == "success"){
                            $('#messageNewCurso').html('<div class="alert alert-success" role="alert"><strong>Listo! </strong>' + data.message + '</div>');
                            $('#newCursoBtn').html('Agregar');
                            window.location.href = "index.php?controller=Curso&action=index";
                        }
                        else{
                            $('#newCursoBtn').html("Agregar");
                            $('#messageNewCurso').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong>' + data.message + '</div>');
                        }
                        return false;
                    },
                    error: function (data) {
                        console.debug("error");
                        console.debug(data);
                        //var returnedData = JSON.parse(data); console.debug(returnedData);
                        $('#newCursoBtn').html("Agregar");
                        $('#messageNewCurso').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong>' + data.message + '</div>');
                        return false;
                    }
                });
            }

            return false;
        });

        $("#cleanDataCursoBtn").click(function() {
            $(this).closest('form').find("input[type=text], textarea").val("");
            return false;
        });

    });
</script>