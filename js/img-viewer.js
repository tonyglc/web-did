document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('modal');
  const imagenAmpliada = document.getElementById('imagenAmpliada');
  const captionText = document.getElementById('caption');
  const cerrar = document.getElementById('cerrar');

  // Seleccionamos todas las imágenes con la clase "miniatura"
  const miniaturas = document.querySelectorAll('.miniatura');

  // Por cada imagen, añadimos un evento click
  miniaturas.forEach(img => {
    img.addEventListener('click', () => {
      modal.style.display = 'block';
      modal.style.paddingTop = '100px';
      imagenAmpliada.src = img.src;
      document.getElementById('header').style.display = 'none';
    });
  });

  // Cerramos el modal al hacer click en la "x"
  cerrar.addEventListener('click', () => {
    modal.style.display = 'none';
     document.getElementById('header').style.display = 'flex';
  });

  // También se puede cerrar haciendo click fuera de la imagen ampliada
  modal.addEventListener('click', (e) => {
    if (e.target === modal) {
      modal.style.display = 'none';
       document.getElementById('header').style.display = 'flex';
    }
  });
});
