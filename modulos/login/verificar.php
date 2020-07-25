<?php
    //  Introducir los datos en la tabla de usuarios 
    require_once('../../tools/mypathdb.php');
    
    $usuario = $_GET['usuario'];
    $pin = $_GET['pin'];

    // Actualizar los datos en la tabla de usuarios
    $sql = " UPDATE usuarios SET status=1 WHERE usuario='$usuario' AND pin=$pin ";

    // var_dump($sql);
    // exit();

    if(mysqli_query( $conn, $sql )) {
        // window.location.href = "../../index.php";
        header("location: login.php");
    }
?>