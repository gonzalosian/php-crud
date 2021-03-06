<?php 
// Módulo de Login
  require_once("../../header.php");
?>

<!-- <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
<!-- <script src="<?php echo SERVER ?>js/jquery.validate.min.js"></script> -->

<script type="text/javascript" language="javascript">
// metodo para cargar el formulario
$("body").on('submit', '#formDefault', function(event) {

    event.preventDefault();

    if ($('#formDefault').valid()) {

        $('#barra').show();

        $.ajax({
            type: "POST",
            url: "loginAjax.php",
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

                if (respuesta.error == 2) {
                    $('#error2').show();
                    setTimeout(function() {
                        $('#error2').hide();
                    }, 3000);
                }

                if (respuesta.error == 3) {
                    $('#error3').show();
                    setTimeout(function() {
                        $('#error3').hide();
                    }, 3000);
                }

                if (respuesta.error == 4) {
                    $('#error4').show();
                    setTimeout(function() {
                        $('#error4').hide();
                    }, 3000);
                }

                if (respuesta.exito == 1) {
                    $('#mensaje').show();
                    $('#loginForm').hide();
                    setTimeout(function() {
                        $('#mensaje').hide();
                        window.location.href = "../../index.php";
                    }, 3000);
                }
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
            <small>Ingresar al sistema</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Login</a></li>
            <li class="active">Ingresar</li>
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

                                <section id="loginForm" style=" display:show; ">

                                    <a href="#" class="list-group-item list-group-item-action active">Formulario de
                                        login</a>
                                    <div class="list-group-item">
                                        Complete los siguientes datos:
                                    </div>

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
                                                <div class="input-group" style=" margin-bottom:25px ">
                                                    <span class=" input-group-addon redondeado "> <i class="fa fa-lock"
                                                            aria-hidden="true"></i> </span>
                                                    <input type="password" class="form-control required redondeado"
                                                        id="clave" name="clave" maxlenght="20" placeholder="Clave"
                                                        title="Clave" />
                                                </div>
                                                <div style="floar-right; font-size: 80%; position:relative; top:-10px ">
                                                    <a href="recuperar.php" style="color:blue">¿Recuperar clave?</a>
                                                </div>

                                                <div class="form-group" style=" margin-top:10px ">
                                                    <div class="col-md-12 control" align="center">
                                                        <a href="<?php echo SERVER ?>index.php">
                                                            <button type="button"
                                                                class="btn btn-default pull-left">Cancelar</button>
                                                        </a>
                                                        <button type="submit" class="btn btn-primary pull-right"
                                                            style="margin-bottom:10px" title="Enviar los datos">
                                                            Iniciar
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-12 control">
                                                        <div style=" border-top:1px solid#888; padding-top:15px; font-size:14px; "
                                                            align="center">
                                                            ¿Tiene una cuenta?
                                                            <a href="loginRegistrar.php"
                                                                style="color:blue">Registrarse</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>

                                            <!-- <div class="control-group-inline"
                                                style=" text-align: center; display:none; margin-top: 20px;" id="barra">
                                                <img src="<?php echo SERVER ?>img/barra.gif" alt="Cargando..."
                                                    style=" width: 200px "><br>
                                                Enviando datos...
                                            </div> -->
                                            <div class="control-group-inline" style="text-align: center; display:none"
                                                id="barra">
                                                <img src="<?php echo SERVER ?>img/barra.gif" alt="Cargando..."
                                                    style="width: 200px"><br>
                                                Enviando datos...
                                            </div>

                                            <div class="alert alert-success mensaje_form"
                                                style="display: none; margin-top: 20px;" id="mensaje">
                                                <button data-dismiss="alert" class="close" type="button">x</button>
                                                <span class="textmensaje">Bienvenido al sistema!</span>
                                            </div>

                                            <div class="alert alert-danger mensaje_form"
                                                style="display: none; margin-top: 20px;" id="error">
                                                <button data-dismiss="alert" class="close" type="button">x</button>
                                                <span class="textmensaje">Usuario sin verificar...</span>
                                            </div>

                                            <div class="alert alert-danger mensaje_form"
                                                style="display: none; margin-top: 20px;" id="error2">
                                                <button data-dismiss="alert" class="close" type="button">x</button>
                                                <span class="textmensaje">Usuario inactivo...</span>
                                            </div>

                                            <div class="alert alert-danger mensaje_form"
                                                style=" display: none; margin-top: 20px;" id="error3">
                                                <button data-dismiss="alert" class="close" type="button">x</button>
                                                <span class="textmensaje">Usuario o clave inválida</span>
                                            </div>

                                            <div class="alert alert-danger mensaje_form"
                                                style="display: none; margin-top: 20px;" id="error4">
                                                <button data-dismiss="alert" class="close" type="button">x</button>
                                                <span class="textmensaje">Se ha vencido su suscripción...</span>
                                            </div>

                                        </h4>
                                    </div>
                                </section>

                                <section id="loginFormExitoso" style="display: none; padding-bottom: 20px">
                                    <!-- <div class="container-fluid" style="background-image: url(../../img/email.png);
  background-size: cover; background-position: right; width: 530px; height: 400px">
                                        <div> -->
                                            <div id="confirm"><br><br>
                                                <font color="#000000" size="+2">Gracias por registrarse.<br>
                                                    Por favor revise su correo electrónico y haga click<br>
                                                    en el enlace que le enviamos para verificación de su cuenta.<br><br>
                                                </font>
                                                <font color="#000000" size="+1">Es posible que el correo se
                                                    encuentre<br>
                                                    dentro de la bandeja de spam.<br><br>
                                                    El equipo de sistema web.
                                                </font>
                                            </div>
                                        </div>
                                    </div>
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