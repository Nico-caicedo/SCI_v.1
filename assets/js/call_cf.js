// Función para cargar los departamentos
function cargarDepartamentos() {
    fetch("../controllers/call_dep.php")
        .then(response => {
            if (!response.ok) {
                throw new Error("Error al cargar departamentos");
            }
            return response.json();
        })
        .then(data => {
            // Referenciamos la etiqueta select de departamentos
            var selectDep = document.getElementById("list-dep");

            // Limpiamos el select antes de añadir nuevas opciones
            selectDep.innerHTML = '';

            // Recorremos las opciones y las añadimos al select
            data.forEach(function (opcion) {
                var option = document.createElement("option");
                option.value = opcion.id;
                option.text = opcion.nombre;
                selectDep.appendChild(option);
            });
        })
        .catch(error => {
            console.error("Error:", error);
        });
}

// Función para cargar los municipios relacionados
function cargarMunicipios(idDep) {
    fetch(`../controllers/call_mun.php?id_dep=${idDep}`)
        .then(response => {
            if (!response.ok) {
                throw new Error("Error al cargar municipios");
            }
            return response.json();
        })
        .then(data => {
            // Referenciamos la etiqueta select de municipios
            var selectMun = document.getElementById("list-mun");

            // Limpiamos el select antes de añadir nuevas opciones
            selectMun.innerHTML = '';

            // Recorremos las opciones y las añadimos al select de municipios
            data.forEach(function (opcion) {
                var option = document.createElement("option");
                option.value = opcion.id;
                option.text = opcion.nombre;
                selectMun.appendChild(option);
            });
        })
        .catch(error => {
            console.error("Error:", error);
        });
}

// Llamamos a la función para cargar los departamentos cuando se carga la página
document.addEventListener("DOMContentLoaded", function () {
    cargarDepartamentos();
});

// Agregamos un evento de cambio al select de departamentos
var selectDep = document.getElementById("list-dep");
selectDep.addEventListener("change", function () {
    var selectedValue = selectDep.value;
    cargarMunicipios(selectedValue);
});
