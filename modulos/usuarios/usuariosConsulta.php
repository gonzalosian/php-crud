<?php 
// Módulo de usuario consulta
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

<script type="text/javascript" language="javascript">
// Función valor iconos: determina a que icono le hicieron click
function valorIconos(id) {
    $('#ErrorBoton').hide();
    $('#editar').attr("onclick", "Modificar('" + id + "') ");
    $('#eliminar').attr("onclick", "Eliminar('" + id + "') ");
};
// Función error boton
function Error() {
    $('#ErrorBoton').show();
};

// Función Modificar
function Modificar(id) {
    window.location.href = "usuarios.php?opcion=modificar&id=" + id;
};

// Función Eliminar
function Eliminar(id) {
    bootbox.confirm("¿Está seguro de eliminar este registro?", function(result) {
        if (result) {
            $('#barra').show();
            $.ajax({
                type: "POST",
                url: "usuariosAjax.php?opcion=eliminar&id=" + id,
                dataType: "json",
                data: $(this).serialize(),
                success: function(respuesta) {
                    $('#barra').hide();
                    if (respuesta.error == 1) {
                        $('#error').show();
                        setTimeout(function() {
                            $('#error').hide();
                        }, 3000);
                    }

                    if (respuesta.exito == 1) {
                        $('#mensaje').show();
                        setTimeout(function() {
                            $('#mensaje').hide();
                            // window.location.href = "usuariosConsulta.php";
                            var table = $('#example1').DataTable();
                            table.row(data).remove().draw(false);
                        }, 3000);
                    }
                }
            });
        }
    })
}
</script>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Contacto
            <small>Consulta de Usuarios</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Usuarios</a></li>
            <li class="active">Listado</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Consulta de Usuarios</h3>
                <a href="usuarios.php?opcion=agregar">
                    <button type="button" class="btn btn-info redondeado" style="float: right;"
                        title="Agregar nuevo registro">Agregar</button>
                </a>
            </div>

            <div class="box-body">
                <!-- Contenido de la tabla -->
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <td colspan="9" style="text-align: right;">
                                <span class="alert alert-danger" id="ErrorBoton"
                                    style="display: none; float-size: 15px; float: left;">
                                    Por favor seleccione el registro que desee modificar o eliminar.
                                </span>
                                <span style="margin-right: 10px;">
                                    <i class="fa fa-edit fa-2x" onclick="Error();" id="editar" style="cursor: pointer;"
                                        title="Modificar"></i>
                                </span>
                                <span style="margin-right: 10px;">
                                    <i class="fa fa-trash fa-2x" onclick="Error();" id="eliminar"
                                        style="cursor: pointer;" title="Eliminar"></i>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Clave</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Status</th>
                            <th scope="col">Rol</th>
                            <th style="text-align: center; width: 10px">Seleccionar</th>
                        </tr>
                    </thead>

                    <tbody>

                        <div class="alert alert-success mensaje_form" style=" display: none; margin-top: 20px;"
                            id="mensaje">
                            <button data-dismiss="alert" class="close" type="button">x</button>
                            <span class="textmensaje">¡Datos borrados correctamente!</span>
                        </div>

                        <?php
                            $sql = " SELECT * FROM usuarios ";
                            $resultado = mysqli_query($conn, $sql);
                            while($data = mysqli_fetch_array($resultado))
                            {
                                $id = $data['id'];
                                $usuario = $data['usuario'];
                                $clave = $data['clave'];
                                $nombre = utf8_encode($data['nombre']);
                                $status = $data['status'];
                                $rol = $data['rol'];

                                switch ($status) {
                                    case 0:
                                        $status = 'Sin verificar';
                                        break;
                                    case 1:
                                        $status = 'Verificado';
                                        break;
                                    case 2:
                                        $status = 'Inactivo';
                                        break;                                    
                                    default:
                                        $status = 'Sin verificar';
                                        break;
                                }

                                switch ($rol) {
                                    case 0:
                                        $rol = 'Usuario';
                                        break;
                                    case 1:
                                        $rol = 'Supervisor';
                                        break;
                                    case 2:
                                        $rol = 'Administrador';
                                        break;
                                    case 3:
                                        $rol = 'SuperAdmin';
                                        break;
                                    default:
                                        $rol = 'Usuario';
                                        break;
                                }
                        ?>
                        <tr>
                            <th scope="row"> <?php echo $id ?> </th>
                            <td> <?php echo $usuario ?> </td>
                            <td> <?php echo $clave ?> </td>
                            <td> <?php echo $nombre ?> </td>
                            <td> <?php echo $status ?> </td>
                            <td> <?php echo $rol ?> </td>
                            <td style="text-align: center;">
                                <input type="radio" name="id_seleccion" id="id_seleccion" value="<?php echo $id ?>"
                                    onclick="valorIconos(this.value)">
                            </td>
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