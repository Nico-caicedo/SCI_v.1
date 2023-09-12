
// Creamos una instancia del objeto XMLHttpRequest
var xhrr = new XMLHttpRequest();

// Configuramos la petición
xhrr.open("GET", "../controllers/call_dep.php");

// Definimos la función que se ejecutará cuando la respuesta esté lista
xhrr.onreadystatechange = function () {
    if (xhrr.readyState === XMLHttpRequest.DONE && xhrr.status === 200) {
        // Parseamos la respuesta JSON
        var opciones = JSON.parse(xhrr.responseText);

        // Referenciamos la etiqueta select
        var select = document.getElementById("select-ubicacion");
        
        // Recorremos las opciones y las añadimos al select
        opciones.forEach(function (opcion) {
            var option = document.createElement("option");
            option.value = opcion.id_aula;
            option.text = opcion.nombre;
            select.appendChild(option);
        });
    }
};

// Enviamos la petición
xhrr.send();


// Creamos una instancia del objeto XMLHttpRequest
var xhr = new XMLHttpRequest();

// Configuramos la petición
xhr.open("GET", "../controllers/ambientes_ubi.php");

// Definimos la función que se ejecutará cuando la respuesta esté lista
xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Parseamos la respuesta JSON
        var opciones = JSON.parse(xhr.responseText);

        // Referenciamos la etiqueta select
        var select = document.getElementById("select-ubicaciones");
        
        // Recorremos las opciones y las añadimos al select
        opciones.forEach(function (opcion) {
            var option = document.createElement("option");
            option.value = opcion.id_aula;
            option.text = opcion.nombre;
            select.appendChild(option);
        });
    }
};

// Enviamos la petición
xhr.send();
