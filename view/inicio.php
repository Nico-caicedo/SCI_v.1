<?php
session_start();

$rol = $_SESSION['rol'];
include '../controllers/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<body>
    
</body>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../assets/css/inicio.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <?php
    include_once '../template/header.php';

    ?>
    <main>
  
       

        <div class="container_CF" id='contenedor_CF'>
<!-- <h1 class="title_cf">Seleccione centro de formación</h1> -->

            <?php

            $query = mysqli_query($conn, "SELECT * FROM centros_educacion");

            while ($centro = mysqli_fetch_assoc($query)) {


                echo " <div class='CF' data-centro='{$centro['id']}'>
                <img src='{$centro['img']}' class='img_CF'>
                <input type='hidden' id='{$centro['id']}' >
                <div class='text_CF'>
                    <h3>{$centro['name_cta']}</h3>
                    <p>Dirección: {$centro['direccion']}</p>";


                if ($rol == 1) {

                    echo " 
                            <form method=post class='opciones'>
                                <input type='hidden' value='{$centro['id']}' name='id'>
                                <input type='submit' class='modificar' value='Modificar'>
                                <input type='submit' class='eliminar' name='elimina' value='Eliminar'>
                            
                            </form>";
                }
                echo "</div>";
                echo "";
                echo "</div>";
            }
            if (isset($_POST['elimina'])) {
               $id_centro = $_POST['id'];
               echo $opc = "<script>
                    var opc = confirm('¿Quieres eliminar el centro de formación?');
                    opc;
                </script>";
                
                if ($opc) {
                    $delet = mysqli_query($conn, "DELETE FROM centros_educacion WHERE id = $id_centro");
                    if ($delet) {
                        echo "<script>
                            alert('Se ha eliminado el ambiente con éxito');
                        </script>";
                    } else {
                        echo "<script>
                            alert('No se pudo eliminar el ambiente');
                        </script>";
                    }
                }
            }
            ?>



        </div>

        <div class="container_ambientes" id="containerAmbientes"></div>
        <div class="container_inventaio" id="containerInventario"></div>

    </main>
    <script src="../assets/js/cambiar.js"></script>
   <script src="../assets/js/inventario.js"></script>
  
 
</body>

</html>