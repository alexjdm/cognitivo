<?php
    //Inicio de variables de sesión
    if (!isset($_SESSION)) {
        @session_start();
    }

    include_once("helpers/CommonHelper.php");
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Pagados
        <a href="<?php echo "index.php?controller=Curso&action=inscritos&idCurso=" . $idCurso ?>"><small>Ir a inscritos</small></a>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php?controller=Curso&action=index"><i class="fa fa-university" aria-hidden="true"></i> Cursos</a></li>
        <li class="active"><?php echo $curso['NOMBRE_CURSO'] ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-edit"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Pendientes</span>
                    <span class="info-box-number"><?php echo count($pendientes); ?></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Pagados</span>
                    <span class="info-box-number"><?php echo count($pagados); ?></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-usd"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Recaudado</span>
                    <span class="info-box-number"><?php echo FormatearMonto($recaudacion) ?></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-calendar"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Evento</span>
                    <span class="info-box-number"><?php if($diferencia_dias > 0) { echo $diferencia_dias ." días"; } else { echo "Finalizado"; } ?> </span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de Pagados</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="tablaPagados" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>Rut</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Carrera</th>
                    <th>Precio</th>
                </tr>
                </thead>
                <tbody>
                <?php $n = 1; ?>
                <?php foreach ($pagados as $pagado): ?>
                    <tr data-id="<?php echo $pagado['id'] ?>">
                        <th><?php echo $n ?></th>
                        <td><?php echo FormatearFechaCompletaSpa($pagado['fecha']);?></td>
                        <td><?php echo $pagado['name'] ?></td>
                        <td><?php echo $pagado['rut'] ?></td>
                        <td><?php echo $pagado['email'] ?></td>
                        <td><?php echo $pagado['phone'] ?></td>
                        <td><?php echo $pagado['carrera'] ?></td>
                        <td><?php echo FormatearMonto($pagado['precio']) ?></td>
                    </tr>
                    <?php $n++; ?>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>N°</th>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>Rut</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Carrera</th>
                    <th>Precio</th>
                </tr>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

</section><!-- /.content -->


<script>
    $(function() {

        //var table = $("#tablaPagados").dataTable();
        var table = $("#tablaPagados").dataTable({
            "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
            "iDisplayLength": -1
        });

    });
</script>