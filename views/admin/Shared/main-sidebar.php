<?php
/**
 * Created by PhpStorm.
 * User: alexj
 * Date: 30-03-2016
 * Time: 0:32
 */
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/admin/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?></p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menú</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="<?php if($controller=='admin' && $action == 'home'){ echo 'active'; } ?>"><a href="admin/home/"><i class="fa fa-area-chart"></i> <span>Inicio</span></a></li>

            <li class="treeview <?php if($controller=='user' && $action == 'profesionales'){ echo 'active'; } ?>"><a href="user/profesionales/"><i class="fa fa-user-circle" aria-hidden="true"></i> <span>Profesionales</span></a></li>


            <li class="treeview <?php if($controller=='admin' && ($action=='cursos' || $action=='inscritos' || $action=='pagados')  ){ echo 'active'; } ?>"><a href="admin/cursos/"><i class="fa fa-university" aria-hidden="true"></i> <span>Cursos</span></a></li>

            <!--<li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>-->
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
