<?php
    error_reporting(0);
?>

<!-- =============================================== -->
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo SERVER ?>img/gonzalo_sian.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Usuario: </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU PRINCIPAL</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Módulos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo SERVER ?>modulos/contacto/contacto.php"><i class="fa fa-circle-o"></i>
                            Contacto</a></li>

                    <?php
                        if ($_SESSION['rol']>0) {
                    ?>
                    <li><a href="<?php echo SERVER ?>modulos/contacto/contactoConsulta.php"><i
                                class="fa fa-circle-o"></i> Listado de contactos</a></li>
                    <?php
                        }
                    ?>

                    <li><a href="<?php echo SERVER ?>modulos/login/login.php"><i class="fa fa-circle-o"></i> Login</a>
                    </li>

                    <?php
                        if ($_SESSION['rol']>1) {
                    ?>
                    <li><a href="<?php echo SERVER ?>modulos/usuarios/usuariosConsulta.php"><i
                                class="fa fa-circle-o"></i> Usuarios</a>
                    </li>
                    <?php
                        }
                    ?>

                    <li><a href="<?php echo SERVER ?>modulos/cv/linkedin.php"><i class="fa fa-circle-o"></i>
                            Linkedin</a></li>

                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>