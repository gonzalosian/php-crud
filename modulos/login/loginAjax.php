<?php
session_start();

require_once('../../tools/mypathdb.php');

$usuario = strtolower($_POST['usuario']);
$clave = $_POST['clave'];

$sql = " SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$clave' ";

$result = mysqli_query( $conn, $sql );

while( $data = mysqli_fetch_array($result) ){
    $nombre = utf8_encode($data['nombre']);
    $status = $data['status'];
    $rol = $data['rol'];

    // var_dump($data);
    // exit();

    $_SESSION['nombre'] = $nombre;
    $_SESSION['status'] = $status;
    $_SESSION['rol'] = $rol;
    
    if($status==0) { // Usuario sin verificar
        $data = array("error" => '1');
        die(json_encode($data));
    }

    if($status==1) { // Usuario verificado
        $data = array("exito" => '1');
        die(json_encode($data));
    }

    if($status==2) { // Usuario inactivo
        $data = array("error" => '2');
        die(json_encode($data));
    }

}

if (empty($data)) { // Usuario no encontrado
    $data = array("error" => '3');
    die(json_encode($data));
}

mysqli_close($conn);

?>