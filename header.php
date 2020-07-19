<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Blank Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php  
    // *********** acceso a traves del puerto por defecto (80) **********
    # aqui va el comentario
    /* este es otro comentario */
    // Acceso a traves del puerto por defecto 80
    if (($_SERVER['SERVER_NAME']=='localhost') AND ($_SERVER['SERVER_PORT']=='80')){
      define('SERVER', "http://" . $_SERVER['SERVER_NAME'] . "/sistema/");
    }
    // Acceso a traves del puerto 8080
    if (($_SERVER['SERVER_NAME']=='localhost') AND ($_SERVER['SERVER_PORT']=='8080')){
      define('SERVER', "http://" . $_SERVER['SERVER_NAME'] . ":8080/sistema/");
    }
    // Acceso por IP
    if ($_SERVER['SERVER_NAME']=='direccionIp') {
      // define('SERVER', "http://" . $_SERVER['direccionIp'] . "/sistema/");
      define('SERVER', "http://direccionIp/" );
    }
    // Acceso por nombre de dominio
    if ($_SERVER['SERVER_NAME']=='nombreDominio') {
      // define('SERVER', "http://" . $_SERVER['nombreDominio'] );
      define('SERVER', "http://nombreDominio/" );
    }
  ?>

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

    <!-- jQuery 3 -->
    <script src="<?php echo SERVER ?>js/jquery.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo SERVER ?>js/adminlte.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <?php 
  require_once("encabezado.php");
  require_once("lateral.php");
?>