<?php 

include 'conexion.php';

$consulta = $conn -> query("SELECT id , name_cta FROM centros_educacion ");

$opc = array();

while ($row = $consulta->fetch_assoc()){
    $opc[] = $row; 
}

echo json_encode($opc);