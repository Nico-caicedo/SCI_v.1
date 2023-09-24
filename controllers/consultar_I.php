<?php
$rol = 1;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once './conexion.php';
    $piso = mysqli_real_escape_string($conn, $_POST['ambiente_id']);
    $consulta = $conn->query("SELECT * FROM inventario WHERE id_ambiente = '$piso'");
    if ($consulta->num_rows > 0) {
        echo '<button id="verPisos" class="verAmbientes" onclick="vaciarPisos()"> <- Regresar</button>';

        echo '<div>
            </div>
            <section class="container_inventario">
    
                <article class="container_elementos">
                    <h2 class="subtitle_inventario">Elementos</h2>
                    <!-- script de buscador -->
                    <div class="buscador">
                        <input type="text" placeholder="buscar">
                    </div>
                    <div class="elementos">
                        <div>
    
                        </div>';

        while ($e = mysqli_fetch_assoc($consulta)) {
            echo '
    
                    <div class="elemento">
                        <img src="' . $e['img'] . '" class="img_elemento">
                        <p>' . $e['nombre'] . '</p>
                        <p>' . $e['cod'] . '</p>
                        <div class="opc_elemento">
                            <div class="edit">
                                <img src="../assets/img/edit.svg">
                            </div>
                            <div class="elimina">
                                <img src="../assets/img/trash.svg">
                            </div>
                        </div>
                    </div>';
        }

        echo ' </div>
                </article>
                <article class="container_descripcion">
                    <div class="section1">
                        <div class="dato_ambiente">
    
                            <img src="./assets/img/ambiente2.jpg" class="img_present">
                            <h2 class="nombre_ambiente">Ambiente 307</h2>
                        </div>
                    </div>
    
                    <div class="section2">
                        <div class="datos_elemento">
                            <div class="descrip">
                            <p>Nombre: Silla ergonómica</p>
                            <p>color: negro</p>
                            <p>valor: $89000</p>
                            <p>estado: disponible</p>
                            <p>
                            código: 455551
                            </p>
                            </div>
    
                            <div class="elemento_img">
                                <img src="./assets/img/elemento3.jpg" class="img_elementos">
                                <h3>Silla Ergonómica</h3>
                            </div>
                        </div>
                    </div>
                </article>
            </section>';
    } else {
        echo '<p>No existen ambientes en este piso</p>';
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
