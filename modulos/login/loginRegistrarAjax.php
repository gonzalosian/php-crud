<?php 
// Para evaluar todas las variables
// var_dump($_REQUEST);
// exit();

//  Introducir los datos en la tabla de usuarios 
require_once('../../tools/mypathdb.php');
require_once('../../ruta.php');
require_once('../../tools/eliminarComillas.php');

$nombre = utf8_decode($_POST['nombre']);
$usuario = strtolower($_POST['usuario']);
$clave = $_POST['clave'];

// ELIMINAR ATAQUES POR INJECCIÓN
$nombre = eliminarComillas($nombre);
$usuario = eliminarComillas($usuario);
$clave = eliminarComillas($clave);

// Para evaluar unicamente el nombre
// var_dump($nombre);
// exit();


// Creamos un PIN de 4 dígitos aleatorio para la confirmación del usuario
mt_srand(time());
$pin = mt_rand(1000,9999);

// Introducir los datos en la tabla de usuarios
$fechaDesde = date("Y-m-d");
$fechaHasta = date("Y-m-d", strtotime($fechaDesde."+ 30 days") );

$sql = " INSERT INTO usuarios (nombre, usuario, clave, pin, fechaDesde, fechaHasta)
VALUES ('" . $nombre . "', '" . $usuario . "', '" . $clave . "', '" . $pin . "', '" . $fechaDesde . "', '" . $fechaHasta . "')";

// var_dump($sql);
// exit();

if(mysqli_query( $conn, $sql )) {

    //  Enviar correo notificando que alguien se registró
    $destino = "prontosoluciones@gmail.com";
    $asunto = "Contacto web sistema";
    $cabeceras01 = "Content-type: text/html";
    $cuerpo = "<h2>Hola, un usuario se ha registrado en la web.</h2>
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
    $asunto = "Registro en el sistema web";
    $cuerpo = " <h2>Apreciado cliente, $nombre </h2><br>
    Gracias por registrarse. <br>
    Usted se registro correctamente. <br>
    Por razones de seguridad necesitamos que haga click sobre el<br>
    siguiente enlace a fin de verificar su correo electrónico y<br>
    poder activar su cuenta.<br>

    <div class=list-group-item>
        <a href=<?php echo SERVER ?>modulos/login/verificar.php?usuario=$usuario&pin=$pin>
            Link
        </a>
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

} else {
    mysqli_close($conn); //cerramos conexion
    $data = array("error" => '1'); //reportamos por medio del data
    die(json_encode($data)); //le mando la informacion y lo recibe el form contacto
}

?>