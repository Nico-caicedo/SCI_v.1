 // Obtener una referencia al elemento select
 var select = document.getElementById("list-cf");

 // Realizar una solicitud Fetch para obtener los datos del archivo PHP
 fetch("../controllers/call_cf.php")
     .then(response => response.json())
     .then(data => {
         // Iterar a través de los datos y agregar opciones al select
         data.forEach(option => {
             var optionElement = document.createElement("option");
             optionElement.value = option.id;
             optionElement.textContent = option.nombre;
             select.appendChild(optionElement);
         });
     })
     .catch(error => {
         console.error("Error al obtener los datos:", error);
     });