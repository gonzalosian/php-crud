<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pronto Soluciones</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php
      require_once('ruta.php');
    ?>

    <link rel="shortcut icon" href="<?php echo SERVER ?>img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo SERVER ?>img/favicon.ico" type="image/x-icon">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo SERVER ?>css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo SERVER ?>css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo SERVER ?>css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo SERVER ?>css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo SERVER ?>css/_all-skins.min.css">


    <!-- Todas estas lineas podrian ir al final, en el footer, pero como lo tenemos separado, 
se requiere cargue antes para no haya problemas con el JQuery de contactos.php -->
    <!-- jQuery 3 -->
    <script src="<?php echo SERVER ?>js/jquery.min.js"></script>
    <!-- <script src="<?php echo SERVER ?>js/fastclick.js"></script> -->
    <!-- AdminLTE App -->
    <!-- <script src="<?php echo SERVER ?>js/adminlte.min.js"></script> -->
    <script src="<?php echo SERVER ?>js/bootbox.min.js"></script>
    <!-- <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
    <script src="<?php echo SERVER ?>js/jquery.validate.min.js"></script>

    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
    <link rel="stylesheet" href="<?php echo SERVER ?>css/jquery-ui.css">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <script src="<?php echo SERVER ?>js/jquery-ui.js"></script>

<!-- Para grilla mas profesional -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css"> -->
    <link rel="stylesheet" href="<?php echo SERVER ?>css/jquery.dataTables.css">
    <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script> -->
    <script src="<?php echo SERVER ?>js/jquery.dataTables.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>
    input.error {
        background-color: #E2E8EB;
        border: 1px solid red;
        border-radius: 11px;
        outline: 20px;
    }

    .redondeado {
        border-radius: 11px;
        box-shadow: 0px 9px 9px rgba(0, 0, 0, 0.3);
        -moz-border-radius: 11px;
        -moz-box-shadow: 0px 9px 9px rgba(0, 0, 0, 0.3);
        -webkit-border-radius: 11px;
        -webkit-box-shadow: 0px 9px 9px rgba(0, 0, 0, 0.3);
    }
    </style>

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <?php 
  require_once("encabezado.php");
  require_once("lateral.php");
?>