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
    // if ($_SERVER['SERVER_NAME']=='direccionIp') {
    //   // define('SERVER', "http://" . $_SERVER['direccionIp'] . "/sistema/");
    //   define('SERVER', "http://direccionIp/" );
    // }
    // Acceso por nombre de dominio
    // if ($_SERVER['SERVER_NAME']=='nombreDominio') {
    //   // define('SERVER', "http://" . $_SERVER['nombreDominio'] );
    //   define('SERVER', "http://nombreDominio/" );
    // }

    if ($_SERVER['SERVER_NAME']=='prontosoluciones.000webhostapp.com') {
      define('SERVER', "https://prontosoluciones.000webhostapp.com/" );
    };
  ?>