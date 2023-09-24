<?php
// Conexión a la base de datos (asegúrate de tener tu conexión configurada)
include('conexion.php');
// Consulta la base de datos
$query = mysqli_query($conn, "SELECT * FROM centros_educacion");
$html = '';

while ($row = mysqli_fetch_assoc($query)) {
    $id = $row['id'];
    $html .= "<div class='elemento' data-id='" . $id . "'>
    <img src='{$row['img']}' class='img_elemento' >
    <p>{$row['name_cta']}</p>
    <input type='hidden' id='{$row['id']}'>
    <div class='opc_elemento'>
        <div class='edit'>
            <img src='../assets/img/edit.svg' >
        </div>
        <div class='elimina' onclick='abrir_CF()'>
            <img src='../assets/img/trash.svg'>
        </div>
    </div>
</div>
<div id='delet'>
    <h2>¿Está seguro de eliminar?</h2>
    <div>
        <button id='boton1' data-id='' onclick='delete_CF(this, data-id)'>¡Sí, Eliminar!</button>
        <button id='boton2' onclick='cerrarFormulario_CF()'>Cancelar</button>
    </div>
</div>
<div id='dark'></div>";

}

// Devuelve el HTML generado
echo $html;

// Cierra la conexión a la base de datos
mysqli_close($conn);
?>
