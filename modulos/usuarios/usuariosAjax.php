<?php
session_start();
error_reporting(0);

// Verificar si usuario está logueado
if(!isset($_SESSION['rol']) OR ($_SESSION['rol'])<2){
    // header("location:../login/login.php");
    $data = array("error" => '2');
    die(json_encode($data));
}

require_once("../../tools/mypathdb.php");
require_once('../../tools/eliminarComillas.php');

// Leer los datos del formulario
$id = $_POST['id'];
$usuario = strtolower($_POST['usuario']);
$clave = $_POST['clave'];
$nombre = $_POST['nombre'];
$status = $_POST['status'];
$rol = $_POST['rol'];
$fechaDesde = $_POST['fechaDesde'];
$fechaDesde = date('Y/m/d',strtotime($fechaDesde));
$fechaHasta = $_POST['fechaHasta'];
$fechaHasta = date('Y/m/d',strtotime($fechaHasta));

// Leer el parámetro opcion
$opcion = $_GET['opcion'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

// ELIMINAR ATAQUES POR INJECCIÓN
$id = eliminarComillas($id);
$usuario = eliminarComillas($usuario);
$clave = eliminarComillas($clave);
$nombre = eliminarComillas($nombre);

// var_dump($_REQUEST);
// exit();

if ($opcion=='agregar') {
    $sql = " INSERT INTO usuarios (usuario, clave, nombre, status, rol, fechaDesde, fechaHasta)
        VALUES ('" . $usuario . "', '" . $clave . "', '" . $nombre . "', '" . $status . "', 
        '" . $rol . "', '" . $fechaDesde . "', '" . $fechaHasta . "')";

    if(mysqli_query( $conn, $sql )) {
        mysqli_close($conn);
        $data = array("exito" => '1');
        die(json_encode($data));
    } else {
        mysqli_close($conn);
        $data = array("error" => '1');
        die(json_encode($data));
    }
}

if ($opcion=='modificar') {
    $sql = " UPDATE usuarios SET usuario='$usuario', clave='$clave', nombre='$nombre', 
        status='$status', rol='$rol', fechaDesde='$fechaDesde', fechaHasta='$fechaHasta' WHERE id='$id' ";

// var_dump($sql);
// exit();

    if(mysqli_query( $conn, $sql )) {
        mysqli_close($conn);
        $data = array("exito" => '2');
        die(json_encode($data));
    } else {
        mysqli_close($conn);
        $data = array("error" => '1');
        die(json_encode($data));
    }
}

if ($opcion=='eliminar') {
    $sql = " DELETE FROM usuarios WHERE id='$id' ";

    if(mysqli_query( $conn, $sql )) {
        mysqli_close($conn);
        $data = array("exito" => '1');
        die(json_encode($data));
    } else {
        mysqli_close($conn);
        $data = array("error" => '1');
        die(json_encode($data));
    }
}

?>