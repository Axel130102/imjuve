function Alert(insertarCasos){
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'La información se ha insertado correctamente',
        showConfirmButton: false,
        timer: 2000
      })
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('enviar-casos').addEventListener('click', function(e) {
      e.preventDefault();
      Alert();
      // Agrega un temporizador de 5 segundos
      setTimeout(function() {
        document.getElementById('forminsertarCasos').submit();
      }, 2000);
    });
  });

  function Alert(insertarToolkit){
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'La información se ha insertado correctamente',
        showConfirmButton: false,
        timer: 2000
      })
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('enviar-toolkit').addEventListener('click', function(e) {
      e.preventDefault();
      Alert();
      // Agrega un temporizador de 5 segundos
      setTimeout(function() {
        document.getElementById('formToolkitInsertar').submit();
      }, 2000);
    });
  });