<?php
    //Inicio de variables de sesión
    if (!isset($_SESSION)) {
        @session_start();
    }

    include_once("helpers/CommonHelper.php");
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Inscritos <a href="<?php echo "index.php?controller=admin&action=pagados&idCurso=" . $idCurso ?>"><small>Ir a pagados</small></a></h1>

    <ol class="breadcrumb">
        <li><a href="admin/cursos/"><i class="fa fa-university" aria-hidden="true"></i> Cursos</a></li>
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
                    <th>Comuna</th>
                    <th>Precio</th>
                    <th>Pagado</th>
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
                        <td><?php echo $inscrito['COMUNA'] ?></td>
                        <td><?php echo FormatearMonto($inscrito['precio']) ?></td>
                        <td><?php echo $inscrito['pagado'] ?></td>
                        <td>
                            <button title="Detalle" class="btn btn-xs btn-default detalleInscrito">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </button>
                            &nbsp
                            <button title="Eliminar" class="btn btn-xs btn-default deleteInscrito">
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
                    <th>Comuna</th>
                    <th>Precio</th>
                    <th>Pagado</th>
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
                'admin/inscritodetalle/',
                'POST',
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
                    type: 'POST',
                    url: 'admin/deleteinscrito/',
                    data: { idInscrito: id },
                    beforeSend: function() {
                    },
                    success: function(returnedData) {
                        //var returnedData = JSON.parse(data); console.debug(returnedData);
                        if (returnedData.status === 'error') {
                            $('#messageCurso').html('<div class="alert alert-danger" role="alert">' + returnedData.message + '</div>');
                        } else {
                            $('#messageCurso').html('<div class="alert alert-success" role="alert">' + returnedData.message + '</div>');
                            //window.location.href = "admin/inscritos/idCurso="+idCurso;

                            var f = document.createElement('form');
                            f.action='admin/inscritos/';
                            f.method='POST';
                            //f.target='_blank';

                            var i=document.createElement('input');
                            i.type='hidden';
                            i.name='idCurso';
                            i.id ='idCurso';
                            i.value=idCurso;
                            f.appendChild(i);

                            document.body.appendChild(f);
                            f.submit();
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
            var e = 'admin/createnewcurso/'; console.debug(e);
            var nombre = $("#nombre").val(); console.debug(nombre);
            var fecha = $("#fecha").val(); console.debug(fecha);

            if(nombre === '' || fecha === '')
            {
                $('#messageNewCurso').html('<div class="alert alert-danger" role="alert"><strong>Error! </strong> Debes llenar todos los campos.</div>');
            }
            else
            {
                $.ajax({
                    type: 'POST',
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
                            window.location.href = "admin/cursos/";
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