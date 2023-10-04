<?php
include('conexion.php');
// Verificamos si se recibió un ID válido a través de una solicitud DELETE
if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['id'])) {
    $id = $_GET['id'];

 


    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql = "DELETE FROM ambientes WHERE id = $id"; // Reemplaza 'tu_tabla' por el nombre de tu tabla
    if ($conn->query($sql) === TRUE) {
        http_response_code(204); // Respuesta exitosa sin contenido
    } else {
        http_response_code(500); // Error interno del servidor
        echo "Error al eliminar el elemento: " . $conn->error;
    }

    $conn->close();
} else {
    http_response_code(400); // Solicitud incorrecta
    echo "Solicitud incorrecta o falta el ID";
}
?>
