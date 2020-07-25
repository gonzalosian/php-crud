<?php 
// Módulo de Login Registrar
  require_once("../../header.php");
  
    // *********** acceso a traves del puerto por defecto (80) **********
    // Acceso a traves del puerto por defecto 80
    if (($_SERVER['SERVER_NAME']=='localhost') AND ($_SERVER['SERVER_PORT']=='80')){
      define('SERVER', "http://" . $_SERVER['SERVER_NAME'] . "/sistema/");
    };
    // Acceso a traves del puerto 8080
    if (($_SERVER['SERVER_NAME']=='localhost') AND ($_SERVER['SERVER_PORT']=='8080')){
      define('SERVER', "http://" . $_SERVER['SERVER_NAME'] . ":8080/sistema/");
    };
    // Acceso por nombre de dominio
    if ($_SERVER['SERVER_NAME']=='prontosoluciones.000webhostapp.com') {
      define('SERVER', "https://prontosoluciones.000webhostapp.com/" );
    };
?>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<!-- <script src="<?php echo SERVER ?>js/jquery.validate.min.js"></script> -->

<script type="text/javascript" language="javascript">
// metodo para cargar el formulario
$("body").on('submit', '#formDefault', function(event) {

    event.preventDefault();

    if ($('#formDefault').valid()) {

        $('#barra').show();

        $.ajax({
            type: "POST",
            url: "loginRegistrarAjax.php",
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
                    $('#loginRegistrarExitoso').show();
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
            <small>Registrarse en el sistema</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Login</a></li>
            <li class="active">Registrar</li>
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

                        <div class="col-md-4">
                        </div>

                        <div class="col-md-4">
                            <div class="list-group" style=" padding-top:30px ">
                                <a href="#" class="list-group-item list-group-item-action active">Formulario de
                                    login</a>

                                <div class="list-group-item">
                                    Complete los siguientes datos:<br><br>

                                    <!-- <section id="loginRegistrarExitoso" style="display:none; padding-bottom: 20px">
                                        <div id="confirm">
                                            <br><br>

                                            Gracias por contactarnos.<br>
                                            Nos comunicaremos con usted a la brevedad.<br>
                                            Si quiere hablarnos ahora, puede llamarnos.<br><br>

                                            Nuestros horarios de oficina son:<br>
                                            Lunes a Viernes<br>
                                            09 a 18 hs.<br><br>
                                        </div>
                                    </section> -->
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

                                                <div class="input-group" style=" margin-bottom:25px ">
                                                    <span class=" input-group-addon redondeado "> <i class="fa fa-lock"
                                                            aria-hidden="true"></i> </span>
                                                    <input type="password" class="form-control required redondeado"
                                                        id="clave" name="clave" maxlenght="20" placeholder="Clave"
                                                        title="Clave" />
                                                </div>

                                                <div class="control-group-inline" style=" margin-bottom:25px ">
                                                    <input type="text" class="form-control required redondeado"
                                                        id="nombre" name="nombre" maxlenght="50" placeholder="Nombre"
                                                        title="Nombre" />
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
                                                            <a href="login.php"
                                                                style="color:blue">Login</a>
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
                                                <span class="textmensaje">El correo está en uso</span>
                                            </div>

                                        </h4>
                                    </div>
                                </section>

                                <section id="loginRegistrarExitoso" style="display:none; padding-bottom: 20px">
                                    <!-- <div class="container-fluid" style="background-image: url(../../img/email.png); background-size: cover; 
                                        background-position: right; width: 530px; height: 400px">
                                        <div> -->
                                            <div id="confirm">
                                                <br><br>
                                                <font color="#000000" size="+2"> Gracias por registrarse.<br>
                                                    Por favor, revise su correo electrónico y haga click<br>
                                                    en el enlace que le enviamos para verificación de su cuenta.<br><br>
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