<?php 
// Módulo de contacto
  require_once("../../header.php");
  // require_once("encabezado.php");
  // require_once("lateral.php");

  
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

<script type="text/javascript" language="javascript">
// metodo para cargar el formulario
$("body").on('submit', '#formDefault', function(event) {

    event.preventDefault();

    if ($('#formDefault').valid()) {

        $('#barra').show();

        $.ajax({
            type: "POST",
            url: "contactoAjax.php",
            dataType: "json",
            data: $(this).serialize(),
            success: function(respuesta) {

                $('#barra').hide();

                if (respuesta.error == 1) {
                    $('#error').show();
                    setTimeout(() => {
                        $('#error').hide();
                    }, 3000);
                };

                if (respuesta.exito == 1) {
                    $('#mensaje').show();
                    $('#contactForm').hide();
                    $('#contactFormExitoso').show();
                    setTimeout(() => {
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
            Contacto
            <small>Llamanos o escribinos</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Contactos</a></li>
            <li class="active">Formulario</li>
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
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-4">
                            <div class="list-group" style=" padding-top:30px ">
                                <a href="#" class="list-group-item list-group-item-action active">Formulario de
                                    contacto</a>
                                <div class="list-group-item">
                                    Complete los siguientes datos:
                                </div>

                                <section id="contactForm" style=" display:show; ">

                                    <div class="list-group-item">
                                        <h4 class="list-group-item-heading">

                                            <!-- <form role="form"> -->
                                            <form class=" form-horizontal " id="formDefault">
                                                <div class="control-group-inline" style=" padding-top:10px ">
                                                    <!-- <label>
                                                    Nombre
                                                </label> -->
                                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                                        maxlenght="50" placeholder="Nombre" title="Nombre" />
                                                </div>
                                                <div class="control-group-inline" style=" padding-top:10px ">
                                                    <!-- <label>
                                                    Correo
                                                </label> -->
                                                    <input type="email" class="form-control" id="correo" name="email"
                                                        maxlenght="75" placeholder="Correo" title="Correo" />
                                                </div>
                                                <div class="control-group-inline"
                                                    style=" padding-top:10px; padding-bottom:10px ">
                                                    <!-- <label>Teléfono</label> -->
                                                    <input type="text" class="form-control" id="telefono"
                                                        name="telefono" maxlenght="15" placeholder="Telefono"
                                                        title="Telefono" />
                                                </div>
                                                <!-- <div class="checkbox">
                                                <label><input type="checkbox" /> Check me out</label>
                                                </div> -->
                                                <button type="button" class="btn btn-default">Cancelar</button>
                                                <button type="submit" class="btn btn-primary pull-right "
                                                    title="Enviar los datos">
                                                    Enviar
                                                </button>
                                            </form>

                                            <div class="control-group-inline"
                                                style=" text-align: center; display:none; margin-top: 20px;" id="barra">
                                                <img src="<?php echo SERVER ?>img/barra.gif" alt="Cargando..."
                                                    style=" width: 200px "><br>
                                                Enviando mensaje...
                                            </div>

                                            <div class=" alert alert-success mensaje_form "
                                                style=" display: none; margin-top: 20px;" id="mensaje">
                                                <button data-dismiss="alert" class="close" type="button">x</button>
                                                <span class="textmensaje">¡Datos enviados satisfactoriamente!</span>
                                            </div>

                                            <div class=" alert alert-danger mensaje_form "
                                                style=" display: none; margin-top: 20px;" id="error">
                                                <button data-dismiss="alert" class="close" type="button">x</button>
                                                <span class="textmensaje">No se pudo enviar el mensaje</span>
                                            </div>

                                        </h4>
                                    </div>
                                </section>
                            </div>
                        </div>

                        <div class="col-md-2">
                        </div>

                        <div class="col-md-4" style=" padding-top:30px ">
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action active">CONTACTANOS</a>
                                <div class="list-group-item">
                                    Cualquier duda y comentario por favor contactá con nosotros.
                                </div>
                                <div class="list-group-item">
                                    <h4 class="list-group-item-heading">
                                        ARG CallCenter 24/7 <span
                                            class="badge badge-secondary badge-pill pull-right ">+54 9 341 253
                                            0401</span>
                                    </h4>
                                    <!-- <p class="list-group-item-text"> -->
                                    <h4 class="list-group-item-heading">
                                        EC <span class="badge badge-secondary badge-pill pull-right ">+54 9 341 229
                                            4066</span>
                                    </h4>
                                    <!-- </p> -->
                                    <a href="https://www.facebook.com/ProntoSolucionesRosario" target="_blank">
                                        <img src="<?php echo SERVER ?>img/logoFacebook02.ico" alt="logo Facebook">
                                    </a>
                                    <a href="https://www.instagram.com/prontosolucionesrosario" target="_blank">
                                        <img src="<?php echo SERVER ?>img/logoInstagram.ico" alt="logo Instagram">
                                    </a>
                                    <a href="#">
                                        <img src="<?php echo SERVER ?>img/logoTwitter.ico" alt="logo Twitter">
                                    </a>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-1">
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