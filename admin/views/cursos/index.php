<?php
    //Inicio de variables de sesión
    if (!isset($_SESSION)) {
        @session_start();
    }

    include_once("helpers/CommonHelper.php");
?>

<style>
    .descripcionTA {
        resize: none;
        height: 100px;
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cursos
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Cursos</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div id="messageCurso"></div>

    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Agregar Curso</h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-12" for="nombre">Nombre</label>
                                <div class="col-sm-12">
                                    <input class="form-control" id="nombre" type="text" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12" for="fecha">Fecha</label>
                                <div class="col-sm-12">
                                    <input type="text" id="fecha" class="form-control" name="fecha" />
                                </div>
                            </div>

                            <div id="messageNewCurso" style="margin: 20px;"></div>

                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <a id="cleanDataCursoBtn" class="btn btn-default">Limpiar</a>
                            <a id="newCursoBtn" class="btn btn-primary pull-right">Agregar</a>
                        </div><!-- /.box-footer -->
                    </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>

        <div class="col-md-8">
            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de Cursos</h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                    <table id="tablaCursos" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>N°</th>
                            <th>Fecha</th>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $n = 1; ?>
                        <?php foreach ($cursos as $curso): ?>
                            <tr data-id="<?php echo $curso['ID_CURSO'] ?>">
                                <th><?php echo $n ?></th>
                                <td><?php echo FormatearFechaSpa($curso['FECHA_CURSO']);?></td>
                                <td><?php echo $curso['NOMBRE_CURSO'] ?></td>
                                <td>
                                    <button data-original-title="Details" class="btn btn-xs btn-default detalleCurso">
                                        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                    </button>
                                    &nbsp
                                    <button data-original-title="Pagados" class="btn btn-xs btn-default pagadosCurso">
                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                    </button>
                                    &nbsp
                                    <button data-original-title="Edit Row" class="btn btn-xs btn-default editCurso">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    &nbsp
                                    <button data-original-title="Delete" class="btn btn-xs btn-default deleteCurso">
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
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                        </tfoot>
                    </table>
                    <button class="btn btn-primary" id="save" style="float:right;">Guardar</button>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>

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

        var table = $("#tablaCursos").dataTable();

        $("#tablaCursos").on("click", ".editCurso", (function() {
            var id = $(this).closest('tr').data("id"); console.debug(id);
            ajax_loadModal($('#modalPrincipal'),
                'ajax.php?controller=Curso&action=cursoEdit',
                'GET',
                { idCurso: id },
                defaultMessage);
            return false;
        }));

        $("#tablaCursos").on("click", ".deleteCurso" ,(function () {
            var id = $(this).closest('tr').data("id"); console.debug(id);
            showConfirmation($('#modalConfirmacion'),
            {
                title: '¿ Está seguro ?',
                message: 'Esta acción eliminará el curso. ¿Está seguro? ',
                ok: 'Eliminar',
                cancel: 'Cancelar'
            }, function () {

                $.ajax({
                    type: 'GET',
                    url: 'ajax.php?controller=Curso&action=deleteCurso',
                    data: { idCurso: id },
                    beforeSend: function() {
                    },
                    success: function(data) {
                        var returnedData = JSON.parse(data); console.debug(returnedData);
                        if (returnedData.status == 'error') {
                            $('#messageCurso').html('<div class="alert alert-danger" role="alert">' + returnedData.message + '</div>');
                        } else {
                            $('#messageCurso').html('<div class="alert alert-success" role="alert">' + returnedData.message + '</div>');
                            window.location.href = "index.php?controller=Curso&action=index";
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

        $("#tablaCursos").on("click", ".detalleCurso", (function() {
            var id = $(this).closest('tr').data("id"); console.debug(id);
            window.location.href = "index.php?controller=Curso&action=inscritos&idCurso="+id;
            return false;
        }));

        $("#tablaCursos").on("click", ".pagadosCurso", (function() {
            var id = $(this).closest('tr').data("id"); console.debug(id);
            window.location.href = "index.php?controller=Curso&action=pagados&idCurso="+id;
            return false;
        }));

    });
</script>