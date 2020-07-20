<?php 

$nombre = utf8_decode($_POST['nombre']);
$correo = strtolower($_POST['correo']);
$telefono = $_POST['telefono'];

//  Introducir los datos en la tabla de contactos 

//  Enviar correo notificando que alguien completó el formulario 

$destino = "prontosoluciones@gmail.com";
$asunto = "Contacto web sistema";
$cabeceras01 = "Content-type: text/html";
$cuerpo = "<h2>Hola, un usuario te ha contactado por la web.</h2>
Hemos recibido la siguiente información: <br>
<b>Nombre: </b> $nombre <br>
<b>Correo: </b> $correo <br>
<b>Teléfono: </b> $telefono <br>
<br><br>
Sistema web <br>
<img src=<?php echo SERVER ?>img/logo.png />
<p>&nbsp;</p>
<h5>Desarrollado por Pronto Soluciones <br>
Copyright © 2020 Pronto Soluciones. All rights reserved. V.1.0.0 <br></h5>
";
$yourwebsite = "https://sites.google.com/view/pronto-soluciones";
$yourEmail = "prontosoluciones@gmail.com";
$cabeceras = "From: $yourwebsite <$yourEmail>\n" . $cabeceras01;
mail($destino, $asunto, $cuerpo, $cabeceras);

//  Enviar correo al cliente

$destino = $correo;
$asunto = "Bienvenido al sistema web";
$cuerpo = " <h2>Apreciado cliente, $nombre </h2><br>
Gracias por contactarnos. <br>
Hemos recibido su información y pronto nos pondremos en contacto. <br>
Mientras tanto, puede visitar nuestras redes sociales y conocernos un poco mas.<br><br><br>
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
$yourwebsite = "gmail.com";
$yourEmail = "prontosoluciones@gmail.com";
// $cabeceras = "From: $yourwebsite <$yourEmail>\n" . $cabeceras01;
$cabeceras = "From: $yourwebsite <$yourEmail>" . $cabeceras01;
mail($destino, $asunto, $cuerpo, $cabeceras);

// Envío de información a AJAX

$data = array("exito" => '1');
// En contacto.php cuando creamos el JSON, definimos el data, que es por donde viaja la información.
die(json_encode($data));

?>