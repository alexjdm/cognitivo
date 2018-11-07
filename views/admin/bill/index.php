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
        Detalle diario
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Detalle diario</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div id="messageCurso"></div>

    <div class="row">

        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Agregar ingreso/egreso</h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-12" for="fecha">Fecha</label>
                                <div class="col-sm-12">
                                    <input type="text" id="fecha" class="form-control" name="fecha" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12" for="tipoFlujo">Tipo Flujo</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="tipoFlujo">
                                        <option value="1" selected>Ingreso</option>
                                        <option value="0">Egreso</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12" for="detalle">Detalle</label>
                                <div class="col-sm-12">
                                    <input type="text" id="detalle" name="detalle" class="form-control" placeholder="Ingrese una descripción del movimiento" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12" for="idProfesional">Profesional</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="idProfesional">
                                        <?php foreach ($profesionales as $profesional): ?>
                                            <option value="<?php echo $profesional['ID_USUARIO']; ?>"><?php echo utf8_encode($profesional['NOMBRE'] . " " . $profesional['APELLIDO']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12" for="idPaciente">Paciente</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="idPaciente">
                                        <?php foreach ($pacientes as $paciente): ?>
                                            <option value="<?php echo $paciente['ID_USUARIO']; ?>"><?php echo utf8_encode($paciente['NOMBRE'] . " " . $paciente['APELLIDO']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12" for="detalle">Monto</label>
                                <div class="col-sm-12">
                                    <input type="text" id="monto" name="monto" class="form-control" placeholder="" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12" for="tipoPago">Tipo Pago</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="tipoPago">
                                        <option value="1" selected>Efectivo</option>
                                        <option value="0">Trasferencia</option>
                                    </select>
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
                    <h3 class="box-title">Flujo de caja</h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                    <table id="tablaDetalle" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>N°</th>
                            <th>Fecha</th>
                            <th>Tipo Flujo</th>
                            <th>Detalle</th>
                            <th>Profesional</th>
                            <th>Paciente</th>
                            <th>Monto</th>
                            <th>Tipo Pago</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $n = 1; ?>
                        <?php foreach ($detalles as $detalle): ?>
                            <tr data-id="<?php echo $detalle['ID_DETALLE'] ?>">
                                <th><?php echo $n ?></th>
                                <td><?php echo FormatearFechaSpa($detalle['FECHA']);?></td>
                                <td><?php echo $detalle['TIPO_FLUJO'] ?></td>
                                <td><?php echo $detalle['DETALLE'] ?></td>
                                <td><?php echo $detalle['ID_PROFESIONAL'] ?></td>
                                <td><?php echo $detalle['ID_PACIENTE'] ?></td>
                                <td><?php echo $detalle['MONTO'] ?></td>
                                <td><?php echo $detalle['TIPO_PAGO'] ?></td>
                                <td>
                                    <button title="Editar" class="btn btn-xs btn-default editDetalle">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    &nbsp
                                    <button title="Eliminar" class="btn btn-xs btn-default deleteCurso">
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
                            <th>Tipo Flujo</th>
                            <th>Detalle</th>
                            <th>Profesional</th>
                            <th>Paciente</th>
                            <th>Monto</th>
                            <th>Tipo Pago</th>
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

        $("#fecha").val(moment());

        var table = $("#tablaDetalle").dataTable();

        $("#tablaDetalle").on("click", ".editDetalle", (function() {
            var id = $(this).closest('tr').data("id"); console.debug(id);
            ajax_loadModal($('#modalPrincipal'),
                'admin/cursoedit/',
                'POST',
                { idCurso: id },
                defaultMessage);
            return false;
        }));

        $("#tablaDetalle").on("click", ".deleteCurso" ,(function () {
            var id = $(this).closest('tr').data("id"); console.debug(id);
            showConfirmation($('#modalConfirmacion'),
            {
                title: '¿ Está seguro ?',
                message: 'Esta acción eliminará el curso. ¿Está seguro? ',
                ok: 'Eliminar',
                cancel: 'Cancelar'
            }, function () {

                $.ajax({
                    type: 'POST',
                    url: 'admin/deletecurso/',
                    data: { idCurso: id },
                    beforeSend: function() {
                    },
                    success: function(data) {
                        var returnedData = JSON.parse(data); console.debug(returnedData);
                        if (returnedData.status === 'error') {
                            $('#messageCurso').html('<div class="alert alert-danger" role="alert">' + returnedData.message + '</div>');
                        } else {
                            $('#messageCurso').html('<div class="alert alert-success" role="alert">' + returnedData.message + '</div>');
                            window.location.href = "admin/cursos/";
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

        $("#tablaDetalle").on("click", ".detalleCurso", (function() {
            var id = $(this).closest('tr').data("id"); console.debug(id);
            //window.location.href = "admin/inscritos/index.php?idCurso="+id;

            var f = document.createElement('form');
            f.action='admin/inscritos/';
            f.method='POST';
            //f.target='_blank';

            var i=document.createElement('input');
            i.type='hidden';
            i.name='idCurso';
            i.id ='idCurso';
            i.value=id;
            f.appendChild(i);

            document.body.appendChild(f);
            f.submit();

            return false;
        }));

        $("#tablaDetalle").on("click", ".pagadosCurso", (function() {
            var id = $(this).closest('tr').data("id"); console.debug(id);
            //window.location.href = "admin/pagados/index.php?idCurso="+id;

            var f = document.createElement('form');
            f.action='admin/pagados/';
            f.method='POST';
            //f.target='_blank';

            var i=document.createElement('input');
            i.type='hidden';
            i.name='idCurso';
            i.id ='idCurso';
            i.value=id;
            f.appendChild(i);

            document.body.appendChild(f);
            f.submit();

            return false;
        }));

    });
</script>