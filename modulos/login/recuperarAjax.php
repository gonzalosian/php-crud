<?php 
// Para evaluar todas las variables
// var_dump($_REQUEST);
// exit();

// Módulo AJAX para recuperar clave de usuario
$usuario = strtolower($_POST['usuario']);

// Para evaluar unicamente el nombre
// var_dump($usuario);
// exit();

// Consultar los datos en la tabla de usuarios 
require_once('../../tools/mypathdb.php');
require_once('../../ruta.php');

// Consultar los datos en la tabla de usuarios
$sql = " SELECT * FROM usuarios WHERE usuario='$usuario' ";
$result = mysqli_query( $conn, $sql );

while( $data = mysqli_fetch_array($result) ){
    $nombre = utf8_encode($data['nombre']);
    $clave = $data['clave'];

    //  Enviar correo notificando que alguien está recuperando la clave
    $destino = "prontosoluciones@gmail.com";
    $asunto = "Solicitud de clave del sistema";
    $cabeceras01 = "Content-type: text/html";
    $cuerpo = "<h2>Hola, un usuario está recuperando la clave en la web.</h2>
    Hemos recibido la siguiente información: <br>
    <b>Nombre: </b> $nombre <br>
    <b>Usuario: </b> $usuario <br>
    <br><br>
    Sistema web <br>
    <img src=<?php echo SERVER ?>img/logo.png />
    <p>&nbsp;</p>
    <h5>Desarrollado por Pronto Soluciones <br>
    Copyright © 2020 Pronto Soluciones. All rights reserved. V.1.0.0 <br></h5>
    ";
    // var_dump($cuerpo);
    // exit();
    $yourwebsite = "https://sites.google.com/view/pronto-soluciones";
    $yourEmail = "prontosoluciones@gmail.com";
    $cabeceras = "From: $yourwebsite <$yourEmail>\n" . $cabeceras01;
    // mail($destino, $asunto, $cuerpo, $cabeceras);

    //  Enviar correo al cliente
    $destino = $usuario;
    $asunto = "Recuperación de clave en el sistema web";
    $cuerpo = " <h2>Apreciado cliente, $nombre </h2><br>
    Hemos recuperado su clave. <br>
    Su clave es: $clave <br>
    Su usuario es: $usuario <br>
    Gracias por confiar en nosotros.<br>

    <div class=list-group-item>
        <a href=https://www.facebook.com/ProntoSolucionesRosario target=_blank>
            <img src=<?php echo SERVER ?>img/logoFacebook02.ico alt=logo Facebook>
        </a>
        <a href=https://www.instagram.com/prontosolucionesrosario target=_blank>
            <img src=<?php echo SERVER ?>img/logoInstagram.ico alt=logo Instagram>
        </a>
    </div> 
    <br>Atentamente, <br>
    Pronto Soluciones - Soluciones Informáticas<br>
    <a href=<?php echo SERVER ?>><img src=<?php echo SERVER ?>img/logo.png /></a>
    <p>&nbsp;</p>
    <h5>Desarrollado por Pronto Soluciones <br>
    Copyright © 2020 Pronto Soluciones. All rights reserved. V.1.0.0 <br></h5>
    ";
    // var_dump($cuerpo);
    // exit();
    $yourwebsite = "gmail.com";
    $yourEmail = "prontosoluciones@gmail.com";
    // $cabeceras = "From: $yourwebsite <$yourEmail>\n" . $cabeceras01;
    $cabeceras = "From: $yourwebsite <$yourEmail>" . $cabeceras01;
    // mail($destino, $asunto, $cuerpo, $cabeceras);

    // Envío de información a AJAX
    $data = array("exito" => '1');
    // var_dump($data);
    // exit();

    // En contacto.php cuando creamos el JSON, definimos el data, que es por donde viaja la información.
    die(json_encode($data));

} 

    mysqli_close($conn); //cerramos conexion
    $data = array("error" => '1'); //reportamos por medio del data
    die(json_encode($data)); //le mando la informacion y lo recibe el form contacto

?>