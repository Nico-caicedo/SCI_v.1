
<?php 
include('conexion.php');


// Consulta para obtener las opciones
$resultado = $conn->query("SELECT id, nombre FROM departamentos");

// Array para almacenar las opciones
$opciones = array();

// Recorremos el resultado y añadimos cada opción al array
while ($fila = $resultado->fetch_assoc()) {
    $opciones[] = $fila;
}

// Devolvemos las opciones en formato JSON
echo json_encode($opciones);
?>
    