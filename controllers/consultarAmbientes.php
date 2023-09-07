<?php
$rol = 1;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once './conexion.php';
    $piso = mysqli_real_escape_string($conn, $_POST['piso_id']);
    $consulta = $conn->query("SELECT * FROM ambientes WHERE id_centro = '$piso'");
    if ($consulta->num_rows > 0) {
        echo '<button id="verPisos" class="verAmbientes" onclick="vaciarAmbiente()"> <- Regresar</button>';
        while ($row = mysqli_fetch_assoc($consulta)) {

            echo "   

            <div class='ambiente' data-ambiente={$row['id']}>
                <img src='{$row['img']}' class='img_ambiente'>
                <h2>{$row['nombre']}</h2>";



            if ($rol == 1) {
                echo " <div method=post action='' class='Opciones_ambientes'>
                            <input type='hidden' value='{$row['id']}'>
                            <input type='submit' class='modificar' value='Modificar'>
                            <input type='submit' class='eliminar' name='elimino' value='Eliminar'>
                           
                        </div>";


                echo "</div>";

                if (isset($_POST['elimino'])) {
                    $id_ambiente = $_POST['id'];


                    $delete = mysqli_query($conn, "DELETE FROM ambientes WHERE id = $id_ambiente");
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


        }



        ?>




        <?php
    }
    echo '</section>';
} else {
    echo '<p>No existen ambientes en este piso</p>';
}


?>
<script>
    $(document).ready(function () {
        $('.ambientador').submit(function (event) {
            event.preventDefault();

            var form_id = $(this).data('form');

            $.ajax({
                url: 'php/ambientesEstados.php',
                type: 'POST',
                data: $(this).serialize() + '&form_id=' + form_id,
                success: function (respuesta) {
                    $('#ambienteINFORMACION').html(respuesta);
                },
            });

        });
    });
</script>