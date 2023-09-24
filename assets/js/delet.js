console.log("hola mundo");

//funciones para borrar centros de educaion
function abrir_CF() {
  var darkOverlay = document.getElementById("dark");
  var deleteConfirmation = document.getElementById("delet");

  if (darkOverlay && deleteConfirmation) {
    darkOverlay.style.display = "flex";
    deleteConfirmation.style.display = "flex";
  }
}

function cerrarFormulario_CF() {
  document.getElementById("dark").style.display = "none";
  document.getElementById("delet").style.display = "none";
}

function delete_CF(id) {
  // Cambié el nombre del parámetro a "id" en lugar de "id_CF"
  // Confirmar si el usuario realmente quiere eliminar el elemento
  if (id) {
    // Realizar una solicitud AJAX para eliminar el elemento
    fetch(`../controllers/delete_CF.php?id=${id}`, {
      method: "DELETE", // Puedes ajustar el método según tu API
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Error al eliminar el elemento");
        }
        // Eliminación exitosa, puedes realizar acciones adicionales si es necesario
        // Por ejemplo, actualizar la interfaz de usuario o recargar la página
        console.log(`Elemento con ID ${id} eliminado exitosamente`);
        actualizarContenido();
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }
}

function cargarContenido() {
  $.ajax({
    url: "../controllers/cargar_cf.php",
    method: "GET",
    dataType: "html",
    success: function (data) {
      $("#CF").html(data);

      // Ahora que el contenido se ha cargado, puedes adjuntar el manejador de eventos
      var elementos = document.querySelectorAll(".elemento");

      elementos.forEach(function (contenedor) {
        contenedor.addEventListener("click", function () {
          var id_CF = this.getAttribute("data-id");
          console.log(id_CF);

          var boton = document.getElementById("boton1");
          boton.setAttribute("data-id", id_CF);

          boton1.addEventListener("click", function () {
            delete_CF(id_CF); // Llamamos a la función delete_CF con el ID_CF
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

$(document).ready(function () {
  cargarContenido();
});



document.addEventListener("DOMContentLoaded", function () {
  var cf_form = document.querySelector("#cf_form"); // Usar querySelector para seleccionar un elemento por su ID
 

  cf_form.addEventListener("submit", function (event) {
    event.preventDefault();

    var formData = new FormData(cf_form); // Cambiar 'formData' a 'FormData'

    fetch("../controllers/add_cf.php", {
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
          console.log("registro exitoso"); // Corregir "existoso" a "exitoso"
          actualizarContenido();
        } else {
          alert("fallo registro"); // Corregir "resgistro" a "registro"
        }
      })
      .catch((error) => {
        console.log("error en la solicitud", error);
      });
  });
});




function actualizarContenido() {
  // Realiza una solicitud AJAX para cargar nuevamente el contenido
  $.ajax({
    url: "../controllers/cargar_cf.php",
    method: "GET",
    dataType: "html",
    success: function (data) {
      $("#CF").html(data);
      console.log("Contenido actualizado"); // Muestra un mensaje en la consola

      // Ahora que el contenido se ha cargado nuevamente, puedes volver a adjuntar los manejadores de eventos si es necesario
      var elementos = document.querySelectorAll(".elemento");

      elementos.forEach(function (contenedor) {
        contenedor.addEventListener("click", function () {
          var id_CF = this.getAttribute("data-id");
          console.log(id_CF);

          var boton = document.getElementById("boton1");
          boton.setAttribute("data-id", id_CF);

          boton1.addEventListener("click", function () {
            delete_CF(id_CF); // Llama a la función delete_CF con el ID_CF si es necesario
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