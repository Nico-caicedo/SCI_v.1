<?php
$id = 1;
$datos = mysqli_query($conn, "SELECT * FROM users WHERE id ='$id'");
$f = mysqli_fetch_assoc($datos);
$name = $f["nombre"];
$lastname = $f["apellidos"];
$perfil = $f["img"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <div class="identidad ">
            <img class="logo_sena" src="https://www.sena.edu.co/Style%20Library/alayout/images/logoSena.png" alt="">
            <h2 class="name_logo">InvenTech</h2>
        </div>
        <?php


        $rol = 1;

        if ($rol == 1) {
            echo "<div class='opciones'>
            <ul>
            <a href='./inicio.php'>
                <li>Inventario</li>
            </a>

            <a href='./operacion.php'>
                <li>Operaciones</li>
            </a>
        </ul>
        </div>";
        }

        ?>

        <div class="perfil usuario" id="mensaje">
            <img src="<?php echo $perfil?>" alt="foto perfil">
            <p>
               <?php 
               echo $name . " " . $lastname;
               
               ?>
            </p>
        </div>



        <section class="usuario" id="mensaje">

            <section class="mensaje">
                <ol>

                    <li id="abrirModal"><i class="fa-solid fa-user"></i>Mis datos</li>

                    <li><a href="../controllers/cerrar.php"><i class="fa-solid fa-arrow-right-to-bracket"></i>Cerrar
                            sesion</a></li>
                </ol>
            </section>
            <script>
                const abrir = document.getElementById('mensaje');
                const ventana = document.querySelector('.mensaje');
                let estado = false;

                abrir.addEventListener('click', function () {
                    if (estado) {
                        ventana.classList.remove('active');
                        estado = false;
                    } else {
                        ventana.classList.add('active');
                        estado = true;
                    }
                });
            </script>

        </section>

        <div class="modal" id="modal">
            <button id="cerrarModal" class='cerrar'>
                Cancelar
            </button>
            <?php

            $query = mysqli_query($conn, "SELECT * FROM users where id = $id");
            $dato = mysqli_fetch_assoc($query);

            ?>
            <h2>Editar Datos Personales</h2>
            <form action="" class="datos_personales">

                <input type="text" value="<?php echo $dato['nombre'] ?>">
                <input type="text" value="<?php echo $dato['apellidos'] ?>">
                <input type="text" value="<?php echo $dato['clave'] ?>">
                <input type="file">


                <input type="submit" class="cargar_datos" value='cargar'>

            </form>
            <!-- Contenido del modal -->
        </div>

        <script>
            const abrirModal = document.getElementById('abrirModal');
            const cerrarModal = document.getElementById('cerrarModal');
            const modal = document.getElementById('modal');
            let estadoModal = false;

            abrirModal.addEventListener('click', function () {
                modal.classList.add('active');
                estadoModal = true;
            });

            cerrarModal.addEventListener('click', function () {
                modal.classList.remove('active');
                estadoModal = false;
            });
        </script>


    </header>
</body>

</html>