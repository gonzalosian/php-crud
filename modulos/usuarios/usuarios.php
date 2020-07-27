<?php 
session_start();
error_reporting(0);

if (!isset($_SESSION['status']) 
    OR empty($_SESSION['status']) 
    OR is_null($_SESSION['status'])
    OR ($_SESSION['status']=='NULL') 
    OR $_SESSION['rol']==0 ) {
    header("location: ../login/login.php");
}

// Módulo de Login Registrar
  require_once("../../header.php");
  require_once("../../tools/mypathdb.php");
  $id = $_GET['id'];
?>

<style type="text/css">
.form-control {
    display: inline-block;
}
</style>

<!-- <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
<!-- <script src="<?php echo SERVER ?>js/jquery.validate.min.js"></script> -->

<script type="text/javascript" language="javascript">
// PAra la fecha
$(document).ready(function() {
    $("#fechaDesde").datepicker({
        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true,
        autoclose: true,
        yearRange: '2019:2021',
        onSelect: function(dateText, inst) {
            var lockDate = new Date($('#fechaDesde').datepicker('getDate'));
            var lockDateFinal = new Date($('#fechaDesde').datepicker('getDate'));
            lockDate.setDate(lockDate.getDate() + 1);
            lockDateFinal.setDate(lockDateFinal.getDate() + 30);
            $('input#fechaHasta').datepicker('option', 'minDate', lockDate);
            $('input#fechaHasta').datepicker('option', 'maxDate', lockDateFinal);
        }
    });

    $("#fechaHasta").datepicker({
        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true,
        autoclose: true,
        yearRange: '2019:2021'
    });
})

// metodo para cargar el formulario
$("body").on('submit', '#formDefault', function(event) {

    event.preventDefault();

    if ($('#formDefault').valid()) {

        $('#barra').show();

        $.ajax({
            type: "POST",
            url: "usuariosAjax.php?opcion=<?php echo $_GET['opcion'] ?>",
            dataType: "json",
            data: $(this).serialize(),
            success: function(respuesta) {

                $('#barra').hide();

                if (respuesta.error == 1) {
                    $('#error').show();
                    setTimeout(function() {
                        $('#error').hide();
                    }, 3000);
                };
                if (respuesta.error == 2) {
                    $('#error2').show();
                    setTimeout(function() {
                        $('#error2').hide();
                    }, 3000);
                    window.location.href = "../login/login.php";
                };

                if (respuesta.exito == 1) {
                    $('#mensaje').show();
                    setTimeout(function() {
                        $('#mensaje').hide();
                    }, 3000);
                };

                if (respuesta.exito == 2) {
                    $('#mensaje2').show();
                    setTimeout(function() {
                        $('#mensaje2').hide();
                    }, 3000);
                };

            }
        })
    }
})
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Usuario
            <small>Información detallada</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Usuario</a></li>
            <li class="active">Agregar / Modificar</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Por favor complete con su información</h3>
            </div>
            <div class="box-body">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-2">
                        </div>

                        <div class="col-md-8">
                            <div class="list-group" style=" padding-top:30px ">
                                <a href="#" class="list-group-item list-group-item-action active">Datos del Usuario</a>

                                <section id="loginForm" style=" display:show; ">

                                    <div class="list-group-item">
                                        <h4 class="list-group-item-heading">

                                        <?php
                                            $sql = " SELECT * FROM usuarios WHERE id='$id' ";
                                            $resultado = mysqli_query($conn, $sql);
                                            while($data = mysqli_fetch_array($resultado))
                                            {
                                                $usuario = $data['usuario'];
                                                $clave = $data['clave'];
                                                $nombre = utf8_encode($data['nombre']);
                                                $status = $data['status'];
                                                $rol = $data['rol'];
                                                $fechaDesde = $data['fechaDesde'];
                                                $fechaHasta = $data['fechaHasta'];
                                            }
                                            mysqli_close($conn);
                                        ?>
                                            <!-- <form role="form"> -->
                                            <form class="form-horizontal" id="formDefault">
                                                <div class="box-body">
                                                    <div class="box-header with-border">
                                                        <h4 class="box-title">Información personal</h4>
                                                    </div>
                                                    <div class="control-group-inline" style=" padding-top:20px ">
                                                        <input id="id" name="id" type="hidden"
                                                            value="<?php echo $id ?>" />

                                                        <label for="usuario">Usuario:</label>
                                                        <input type="email"
                                                            class="form-control required redondeado padding-top:20px"
                                                            id="usuario" name="usuario" maxlenght="50"
                                                            placeholder="Usuario" title="Usuario" style="width: 300px"
                                                            value="<?php echo $usuario ?>" />

                                                        <label for="clave" style=" padding-left: 20px; ">Clave:</label>
                                                        <input type="password"
                                                            class="form-control required redondeado padding-top:20px"
                                                            id="clave" name="clave" maxlenght="20" placeholder="Clave"
                                                            title="Clave" style="width: 200px"
                                                            value="<?php echo $clave ?>" />
                                                    </div>

                                                    <div class="control-group-inline "
                                                        style="padding-top: 20px; margin-bottom:25px ">
                                                        <label for="nombre">Nombre:</label>
                                                        <input type="text" class="form-control required redondeado"
                                                            id="nombre" name="nombre" maxlenght="50"
                                                            placeholder="Nombre" title="Nombre" style="width: 300px"
                                                            value="<?php echo $nombre ?>" />
                                                    </div>

                                                    <div class="box-header with-border">
                                                        <h3 class="box-title">Datos adicionales</h3>
                                                    </div>

                                                    <div class="control-group-inline" style=" padding-top:20px ">
                                                        <label for="status">Status:</label>

                                                        <select name="status" id="status" style="width: 200px"
                                                            class="form-control redondeado" title="status">
                                                            <?php
                                                    if($status==0 or $status==''){
                                                        echo "<option value='0' selected>Sin verificar</option>";
                                                        echo "<option value='1' >Verificado</option>";
                                                        echo "<option value='2' >Inactivo</option>";
                                                    }
                                                    if($status==1){
                                                        echo "<option value='0' >Sin verificar</option>";
                                                        echo "<option value='1' selected>Verificado</option>";
                                                        echo "<option value='2' >Inactivo</option>";
                                                    }
                                                    if($status==2){
                                                        echo "<option value='0' >Sin verificar</option>";
                                                        echo "<option value='1' >Verificado</option>";
                                                        echo "<option value='2' selected>Inactivo</option>";
                                                    }
                                                    ?>
                                                        </select>

                                                        <label for="rol" style=" padding-left: 20px; ">Roles:</label>

                                                        <select name="rol" id="rol" style="width: 200px"
                                                            class="form-control redondeado" title="rol">
                                                            <?php
                                                    if($rol==0 or $rol==''){
                                                        echo "<option value='0' selected>Usuario</option>";
                                                        echo "<option value='1' >Supervisor</option>";
                                                        echo "<option value='2' >Administrador</option>";
                                                        echo "<option value='3' >Super Admin</option>";
                                                    }
                                                    if($rol==1){
                                                        echo "<option value='0' >Usuario</option>";
                                                        echo "<option value='1' selected>Supervisor</option>";
                                                        echo "<option value='2' >Administrador</option>";
                                                        echo "<option value='3' >Super Admin</option>";
                                                    }
                                                    if($rol==2){
                                                        echo "<option value='0' >Usuario</option>";
                                                        echo "<option value='1' >Supervisor</option>";
                                                        echo "<option value='2' selected>Administrador</option>";
                                                        echo "<option value='3' >Super Admin</option>";
                                                    }
                                                    if($rol==3){
                                                        echo "<option value='0' >Usuario</option>";
                                                        echo "<option value='1' >Supervisor</option>";
                                                        echo "<option value='2' >Administrador</option>";
                                                        echo "<option value='3' selected>Super Admin</option>";
                                                    }
                                                    ?>
                                                        </select>
                                                    </div>

                                                    <div class="control-group-inline" style=" padding-top:20px ">
                                                        <label for="fechaDesde">Fecha desde:</label>
                                                        <i class="fa fa-calendar"></i>
                                                        <input id="fechaDesde" name="fechaDesde" type="text"
                                                            class="form-control required redondeado fecha"
                                                            maxlength="20" style="width: 200px"
                                                            value="<?php echo $fechaDesde ?>"
                                                            title="Fecha de suscripción" onfocus="this.value=' '" >

                                                        <?php
                                                        if ($_SESSION['rol']==3) {
                                                        ?>
                                                        <label for="fechaHasta" style=" padding-left: 20px; ">Fecha
                                                            hasta:</label>
                                                        <i class="fa fa-calendar"></i>
                                                        <input id="fechaHasta" name="fechaHasta" type="text"
                                                            class="form-control required redondeado fecha"
                                                            maxlength="20" style="width: 200px"
                                                            value="<?php echo $fechaHasta ?>"
                                                            title="Fecha de vencimiento" onfocus="this.value=' '">
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>

                                                    <div class="form-group" style=" margin-top:10px ">
                                                        <div class="col-md-12 control">
                                                            <a href="usuariosConsulta.php">
                                                                <button type="button"
                                                                    class="btn btn-default pull-left">Regresar</button>
                                                            </a>
                                                            <button type="submit" class="btn btn-primary pull-right"
                                                                style="margin-bottom:10px" title="Enviar los datos">
                                                                Enviar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="control-group-inline"
                                                style=" text-align: center; display:none; margin-top: 20px;" id="barra">
                                                <img src="<?php echo SERVER ?>img/barra.gif" alt="Cargando..."
                                                    style=" width: 200px "><br>
                                                Enviando datos...
                                            </div>

                                            <div class="alert alert-success mensaje_form"
                                                style=" display: none; margin-top: 20px;" id="mensaje">
                                                <button data-dismiss="alert" class="close" type="button">x</button>
                                                <span class="textmensaje">¡Datos registrados correctamente!</span>
                                            </div>

                                            <div class="alert alert-success mensaje_form"
                                                style=" display: none; margin-top: 20px;" id="mensaje2">
                                                <button data-dismiss="alert" class="close" type="button">x</button>
                                                <span class="textmensaje">¡Datos actualizados correctamente!</span>
                                            </div>

                                            <div class="alert alert-danger mensaje_form"
                                                style=" display: none; margin-top: 20px;" id="error">
                                                <button data-dismiss="alert" class="close" type="button">x</button>
                                                <span class="textmensaje">Error: El usuario ya existe.</span>
                                            </div>

                                            <div class="alert alert-danger mensaje_form"
                                                style=" display: none; margin-top: 20px;" id="error2">
                                                <button data-dismiss="alert" class="close" type="button">x</button>
                                                <span class="textmensaje">Error: No tiene lo permisos necesarios.</span>
                                            </div>
                                        </h4>
                                    </div>
                                </section>

                            </div>
                        </div>

                        <div class="col-md-2">
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php 
  require_once("../../footer.php");
?>