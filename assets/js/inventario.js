var verAmbiente = document.querySelectorAll(".CF");
verAmbiente.forEach(function (contenedor) {
  contenedor.addEventListener("click", function () {
    var pisoId = this.getAttribute("data-centro"); 
    fetch("../controllers/inventario.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: "piso_id=" + encodeURIComponent(pisoId),
    })
      .then((response) => response.text()) 
      .then(function (responseText) {
        document.getElementById("contenedor_CF").style.display= 'none';
        document.getElementById("containerAmbientes").innerHTML = responseText;

      })
      .catch(function (error) {
        console.error("Error:", error);
      });
  });
});

function vaciarPisos(){
  document.getElementById("containerAmbientes").innerHTML = '';
  document.getElementById("containerAmbientes").display = 'none';
  document.getElementById("contenedor_CF").style.display= 'flex';
}
