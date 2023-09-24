var verCentro = document.querySelectorAll(".CF");
verCentro.forEach(function (contenedor) {
  contenedor.addEventListener("click", function () {
    var centroId = this.getAttribute("data-centro"); 
    fetch("../controllers/consultarAmbientes.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: "piso_id=" + encodeURIComponent(centroId),
    })
      .then((response) => response.text()) 
      .then(function (responseText) {
        document.getElementById("contenedor_CF").style.display= 'none';
        document.getElementById("containerAmbientes").style.display= 'flex';

        document.getElementById("containerAmbientes").innerHTML = responseText;


        var verInvnetario = document.querySelectorAll(".ambiente");
        verInvnetario.forEach(function (contenedor) {
          contenedor.addEventListener("click", function () {
            var ambienteId = this.getAttribute("data-ambiente"); 
            fetch("../controllers/consultar_I.php", {
              method: "POST",
              headers: {
                "Content-Type": "application/x-www-form-urlencoded",
              },
              body: "ambiente_id=" + encodeURIComponent(ambienteId),
            })
              .then((response) => response.text()) 
              .then(function (responseText) {
                document.getElementById("containerAmbientes").style.display= 'none';
                
                document.getElementById("containerInventario").innerHTML = responseText;
              
              })
              .catch(function (error) {
                console.error("Error:", error);
              });
          });
        });
        
        
        function vaciarAmbiente(){
          document.getElementById("containerAmbientes").innerHTML = '';
          document.getElementById("containerAmbientes").display = 'none';
          document.getElementById("contenedor_CF").style.display= 'flex';
        }

               
        function vaciarInventario(){
          document.getElementById("containerAmbientes").innerHTML = '';
          document.getElementById("containerAmbientes").display = 'none';
          document.getElementById("contenedor_CF").style.display= 'flex';
        }
        

      })
      .catch(function (error) {
        console.error("Error:", error);
      });
  });
});

