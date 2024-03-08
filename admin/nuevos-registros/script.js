document.addEventListener('DOMContentLoaded', function() {
  // Obtener el botón de abrir modal y el modal
  var openModalBtn = document.getElementById('open-modal-btn');
  var modal = document.getElementById('modal');

  // Obtener el botón de cerrar modal
  var closeModalBtn = document.getElementById('close-modal-btn');

  // Abrir modal al hacer clic en el botón
  openModalBtn.addEventListener('click', function() {
      modal.style.display = 'block';
  });

  // Cerrar modal al hacer clic en el botón de cerrar
  closeModalBtn.addEventListener('click', function() {
      modal.style.display = 'none';
  });

  // Cerrar modal al hacer clic fuera de él
  window.addEventListener('click', function(event) {
      if (event.target == modal) {
          modal.style.display = 'none';
      }
  });
});
