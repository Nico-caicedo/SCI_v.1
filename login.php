<?php
include('./controllers/conexion.php');
session_start();
error_reporting(0);
// Verificar si el usuario ya ha iniciado sesión
 if ($_SESSION['rol'] == 1) {
    header("location: ./view/inventario.php ");
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./assets/css/login.css">

    <title>inventario</title>
</head>

<body>
    <header>
        <h1 class="title2">sistema de inventario</h1>
        <img class="title2" src="https://www.sena.edu.co/Style%20Library/alayout/images/logoSena.png" alt="">
        <h1 class="title1">SCI
        </h1>
        <img class="title1" src="https://www.sena.edu.co/Style%20Library/alayout/images/logoSena.png" alt="">
    </header>
    <main>
        <h2>iniciar sesión</h2>
        <form action="" method="post">
            <div>

                <input type="text" name="user" placeholder="Nombre">
            </div>
            <div>

                <input type="password" name="clave" placeholder="Contraseña">

            </div>
            <input type="submit" name="acceder" value="acceder">
        </form>
        <?php
        include('./controllers/acceso.php');

        ?>
    </main>

    <footer>2023 ADSO</footer>
</body>

</html>