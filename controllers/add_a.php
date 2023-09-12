<?php 



if(isset($_POST['ambiente'])){


$name_cf = $_POST['name_cf'];

$direccion = $_POST['direccion_cf'];

$municipio = $_POST['id_municipio']; 


// proces y crear ruta de imagen
    $targetDir = "../assets/img/"; // Cambia "carpeta_destino" a la ruta de la carpeta donde deseas guardar las imágenes
    $nombreArchivo = basename($_FILES["imagenes"]["name"]);
    $rutaArchivo = $targetDir . $nombreArchivo;
    $tipoArchivo = pathinfo($rutaArchivo, PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["imagenes"]["tmp_name"], $rutaArchivo);


    $sql = mysqli_query($conn, "INSERT INTO centros_educacion(name_cta, direccion , img, id_municipio) VALUES ('$name_cf', '$direccion','$rutaArchivo', '$municipio')");

    // if($sql){
        
    // }else{
    //     echo "error";
    // }

}