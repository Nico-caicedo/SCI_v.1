console.log("hola mundo");

function cargarAmbientes() {
  $.ajax({
    url: "../controllers/cargar_ambiente.php",
    method: "GET",
    dataType: "html",
    success: function (data) {
      $("#scroll_ambientes").html(data);

      // Ahora que el contenido se ha cargado, puedes adjuntar el manejador de eventos
      var elemento = document.querySelectorAll("#primer-contenedor");
  
      elemento.forEach(function (contenedor) {
        contenedor.addEventListener("click", function () {
          var id_Amb = this.getAttribute("data-amb");
          console.log(id_Amb);

          var boton = document.getElementById("boto1");
          boton.setAttribute("data-amb", id_Amb);

          boton.addEventListener("click", function () {
            delete_Ambiente(id_Amb); // Llamamos a la función delete_CF con el ID_CF
          });
          // Resto del código...
        });
      });
    },
    error: function () {
      alert("Error al cargar el contenido.");
    },
  });
}

document.addEventListener("DOMContentLoaded", function () {
  cargarAmbientes();

  var cf_form = document.querySelector("#form_ambiente"); // Usar querySelector para seleccionar un elemento por su ID
  var form_reset = document.getElementById("form_ambiente")
  form_ambiente.addEventListener("submit", function (event) {
    event.preventDefault();

    var formData = new FormData(form_ambiente); // Cambiar 'formData' a 'FormData'

    fetch("../controllers/add_ambientes.php", {
      
      method: "POST", // Especificar el método POST para enviar datos al servidor
      body: formData, // Enviar los datos del formulario
    })
      .then((response) => {
        
        if (!response.ok) {
          throw new Error("La solicitud no pudo completarse correctamente.");
        }
        return response.json();
      })
      .then((data) => {
        if (data && data.success) {
          form_ambiente.reset();
          console.log("registro exitoso"); // Corregir "existoso" a "exitoso"
          actualizarAmbientes();
         
        } else {
          alert("fallo registro"); // Corregir "resgistro" a "registro"
        }
      })
      .catch((error) => {
        console.log("error en la solicitud", error);
      });
  });
});

// funcion para eliminar ambientes

function delete_Ambiente(id) {
  // Cambié el nombre del parámetro a "id" en lugar de "id_CF"
  // Confirmar si el usuario realmente quiere eliminar el elemento
  if (id) {
    // Realizar una solicitud AJAX para eliminar el elemento
    fetch(`../controllers/delet_Amb.php?id=${id}`, {
      method: "DELETE", // Puedes ajustar el método según tu API
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Error al eliminar el elemento");
        }
        // Eliminación exitosa, puedes realizar acciones adicionales si es necesario
        // Por ejemplo, actualizar la interfaz de usuario o recargar la página
        console.log(`Elemento con ID ${id} eliminado exitosamente`);
        actualizarAmbientes();
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }
}

function actualizarAmbientes() {
  // Realiza una solicitud AJAX para cargar nuevamente el contenido
  $.ajax({
    url: "../controllers/cargar_ambiente.php",
    method: "GET",
    dataType: "html",
    success: function (data) {
      $("#scroll_ambientes").html(data);
      console.log("Contenido actualizado"); // Muestra un mensaje en la consola

      // Ahora que el contenido se ha cargado nuevamente, puedes volver a adjuntar los manejadores de eventos si es necesario
      var elemento = document.querySelectorAll(".primer-contenedor");

      elemento.forEach(function (contenedor) {
        contenedor.addEventListener("click", function () {
          var id_Amb = this.getAttribute("data-amb");
          console.log(id_Amb);
        
          var boton = document.getElementById("boto1");
          boton.setAttribute("data-amb", id_Amb);

          boton.addEventListener("click", function () {
            delete_Ambiente(id_Amb); // Llama a la función delete_CF con el ID_CF si es necesario
          });
          // Resto del código...
        });
      });
    },
    error: function () {
      alert("Error al cargar el contenido.");
    },
  });
}

//funciones para abrir ventanas modales

// ----------- modificar las funciones para evitar usar el 
// evento onclick , y usar el evento escucha.



function abrir_Amb() {
  console.log('hola mundo')
  var darkOverlay = document.getElementById("darkk");
  var deleteConfirmation = document.getElementById("delete");

  if (darkOverlay && deleteConfirmation) {
    darkOverlay.style.display = "flex";
    deleteConfirmation.style.display = "flex";
  }
}

function cerrarFormulario_Amb() {
  document.getElementById("darkk").style.display = "none";
  document.getElementById("delete").style.display = "none";
}