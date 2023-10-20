<?php
// Conexión a la base de datos (asegúrate de tener tu conexión configurada)
include('conexion.php');
// Consulta la base de datos
$query = mysqli_query($conn, "SELECT * FROM ambientes");
$html = '';

while ($row = mysqli_fetch_assoc($query)) {
    


    $id = $row['id'];
    $html .= "
    <div class='primer-contenedor' id='primer-contenedor' data-amb='" . $id . "'>
    <div class='fila1-contenedor1'>
        <img class='img' src='".$row['img']."' alt='Imagen del ambiente'>
        <div class='nombre'>". $row['nombre'] ."</div>
        <div class='dosopciones'>
            <div class='editar'>Editar<i class='fa-solid fa-pencil'></i></div>
            <div onclick='abrir_Amb()' id='delet_Amb' class='eliminar'>Eliminar<i class='fa-regular fa-circle-xmark'></i>
            </div>
        </div>
    </div>
    </div>
    <div id='delete'>
    <h2>¿Está seguro de eliminar?</h2>
    <div>
        <button id='boto1' data-amb='' onclick='delete_Ambiente(this, data-amb)'>¡Sí, Eliminar!</button>
        <button id='boto2' onclick='cerrarFormulario_Amb()'>Cancelar</button>
    </div>
</div>
<div id='darkk'></div>";

}

// Devuelve el HTML generado
echo $html;

// Cierra la conexión a la base de datos
mysqli_close($conn);
?>
