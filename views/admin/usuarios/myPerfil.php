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
        Usuarios
        <!--<small>Optional description</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Datos</a></li>
        <li class="active">Mi Perfil</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Mi Perfil</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="nombre">Nombre</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="nombre" type="text" placeholder="Nombre">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="apellido">Apellido</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="apellido" type="text" placeholder="Apellido">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="email">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="email" type="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="userSkype">Usuario Skype</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="userSkype" type="text" placeholder="Usuario Skype">
                    </div>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button class="btn btn-info pull-right" type="submit">Actualizar</button>
            </div><!-- /.box-footer -->
        </form>
    </div>

</section><!-- /.content -->