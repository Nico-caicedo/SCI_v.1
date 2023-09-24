<?php
include 'conexion.php';

// Verifica si se ha recibido una solicitud POST con la clave 'CF'
if (isset($_POST['CF'])) {
    // Realiza la conexión a la base de datos (asegúrate de tener la variable $conn definida)
    // ...

    // Obtiene los datos del formulario
    $name_cf = $_POST['name_cf'];
    $direccion = $_POST['direccion_cf'];
    $municipio = $_POST['id_municipio'];

    // Procesa y crea la ruta de la imagen
    $targetDir = "../assets/img/"; // Cambia "carpeta_destino" a la ruta de la carpeta donde deseas guardar las imágenes
    $nombreArchivo = basename($_FILES["imagenes"]["name"]);
    $rutaArchivo = $targetDir . $nombreArchivo;
    $tipoArchivo = pathinfo($rutaArchivo, PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["imagenes"]["tmp_name"], $rutaArchivo)) {
        // Si la imagen se ha cargado correctamente, realiza la inserción en la base de datos
        $sql = "INSERT INTO centros_educacion (name_cta, direccion, img, id_municipio) VALUES ('$name_cf', '$direccion', '$rutaArchivo', '$municipio')";
        
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
