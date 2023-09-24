<?php 

session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

if($varsesion == null || $varsesion = '' ){
    echo "no tiene autorización";
    header("location: ../login.php");
    die();
}
session_unset();
session_destroy();
header("location: ../login.php");
