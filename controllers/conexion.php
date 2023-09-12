<?php 
$conn = mysqli_connect("localhost", "root", "", "control_v2");

// $conn = mysqli_connect("localhost", "c1601882_AA", "keGOtude02", "c1601882_AA");

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}
