<?php 
// Módulo de contacto consulta
session_start();
error_reporting(0);

if (!isset($_SESSION['status']) 
    OR empty($_SESSION['status']) 
    OR is_null($_SESSION['status'])
    OR ($_SESSION['status']=='NULL') 
    OR $_SESSION['rol']==0 ) {
    header("location: ../login/login.php");
}

include("../../header.php");
//  Introducir los datos en la tabla de contactos 
require_once('../../tools/mypathdb.php');
?>

<script type="text/javascript" language="JavaScript">
  $(document).ready(function() {  
    //permite conocer cual es la fila seleccionada de la tabla
    var table = $('#example1').DataTable(); 
    $('#example1 tbody').on( 'click', 'tr', function () {
      data=table.row( this ).index(); 
      var info = table.page.info(); //obtengo el numero de pagina.      
    } );    
  }); 
</script>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Contacto
            <small>Consulta de Clientes</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Contactos</a></li>
            <li class="active">Listado</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Consulta de Contactos</h3>
            </div>

            <div class="box-body">
                <!-- Contenido de la tabla -->
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Teléfono</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                            $sql = " SELECT * FROM contactos ";
                            $resultado = mysqli_query($conn, $sql);
                            while($data = mysqli_fetch_array($resultado))
                            {
                                $id = $data['id'];
                                $nombre = utf8_encode($data['nombre']);
                                $correo = $data['correo'];
                                $telefono = $data['telefono'];
                        
                        ?>
                            <tr>
                                <th scope="row"> <?php echo $id ?> </th>
                                <td> <?php echo $nombre ?> </td>
                                <td> <?php echo $correo ?> </td>
                                <td> <?php echo $telefono ?> </td>
                            </tr>
                        <?php 
                            }
                            mysqli_close($conn);
                        ?>

                    </tbody>
                </table>
                <!-- Fin contenido de la tabla -->
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer">
                Footer
            </div> -->
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php 
  require_once("../../footer.php");
?>