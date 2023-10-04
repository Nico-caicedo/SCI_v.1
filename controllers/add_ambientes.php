<?php
include 'conexion.php';

// Verifica si se ha recibido una solicitud POST con la clave 'CF'
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Realiza la conexión a la base de datos (asegúrate de tener la variable $conn definida)
    // ...

    // Obtiene los datos del formulario
    $name = $_POST['name_amb'];
    $code = $_POST['code_amb'];
    $ubi = $_POST['id_cf'];

    // Procesa y crea la ruta de la imagen
    $targetDir = "../assets/img/"; // Cambia "carpeta_destino" a la ruta de la carpeta donde deseas guardar las imágenes
    $nombreArchivo = basename($_FILES["imagenes"]["name"]);
    $rutaArchivo = $targetDir . $nombreArchivo;
    $tipoArchivo = pathinfo($rutaArchivo, PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["imagenes"]["tmp_name"], $rutaArchivo)) {
        // Si la imagen se ha cargado correctamente, realiza la inserción en la base de datos
        $sql = "INSERT INTO ambientes(nombre, cod, id_centro, img) VALUES ('$name', '$code',  '$ubi', '$rutaArchivo')";
        
        if (mysqli_query($conn, $sql)) {
            // Si la inserción en la base de datos es exitosa, devuelve una respuesta JSON con éxito
            $response = array("success" => true);
            echo json_encode($response);
        } else {
            // Si hay un error en la inserción en la base de datos, devuelve una respuesta JSON con error
            $response = array("success" => false);
            echo json_encode($response);
        }
    } else {
        // Si hay un error al cargar la imagen, devuelve una respuesta JSON con error
        $response = array("success" => false);
        echo json_encode($response);
    }

    // Cierra la conexión a la base de datos (si es necesario)
    // ...
}
?>
