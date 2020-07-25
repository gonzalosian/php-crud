<?php
// Conexión a la DB
$serverName = "localhost";
$userName = "webmaster";
$password = "G0nzal0S1an@";

// LOCAL
// $dbName = "sistema";

// SERVER
$dbName = "id14004081_sistema";

// Crear la conexión web
$conn = mysqli_connect( $serverName, $userName, $password, $dbName );

// Chequear la conexión
if(!$conn){
    $data = array("error" => '3');
    die(json_encode($data));
}
?>