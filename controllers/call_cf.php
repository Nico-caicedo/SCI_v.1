
<?php 
include('conexion.php');

// Obtén el ID enviado desde el frontend (select1)
$idSeleccionado = $_GET['id'];

// Prepara la consulta SQL para obtener opciones relacionadas al ID seleccionado
$sql = "SELECT id, name_municipio FROM municipio WHERE id_departamento = $idSeleccionado";

$result = $conn->query($sql);

// Si hay resultados, crea un array de opciones en formato JSON
$options = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $options[] = [
            'id' => $row['id'],
            'nombre' => $row['nombre']
        ];
    }
}

// Devuelve las opciones en formato JSON
header('Content-Type: application/json');
echo json_encode($options);

// Cierra la conexión a la base de datos
$conn->close();
?>
    