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
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
            <li class="<?php if($controller=='Home'){ echo 'active'; } ?>"><a href="index.php?controller=Home&action=index"><i class="fa fa-area-chart"></i> <span>Inicio</span></a></li>

            <li class="treeview <?php if($controller=='User' && $action != 'profesionales' && $action != 'contacto'){ echo 'active'; } ?>">
                <a href="#"><i class="fa fa-users"></i> <span>Pacientes</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu <?php if($controller=='User'){ echo 'menu-open'; } ?>">
                    <li class="<?php if($action=='fichas'){ echo 'active'; } ?>"><a href="index.php?controller=User&action=fichas">Fichas</a></li>
                    <!--<li class="<?php if($action=='newPaciente'){ echo 'active'; } ?>"><a href="index.php?controller=Paciente&action=newPaciente">Agregar Nuevo Paciente</a></li>-->
                    <li class="<?php if($action=='sesiones'){ echo 'active'; } ?>"><a href="index.php?controller=User&action=sesiones">Sesiones</a></li>
                </ul>
            </li>

            <li class="treeview <?php if( ($controller=='User' && $action=='contacto') || $controller=='Horas'){ echo 'active'; } ?>">
                <a href="#"><i class="fa fa-address-book-o"></i> <span>Agenda</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu <?php if($controller=='User' || $controller=='Horas'){ echo 'menu-open'; } ?>">
                    <li class="<?php if($action=='contacto'){ echo 'active'; } ?>"><a href="index.php?controller=User&action=contacto">Contacto pacientes</a></li>
                    <li class="<?php if($action=='horas'){ echo 'active'; } ?>"><a href="index.php?controller=Horas&action=horas">Horas</a></li>
                </ul>
            </li>

            <li class="treeview <?php if($controller=='User' && $action == 'profesionales'){ echo 'active'; } ?>"><a href="index.php?controller=User&action=profesionales"><i class="fa fa-user-circle" aria-hidden="true"></i> <span>Profesionales</span></a></li>

            <li class="treeview <?php if($controller=='Finanzas'){ echo 'active'; } ?>">
                <a href="#"><i class="fa fa-line-chart"></i> <span>Finanzas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu <?php if($controller=='Finanzas'){ echo 'menu-open'; } ?>">
                    <li class="<?php if($action=='boletas'){ echo 'active'; } ?>"><a href="index.php?controller=Finanzas&action=boletas">Boletas</a></li>
                    <li class="<?php if($action=='remuneraciones'){ echo 'active'; } ?>"><a href="index.php?controller=Finanzas&action=remuneraciones">Remuneraciones</a></li>
                    <li class="<?php if($action=='ganancias'){ echo 'active'; } ?>"><a href="index.php?controller=Finanzas&action=ganancias">Ganancias</a></li> <!-- Este debe tener privilegios de perfil superAdmin-->
                </ul>
            </li>


            <li class="treeview <?php if($controller=='Curso'){ echo 'active'; } ?>"><a href="index.php?controller=Curso&action=index"><i class="fa fa-university" aria-hidden="true"></i> <span>Cursos</span></a></li>

            <!--<li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>-->
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
