document.addEventListener('DOMContentLoaded', function() {
  // Lee la sección activa del localStorage al cargar la página
  var seccionActiva = localStorage.getItem('seccionActiva');
  
  // Si hay una sección activa guardada, muéstrala; de lo contrario, muestra la primera sección
  if (seccionActiva) {
    document.querySelectorAll('[id^="seccion-"]').forEach(function(seccion) {
      if (seccion.id === seccionActiva) {
        seccion.style.display = 'block';
      } else {
        seccion.style.display = 'none';
      }
    });
  } else {
    document.getElementById('seccion-1').style.display = 'block';
  }

  document.querySelectorAll('button[data-target]').forEach(function(boton) {
    boton.addEventListener('click', function() {
      var target = this.dataset.target;

      // Guarda la sección activa en el localStorage
      localStorage.setItem('seccionActiva', target);

      document.querySelectorAll('[id^="seccion-"]').forEach(function(seccion) {
        if (seccion.id === target) {
          seccion.style.display = 'block';
        } else {
          seccion.style.display = 'none';
        }
      });
    });
  });
});
