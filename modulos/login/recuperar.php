<?php 
// Módulo de recuperar clave de usuario
  require_once("../../header.php");
?>

<!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
<!-- <script src="<?php echo SERVER ?>js/jquery.validate.min.js"></script> -->

<script type="text/javascript" language="javascript">
// metodo para cargar el formulario
$("body").on('submit', '#formDefault', function(event) {

    event.preventDefault();

    if ($('#formDefault').valid()) {

        $('#barra').show();

        $.ajax({
            type: "POST",
            url: "recuperarAjax.php",
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

                if (respuesta.exito == 1) {
                    $('#mensaje').show();
                    $('#loginForm').hide();
                    $('#loginRecuperarExitoso').show();
                    setTimeout(function() {
                        $('#mensaje').hide();
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
            Login
            <small>Recuperar clave del sistema</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Login</a></li>
            <li class="active">Recuperar clave</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <!-- <div class="box-header with-border">
                <h3 class="box-title">Por favor complete con su información</h3>
            </div> -->
            <div class="box-body">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-4">
                        </div>

                        <div class="col-md-4">
                            <div class="list-group" style=" padding-top:30px ">
                                <a href="#" class="list-group-item list-group-item-action active">Formulario de
                                    recuperación de clave</a>

                                <div class="list-group-item">
                                    Indique su usuario (e-mail)<br><br>
                                </div>

                                <section id="loginForm" style=" display:show; ">

                                    <div class="list-group-item">
                                        <h4 class="list-group-item-heading">

                                            <!-- <form role="form"> -->
                                            <form class="form-horizontal" id="formDefault">

                                                <div class="input-group" style=" margin-bottom:25px ">
                                                    <span class=" input-group-addon redondeado "> <i class="fa fa-user"
                                                            aria-hidden="true"></i> </span>
                                                    <input type="email" class="form-control required redondeado"
                                                        id="usuario" name="usuario" maxlenght="50" placeholder="Usuario"
                                                        title="Usuario" />
                                                </div>

                                                <div class="form-group" style=" margin-top:10px ">
                                                    <div class="col-md-12 control">
                                                        <a href="<?php echo SERVER ?>index.php">
                                                            <button type="button"
                                                                class="btn btn-default pull-left">Cancelar</button>
                                                        </a>
                                                        <button type="submit" class="btn btn-primary pull-right"
                                                            style="margin-bottom:10px" title="Enviar los datos">
                                                            Enviar
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-12 control">
                                                        <div style=" border-top:1px solid#888; padding-top:15px; font-size:14px; "
                                                            align="center">
                                                            ¿Tiene una cuenta?
                                                            <a href="login.php" style="color:blue">Login</a>
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
                                                <span class="textmensaje">¡Datos enviados correctamente!</span>
                                            </div>

                                            <div class="alert alert-danger mensaje_form"
                                                style=" display: none; margin-top: 20px;" id="error">
                                                <button data-dismiss="alert" class="close" type="button">x</button>
                                                <span class="textmensaje">E-mail no registrado</span>
                                            </div>

                                        </h4>
                                    </div>
                                </section>

                                <section id="loginRecuperarExitoso" style="display:none; padding-bottom: 20px">
                                    <!-- <div class="container-fluid" style="background-image: url(../../img/email.png); background-size: cover; 
                                        background-position: right; width: 530px; height: 400px">
                                        <div> -->
                                            <div id="confirm">
                                                <br><br>
                                                <font color="#000000" size="+2">Por favor, revise su correo
                                                    electrónico<br>
                                                    Le hemos enviado su clave para poder ingresar al sistema.<br><br>
                                                </font>
                                                <font color="#000000" size="+1">Es posible que el correo se
                                                    encuentre<br>
                                                    dentro de la bandeja de spam.<br><br>
                                                    El equipo de sistema web.
                                                </font>
                                            </div>
                                        <!-- </div>
                                    </div> -->
                                </section>

                            </div>
                        </div>

                        <div class="col-md-4">
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